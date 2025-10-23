<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('settings', function(){
            return new Setting();
        });
        $loader = AliasLoader::getInstance();
        $loader->alias('Setting',Setting::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if(!App::runningInConsole() && count(Schema::getColumnListing('settings'))){
            $settings = Setting::all();
            foreach ($settings as $setting) {
                Config::set('settings.'.$setting->key,$setting->value);
            }
        }
    }
}
