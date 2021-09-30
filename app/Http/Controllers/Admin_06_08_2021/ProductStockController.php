<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductStockController extends BaseController
{
	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $productstock = ProductStock::orderBy('product_id','desc')->get();

        $this->setPageTitle('Product Stock', 'List of all product stock');
        return view('admin.productstock.index', compact('productstock'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
    	$products = Product::all();

        $sizes = Size::all();

        $this->setPageTitle('Product Stock', 'Create Product Stock');
        return view('admin.productstock.create',compact('products','sizes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id'     =>  'required',
            //'size_id'=>  'required',
            'current_stock'     =>  'required',
            'stock_alert'=>  'required'
        ], array(
        "stock_alert.required" => "Stock alert is required",
        "current_stock.required" => "Current stock is required",
        "size_id.required" => "size is required",
        "product_id.required" => "This product is required",
        ));

        $stock =  $request->all();

        //$stock['sku_code'] = Product::findOrFail($request->product_id)->code;

        $status = ProductStock::create($stock);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while creating Product Stock.', 'error', true, true);
        }
        return $this->responseRedirect('admin.productstock.index', 'Product Stock added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetProduct = ProductStock::findOrFail($id);

        

        $products = Product::all();

        $sizes = Size::all();
        
        $this->setPageTitle('Product Stock', 'Edit ProductStock : '.$targetProduct->product->name);
        return view('admin.productstock.edit', compact('targetProduct','products','sizes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'product_id'     =>  'required',
            //'size_id'=>  'required',
            'current_stock'     =>  'required',
            'stock_alert'=>  'required'
        ]);

        $id = $request->id;
        $data = $request->all();

        //$data['sku_code'] = Product::findOrFail($request->product_id)->code;

        $targetProduct = ProductStock::findOrFail($id);

        $status = $targetProduct->update($data);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating Product Stock.', 'error', true, true);
        }
        return $this->responseRedirectBack('ProductStock updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = ProductStock::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting Product Stock.', 'error', true, true);
        }
        return $this->responseRedirect('admin.productstock.index', 'Product Stock deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $brand =  Level1::findOrFail($id);

        $brand->is_active = $request->is_active;
        $status = $brand->save();

        if ($status) {
            return response()->json(array('message'=>'Level1 status successfully updated'));
        }
    }
    public function sizes($productId){

        $sizes = DB::select("select * from sizes where id in(select sizes from productsizes where productid ='$productId')");
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
}
