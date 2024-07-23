<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product,Category,ProductReview};

class FproductController extends Controller
{
    public function index(Request $request){
        if($request->has('category')){
            $category = Category::where('cat_slug', $request->category)->firstOrFail();
            $products = Product::where(['category_id'=>$category->id,'status' => 1, 'is_approved' => 1])
                        ->withAvg('reviews', 'rating')
                        ->when($request->has('min_price') && $request->has('max_price'), function($query) use ($request){
                            $from = $request->min_price;
                            $to = $request->max_price;

                            return $query->where('price', '>=', $from)->where('price', '<=', $to);
                        })
                        ->orderBy('id', 'DESC')
                        ->paginate(6)
                        ->withQueryString();
        }elseif($request->has('search')){
            $products = Product::where(['status' => 1, 'is_approved' => 1])
            ->withAvg('reviews', 'rating')
            ->orderBy('id', 'DESC')
            ->where(function ($query) use ($request){
                $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('long_description', 'like', '%'.$request->search.'%');
            })
            ->paginate(6);

        }else{
             $products = Product::where(['status' => 1, 'is_approved' => 1])->withAvg('reviews', 'rating')->orderBy('id', 'DESC')->paginate(6);
        }    
        $categories = Category::where('parent_id',null)->where('status',1)->get();
        $top_products = Product::where(['status' => 1, 'is_approved' => 1, 'product_type' => 'top_product'])
                        ->orderBy('id', 'DESC')
                        ->limit(3)
                        ->get();
        return view('frontend.product.products',compact('products','categories','top_products'));
    }
    /** Show product detail page */
    public function showProduct(string $slug)
    {
        $product = Product::with(['category','productImageGalleries'])->where('slug', $slug)->where('status', 1)->withAvg('reviews', 'rating')->first();
        $reviews = ProductReview::where('product_id', $product->id)->with('user')->where('status', 1)->paginate(10);
        $relatedProducts = Product::where('category_id', $product->category->id)->where('status', 1)->inRandomOrder()->take(3)->get();
        return view('frontend.product.product-detail', compact('product', 'reviews','relatedProducts'));
    }
}
