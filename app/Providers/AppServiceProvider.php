<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('validationErr', function ($field) {
            return "<?php if (\$errors->has($field)): ?>
                        <span class=\"invalid-feedback\" role=\"alert\">
                            <strong><?php echo \$errors->first($field); ?></strong>
                        </span>
                    <?php endif; ?>";
        });

        Blade::directive('alert', function () {
            return '<?php if(Session::get("alert")): ?>
                        <div class="alert alert-<?php echo e(Session::get("alert")); ?> alert-dismissible" role="alert">
                            <p><?php echo e(Session::get("message")); ?></p>
                        </div>
                    <?php endif; ?>';
        });

        Blade::directive('isActiveRoute', function ($expression) {
            return "<?php echo in_array(Route::currentRouteName(), $expression) ? 'active' : ''; ?>";
        });
    }
}
