<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 6/18/15
 * Time: 3:29 PM
 */

namespace App\Http\ViewComposers;


use App\Menu;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class BreadcrumbComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //当前路由

        $currentRouteName = Route::currentRouteName();
        $currentRouteName = preg_replace('/(admin)(\.[a-z]*)(\.[a-z]*)/','$1$2',$currentRouteName);
        if(!empty($currentRouteName))
        {
            $menu = Menu::where('route_name','=',$currentRouteName)->first();

            if(!empty($menu)){
                $fmenu = Menu::where('id','=',$menu->fid)->first();
                $view->with('menu', $menu)
                    ->with('fmenu',$fmenu);
            }
        }else{
            $dash = 'Dashboard';
            $view->with('dash',$dash);
        }
    }
}