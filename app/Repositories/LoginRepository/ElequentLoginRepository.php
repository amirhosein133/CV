<?php

namespace App\Repositories\LoginRepository;

use App\Event\LoginEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Tymon\JWTAuth\Facades\JWTAuth;

class ElequentLoginRepository implements LoginRepositoryInterface
{

    public function validation($attributes)
    {
        $user = User::where('mobile', $attributes['mobile'])
            ->where('activation', 1)
            ->first();
        if (isset($user)) {
            $code = $this->createCode();
            Cache::put('user', $user);
            Cache::put('token', $code);
            event(new LoginEvent($user, $code));
            return true;
        }
    }

    public function PostValidation($attributes)
    {
        if (Cache::has('token')) {
            $user = Cache::get('user');
            if (Cache::get('token') == $attributes['token']) {
                Auth::loginUsingId($user->id);
                return true;
            }
        } else {
            abort(401, 'مشکلی پیش امده لطفا مجددا واردشوید.');
        }
    }

    public function RepeatMistak()
    {
        Cache::increment('counter');
        if (Cache::get('counter') > 3) {
            Cache::flush();
            Alert::error('خطا در ارسال اطلاعات', 'تعداد تلاش شما زیاد بوده لطفا دوباره مراحل را انجام دهید.');
            return true;
        }

    }

    public function createCode()
    {
        $code = mt_rand(100000, 999999);
        return $code;
    }

    public function loginApi($attributes)
    {
        if (Cache::has('token')) {
            if (Cache::get('token') == $attributes['token']) {
                $user = Cache::get('user');
                if ($userToken = JWTAuth::fromUser($user)) {
                    return $this->respondWithToken($userToken);
                } else
                    return response()->json(['error' => 'invalid_credentials'], 401);
            } else
                return \response()->json(['Erorr' => 'invalid code'], 401);
        } else return \response()->json(['Erorr' => 'please try again'], 401);
    }

    public function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}
