<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Category;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        return view('admin.dashboard');
    }


    public function dashboard()
    {
        $todaysOrder = Order::whereDate('created_at', Carbon::today())->count();
        $todaysPendingOrder = Order::whereDate('created_at', Carbon::today())->where('order_status', 'pending')->count();
        $totalOrders = Order::count();
        $totalPendingOrders = Order::where('order_status', 'pending')->count();
        $totalProcessedOrders = Order::where('order_status', 'processed_and_ready_to_ship')->count();
        $totaldroppedoffOrders = Order::where('order_status', 'dropped_off')->count();
        $totalshippedOrders = Order::where('order_status', 'shipped')->count();
        $totaloutfordeliveryOrders = Order::where('order_status', 'out_for_delivery')->count();
        $totaldeliveredOrders = Order::where('order_status', 'delivered')->count();
        $totalcanceledOrders = Order::where('order_status', 'canceled')->count();

        $todaysEarnings = Order::where('order_status','!=', 'canceled')
        ->where('payment_status',1)
        ->whereDate('created_at', Carbon::today())
        ->sum('sub_total');

        $monthEarnings = Order::where('order_status','!=', 'canceled')
        ->where('payment_status',1)
        ->whereMonth('created_at', Carbon::now()->month)
        ->sum('sub_total');

        $yearEarnings = Order::where('order_status','!=', 'canceled')
        ->where('payment_status',1)
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('sub_total');

        // $totalReview = ProductReview::count();

        $totalCategories = Category::count();
        $totalBlogs = Blog::count();
        // $totalSubscriber = NewsletterSubscriber::count();

        $totalUsers = User::where('user_type', 'user')->count();
        $totalAdmins = User::where('user_type', 'admin')->count();



        return view('admin.dashboard', compact(
            'totalOrders',
            'totalPendingOrders',
            'todaysOrder',
            'todaysPendingOrder',
            'totalProcessedOrders',
            'totaldroppedoffOrders',
            'totalshippedOrders',
            'totaloutfordeliveryOrders',
            'totaldeliveredOrders',
            'totalcanceledOrders',
            'todaysEarnings',
            'monthEarnings',
            'yearEarnings',
            'totalCategories',
            'totalBlogs',
            'totalUsers',
            'totalAdmins',
             // 'totalSubscriber',





        ));
    }
}
