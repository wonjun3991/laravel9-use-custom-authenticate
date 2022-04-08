<?php

namespace App\Providers;

use App\Models\Member;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class MemberAuthProvider implements UserProvider
{
    public function validateCredentials(Authenticatable $member, array $credentials)
    {
        return bcrypt($credentials['password']) === $member->getAuthPassword();
    }

    public function retrieveById($identifier)
    {
        return Member::where((new Member())->getAuthIdentifierName(), $identifier)->first();
    }

    public function retrieveByToken($identifier, $token): void
    {

    }

    public function updateRememberToken(Authenticatable $user, $token): void
    {

    }

    public function retrieveByCredentials(array $credentials)
    {
        return Member::where((new Member())->getAuthIdentifierName(), $credentials['email'])
            ->first();
    }
}
