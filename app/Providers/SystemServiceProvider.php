<?php

namespace App\Providers;

use App\Services\Api\V1\Core\AuthService;
use App\Services\Api\V1\Core\impl\AuthServiceImpl;
use App\Services\Api\V1\System\CarService;
use App\Services\Api\V1\System\Impl\CarServiceImpl;
use App\Services\Api\V1\System\Impl\OrderServiceImpl;
use App\Services\Api\V1\System\Impl\OrganizationServiceImpl;
use App\Services\Api\V1\System\Impl\UserServiceImpl;
use App\Services\Api\V1\System\OrderService;
use App\Services\Api\V1\System\OrganizationService;
use App\Services\Api\V1\System\UserService;
use App\Services\Common\V1\Support\CodeService;
use App\Services\Common\V1\Support\FileService;
use App\Services\Common\V1\Support\impl\CodeServiceImpl;
use App\Services\Common\V1\Support\impl\FileServiceImpl;
use App\Services\Common\V1\Support\impl\OneSignalPushServiceImpl;
use App\Services\Common\V1\Support\OneSignalPushService;
use App\Services\Web\V1\impl\ProfileWebServiceImpl;
use App\Services\Web\V1\ProfileWebService;
use Illuminate\Support\ServiceProvider;

class SystemServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        //API
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthServiceImpl(new CodeServiceImpl());
        });

        $this->app->bind(CodeService::class, function ($app) {
            return new CodeServiceImpl();
        });
        $this->app->bind(FileService::class, function ($app) {
            return new FileServiceImpl();
        });
        $this->app->bind(OneSignalPushService::class, function ($app) {
            return new OneSignalPushServiceImpl();
        });
        $this->app->bind(OrganizationService::class, function ($app) {
            return new OrganizationServiceImpl();
        });
        $this->app->bind(CarService::class, function ($app) {
            return new CarServiceImpl();
        });
        $this->app->bind(OrderService::class, function ($app) {
            return new OrderServiceImpl();
        });
        $this->app->bind(UserService::class, function ($app) {
            return new UserServiceImpl();
        });

        //WEB
        $this->app->bind(ProfileWebService::class, function ($app) {
            return new ProfileWebServiceImpl(new FileServiceImpl());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
