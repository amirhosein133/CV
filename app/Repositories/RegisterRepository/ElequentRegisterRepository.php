<?php

namespace App\Repositories\RegisterRepository;

use App\Event\LoginEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ElequentRegisterRepository implements RegisterRepositoryInterface
{
    public $user;

    public function validation($attributes)
    {
        if (User::VerifyUser($attributes['mobile'], $attributes['name'])) {
            $code = $this->createCode();
            $this->user = User::firstOrCreate(['mobile' => $attributes['mobile']], $attributes);
            if ($this->user->activation == 0) {
//                $user->notify(new SendCodeNotification($code));
                event(new LoginEvent($this->user, $code));
                Session::put('user', $this->user);
                Session::put('token', $code);
                return true;
            }
        }
    }

    public function PostValidation($attributes)
    {
        if (Session::has('token')) {
            $this->user = Session::get('user');
            if (Session::get('token') == $attributes['token']) {
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

}
