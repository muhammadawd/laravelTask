<?php

namespace Modules\AdminModule\Http\Controllers\Api\ValidationTraits;

trait MainValidation
{

    protected function validateCreateAdmin(array $data)
    {
        return validator($data, [
            'username' => 'required|string|min:3|max:150|unique:admins,username',
            'password' => 'required|min:6',
        ]);
    }

    protected function validateLogin(array $data)
    {
        return validator($data, [
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
    }

}
