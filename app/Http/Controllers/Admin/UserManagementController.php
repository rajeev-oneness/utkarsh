<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Contracts\UserContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Session;

class UserManagementController extends BaseController
{

    protected $UserRepository;

    /**
     * UserManagementController constructor.
     * @param UserRepository $UserRepository
     */

    public function __construct(UserContract $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    /**
     * List all the users
     */
    public function index()
    {
        $type=1;
    	$users = $this->UserRepository->listUsers($type);
    	$this->setPageTitle('Customers', 'List of all customers');
    	return view('admin.users.index',compact('users'));
    }

    public function delivery_boys()
    {
        $type=2;
        $users = $this->UserRepository->listUsers($type);
        $this->setPageTitle('Delivery Boys', 'List of all delivery boys');
        return view('admin.users.delivery_boys',compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('User', 'Create User');
        return view('admin.users.create');
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
            'email'     =>  'required|max:191|email|unique:users',
            'mobile'     =>  'required|unique:users',
            'password'     =>  'required|max:16|min:5',
        ]);

        $params = $request->except('_token');
        
        $user = $this->UserRepository->createUser($params);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while creating user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.users.index', 'user added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetUser = $this->UserRepository->findUserById($id);
        
        $this->setPageTitle('User', 'Edit User : '.$targetUser->name);
        return view('admin.users.edit', compact('targetUser'));
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
            'email'     =>  'required|max:191|email',
            'mobile'     =>  'required',
        ]);

        $params = $request->except('_token');

        $user = $this->UserRepository->updateUser($params);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while updating user.', 'error', true, true);
        }
        return $this->responseRedirectBack('User updated successfully' ,'success',false, false);
    }

    /**
     * Update user with approve or block status
     * @param Request $request 
     */
    public function updateUser(Request $request)
    {
        $response = $this->UserRepository->blockUser($request->user_id,$request->is_block);

        if($response){
            return response()->json(array('message'=>'Successfully updated'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $user = $this->UserRepository->updateUserStatus($params);

        if ($user) {
            return response()->json(array('message'=>'User status successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $user = $this->UserRepository->deleteUser($id);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while deleting user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.users.index', 'User deleted successfully' ,'success',false, false);
    }
}
