<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends BaseController
{
    /**
     * @var GenreContract
     */

    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $brands =  Brand::orderBy('id','desc')->get();

        $this->setPageTitle('Brand', 'List of all Brands');
        return view('admin.brand.index', compact('brands'));
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Brand', 'Create Brand');
        return view('admin.brand.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required|max:191'
        ]);

        $brands =  $request->all();
        $brands['is_active'] = 1;

        $brand = Brand::create($brands);

        if (!$brand) {
            return $this->responseRedirectBack('Error occurred while creating brand.', 'error', true, true);
        }
        return $this->responseRedirect('admin.brand.index', 'Brand added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetBrand = Brand::findOrFail($id);
        
        $this->setPageTitle('Genre', 'Edit Genre : '.$targetBrand->name);
        return view('admin.brand.edit', compact('targetBrand'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required|max:191'
        ]);

            $id = $request->id;
            $data = $request->all();

            $targetBrand = Brand::findOrFail($id);

        $status = $targetBrand->update($data);



        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating brand.', 'error', true, true);
        }
        return $this->responseRedirectBack('Brand updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Brand::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting brand.', 'error', true, true);
        }
        return $this->responseRedirect('admin.brand.index', 'Brand deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $brand =  Brand::findOrFail($id);

        $brand->is_active = $request->is_active;
        $status = $brand->save();

        if ($status) {
            return response()->json(array('message'=>'Brand status successfully updated'));
        }
    }


    public function import(){
        $this->setPageTitle('Brand Import', '');
        return view('admin.brand.import');
    }
    
    public function brandUpload(Request $req) {
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
                            if($data[0] != ''){
                                \DB::beginTransaction();
                                
                                $brand = new Brand;
                                $brand->name = $data[0];
                                $brand->save();
                                
                                $eventAccepted[] = [
                                    'field_name' => $data[0],
                                ];

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
                        return $this->responseRedirectBack('Error occurred while importing brands.', 'error', true, true);
                    }
                    return $this->responseRedirectBack('brands imported successfully' ,'success',false, false);
                }
            }
        }
    }

}
