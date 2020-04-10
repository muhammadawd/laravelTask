<?php

namespace Modules\UserModule\Http\Controllers\Api\ValidationTraits;

trait MainValidation
{

    protected function validateCreateUser(array $data)
    {
        return validator($data, [
            'username' => 'required|string|min:3|max:150',
            'mobile' => 'required|numeric|digits:11|unique:users,mobile',
            'password' => 'required|min:6',
        ]);
    }

    protected function validateUpdateUser(array $data)
    {
        return validator($data, [
            'id' => 'required|numeric',
            'username' => 'required|string|min:3|max:150',
            'mobile' => 'required|numeric|digits:11|unique:users,mobile,' . ($data['id'] ?? null),
            'password' => 'nullable|min:6',
        ]);
    }

    protected function validateDeleteUser(array $data)
    {
        return validator($data, [
            'id' => 'required|numeric',
        ]);
    }

    protected function validateLogin(array $data)
    {
        return validator($data, [
            'mobile' => 'required',
            'password' => 'required|min:6',
        ]);
    }

    protected function validateMobileVerification(array $data)
    {
        return validator($data, [
            'code' => 'required|exists:users,verification_code',
            'mobile' => 'required|numeric|digits:11',
        ]);
    }
}
