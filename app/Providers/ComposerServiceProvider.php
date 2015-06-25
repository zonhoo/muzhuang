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

            View::composer('admin*','App\Http\ViewComposers\sidebarComposer');

            View::composer('*','App\Http\ViewComposers\BreadcrumbComposer');
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