<?php namespace App\Http\Controllers\Admin;
    
    use App\Http\Controllers\Controller;
    use App\User;
    class BaseController extends Controller {

        /**
         * Create a new controller instance.
         *
         * @return void
         */

        public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('access');
            
        }
    }