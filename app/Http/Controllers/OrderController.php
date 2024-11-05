<?php

namespace App\Http\Controllers;
use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\DataTables\processedOrderDataTable;
use App\DataTables\droppedOffOrderDataTable;
use App\DataTables\shippedOrderDataTable;
use App\DataTables\outForDeliveryOrderDataTable;
use App\DataTables\deliveredOrderDataTable;
use App\DataTables\canceledOrderDataTable;
use App\Jobs\OrderStatusMailJob;
use App\Services\TwilioService;
use App\Models\Order;
use App\Models\Country;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.index');
    }

    public function pendingOrders(PendingOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.pending-order');
    }

    public function processedOrders(processedOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.processed-order');
    }

    public function droppedOfOrders(droppedOffOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.dropped-off-order');
    }

    public function shippedOrders(shippedOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.shipped-order');
    }

    public function outForDeliveryOrders(outForDeliveryOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.out-for-delivery-order');
    }

    public function deliveredOrders(deliveredOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.delivered-order');
    }

    public function canceledOrders(canceledOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.canceled-order');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.view', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // delete order products
        $order->orderProducts()->delete();
        // delete transaction
        $order->transaction()->delete();

        $order->delete();

        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }

    public function changeOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->order_status = $request->status;
        $order->save();

        //प्रेषण कार्य
        dispatch(new OrderStatusMailJob($order)); //dispaching job

        #------twilio sms code start-------#
        $valid_arr = ['shipped','delivered'];
        
        if(in_array($request->status, $valid_arr)){
            $status = $order->order_status;
            $order = json_decode($order->order_address);

            $data = [
            'order' => $order,
            'status' => $status
            ];

            $phone_no = $this->getCompleteMobileNo($order->country, $order->phone);
            //\Log::alert("donedone");
            // Send the SMS
            $this->twilioService->sendSmsWithTemplate($phone_no, 'order_status_changed', $data);

        }
        #------twilio sms code end-------#




        return response(['status' => 'success', 'message' => 'Updated Order Status']);
    }

    public function changePaymentStatus(Request $request)
    {
        $paymentStatus = Order::findOrFail($request->id);
        $paymentStatus->payment_status = $request->status;
        $paymentStatus->save();

        return response(['status' => 'success', 'message' => 'Updated Payment Status Successfully']);
    }

    public function getCompleteMobileNo($countryName, $no) {
        // Retrieve the country record and its phone code
        $country = Country::where('name', $countryName)->first();

        // Check if the country exists
        if ($country) {
            $phoneCode = $country->phonecode; // Use the phone code from the country record
            return '+' . $phoneCode . $no; // Construct the full phone number
        }

        return null; // Handle case where the country is not found
    }
}
