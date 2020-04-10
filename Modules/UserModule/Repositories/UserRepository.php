<?php

namespace Modules\UserModule\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Repositories\UserRepoHelper;
use \Illuminate\Support\Facades\DB;


class UserRepository
{
    use UserRepoHelper;

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }

    public function all(array $data)
    {
        $users = $this->userModel
            ->orderBy('id', 'desc')
            ->paginate($data['limit'] ?? 20);
        return return_msg(true, 'Users Successfully Returned', compact('users'));
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $data['password'] = bcrypt($data['password'] ?? null);
            $user = $this->userModel->create($data);
        } catch (\Exception $exception) {
            DB::rollBack();
            return return_msg(false, "Server Error", null, "server_error");
        }
        DB::commit();
        return return_msg(true, "Created Successfully", compact('user'), "created");
    }

    public function find($id)
    {
        try {
            DB::beginTransaction();
            $user = $this->userModel->find($id);
            if (!$user) {
                DB::commit();
                return return_msg(false, "Not Found", null, "not_found");
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return return_msg(false, "Server Error", null, "server_error");
        }
        DB::commit();
        return return_msg(true, "User Found", compact('user'));
    }

    public function update(array $data)
    {

        try {
            DB::beginTransaction();
            $user = $this->userModel->find($data['id'] ?? null);
            if (!$user) {
                DB::commit();
                return return_msg(false, "Not Found", null, "not_found");
            }

            if ($data['password'] ?? null) {
                unset($data['password']);
            }

            $user->update($data);

        } catch (\Exception $exception) {
            DB::rollBack();
            return return_msg(false, "Server Error", null, "server_error");
        }
        DB::commit();
        return return_msg(true, "Updated Successfully", compact('user'));
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $user = $this->userModel->find($id);
            if (!$user) {
                DB::commit();
                return return_msg(false, "Not Found", null, "not_found");
            }
            $user->delete();
        } catch (\Exception $exception) {
            DB::rollBack();
            return return_msg(false, "Server Error", null, "server_error");
        }
        DB::commit();
        return return_msg(true, "Created Successfully", null);
    }

    public function login($data)
    {
        $user = $this->userModel->where(function ($query) use ($data) {
            return $query
                ->where('mobile', $data['mobile']);
//                ->whereNotNull('verified_at');
        })->first();

        if (!$user) {
            return return_msg(false, "User Not Found", null, "not_found");
        }

        $password_match = Hash::check($data['password'] ?? null, $user->password);

        if (!$password_match) {
            return return_msg(false, 'wrong password', [
                'validation_errors' => [
                    "password" => ['Incorrect Password']
                ]
            ], "validation_error");
        }

        if (!$user->verified_at) {
            return return_msg(false, 'not verified', [
                'validation_errors' => [
                    "mobile" => ['mobile number is not verified']
                ]
            ], "validation_error");
        }


        $token = auth('user')->login($user);
        return return_msg(true, "Success", compact('user', 'token'));
    }

    public function register($data)
    {
        try {
            DB::beginTransaction();
            $data['password'] = bcrypt($data['password'] ?? null);

            $code = $this->getRandomCode();

            $data['verification_code'] = $code;

            $user = $this->userModel->create($data);

            $user->makeHidden(['verification_code']);

//            $this->sendSmsActivationCode($data['mobile'], $code);

        } catch (\Exception $exception) {
            DB::rollBack();
            return return_msg(false, "Server Error", null, "server_error");
        }
        DB::commit();
        return return_msg(true, "Created Successfully and Send Sms Code", compact('user'), "created");
    }


    public function activateMobile($data)
    {
        try {
            DB::beginTransaction();

            $user = $this->userModel->where(function ($query) use ($data) {
                return $query
                    ->where('mobile', $data['mobile']);
            })->first();

            if (!$user) {
                return return_msg(false, "User Not Found", null, "not_found");
            }

            $user->update([
                'verified_at' => Carbon::now()
            ]);

        } catch (\Exception $exception) {
            DB::rollBack();
            return return_msg(false, "Server Error", null, "server_error");
        }
        DB::commit();
        return return_msg(true, "Account has been activated", compact('user'), "created");

    }
}