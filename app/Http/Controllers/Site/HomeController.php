<?php
namespace App\Http\Controllers\Site;

use App\Contracts\BannerContract;
use App\Http\Controllers\BaseController;
use App\Models\Banner;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level3;
use App\Models\Level4;
use App\Models\Level5;
use App\Models\Pincode;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Session;

class HomeController extends BaseController
{
    public function __construct()
    {
       
    }

    /**
     * Display a listing of the resource.
     * * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(){

        $banners = Banner::where('is_active',1)->orderBy('id','desc')->get();
        $categories = Category::where('is_active',1)->take(5)->orderBy('orderby','asc')->get();

        $flashdeals = Product::where('is_active',1)->where('is_today_deal',1)->take(10)->get();

        $trending = Product::where('is_active',1)->where('is_new',1)->take(10)->get();

        $womentrending = Product::where('is_active',1)->where('category_id',4)->take(8)->orderby('id','desc')->get();

        $mentrending = Product::where('is_active',1)->where('category_id',2)->take(8)->orderby('id','desc')->get();

        $ProductReview = ProductReview::where('is_active',1)->orderby('rating','desc')->get();

        $this->setPageTitle('Home', '');
        return view('site.home.index',compact('banners','categories','flashdeals','womentrending','mentrending','ProductReview','trending'));
    }
}