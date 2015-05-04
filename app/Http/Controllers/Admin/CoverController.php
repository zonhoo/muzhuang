<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/15
 * Time: 下午2:54
 */

namespace App\Http\Controllers\Admin;


use App\Cover;
use App\Repositories\CoverRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CoverController extends BaseController{

    protected $cover;

    public function __construct(CoverRepository $coverRepository){
        $this->cover = $coverRepository;
    }

    public function index(){
        $covers = Cover::all();
        return view('admin.cover.index',compact('covers'));
    }

    public function create()
    {
        return view('admin.cover.create');
    }

    public function store(Request $request)
    {
        $result = $this->cover->create($request->all());
        if($result->id) {
            flash()->success('添加成功');
        }else{
            flash()->error('添加失败');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $cover = Cover::find($id);
        return view('admin.cover.edit',compact('cover','id'));
    }

    public function update()
    {

    }

    public function destroy()
    {
        $cover = Cover::find(1);

        $cover->delete();

        flash()->success('删除成功');

        return redirect()->back();
    }
} 