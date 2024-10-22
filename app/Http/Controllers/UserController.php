<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use App\DataTables\UserProductReviewsDataTable;
use App\DataTables\UserOrderDataTable;
use App\DataTables\UserPendingOrderDataTable;
use App\DataTables\UserCompletedOrderDataTable;
use App\Models\Order;
use App\Models\UserAddress;
use App\Models\ProductReview;

class UserController extends Controller
{
    //
    public function index(){
         $userId = auth()->user()->id;
         $totalOrders = Order::where('user_id',$userId)->count();
         $totalPendingOrders = Order::where('user_id',$userId)->where('order_status', 'pending')->count();
         $totaldeliveredOrders = Order::where('user_id',$userId)->where('order_status', 'delivered')->count();
         $totalAddress = UserAddress::where('user_id',$userId)->count();
         $totalReviews = ProductReview::where('user_id',$userId)->count();

         return view('user.dashboard',compact('totalOrders','totalPendingOrders','totaldeliveredOrders','totalAddress','totalReviews'));       
    }

    public function userindex(){
        return view('user.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,'.Auth::user()->id],
            'image' => ['image', 'max:2048']
        ]);

        $user = Auth::user();

        if($request->hasFile('image')){
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);

            $path = 'uploads/users/'.$imageName;

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if($user->save()){
            return redirect()->route('user.profile')->with('success', 'Data Updated Successfully.');
        } else {
            return redirect()->route('user.profile')->with('danger', 'Failed to update. Please try again.');
        }

    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required','confirmed', 'min:8']
        ]);

        $pass = $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        if($pass){
            return redirect()->route('user.profile')->with('success', 'Profile Password Updated Successfully!');
        } else {
            return redirect()->route('user.profile')->with('danger', 'Failed to update. Please try again.');
        }
    }

    public function reviews(UserProductReviewsDataTable $dataTable)
    {
        return $dataTable->render('user.review.index');
    }

    public function orderIndex(UserOrderDataTable $dataTable){
        return $dataTable->render('user.order.index');
    }

    public function pendingOrders(UserPendingOrderDataTable $dataTable)
    {
        return $dataTable->render('user.order.index');
    }
    public function completedOrders(UserCompletedOrderDataTable $dataTable)
    {
        return $dataTable->render('user.order.index');
    }
    public function orderShow(string $id)
    {
        $order = Order::findOrFail($id);
        return view('user.order.show', compact('order'));
    }

    
}
