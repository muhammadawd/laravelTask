<?php

namespace Modules\UserModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\UserModule\Http\Controllers\Api\ValidationTraits\MainValidation;
use Modules\UserModule\Repositories\UserRepository;

class UserController extends Controller
{
    use MainValidation;
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function index(Request $request)
    {
        $data = $request->all();

        return $this->userRepository->all($data);
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $validation = $this->validateCreateUser($data);

        if ($validation->fails()) {
            return return_msg(false, "Validation Errors", [
                "validation_errors" => $validation->getMessageBag()->getMessages()
            ], "validation_error");
        }

        return $this->userRepository->create($data);
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $validation = $this->validateUpdateUser($data);
        if ($validation->fails()) {
            return return_msg(false, "Validation Errors", [
                "validation_errors" => $validation->getMessageBag()->getMessages()
            ], "validation_error");
        }
        return $this->userRepository->update($data);
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validation = $this->validateDeleteUser($data);
        if ($validation->fails()) {
            return return_msg(false, "Validation Errors", [
                "validation_errors" => $validation->getMessageBag()->getMessages()
            ], "validation_error");
        }
        return $this->userRepository->delete($data['id'] ?? null);
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
        return $this->userRepository->login($data);
    }

    public function register(Request $request)
    {
        $data = $request->except(['verification_code', 'verified_at']);

        $validation = $this->validateCreateUser($data);
        if ($validation->fails()) {
            return return_msg(false, "Validation Errors", [
                "validation_errors" => $validation->getMessageBag()->getMessages()
            ], "validation_error");
        }
        return $this->userRepository->register($data);
    }

    public function mobileVerification(Request $request)
    {
        $data = $request->all();
        $validation = $this->validateMobileVerification($data);
        if ($validation->fails()) {
            return return_msg(false, "Validation Errors", [
                "validation_errors" => $validation->getMessageBag()->getMessages()
            ], "validation_error");
        }

        return $this->userRepository->activateMobile($data);
    }
}
