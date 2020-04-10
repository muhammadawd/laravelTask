<?php

namespace Modules\AdminModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Http\Controllers\Api\ValidationTraits\MainValidation;
use Modules\AdminModule\Repositories\AdminRepository;

class AdminController extends Controller
{
    use  MainValidation;
    private $adminRepository;

    public function __construct()
    {
        $this->adminRepository = new AdminRepository;
    }

    public function login(Request $request)
    {
        $data = $request->all();

        $validation = $this->validateLogin($data);
        if ($validation->fails()) {
            return return_msg(false, "Validation Errors", [
                "validation_errors" => $validation->getMessageBag()->getMessages()
            ], "validation_error");
        }

        return $this->adminRepository->login($request);
    }

    public function register(Request $request)
    {
        $data = $request->all();

        $validation = $this->validateCreateAdmin($data);
        if ($validation->fails()) {
            return return_msg(false, "Validation Errors", [
                "validation_errors" => $validation->getMessageBag()->getMessages()
            ], "validation_error");
        }

        return $this->adminRepository->register($data);
    }
}
