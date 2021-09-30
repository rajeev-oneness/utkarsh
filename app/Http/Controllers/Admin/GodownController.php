<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Godown;
use Illuminate\Http\Request;

class GodownController extends BaseController
{
	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $godowns = Godown::orderBy('id','desc')->get();

        $this->setPageTitle('Godowns', 'List of all Godowns');
        return view('admin.godown.index', compact('godowns'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Godowns', 'Create Godown');
        return view('admin.godown.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required|max:191',
        ]);

        $godown =  $request->all();
       
        $status = Godown::create($godown);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while creating godown.', 'error', true, true);
        }
        return $this->responseRedirect('admin.godown.index', 'Godown added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $godown = Godown::findOrFail($id);
        
        $this->setPageTitle('godown', 'Edit godown : '.$godown->coupon_code);
        return view('admin.godown.edit', compact('godown'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required|max:191',
        ]);

        $id = $request->id;
        $data = $request->all();

        $targetgodown= Godown::findOrFail($id);

        $status = $targetgodown->update($data);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating godown.', 'error', true, true);
        }
        return $this->responseRedirectBack('godown updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Godown::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting godown.', 'error', true, true);
        }
        return $this->responseRedirect('admin.godown.index', 'godown deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $godown =  Godown::findOrFail($id);

        $godown->is_active = $request->is_active;
        $status = $godown->save();

        if ($status) {
            return response()->json(array('message'=>'Godown status has been successfully updated'));
        }
    }
}
