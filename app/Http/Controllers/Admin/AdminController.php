<?php namespace App\Http\Controllers\Admin;
    
    use App\Role;
    use Illuminate\Html;
    use Illuminate\Support\Facades\Config;
    class AdminController extends BaseController {
        
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Show the application dashboard to the user.
         *
         * @return Response
         */
        public function index()
        {
            return view('admin.index');
        }
        
        public function setting()
        {
            return Config::get('setting.webname');
        }
        
    }
