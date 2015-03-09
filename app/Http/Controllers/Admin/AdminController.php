<?php namespace App\Http\Controllers\Admin;
    
    use App\Http\Controllers\Controller;
    use App\Role;
    use Illuminate\Html;
    class AdminController extends Controller {
        
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
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
        
    }
