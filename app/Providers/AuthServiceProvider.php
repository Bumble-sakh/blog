<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Post;
use App\Models\Blog;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Переписать через политики

        Gate::define('blogAuthor', function (User $user, Blog $blog) {
            return $user->id === $blog->user_id;
        });

        Gate::define('postAuthor', function (User $user, Post $post) {
            return $user->id === $post->blog->user_id;
        });

        Gate::define('author', function (User $user, User $author) {
            return $user->id === $author->id;
        });

        //
    }
}
