<?php

namespace App\Http\Controllers\Api\V1;

use App\Event\LoginEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\LoginRepository\LoginRepositoryInterface;
use App\Repositories\RegisterRepository\RegisterRepositoryInterface;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public $repository;
    public $registerRepository;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(LoginRepositoryInterface $repository, RegisterRepositoryInterface $registerRepository)
    {
        $this->middleware('auth:api', ['except' => ['login', 'validation', 'register', 'registered']]);
        $this->repository = $repository;
        $this->registerRepository = $registerRepository;
    }

    public function validation(Request $request)
    {
        $status = $this->repository->validation($request->all());
        if ($status) return \response()->json(['message' => 'send code'], 200);
        return response()->json(['error' => 'you have registered'], 401);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        return $this->repository->loginApi($request->all());
    }

    public function register(Request $request)
    {
        $status = $this->registerRepository->validation($request->all());
        if ($status == 'success') return \response()->json(['message' => 'send code'], 200);
        else return \response()->json(['error' => $status], 401);
    }

    public function registered(Request $request)
    {
        return $this->registerRepository->RegisteredApi($request->all());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->repository->respondWithToken(auth('api')->refresh());
    }

}
