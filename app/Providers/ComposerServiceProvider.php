<?php namespace App\Providers;
    
    use View;
    use Illuminate\Support\ServiceProvider;
    
    class ComposerServiceProvider extends ServiceProvider {
        
        /**
         * Register bindings in the container.
         *
         * @return void
         */
        public function boot()
        {
            // 使用类来指定视图组件
            View::composer('*', 'App\Http\ViewComposers\adminIndexComposer');
            
            // 使用闭包来指定视图组件
            View::composer('dashboard', function()
            {
               
            });
        }
        
        /**
         * Register
         *
         * @return void
         */
        public function register()
        {
            //
        }
    
    }