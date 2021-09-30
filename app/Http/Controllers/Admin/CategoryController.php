<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Contracts\CategoryContract;

class CategoryController extends BaseController
{
    /**
     * @var CategoryContract
     */
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     * 
     * @param CategoryContract $categoryRepository
     */
    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->listCategories();
        $this->setPageTitle('Category', 'List of all categories');
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Category', 'Create Category');
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required'
        ]);

        $data['name'] = $request->name;
        $valid_images = array("png","jpg","jpeg","gif");
        if($request->hasFile("image") && in_array($request->image->extension(),$valid_images)){
            $profile_image = $request->image;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("categories/",$imageName);
            $uploadedImage = $imageName;
            $data['image'] = $uploadedImage;
        }
        
        $category = Category::create($data);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.categories.index', 'Category has been added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findCategoryById($id);
        
        $this->setPageTitle('Category', 'Edit Category : '.$category->name);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required'
        ]);

       $id = $request->id;

        $Category = Category::findOrFail($id);

        $Category->name = $request->name;
        $valid_images = array("png","jpg","jpeg","gif");
        if($request->hasFile("image") && in_array($request->image->extension(),$valid_images)){
            $profile_image = $request->image;
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("categories/",$imageName);
            $uploadedImage = $imageName;
            $Category->image = $uploadedImage;
        }

        $Category->save();

        //dd($params);

        //$Category = $this->categoryRepository->updateCategory($params);

        if (!$Category) {
            return $this->responseRedirectBack('Error occurred while updating category.', 'error', true, true);
        }
        return $this->responseRedirectBack('Category updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = $this->categoryRepository->deleteCategory($id);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.categories.index', 'Category deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $category = $this->categoryRepository->updateCategoryStatus($params);

        if ($category) {
            return response()->json(array('message'=>'Category status successfully updated'));
        }
    }

    public function import(){
        $this->setPageTitle('Category Import', '');
        return view('admin.categories.import');
    }
    
    public function csvUpload(Request $req) {
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
                            if($data[1] != ''){
                                \DB::beginTransaction();
                                
                                $category = new Category;
                                $category->orderby = $data[0];
                                $category->name = $data[1];
                                $category->visible_to_all = $data[2];
                                $category->visible_ind = $data[3];
                                $category->visible_uk = $data[4];
                                $category->visible_us = $data[5];
                                $category->visible_row = $data[6];
                                $category->save();

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
                        return $this->responseRedirectBack('Error occurred while importing categories.', 'error', true, true);
                    }
                    return $this->responseRedirectBack('categories imported successfully' ,'success',false, false);
                }
            }
        }
    }
}