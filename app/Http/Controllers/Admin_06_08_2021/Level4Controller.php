<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Level4;
use App\Models\Level3;
use Illuminate\Http\Request;

class Level4Controller extends BaseController
{
	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $level4 = Level4::orderBy('id','desc')->get();

        $this->setPageTitle('Level4', 'List of all Level4');
        return view('admin.level4.index', compact('level4'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
    	$lelve3 = Level3::all();

        $this->setPageTitle('Level4', 'Create Level4');
        return view('admin.level4.create',compact('lelve3'));
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
            'parent_id'=>  'required'
        ]);

        $Level1 =  $request->all();
        
        $valid_images = array("png","jpg","jpeg","gif");
        if($request->hasFile("size_chart") && in_array($request->size_chart->extension(),$valid_images)){
            $profile_image = $request->size_chart;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("sizechart/",$imageName);
            $uploadedImage = $imageName;
            $Level1['size_chart'] = $uploadedImage;
        }
       
        $Level1['is_active'] = 1;

        $status = Level4::create($Level1);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while creating Level4.', 'error', true, true);
        }
        return $this->responseRedirect('admin.level4.index', 'Level4 added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetLevel4 = Level4::findOrFail($id);

        $Level3 = Level3::all();
        
        $this->setPageTitle('Level4', 'Edit Level4 : '.$targetLevel4->name);
        return view('admin.level4.edit', compact('targetLevel4','Level3'));
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
            'parent_id'=>  'required'
        ]);

        $id = $request->id;
        $data = $request->all();

        $targetLevel4 = Level4::findOrFail($id);
        
        
        $valid_images = array("png","jpg","jpeg","gif");
        if($request->hasFile("size_chart") && in_array($request->size_chart->extension(),$valid_images)){
            
            $profile_image = $request->size_chart;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("sizechart/",$imageName);
            $uploadedImage = $imageName;
            $data['size_chart'] = $uploadedImage;
        }

        $status = $targetLevel4->update($data);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating Level4.', 'error', true, true);
        }
        return $this->responseRedirectBack('Level4 updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Level4::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting Level4.', 'error', true, true);
        }
        return $this->responseRedirect('admin.level4.index', 'Level4 deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $level4 =  Level4::findOrFail($id);

        $level4->is_active = $request->is_active;
        $status = $level4->save();

        if ($status) {
            return response()->json(array('message'=>'Level4 status successfully updated'));
        }
    }
}
