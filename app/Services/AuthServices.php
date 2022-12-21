<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User as Users;
use App\Jobs\AuthData;
use Service\User;
use Service\Error;
use Service\UserRegisterRequest;
use Service\UserRegisterResponse;
use Service\UserLoginResponse;
use Service\UserLoginRequest;
use Service\AuthServiceInterface;
use Spiral\GRPC;
use Spiral\GRPC\Exception\InvokeException;
use Spiral\GRPC\StatusCode;


class AuthService implements AuthServiceInterface
{
    public function userRegister(GRPC\ContextInterface $ctx, UserRegisterRequest $in): UserRegisterResponse
    {
        $response  = new UserRegisterResponse();
        $inputData = json_decode($in->serializeToJsonString(), true);

        $this->validator->validate($inputData, [
            'email' => 'bail|required|email|unique:users,email',
            'name' => 'required|max:255',
            'password' => 'required|confirmed',
        ]);

        if(Users::where('email', '=', $inputData['email'])->count() > 0) {
            throw new InvokeException("This email already registered in our data.", StatusCode::ALREADY_EXISTS);
        }

        AuthData::dispatchNow($inputData);

        return $response;
    }

    public function userLogin(GRPC\ContextInterface $ctx, UserLoginRequest $in): UserLoginResponse
    {
        $arrayInput = json_decode($in->serializeToJsonString(), true);

        $this->validator->validate($arrayInput, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Users::where('email', $arrayInput['email'])->first();

        if(is_null($user)) {
            throw new InvokeException("User not found.", StatusCode::NOT_FOUND);
        }

        if(!Hash::check($arrayInput['password'], $user->password)) {
            throw new InvokeException("Wrong Password.", StatusCode::INVALID_ARGUMENT);
        }

        $user->setId($user->id);
        $user->setName($user->name);
        $user->setEmail($user->email);
        $user->setToken($token);
        $user->setCreatedAt((string) $user->created_at);
        $user->setUpdatedAt((string) $user->updated_at);

        $response->setData($user);

        return $response;

    }
}
