<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Level3;
use App\Models\Level2;
use Illuminate\Http\Request;

class Level3Controller extends BaseController
{
	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $level3 = Level3::orderBy('id','desc')->get();

        $this->setPageTitle('Level3', 'List of all Level3');
        return view('admin.level3.index', compact('level3'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
    	$lelve2 = Level2::all();

        $this->setPageTitle('Level3', 'Create Level3');
        return view('admin.level3.create',compact('lelve2'));
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

        $status = Level3::create($Level1);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while creating Level3.', 'error', true, true);
        }
        return $this->responseRedirect('admin.level3.index', 'Level3 added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetLevel3 = Level3::findOrFail($id);

        $Level2 = Level2::all();
        
        $this->setPageTitle('Level3', 'Edit Level3 : '.$targetLevel3->name);
        return view('admin.level3.edit', compact('targetLevel3','Level2'));
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

        $targetLevel3 = Level3::findOrFail($id);
        
        
        $valid_images = array("png","jpg","jpeg","gif");
        if($request->hasFile("size_chart") && in_array($request->size_chart->extension(),$valid_images)){
            
            $profile_image = $request->size_chart;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("sizechart/",$imageName);
            $uploadedImage = $imageName;
            $data['size_chart'] = $uploadedImage;
        }

        $status = $targetLevel3->update($data);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating Level3.', 'error', true, true);
        }
        return $this->responseRedirectBack('Level3 updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Level3::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting Level3.', 'error', true, true);
        }
        return $this->responseRedirect('admin.level3.index', 'Level3 deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $level3 =  Level3::findOrFail($id);

        $level3->is_active = $request->is_active;
        $status = $level3->save();

        if ($status) {
            return response()->json(array('message'=>'Level3 status successfully updated'));
        }
    }
}
