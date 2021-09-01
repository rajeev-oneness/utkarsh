<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor,App\Models\State;

class VendorController extends Controller
{
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
}