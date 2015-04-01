<?php namespace App\Http\Controllers\Home;
    
    use App\Commands\FollowUserCommand;
    use App\Commands\UnFollowUserCommand;
    use Illuminate\Support\Facades\Response;
    use App\User;
    use Illuminate\Http\Request;
    class FollowController extends BaseController {
        
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * follow a user.
         *
         * @return Response
         */
        public function store(Request $request)
        {
            if($request->ajax())
            {
                $this->dispatch(new FollowUserCommand($request->followed_id));
                return Response::json(array('msg' => '已关注', 'state' => 'success','followed_id'=>$request->followed_id));
            }
        }
        
        public function destroy(Request $request)
        {
            $this->dispatch(new UnFollowUserCommand($request->followed_id));
            return Response::json(array('msg' => '关注', 'state' => 'success','followed_id'=>$request->followed_id));
        }
        
    }
