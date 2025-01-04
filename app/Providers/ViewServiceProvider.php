<?php

namespace App\Providers;

use App\Models\SocialMedia;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('front.includes.header', function ($view) {
            $socialMedia = SocialMedia::where('status', 1)
                ->orderBy('order', 'desc')
                ->take(3)
                ->get();
            
            $view->with('socialMedia', $socialMedia);
        });
    }
} 