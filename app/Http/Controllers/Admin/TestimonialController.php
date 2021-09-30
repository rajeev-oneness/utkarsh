<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Http\Controllers\BaseController;

class TestimonialController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $testimonial = Testimonial::all();

        $this->setPageTitle('Testimonial', 'List of all testimonial');
        return view('admin.testimonial.index', compact('testimonial'));
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Testimonial', 'Create Testimonial');
        return view('admin.testimonial.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'designation'      =>  'required',
            'image'     =>  'required'
        ]);

        $Testimonial =  $request->all();
       
        $Testimonial['post_date'] = \Carbon\Carbon::now();

        $valid_images = array("png","jpg","jpeg","gif");
        if($request->hasFile("image") && in_array($request->image->extension(),$valid_images)){
            $profile_image = $request->image;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("testimonials/",$imageName);
            $uploadedImage = $imageName;
            $Testimonial['image'] = $uploadedImage;
        }
        $Testimonial['is_active'] = 1;

        $status = Testimonial::create($Testimonial);

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while creating Testimonial.', 'error', true, true);
        }
        return $this->responseRedirect('admin.testimonial.index', 'Testimonial added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetTestimonial = Testimonial::findOrFail($id);
        
        $this->setPageTitle('Blog', 'Edit Blog : '.$targetTestimonial->name);
        return view('admin.testimonial.edit', compact('targetTestimonial'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'designation'      =>  'required',
            'image'     =>  'required'
        ]);
        
        $id = $request->id;
        $data = $request->all();

        $targetTestimonial = Testimonial::findOrFail($id);

        $valid_images = array("png","jpg","jpeg","gif");
            
        if($request->hasFile("image") && in_array($request->image->extension(),$valid_images)){
            
            $profile_image = $request->image;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("testimonials/",$imageName);
            $uploadedImage = $imageName;
            $data['image'] = $uploadedImage;
        }

        $status = $targetTestimonial->update($data);
        
        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating Testimonial.', 'error', true, true);
        }
        return $this->responseRedirectBack('Testimonial updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
         $response = Testimonial::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting Testimonial.', 'error', true, true);
        }
        return $this->responseRedirect('admin.testimonial.index', 'Testimonial deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $Testimonial =  Testimonial::findOrFail($id);

        $Testimonial->is_active = $request->is_active;
        $status = $Testimonial->save();

        if ($status) {
            return response()->json(array('message'=>'Blog status successfully updated'));
        }
    }
}
