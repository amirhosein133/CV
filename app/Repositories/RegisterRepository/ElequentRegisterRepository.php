<?php

namespace App\Repositories\RegisterRepository;

use App\Event\LoginEvent;
use App\Models\User;
use App\Repositories\LoginRepository\LoginRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Tymon\JWTAuth\Facades\JWTAuth;

class ElequentRegisterRepository implements RegisterRepositoryInterface
{
    public $user;
    public $loginRepo;

    public function __construct(LoginRepositoryInterface $repository)
    {
        $this->loginRepo = $repository;
    }

    public function validation($attributes)
    {
        $status = null;
        if (User::VerifyUser($attributes['mobile'], $attributes['name'])) {
            $code = $this->createCode();
            $this->user = User::firstOrCreate(['mobile' => $attributes['mobile']], $attributes);
            if ($this->user->activation == 0) {
//                $user->notify(new SendCodeNotification($code));
                event(new LoginEvent($this->user, $code));
                Cache::put('user', $this->user);
                Cache::put('token', $code);
                return $status = 'success';
            } else return $status = 'you have go to login';
        }
        return $status = 'user is exit you have go to login';
    }

    public function PostValidation($attributes)
    {
        if (Cache::has('token')) {
            $this->user = Cache::get('user');
            if (Cache::get('token') == $attributes['token']) {
                $this->user->update(['activation' => 1]);
                Auth::loginUsingId($this->user->id);
                return true;
            }
        }
    }

    public function createCode()
    {
        $code = mt_rand(100000, 999999);
        return $code;
    }

    public function RepeatMistak()
    {
        Cache::increment('counter');
        if (Cache::get('counter') > 3) {
            Cache::flush();
            $this->user->delete();
            Alert::error('خطا در ارسال اطلاعات', 'تعداد تلاش شما زیاد بوده لطفا دوباره مراحل را انجام دهید.');
            return true;
        }
    }

    public function RegisteredApi($attributes)
    {
        if (Cache::has('token')) {
            $this->user = Cache::get('user');
            if (Cache::get('token') == $attributes['token']) {
                if ($userToken = JWTAuth::fromUser($this->user)) {
                    $this->user->update(['activation' => 1]);
                    return $this->loginRepo->respondWithToken($userToken);
                } else
                    return response()->json(['error' => 'invalid_credentials'], 401);
            } else return response()->json(['Error' => 'invalid Code'], 401);
        } else return response()->json(['Error' => 'you have problem try again'], 401);
    }

}
