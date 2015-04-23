<?php namespace App\Http\Controllers\Api\V1;

use App\Http\Requests;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PostsController extends BaseController {

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

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $post = Post::find($id);
        if(empty($post)){
            $post = [
                'error' => 'Not Found',
                'err_code' => 1
            ];
        }else{
            $post->toArray();
        }

        return response()->json($post);
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
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
    /**
     * display the specified resource.
     *
     * @param  int  $count  每页条数
     * @param  int  $offset  记录开始条数
     * @param  int  $order  排序方式 desc
     * @param  int  $date  文章发布时间
     * @return Response
     */
    public function getList($count=20,$offset=1,$order='created_at',$date='')
    {
        if($date==''){
            $time = strtotime(date('Y-m-d',time()));
        }else{
            $time = date('Y-m-d h:i:s',$date);
        }
        //dd($time);

        $post = DB::table('posts')->select(['id','user_id','title','photo','favorite_count','share_count','view_count','commit_count','created_at'])->skip($offset)->where('created_at','>',$time)->orderBy($order,'desc')->take($count)->get();

        return response()->json($post);
    }

    /**
     * 分页显示文章列表
     *
     * @param  int  $count  每页条数
     * @return Response
     */

    public function getArticlePage($count)
    {
        $post = Post::paginate($count);

        return response()->json($post);
    }

}
