<?php

namespace App\Domains\User\Repository;

use App\Domains\User\Entities\User as UserEntity;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function create(UserEntity $userEntity): UserEntity
    {
        $user = UserModel::create([
            'name' => $userEntity->getName(),
            'email' => $userEntity->getEmail(),
            'password' => Hash::make($userEntity->getPassword()),
            'created_by' => $userEntity->getCreatedBy(),
            'updated_by' => $userEntity->getUpdatedBy(),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $userEntity->setToken($token);
        $userEntity->setId($user->id);

        return $userEntity;
    }

    public function findById(int $id): ?UserEntity
    {
        $user = UserModel::find($id);

        if (! $user) {
            return null;
        }

        return new UserEntity(
            $user->id,
            $user->name,
            $user->email,
            $user->password,
            $user->token,
            $user->created_by,
            $user->updated_by
        );
    }

    public function findByEmail(string $email): ?UserEntity
    {
        $user = UserModel::where('email', $email)->first();

        if (! $user) {
            return null;
        }

        return new UserEntity(
            $user->id,
            $user->name,
            $user->email,
            $user->password,
            $user->token,
            $user->created_by,
            $user->updated_by
        );
    }

    public function getToken(UserModel $user): string
    {
        return $user->createToken('auth_token')->plainTextToken;
    }
}
