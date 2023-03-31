<?php

namespace App\Http\Controllers\Authentication;

use App\Event\LoginEvent;
use App\Event\RegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\SendCodeMail;
use App\Models\User;
use App\Notifications\SendCodeNotification;
use App\Notifications\SendSmsNotification;
use App\Repositories\RegisterRepository\RegisterRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Cache\Events\CacheHit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public $repository;

    public function __construct(RegisterRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('guest');
    }

    public function index()
    {
        return view('authentication.register');
    }

    public function validation(RegisterRequest $request)
    {
        $status = $this->repository->validation($request->all());
        if ($status) {
            return redirect(route('get-validation'));
        } else {
            Alert::error('خطا در ارسال اطلاعات', 'کاربر با این مشخصات وجود دارد لطفا به صفحه ورود بروید.');
            return redirect(route('login'));
        }
    }

    public function GetValidation()
    {
        Session::reflash();
        return view('authentication.validation-register');
    }

    public function PostValidation(RegisterRequest $request)
    {
        $status = $this->repository->PostValidation($request->all());
        if ($status) {
            return redirect(route('home'));
        } else {
            $MistakStatus = $this->repository->RepeatMistak();
            if ($MistakStatus) {
                return redirect()->route('register');
            }
            Alert::error('خطا در ارسال اطلاعات', 'رمز مشکل دارد.');
            return redirect(route('get-validation'));
        }
    }

}
