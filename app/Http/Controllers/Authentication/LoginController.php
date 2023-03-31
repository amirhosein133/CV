<?php

namespace App\Http\Controllers\Authentication;

use App\Event\LoginEvent;
use App\Event\RegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Mail\SendCodeMail;
use App\Models\User;
use App\Repositories\LoginRepository\LoginRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public $repository;

    public function __construct(LoginRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('guest');
    }

    public function index()
    {
        return view('authentication.login');
    }

    public function validation(LoginRequest $request)
    {
        $status = $this->repository->validation($request->all());
        if ($status) return redirect()->route('login.get-validation');
        Alert::error('خطا در ارسال اطلاعات', 'اطلاعات شما در سیستم وجود ندارد لطفا ثبت نام کنید.');
        return redirect()->route('register');
    }

    public function GetValidation()
    {
        Session::reflash();
        return view('authentication.validation-login');
    }

    public function PostValidation(LoginRequest $request)
    {
        $status = $this->repository->PostValidation($request->all());
        if ($status) return redirect(route('home'));
        $MistakStatus = $this->repository->RepeatMistak();
        if ($MistakStatus) return redirect()->route('login');
        else {
            Alert::warning('خظا در ارسال اطلاعات', 'رمز اشتباه است');
            return redirect(route('login.get-validation'));
        }
    }
}
