<?php

namespace App\Http\Controllers;
use App\Models\Order;
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
        // $totalCanceledOrders = Order::where('order_status', 'canceled')->count();
        // $totalCompleteOrders = Order::where('order_status', 'delivered')->count();

        // $todaysEarnings = Order::where('order_status','!=', 'canceled')
        // ->where('payment_status',1)
        // ->whereDate('created_at', Carbon::today())
        // ->sum('sub_total');

        // $monthEarnings = Order::where('order_status','!=', 'canceled')
        // ->where('payment_status',1)
        // ->whereMonth('created_at', Carbon::now()->month)
        // ->sum('sub_total');

        // $yearEarnings = Order::where('order_status','!=', 'canceled')
        // ->where('payment_status',1)
        // ->whereYear('created_at', Carbon::now()->year)
        // ->sum('sub_total');

        // $totalReview = ProductReview::count();

        // $totalBrands = Brand::count();
        // $totalCategories = Category::count();
        // $totalBlogs = Blog::count();
        // $totalSubscriber = NewsletterSubscriber::count();
        // $totalVendors = User::where('role', 'vendor')->count();
        // $totalUsers = User::where('role', 'user')->count();



        return view('admin.dashboard', compact(
            'totalOrders',
            'totalPendingOrders',
            'todaysOrder',
            'todaysPendingOrder',

            // 'totalCanceledOrders',
            // 'totalCompleteOrders',
            // 'todaysEarnings',
            // 'monthEarnings',
            // 'yearEarnings',
            // 'totalReview',
            // 'totalBrands',
            // 'totalCategories',
            // 'totalBlogs',
            // 'totalSubscriber',
            // 'totalVendors',
            // 'totalUsers'
        ));
    }
}
