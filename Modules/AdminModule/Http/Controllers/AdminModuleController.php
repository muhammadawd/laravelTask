<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Http\Controllers\Api\AdminController;
use Modules\UserModule\Http\Controllers\Api\UserController;

class AdminModuleController extends Controller
{

    private $adminCtrl;
    private $userCtrl;

    public function __construct()
    {
        $this->adminCtrl = new AdminController;
        $this->userCtrl = new UserController;
    }

    public function index(Request $request)
    {

        $users = $this->userCtrl->index($request)['data']['users'];
        return view('adminmodule::pages.users.all.index', compact('users'));
    }

    public function create()
    {
        return view('adminmodule::pages.users.add.index');
    }

    public function store(Request $request)
    {
        $response = $this->userCtrl->create($request);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'] ?? [])->withInput();
        }

        return redirect()->route('allUsers')->with('success', 'added successfully');
    }

    public function edit($id)
    {
        $user = $this->userCtrl->find($id)['data']['user'] ?? null;

        if (!$user) {
            return back()->with('error', 'user not found');
        }

        return view('adminmodule::pages.users.edit.index', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $request->request->add(['id' => $id]);
        $response = $this->userCtrl->update($request);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'] ?? [])->withInput();
        }

        return back()->with('success', 'edited successfully');
    }

    public function destroy(Request $request)
    {
        return $this->userCtrl->delete($request);
    }

    public function indexView()
    {
        return view('adminmodule::index');
    }

    public function loginView()
    {
        return view('adminmodule::login');
    }

    public function handleLogin(Request $request)
    {
        $response = $this->adminCtrl->login($request);


        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors'] ?? []);
        }

        $admin = $response['data']['admin'] ?? null;
        auth('web')->login($admin);
        return redirect()->route('dashboard');
    }

    public function handleLogout(Request $request)
    {
        $user = auth('web')->user();

        if ($user) {
            auth('web')->logout();
            return redirect()->route('login');
        }
    }
}
