<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Level5;
use App\Models\Level4;
use Illuminate\Http\Request;

class Level5Controller extends BaseController
{
	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $level5 = Level5::orderBy('id','desc')->get();

        $this->setPageTitle('Level5', 'List of all Level5');
        return view('admin.level5.index', compact('level5'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
    	$lelve4 = Level4::all();

        $this->setPageTitle('Level5', 'Create Level5');
        return view('admin.level5.create',compact('lelve4'));
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

        $status = Level5::create($Level1);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while creating Level5.', 'error', true, true);
        }
        return $this->responseRedirect('admin.level5.index', 'Level5 added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetLevel5 = Level5::findOrFail($id);

        $Level4 = Level4::all();
        
        $this->setPageTitle('Level5', 'Edit Level5 : '.$targetLevel5->name);
        return view('admin.level5.edit', compact('targetLevel5','Level4'));
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

        $targetLevel5 = Level5::findOrFail($id);
        
        $valid_images = array("png","jpg","jpeg","gif");
        if($request->hasFile("size_chart") && in_array($request->size_chart->extension(),$valid_images)){
            
            $profile_image = $request->size_chart;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("sizechart/",$imageName);
            $uploadedImage = $imageName;
            $data['size_chart'] = $uploadedImage;
        }

        $status = $targetLevel5->update($data);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating Level5.', 'error', true, true);
        }
        return $this->responseRedirectBack('Level5 updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Level5::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting Level5.', 'error', true, true);
        }
        return $this->responseRedirect('admin.level5.index', 'Level5 deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $level5 =  Level5::findOrFail($id);

        $level5->is_active = $request->is_active;
        $status = $level5->save();

        if ($status) {
            return response()->json(array('message'=>'Level5 status successfully updated'));
        }
    }
}
