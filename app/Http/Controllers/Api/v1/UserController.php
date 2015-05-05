<?php namespace App\Http\Controllers\API\V1;

use App\Http\Requests;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController {


    public function __construct()
    {
        $this->middleware('auth');
    }

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
	public function store()
	{
		//
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
        $user->nickname = $request->all()['nickname'];
        $user->sex = $request->all()['sex'];
        $user->area = $request->all()['area'];
        $user->signature = $request->all()['signature'];
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
    public function userLikePost($post_id)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->likes()->attach($post_id); //@param $post_id

        $post = Post::find($post_id);
        $post->like_count -=1;

        $result = ['msg'=>'like post success!','err_code'=>'0'];
        return response()->json($result);

    }
    /*
     * 不喜欢操作
     * */
    public function userUnlikePost($post_id)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->likes()->detach($post_id);  //@param $post_id
        $post = Post::find($post_id);
        $post->like_count +=1;

        $result = ['msg'=>'unlike post success!','err_code'=>'0'];
        return response()->json($result);
    }

    /*
     * 用户喜欢列表
     * */
    public function getUserlikePosts()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $posts = $user->likes()->select('id','photo','title','description','share_count','view_count','commit_count','like_count')->get();
        return response()->json($posts);
    }

}
