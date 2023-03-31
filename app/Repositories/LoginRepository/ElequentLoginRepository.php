<?php

namespace App\Repositories\LoginRepository;

use App\Event\LoginEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ElequentLoginRepository implements LoginRepositoryInterface
{

    public function validation($attributes)
    {
        $user = User::where('mobile', $attributes['mobile'])
            ->where('activation', 1)
            ->first();
        if (isset($user)) {
            $code = $this->createCode();
            Session::put('user', $user);
            Session::put('token', $code);
            event(new LoginEvent($user, $code));
            return true;
        }
    }

    public function PostValidation($attributes)
    {
        if (Session::has('token')) {
            $user = Session::get('user');
            if (Session::get('token') == $attributes['token']) {
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

}
