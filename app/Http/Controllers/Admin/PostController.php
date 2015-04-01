<?php namespace App\Http\Controllers\Admin;

use Illuminate\Html;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Repositories\PostRepository;
use App\Post;
class PostController extends BaseController {

    protected $post;

    public function __construct(PostRepository $postRepository)
    {
        parent::__construct();
        $this->post = $postRepository;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $posts = Post::all();

        return view('admin.post.index',compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('admin.post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StorePostRequest $requests)
	{
		//
        $result = $this->post->create($requests->all());
        if($result->id) return '新建成功';
        else return '新建失败';
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
        $post = Post::find($id);
        return view('admin.post.edit',compact('id','post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(StorePostRequest $postRequest,$id)
	{
		//
        $result = $this->post->update($postRequest->all(),$id);
        if($result->id) return '更新成功';
        else return '更新失败';

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

}
