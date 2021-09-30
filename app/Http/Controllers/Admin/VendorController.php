<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor,App\Models\State;
use App\Models\vendorItems;
use App\Models\Product,DB;
use App\Models\VendorPurchaseOrder;
use App\Models\VendorPurchaseProductOrder;
use App\Http\Controllers\BaseController;

class VendorController extends BaseController
{
    public function purchaseOrder(Request $req)
    {
        $purchaseOrder = VendorPurchaseOrder::with('vendor')->with('purchase_items')->latest()->paginate(20);
        return view('admin.vendor.purchase.list',compact('purchaseOrder'));
    }

    public function purchaseOrderCreate(Request $req)
    {
        $vendors = Vendor::orderBy('name')->get();
        if($req->ajax()){
            $vendorItems = [];
            if(!empty($req->vendorId)){
                $vendorItems = vendorItems::where('vendorId',$req->vendorId)->with('product')->get();
            }
            return response()->json(['error' => false,'message' => 'List','vendorItem' => $vendorItems]);
        }
        return view('admin.vendor.purchase.create',compact('vendors'));
    }

    public function purchaseOrderSave(Request $req)
    {
        $this->validate($req,[
            'vendor' => 'required|min:1|numeric',
            'ship_to' => 'required|string',
            'items' => 'required|array',
            'items.*' => 'required|min:1|numeric',
            'quantity' => 'required|array',
            'quantity.*' => 'required|min:1|numeric',
        ]);
        DB::beginTransaction();
        try {
            $vendor = Vendor::findOrFail($req->vendor);
            $newOrder = new VendorPurchaseOrder();
            $newOrder->vendorId = $vendor->id;
            $newOrder->ship_to = $req->ship_to;
            $newOrder->save();
            foreach ($req->items as $key => $items) {
                $newItems = new VendorPurchaseProductOrder();
                $newItems->vendorId = $vendor->id;
                $newItems->vendorPurchaseOrderId = $newOrder->id;
                $newItems->vendorItemId = $items;
                $newItems->quantity = $req->quantity[$key];
                $newItems->save();
            }
            DB::commit();
            return redirect(route('admin.vendor.purchase.order.list'));
        } catch (Exception $e) {
            DB::rollback();
            return back();
        } 
    }

    public function purchaseOrderView(Request $req,$orderId)
    {
        $order = VendorPurchaseOrder::findOrFail($orderId);
        return view('admin.vendor.purchase.order.view',compact('order'));
    }

    public function vendorAssignItem(Request $req)
    {
        $vendors = Vendor::orderBy('name')->get();
        if($req->ajax()){
            $vendorItems = [];$expect = [];
            if(!empty($req->vendorId)){
                $vendorItems = vendorItems::where('vendorId',$req->vendorId)/*->with('product')*/->get();
            }
            $product = Product::select('*')->orderBy('name')->get();
            return response()->json(['error' => false,'message' => 'List','vendorItem' => $vendorItems,'product'=>$product]);
        }
        return view('admin.vendor.assignItem',compact('vendors'));
    }

    public function vendorAssignItemPost(Request $req)
    {
        $this->validate($req,[
            'vendor' => 'required|min:1|numeric',
            'products' => 'required|array',
            'products.*' => 'required|min:1|numeric',
        ]);
        $vendor = Vendor::findOrFail($req->vendor);$excepted = [];
        foreach ($req->products as $key => $selected) {
            $product = vendorItems::where('vendorId',$vendor->id)->where('productId',$selected)->first();
            if(!$product){
                $new = new vendorItems();
                $new->vendorId = $vendor->id;
                $new->productId = $selected;
                $new->save();
                array_push($excepted, $new->id); // leave the New Entry
            }else{
                array_push($excepted, $product->id);// leave the Oldest One
            }
        }
        vendorItems::whereNotIn('id',$excepted)->where('vendorId',$vendor->id)->delete();
        return back();
    }

    public function index(Request $req)
    {
        $vendor = Vendor::latest()->paginate(20);
        return view('admin.vendor.list',compact('vendor'));
    }

    public function create(Request $req)
    {
        $state = State::where('country_id',101)->orderBy('name')->get();
        return view('admin.vendor.create',compact('state'));
    }

    public function store(Request $req)
    {
        $this->validate($req,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:vendors,email',
            'contact_person' => 'required|string|max:255',
            'contact_mobile' => 'required|numeric|digits:10',
            'address' => 'required',
            'state' => 'required|numeric|min:1',
            'pan' => 'required|max:12',
            'tin_number' => 'required',
            'gstin_number' => 'required',
            'servicetax_number' => 'required',
            'gst_category' => 'required|string',
            'account_number' => 'required|numeric',
            'ifsc_code' => 'required|string|max:200',
            'bank_address' => 'required|string|max:255',
            'description' => 'required',
        ]);
        $newVendor = new Vendor();
        $newVendor->name = $req->name;
        $newVendor->email = $req->email;
        $newVendor->contact_person = $req->contact_person;
        $newVendor->contact_mobile = $req->contact_mobile;
        $newVendor->address = $req->address;
        $newVendor->state = $req->state;
        $newVendor->pan = $req->pan;
        $newVendor->tin_number = $req->tin_number;
        $newVendor->gstin_number = $req->gstin_number;
        $newVendor->servicetax_number = $req->servicetax_number;
        $newVendor->gst_category = $req->gst_category;
        $newVendor->account_number = $req->account_number;
        $newVendor->ifsc_code = $req->ifsc_code;
        $newVendor->bank_address = $req->bank_address;
        $newVendor->description = $req->description;
        $newVendor->save();
        return redirect(route('admin.vendor.list'))->with('status','Vendor Created Success');
    }

    public function edit(Request $req,$vendorId)
    {
        $vendor = Vendor::findOrFail($vendorId);
        $state = State::where('country_id',101)->orderBy('name')->get();
        return view('admin.vendor.edit',compact('state','vendor'));
    }

    public function update(Request $req,$vendorId)
    {
        $this->validate($req,[
            'vendorId' => 'required|numeric|min:1|in:'.$vendorId,
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|unique:vendors,email',
            'contact_person' => 'required|string|max:255',
            'contact_mobile' => 'required|numeric|digits:10',
            'address' => 'required',
            'state' => 'required|numeric|min:1',
            'pan' => 'required|max:12',
            'tin_number' => 'required',
            'gstin_number' => 'required',
            'servicetax_number' => 'required',
            'gst_category' => 'required|string',
            'account_number' => 'required|numeric',
            'ifsc_code' => 'required|string|max:200',
            'bank_address' => 'required|string|max:255',
            'description' => 'required',
        ]);
        $newVendor = Vendor::findOrFail($vendorId);
        $newVendor->name = $req->name;
        // $newVendor->email = $req->email;
        $newVendor->contact_person = $req->contact_person;
        $newVendor->contact_mobile = $req->contact_mobile;
        $newVendor->address = $req->address;
        $newVendor->state = $req->state;
        $newVendor->pan = $req->pan;
        $newVendor->tin_number = $req->tin_number;
        $newVendor->gstin_number = $req->gstin_number;
        $newVendor->servicetax_number = $req->servicetax_number;
        $newVendor->gst_category = $req->gst_category;
        $newVendor->account_number = $req->account_number;
        $newVendor->ifsc_code = $req->ifsc_code;
        $newVendor->bank_address = $req->bank_address;
        $newVendor->description = $req->description;
        $newVendor->save();
        return redirect(route('admin.vendor.list'))->with('status','Vendor Created Success');
    }

    public function delete(Request $req,$vendorId)
    {
        Vendor::findOrFail($vendorId)->delete();
        return back();
    }

    public function import(){
        return view('admin.vendor.import');
    }
    
    public function csvUpload(Request $req) {
        $success = false;
        if($req->hasFile('file')){
            $extension= ['csv'];
            $getExtesion = $req->file('file')->getClientOriginalExtension();
            if(in_array($getExtesion,$extension)){
                $path = $req->file('file')->getRealPath();
                $firstline = true;
                if (($handle = fopen ( $path, 'r' )) !== FALSE) {
                    while (($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                        if($firstline){
                            $firstline = false;
                            continue;
                        }
                        try{
                            if($data[1] != ''){
                                \DB::beginTransaction();
                                
                                $newVendor = new Vendor;
                                $newVendor->name = $data[0];
                                $newVendor->contact_person = $data[1];
                                $newVendor->contact_mobile = $data[2];
                                $newVendor->email = $data[3];
                                $newVendor->password = \Hash::make($data[4]);
                                $newVendor->address = $data[5];
                                $newVendor->state = $data[6];
                                $newVendor->pan = $data[7];
                                $newVendor->tin_number = $data[8];
                                $newVendor->gstin_number = $data[9];
                                $newVendor->servicetax_number = $data[10];
                                $newVendor->gst_category = $data[11];
                                $newVendor->account_number = $data[12];
                                $newVendor->ifsc_code = $data[13];
                                $newVendor->bank_address = $data[14];
                                $newVendor->description = $data[15];
                                $newVendor->save();

                                \DB::commit();
                                $success = true;
                            }else{
                                $success = false;
                            }
                        }catch(Exception $e){
                            $success = false;
                            \DB::rollback();
                        }
                    }
                    if ($success === false) {
                        return $this->responseRedirectBack('Error occurred while importing Vendors.', 'error', true, true);
                    }
                    return $this->responseRedirectBack('Vendors imported successfully' ,'success',false, false);
                }
            }
        }
    }
}