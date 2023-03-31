<?php

namespace App\Providers;

use App\Repositories\ArticleRepository\ArticleRepositoryInterface;
use App\Repositories\ArticleRepository\ElequentArticleRepository;
use App\Repositories\CommentRepository\CommentRepositoryInterface;
use App\Repositories\CommentRepository\ElequentCommentRepository;
use App\Repositories\ConnectionRepository\ConnectionRepositoryInterface;
use App\Repositories\ConnectionRepository\ElequentConnectionRepository;
use App\Repositories\LoginRepository\ElequentLoginRepository;
use App\Repositories\LoginRepository\LoginRepositoryInterface;
use App\Repositories\PermissionRepository\ElequentPermissionRepository;
use App\Repositories\PermissionRepository\PermissionRepositoryInterface;
use App\Repositories\ProjectRepository\ElequentProjectRepository;
use App\Repositories\ProjectRepository\ProjectRepositoryInterface;
use App\Repositories\RegisterRepository\ElequentRegisterRepository;
use App\Repositories\RegisterRepository\RegisterRepositoryInterface;
use App\Repositories\RoleRepository\ElequentRoleRepository;
use App\Repositories\RoleRepository\RoleRepositoryInterface;
use App\Repositories\UserRepository\ElequentUserRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoryInterface::class, ElequentUserRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ElequentArticleRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, ElequentCommentRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ElequentProjectRepository::class);
        $this->app->bind(LoginRepositoryInterface::class, ElequentLoginRepository::class);
        $this->app->bind(RegisterRepositoryInterface::class, ElequentRegisterRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, ElequentRoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, ElequentPermissionRepository::class);
        $this->app->bind(ConnectionRepositoryInterface::class, ElequentConnectionRepository::class);
    }
}
