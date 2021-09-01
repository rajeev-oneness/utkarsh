<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\BannerContract;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\BaseController;

class BannerController extends BaseController
{
    /**
     * @var BannerContract
     */
    protected $bannerRepository;

    /**
     * PageController constructor.
     * @param BannerContract $bannerRepository
     * 
     */
     
    public function __construct(BannerContract $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $banner = $this->bannerRepository->listBanners();

        $this->setPageTitle('Banner', 'List of all banner');
        return view('admin.banner.index', compact('banner'));
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $category = Category::where('is_active',1)->get();
        
        $this->setPageTitle('Banner', 'Create Banner');
        return view('admin.banner.create',compact('category'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            'image'     =>  'required'
        ]);

        $params = $request->except('_token');
        
        $banner = $this->bannerRepository->createBanner($params);

        if (!$banner) {
            return $this->responseRedirectBack('Error occurred while creating banner.', 'error', true, true);
        }
        return $this->responseRedirect('admin.banner.index', 'Banner added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetBanner = $this->bannerRepository->findBannerById($id);
        
        $category = Category::where('is_active',1)->get();
        
        $this->setPageTitle('Banner', 'Edit Banner : '.$targetBanner->title);
        return view('admin.banner.edit', compact('targetBanner','category'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            'image'     =>  'required'
        ]);

        $params = $request->except('_token');
        
        $banner = $this->bannerRepository->updateBanner($params);

        if (!$banner) {
            return $this->responseRedirectBack('Error occurred while updating banner.', 'error', true, true);
        }
        return $this->responseRedirectBack('Banner updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $banner = $this->bannerRepository->deleteBanner($id);

        if (!$banner) {
            return $this->responseRedirectBack('Error occurred while deleting banner.', 'error', true, true);
        }
        return $this->responseRedirect('admin.banner.index', 'Banner deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $banner = $this->bannerRepository->updateBannerStatus($params);

        if ($banner) {
            return response()->json(array('message'=>'Banner status successfully updated'));
        }
    }
}
