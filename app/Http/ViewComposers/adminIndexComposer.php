<?php namespace App\Http\ViewComposers;
    
    use Illuminate\Contracts\View\View;
    use Illuminate\Contracts\Auth\Guard;
    
    class adminIndexComposer {
        
        /**
         * The user repository implementation.
         *
         * @var UserRepository
         */
        
        protected $auth;
        
        /**
         * Create a new profile composer.
         *
         * @param  UserRepository  $users
         * @return void
         */
        public function __construct(Guard $auth)
        {
            // service container 会自动解析所需的参数
            $this->auth = $auth;
        }
        
        /**
         * Bind data to the view.
         *
         * @param  View  $view
         * @return void
         */
        public function compose(View $view)
        {
            $view->with('auth', $this->auth->user());
        }
    
    }