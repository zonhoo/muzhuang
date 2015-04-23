<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/10
 * Time: 上午11:49
 */

namespace App\Http\ViewComposers;

use App\Menu;
use Illuminate\Contracts\View\View;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Route;


class sidebarComposer {

    protected $category;

    public function __construct(CategoryRepository $category)
    {
        // service container 会自动解析所需的参数

        $this->category = $category;
    }

    public function compose(View $view)
    {
        //
        //$menus = $this->category->getAll();

        $categorize = $this->category->getTop()->toArray();
        foreach($categorize as $key=>$value){
            $child = $this->category->getChild($value['id'])->toArray();
            $categorize[$key]['child'] = $child;

        }
        $currentname = Route::currentRouteName();

        if($currentname!='admin'){
            $replace = preg_replace('/(admin)(\.[a-z]*)(\.[a-z]*)/','$1$2',$currentname);
            //dd($replace);
            $currentpid = $this->category->getFidByCurrentName($replace);
        }else{
            $currentpid = 0;
        }

        $view->with('categorize',$categorize)
            ->with('currentname',$replace)
            ->with('currentpid',$currentpid);
    }
} 