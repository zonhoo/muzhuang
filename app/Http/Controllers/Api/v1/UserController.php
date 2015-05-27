<?php namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

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
            'sex'=>'required|alpha|size:1',
            'area'=>'array',
            'signature' => 'max:100'
        ]);

        if($v->fails()){
            return response()->json($v->errors());
        }

        $user = User::find($id);
        $user->nickname = $request->input('nickname');
        $user->sex = $request->input('sex');
        $user->area = $request->input('area');
        $user->signature = $request->input('signature');
        $user->save();
        if($user->id){
            $result = ['msg'=>'update success','err_code'=>'0'];

        }else{
            $result = ['msg'=>'update failed','err_code'=>'1'];
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
        $post->like_count +=1;

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
        $post->like_count -=1;
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
        $posts = $user->likes()->paginate(10);
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
