<?php

namespace App\Http\Controllers\Api\V1;

use App\Event\LoginEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\LoginRepository\LoginRepositoryInterface;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public $repository;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(LoginRepositoryInterface $repository)
    {
        $this->middleware('auth:api', ['except' => ['login', 'validation']]);
        $this->repository = $repository;
    }

    public function validation(Request $request)
    {
        $user = User::where('activation', 1)->where('mobile', $request->mobile)->first();
        if (isset($user)) {
            $code = $this->repository->createCode();
            Cache::Put('token', $code);
            Cache::put('user', $user);
            event(new LoginEvent($user, $code));
            return \response()->json(['message' => 'true'], 200);
        }
        return response()->json(['error' => 'you have registered'], 401);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if (Cache::has('token')) {
            if (Cache::get('token') == $request->token) {
                $user = Cache::get('user');
                if (!$userToken = JWTAuth::fromUser($user)) {
                    return response()->json(['error' => 'invalid_credentials'], 401);
                }
                return $this->respondWithToken($userToken);
            } else
                return \response()->json(['Erorr' => 'invalid code'], 401);
        } else return \response()->json(['Erorr' => 'please try again'], 401);
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
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
