<?php namespace App\Http\Controllers\Api\Verone;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Location;
use App\Post;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
        return $request->all();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        $user = User::find($id);
        return response()->json($user);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        $user = User::find($id);
        return view('api.user.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		//验证
        $v = Validator::make($request->all(),[
            'nickname'=>'max:36',
            'sex'=>'digits:1',
            'signature' => 'max:100'
        ]);

        if($v->fails()){
            return response()->json($v->errors());
        }

        $user = User::with('location')->find($id);
        if($user->id){
            if($request->input('nickname')) $user->nickname = $request->input('nickname');
            if($request->input('sex')) $user->sex = $request->input('sex');
            if($request->input('signature')) $user->signature = $request->input('signature');
            $user->save();
            $loca = [
                'country'=>$request->input('country'),
                'province'=>$request->input('province'),
                'city'=>$request->input('city'),
                'area'=>$request->input('area'),
                'street'=>$request->input('street'),
                'address'=>$request->input('address'),
            ];

            if(!$user->location())
            {
                $location = new Location($loca);
                $user->location()->save($location);
            }else{
                $user->location()->update($loca);
            }

            if($user->id){
                $result = ['msg'=>'update success','err_code'=>'0','user'=>$user];
            }else{
                $result = ['msg'=>'update failed','err_code'=>'1'];
            }
        }else{
            $result = ['msg'=>'the user is not exist!','err_code'=>'2'];
        }
        return response()->json($result);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    /*
     * 喜欢操作
     * */
    public function userLikePost($userId,$post_id)
    {
        $user_id = $userId;
        $user = User::find($user_id);
        if($status = $this->userIsLike($userId,$post_id)){
            return ['msg'=>'you had like this post!','err_code'=>'0','status'=>$status];
        }
        $user->likes()->attach($post_id); //@param $post_id

        $post = Post::find($post_id);
        $post->favorite_count = $post->favorite_count + 1;
        $post->save();
        $status = $this->userIsLike($userId,$post_id);

        $result = ['msg'=>'like post success!','err_code'=>'0','status'=>$status];
        return response()->json($result);

    }
    /*
     * 不喜欢操作
     * */
    public function userUnlikePost($userId,$post_id)
    {
        $user_id = $userId;
        $user = User::find($user_id);
        $user->likes()->detach($post_id);  //@param $post_id
        $post = Post::find($post_id);
        $post->favorite_count = $post->favorite_count<=0 ? 0 : $post->favorite_count - 1;
        $post->save();
        $status = $this->userIsLike($userId,$post_id);

        $result = ['msg'=>'unlike post success!','err_code'=>'0','status'=>$status];
        return response()->json($result);
    }

    /*
     * 用户喜欢列表
     * */
    public function getUserlikePosts($userId)
    {
        $user_id = $userId;
        $user = User::find($user_id);
        $posts = $user->likes()->with('user')->paginate(10);
        return response()->json($posts);
    }

    public function userIsLike($userId,$post_id)
    {
        $post = Post::find($post_id);
        $like = $post->likes()->where('id','=',$userId)->first();
        if($like){
            $status = 1;
        }else{
            $status = 0;
        }
        return $status;
    }
}
