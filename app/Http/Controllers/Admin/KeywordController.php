<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/1
 * Time: 下午2:49
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Repositories\KeywordRepository;
class KeywordController extends BaseController{

    protected $keywords;
    public function __construct(KeywordRepository $keywords)
    {
        parent::__construct();
        $this->keywords = $keywords;
    }

    public function index()
    {
        $keywords = Storage::get('filter.txt');
        return view('admin.keyword.index',compact('keywords'));
    }
    public function putContent(Request $request)
    {
        $contents = $request->all();
        $file = Storage::put('filter.txt', $contents['keywords']);

        flash()->success('修改成功');
        return redirect()->back();
    }

} 