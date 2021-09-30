<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level3;
use App\Models\Level4;
use App\Models\Level5;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Productsize;
use App\Models\Size;
use Illuminate\Http\Request;
use DB;

class ProductsController extends BaseController
{
	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $products = Product::orderBy('id','desc')->get();

        $this->setPageTitle('Product', 'List of all Product');
        return view('admin.product.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

    	$category = Category::where('is_active',1)->get();

        $level1 = Level1::where('is_active',1)->get();
        $level2 = Level2::where('is_active',1)->get();
        $level3 = Level3::where('is_active',1)->get();
        $level4 = Level4::where('is_active',1)->get();
        $level5 = Level5::where('is_active',1)->get();
        $brand = Brand::where('is_active',1)->get();

        $this->setPageTitle('Product', 'Create Product');
        return view('admin.product.create',compact('category','level1','level2','level3','level4','level5','brand'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'image'     =>  'required',
            'name'=>  'required',
            'category_id'=>  'required',
        ]);

        $datas =  $request->all();

        $valid_images = array("png","jpg","jpeg","gif");
        if($request->hasFile("image") && in_array($request->image->extension(),$valid_images)){
            $profile_image = $request->image;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("books/",$imageName);
            $uploadedImage = $imageName;
            $datas['image'] = $uploadedImage;
        }
        
        $datas['is_active'] = 1;

        $product = Product::create($datas);
        
        $k= 0;
        
        if(!empty($datas['size'][$k])){

            for($k;$k<count($datas['size']);$k++){

            $productsizes['productid'] = $product->id;
            $productsizes['sizes'] = $datas['size'][$k];

            Productsize::create($productsizes);
          }
        }
        
        $j= 0;
        if(!empty($datas['images'][$j])){
          for($j;$j<count($datas['images']);$j++){

            $productImages['book_id'] = $product->id;

            $image = $datas['images'][$j];

            $valid_images = array("png","jpg","jpeg","gif");

            if(in_array($image->extension(),$valid_images)){
            
            $profile_image = $image;

            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("books/",$imageName);
            $uploadedImage = $imageName;
            $productImages['image'] = $uploadedImage;
           }
        
            ProductImages::create($productImages);
          }
      }

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating Product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetproduct = Product::findOrFail($id);
        $sizes = Size::where('is_active',1)->get();
        $category = Category::where('is_active',1)->get();

        $level1 = Level1::where('is_active',1)->get();
        $level2 = Level2::where('is_active',1)->get();
        $level3 = Level3::where('is_active',1)->get();
        $level4 = Level4::where('is_active',1)->get();
        $level5 = Level5::where('is_active',1)->get();
        $brand = Brand::where('is_active',1)->get();
        
        $this->setPageTitle('Product', 'Edit Product : '.$targetproduct->name);
        return view('admin.product.edit', compact('targetproduct','level1','level2','level3','level4','level5','category','brand','sizes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'=>  'required',
            'category_id'=>  'required',
        ]);

        $id = $request->id;
        $datas = $request->all();

        $valid_images = array("png","jpg","jpeg","gif");
        if($request->hasFile("image") && in_array($request->image->extension(),$valid_images)){
            $profile_image = $request->image;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("books/",$imageName);
            $uploadedImage = $imageName;
            $datas['image'] = $uploadedImage;
        }

        $targetproduct = Product::findOrFail($id);

        $product = $targetproduct->update($datas);
        
        $k = 0;
        
        if(!empty($datas['size'])){
              
            for($k=0;$k<count($datas['size']);$k++){
            
            $productsizes['productid'] = $id;
            $productsizes['sizes'] = $datas['size'][$k];
            
            Productsize::updateOrCreate($productsizes);
          }
        }

        $j= 0;
        if(!empty($datas['images'][$j])){
          for($j;$j<count($datas['images']);$j++){

            $productImages['book_id'] = $id;

            $image = $datas['images'][$j];

            $valid_images = array("png","jpg","jpeg","gif");

            if(in_array($image->extension(),$valid_images)){
            
            $profile_image = $image;

            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("books/",$imageName);
            $uploadedImage = $imageName;
            $productImages['image'] = $uploadedImage;
           }
        
            ProductImages::create($productImages);
          }
      }

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating products.', 'error', true, true);
        }
        return $this->responseRedirectBack('products updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Product::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting products.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product deleted successfully' ,'success',false, false);
    }
    
    public function sizes($categoryId){

        $sizes = Size::where('is_active',1)->where('category_id',$categoryId)->get();
        header('Content-Type:application/json');
        if(!count($sizes)) {
          return response()->json([
              'success' => false,
              "status" => 0,
              'message' => 'Sorry, No data found.'
          ], 400);
      }

        return response()->json(["status" => 1,"sizes" => $sizes],200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function viewDetail($id)
    {
        $targetproduct = Product::findOrFail($id);
        $this->setPageTitle('Product', 'Product Detail: '.$targetproduct->name);

       $reviews =  DB::select("select product_reviews.*,users.name"
                . " from product_reviews join users"
                . " on (product_reviews.user_id=users.id)"
                . " where product_reviews.product_id='$id'");

        return view('admin.product.details', compact('targetproduct','reviews'));
    }
    
    /**
     * @param $productid
     * 
     */
    
    public function sizelist($productid){

        $sizelist = DB::select("select productsizes.*, sizes.sizes from productsizes
            left join sizes
            on(productsizes.sizes = sizes.id)
            where productsizes.productid='$productid'");

        $this->setPageTitle('Product sizes', '');
        return view('admin.product.sizelist',compact('sizelist'));
    }
    
    /**
     * @return \Illuminate\Http\RedirectResponse
     * add product size
     */

    public function addsize($productid){
      
        $targetproduct = Product::findOrFail($productid);

        $category_id = $targetproduct->category->id;

        $sizes = Size::where('category_id',$category_id)->where('is_active',1)->get();
        
        $this->setPageTitle('Addsize', '');
        return view('admin.product.addsize',compact('sizes','productid'));
    }
    
     /**
     * @param $productid
     *  save product size
     */

    public function addsizestore(Request $request){
      
      $this->validate($request, [
            'sizes'     =>  'required',
            'inprice'=>  'required',
            'inoffered_price'=>  'required',
            'usprice'=>  'required',
            'usoffered_price'=>  'required',
            'ukprice'=>  'required',
            'ukoffered_price'=>  'required',
            'rowprice'=>  'required',
            'rowoffered_price'=>  'required',
      ]);

      $data = $request->all();

      $response = Productsize::create($data);
        
      if (!$response) {
            return $this->responseRedirectBack('Error occurred while adding size.', 'error', true, true);
      }

      return $this->responseRedirectBack('size added successfully' ,'success',false, false);
    }
    
    
    public function sizeedit($sizeid){

      $targetsize = Productsize::findOrFail($sizeid);

      $sizes = Size::where('is_active',1)->get();
        
      $this->setPageTitle('Editsize', '');
      return view('admin.product.editsize',compact('sizes','targetsize'));
    }


    public function updatesize(Request $request){

      $this->validate($request, [
            'sizes'     =>  'required',
            'inprice'=>  'required',
            'inoffered_price'=>  'required',
            'usprice'=>  'required',
            'usoffered_price'=>  'required',
            'ukprice'=>  'required',
            'ukoffered_price'=>  'required',
            'rowprice'=>  'required',
            'rowoffered_price'=>  'required',
      ]);

      $id = $request->id;
      $datas = $request->all();

      $targetsize = Productsize::findOrFail($id);

      $res = $targetsize->update($datas);

      if (!$res) {
            return $this->responseRedirectBack('Error occurred while updating product size.', 'error', true, true);
        }
        return $this->responseRedirectBack('product size updated successfully' ,'success',false, false);
    }
    
    public function sizeDelete($id){

      $response = Productsize::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting size.', 'error', true, true);
        }
        return $this->responseRedirectBack('size deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $level5 =  Product::findOrFail($id);

        $level5->is_active = $request->is_active;
        $status = $level5->save();

        if ($status) {
            return response()->json(array('message'=>'product status successfully updated'));
        }
    }

    /**
     * @param $product_id
     * @param $is_bestseller
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bestseller($product_id, $is_bestseller = 0)
    {
        $Product = Product::find($product_id);

        $Product->is_bestseller = $is_bestseller;
        $response = $Product->save();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while updating products.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }

    /**
     * @param $product_id
     * @param $is_today_deal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function todaydeal($product_id, $is_today_deal = 0)
    {
        $Product = Product::find($product_id);

        $Product->is_today_deal = $is_today_deal;
        $response = $Product->save();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while updating products.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }

    /**
     * @param $product_id
     * @param $is_new
     * @return \Illuminate\Http\RedirectResponse
     */
    public function newarrival($product_id, $is_new = 0)
    {
        $Product = Product::find($product_id);

        $Product->is_new = $is_new;
        $response = $Product->save();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while updating products.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }

    /**
     * @param $product_id
     * @param $pre_order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function preorder($product_id, $pre_order = 0)
    {
        $Product = Product::find($product_id);

        $Product->is_pre_order = $pre_order;
        $response = $Product->save();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while updating products.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }

    /**
     * @param $product_id
     * @param $pre_order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function stock($product_id, $stock = 0)
    {
        $Product = Product::find($product_id);

        $Product->stock = $stock;
        $response = $Product->save();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while updating products.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }
}
