<?php

namespace App\Services;

use App\Models\User as Users;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ServiceProto\User;
use ServiceProto\UserRequest;
use ServiceProto\UserServiceInterface;
use ServiceProto\UserResponse;
use Spiral\GRPC;

class UserService implements UserServiceInterface
{
    public function getUser(GRPC\ContextInterface $ctx, UserRequest $in): User
    {
        $userId = $in->getId(); 
        $result = new UserResponse();
        $user = Users::find($userId);

    try{

        $user = new Users();
        $user->setId($user->id);
        $user->setName($user->name);
        $user->setEmail($user->email);
        $user->setCreatedAt((string) $user->created_at);
        $user->setUpdatedAt((string) $user->updated_at);
        $response->setData($user);

    } catch(ModelNotFoundException $e) {
        
        $error = new Error();
        $error->setCode(1)->setMessage($e->getMessage());
        $response->setError($error);
    }

    return $response;

    }
}