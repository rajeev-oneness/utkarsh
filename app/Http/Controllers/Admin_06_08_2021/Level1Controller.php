<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Level1;
use Illuminate\Http\Request;

class Level1Controller extends BaseController
{
	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $level1 = Level1::orderBy('id','desc')->get();

        $this->setPageTitle('Level1', 'List of all Level1');
        return view('admin.level1.index', compact('level1'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
    	$category = Category::all();

        $this->setPageTitle('Level1', 'Create Level1');
        return view('admin.level1.create',compact('category'));
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
        if($request->hasFile("image") && in_array($request->image->extension(),$valid_images)){
            $profile_image = $request->image;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("categories/",$imageName);
            $uploadedImage = $imageName;
            $Level1['image'] = $uploadedImage;
            }
        
         if($request->hasFile("size_chart") && in_array($request->size_chart->extension(),$valid_images)){
            $profile_image = $request->size_chart;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("sizechart/",$imageName);
            $uploadedImage = $imageName;
            $Level1['size_chart'] = $uploadedImage;
            }
            
        $Level1['is_active'] = 1;

        $status = Level1::create($Level1);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while creating Level1.', 'error', true, true);
        }
        return $this->responseRedirect('admin.level1.index', 'Level1 added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetLevel1 = Level1::findOrFail($id);

        $category = Category::all();
        
        $this->setPageTitle('Level1', 'Edit Level1 : '.$targetLevel1->name);
        return view('admin.level1.edit', compact('targetLevel1','category'));
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

        $targetLevel1 = Level1::findOrFail($id);

        $valid_images = array("png","jpg","jpeg","gif");
            
        if($request->hasFile("image") && in_array($request->image->extension(),$valid_images)){
            
            $profile_image = $request->image;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("categories/",$imageName);
            $uploadedImage = $imageName;
            $data['image'] = $uploadedImage;
        }
        
        if($request->hasFile("size_chart") && in_array($request->size_chart->extension(),$valid_images)){
            
            $profile_image = $request->size_chart;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("sizechart/",$imageName);
            $uploadedImage = $imageName;
            $data['size_chart'] = $uploadedImage;
        }

        $status = $targetLevel1->update($data);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating Level1.', 'error', true, true);
        }
        return $this->responseRedirectBack('Level1 updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Level1::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting Level1.', 'error', true, true);
        }
        return $this->responseRedirect('admin.level1.index', 'Level1 deleted successfully' ,'success',false, false);
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
}
