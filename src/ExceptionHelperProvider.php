<?php

namespace Linxi\ExceptionHelper;

use Illuminate\Support\ServiceProvider;

class ExceptionHelperProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 绑定异常处理服务到服务容器
        $this->app->singleton('exception-helper', function ($app) {
            return new ExceptionHelper($app['session'], $app['config']);
        });
    }

    public function boot()
    {
        // 如果需要引导任何服务，可以在这里进行。
        // 例如：注册视图组件、事件监听器等。

        // 视图目录指定
        $this->loadViewsFrom(__DIR__ . '/views', 'Packagetest');
        $this->publishes([
            // 发布视图目录到resources 下
//            __DIR__ . '/views' => base_path('resources/views/vendor/packagetest'),
            // 发布配置文件到 laravel 的config 下
            __DIR__ . '/config/exception-helper.php' => config_path('exception-helper.php'),
        ]);

        // 发布视图（如果有）
//        $this->loadViewsFrom(__DIR__.'/../resources/views', 'exception-helper');


        // 注册事件监听器
//        \Event::listen(\Illuminate\Auth\Events\Registered::class, \Linxi\ExceptionHelper\Listeners\LogSuccessfulRegistration::class);

        // 注册中间件（如果需要）
        $router = $this->app['router'];
//        $router->aliasMiddleware('custom.middleware', \Linxi\ExceptionHelper\Http\Middleware\CustomMiddleware::class);

        // 注册路由（如果需要）
//        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
