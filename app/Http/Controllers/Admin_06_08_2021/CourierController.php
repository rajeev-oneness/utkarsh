<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends BaseController
{
	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $courier = Courier::orderBy('id','desc')->get();

        $this->setPageTitle('Courier', 'List of all Courier');
        return view('admin.couriers.index', compact('courier'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Courier', 'Create Courier');
        return view('admin.couriers.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required',
            'weight'   =>  'required',
            'weight_denomination' =>  'required',
            'cod' =>  'required',
            'economy' =>  'required',
            'express' =>  'required',
            'website' => 'required'
        ]);

        $courier =  $request->all();
       
        $status = Courier::create($courier);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while creating Courier.', 'error', true, true);
        }
        return $this->responseRedirect('admin.couriers.index', 'Courier added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $courier = Courier::findOrFail($id);
        
        $this->setPageTitle('Courier', 'Edit Courier : '.$courier->name);
        return view('admin.couriers.edit', compact('courier'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required',
            'weight'   =>  'required',
            'weight_denomination' =>  'required',
            'cod' =>  'required',
            'economy' =>  'required',
            'express' =>  'required',
            'website' => 'required'
        ]);

        $id = $request->id;
        $data = $request->all();

        $targetcourier = Courier::findOrFail($id);

        $status = $targetcourier->update($data);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating Courier.', 'error', true, true);
        }
        return $this->responseRedirectBack('Courier updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Courier::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting Courier.', 'error', true, true);
        }
        return $this->responseRedirect('admin.couriers.index', 'Courier deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $Courier =  Courier::findOrFail($id);

        $Courier->is_active = $request->is_active;
        $status = $Courier->save();

        if ($status) {
            return response()->json(array('message'=>'Courier status successfully updated'));
        }
    }
}
