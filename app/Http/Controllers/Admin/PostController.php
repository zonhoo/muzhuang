<?php namespace App\Http\Controllers\Admin;

use App\Cover;
use Illuminate\Html;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Repositories\PostRepository;
use App\Repositories\KeywordRepository;
use App\Post;
use Laracasts\Flash\Flash;
class PostController extends BaseController {

    protected $post;
    protected $keyword;

    public function __construct(PostRepository $postRepository,KeywordRepository $keyword)
    {
        parent::__construct();
        $this->post = $postRepository;
        $this->keyword = $keyword;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $posts = Post::paginate(15);

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
        if($result->id) {
            flash()->success('发布成功');
        }else{
            flash()->error('发布失败');
        }
        return redirect()->back();
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
        $post = Post::find($id);
        $keyword = '发呆,放假';
        $post->body = $this->keyword->filterStr($keyword,$post->body);
        echo $post->body;
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
        if($result->id) {
            flash()->success('修改成功');
        }else{
            flash()->error('修改失败');
        }
        return redirect()->back();

	}

    /*
     * 文章审核
     * */
    public function check($id)
    {
        $post = Post::find($id);
        $post->is_checked = 1;
        $post->save();
        if($post->id) {
            flash()->success('审核通过');
        }else{
            flash()->error('审核失败');
        }
        return redirect()->back();
    }

    /*
     * 文章锁定
     * */

    public function lock($id)
    {
        $post = Post::find($id);
        $post->is_locked = 1;
        $post->save();
        flash()->success('文章已锁定（文章ID:'.$id.'）');
        return redirect()->back();
    }

    public function unlock($id)
    {
        $post = Post::find($id);
        $post->is_locked = 0;
        $post->save();
        flash()->success('文章已解除锁定（文章ID:'.$id.'）');
        return redirect()->back();
    }

    public function refresh($id)
    {
        $post = Post::find($id);
        $post->touch();
        flash()->success('已更新');
        return redirect()->back();
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
        $post = Post::find(1);

        $post->delete();
        flash()->success('删除成功');
        return redirect()->back();
	}

}
