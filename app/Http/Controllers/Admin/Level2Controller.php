<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Level2;
use App\Models\Level1;
use Illuminate\Http\Request;

class Level2Controller extends BaseController
{
	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $level2 = Level2::orderBy('id','desc')->get();

        $this->setPageTitle('Level2', 'List of all Level2');
        return view('admin.level2.index', compact('level2'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
    	$lelve1 = Level1::all();

        $this->setPageTitle('Level2', 'Create Level2');
        return view('admin.level2.create',compact('lelve1'));
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

        $status = Level2::create($Level1);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while creating Level2.', 'error', true, true);
        }
        return $this->responseRedirect('admin.level2.index', 'Level2 added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetLevel2 = Level2::findOrFail($id);

        $Level1 = Level1::all();
        
        $this->setPageTitle('Level2', 'Edit Level2 : '.$targetLevel2->name);
        return view('admin.level2.edit', compact('targetLevel2','Level1'));
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

        $targetLevel2 = Level2::findOrFail($id);
        
        
        $valid_images = array("png","jpg","jpeg","gif");
        if($request->hasFile("size_chart") && in_array($request->size_chart->extension(),$valid_images)){
            
            $profile_image = $request->size_chart;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("sizechart/",$imageName);
            $uploadedImage = $imageName;
            $data['size_chart'] = $uploadedImage;
        }

        $status = $targetLevel2->update($data);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating Level2.', 'error', true, true);
        }
        return $this->responseRedirectBack('Level2 updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Level2::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting Level2.', 'error', true, true);
        }
        return $this->responseRedirect('admin.level2.index', 'Level2 deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $level2 =  Level2::findOrFail($id);

        $level2->is_active = $request->is_active;
        $status = $level2->save();

        if ($status) {
            return response()->json(array('message'=>'Level2 status successfully updated'));
        }
    }
}
