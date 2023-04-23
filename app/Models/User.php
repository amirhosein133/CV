<?php

namespace App\Models;

use App\Traits\CheckPermissionUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, CheckPermissionUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'activation',
        'mobile',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'activation' => 'boolean',
        'extra_attributes' => SchemalessAttributes::class,
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->extra_attributes->modelScope();
    }

    public function scopeVerifyUser($query, $mobile, $name)
    {
        $user = User::where('mobile', $mobile)
            ->where('activation', 1)
            ->where('name', $name)
            ->first();
        if (isset($user))
            return false;
        return true;
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function connections()
    {
        return $this->hasMany(Connection::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
        return !!$role->intersect($this->roles)->count();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }


}
