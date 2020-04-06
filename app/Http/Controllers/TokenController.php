<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\User\Entities\UserToken;

class TokenController extends Controller
{
    public function accessToken()
    {
        $t_id = session()->get('token_id');
        $token = UserToken::where('id', $t_id)
            ->where('revoked', '!=', 1)->first();

        return $token->token ?? null;
    }
}
