<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Size;
use App\Models\Category;
use Illuminate\Http\Request;

class SizeController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $sizes =  Size::orderBy('id','desc')->get();

        $this->setPageTitle('Size', 'List of all Sizes');
        return view('admin.size.index', compact('sizes'));
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $category = Category::where('is_active',1)->get();

        $this->setPageTitle('Size', 'Create Size');
        return view('admin.size.create',compact('category'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sizes'     =>  'required',
            'category_id'     =>  'required',
        ]);

        $brands =  $request->all();
        $brands['slug'] = str_slug($request->sizes);
        $brands['is_active'] = 1;
        
        $size = Size::create($brands);

        if (!$size) {
            return $this->responseRedirectBack('Error occurred while creating size.', 'error', true, true);
        }
        return $this->responseRedirect('admin.size.index', 'Size added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetsize = Size::findOrFail($id);

        $category = Category::where('is_active',1)->get();
        
        $this->setPageTitle('Size', 'Edit Size : '.$targetsize->size);
        return view('admin.size.edit', compact('targetsize','category'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'sizes'     =>  'required',
            'category_id'     =>  'required'
        ]);

            $id = $request->id;
            $data = $request->all();
            $data['slug'] = str_slug($request->sizes);

            $targetsize = Size::findOrFail($id);

        $status = $targetsize->update($data);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating size.', 'error', true, true);
        }
        return $this->responseRedirectBack('Size updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Size::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting size.', 'error', true, true);
        }
        return $this->responseRedirect('admin.size.index', 'Size deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $size =  Size::findOrFail($id);

        $size->is_active = $request->is_active;
        $status = $size->save();

        if ($status) {
            return response()->json(array('message'=>'Size status successfully updated'));
        }
    }
}
