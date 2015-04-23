<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 4/17/15
 * Time: 3:49 PM
 */

namespace App\Http\Controllers\Home;

use App\Post;
use Illuminate\Http\Request;
use Mmanos\Search\Facade as Search;


class SearchController extends BaseController{

    //搜索关键词
    protected $keyword;

    //
    protected $input;
    public function __construct(){
        parent::__construct();
    }

    public function index(){

        Search::insert(1, array(
            'title' => '中文标题',
            'content' => '中文内容',
            'status' => 'published',
        ));

        $results = Search::search(null, 'published')->get();
        return view('search.index');
    }

    public function search(Request $request)
    {
        //关键字处理
        $kw = $this->format($request->input('keyword'));
        //
        $posts = Post::where('title','like','%'.$kw.'%')->get();

        return view('search.search',compact('posts','kw'));
    }

    /**
     * Reset token stream
     */
    public function reset($keyword)
    {
        $search = array(",", "/", "\\", ".", ";", ":", "\"", "!", "~", "`", "^", "(", ")", "?", "-", "'", "<", ">", "$", "&", "%", "#", "@", "+","=", "{", "}", "[", "]", "：", "）", "（", "．", "。", "，", "！", "；", "“", "”", "‘", "’", "［", "］", "、", "—", "　", "《", "》", "－", "…", "【","】", "？", "￥" );

        $keyword = str_replace( $search, '', $keyword );

        return $keyword;
    }

    public function capture($keyword)
    {
        if(strlen($keyword)>60)
        {
            return substr($keyword,0,60);
        }else{
            return $keyword;
        }
    }

    public function format($data)
    {
        $kw = $this->reset($data);
        $kw = $this->capture($kw);
        return $kw;
    }
} 