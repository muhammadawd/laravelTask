<?php

namespace Modules\AdminModule\Repositories;

use Illuminate\Support\Facades\Hash;
use Modules\AdminModule\Entities\Admin;
use \Illuminate\Support\Facades\DB;
use stdClass;


class AdminRepository
{

    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new Admin;
    }

    public function login($data)
    {
        $admin = $this->adminModel->where('username', '=', $data['username'])->first();

        if (!$admin) {
            return return_msg(false, "Admin Not Found", [
                'validation_errors' => [
                    "username" => ["Admin Not Found"]
                ]
            ], "validation_error");
        }

        $password_match = Hash::check($data['password'] ?? null, $admin->password);

        if (!$password_match) {
            return return_msg(false, 'wrong password', [
                'validation_errors' => [
                    "password" => ['Incorrect Password']
                ]
            ], "validation_error");
        }

        $token = auth('admin')->login($admin);
        return return_msg(true, "Success", compact('admin', 'token'));
    }

    public function register(array $data)
    {
        try {
            DB::beginTransaction();
            $data['password'] = bcrypt($data['password'] ?? null);
            $admin = $this->adminModel->create($data);
            $token = auth('admin')->login($admin);
        } catch (\Exception $exception) {
            DB::rollBack();
            return return_msg(false, "Server Error", null, "server_error");
        }
        DB::commit();
        return return_msg(true, "Created Successfully", compact('admin', 'token'), "created");
    }
}