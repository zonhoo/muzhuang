<?php namespace App\Repositories;
use App\Menu;

/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/8
 * Time: 下午2:22
 */
class CategoryRepository{


    public function tree($data,$fid = 0)
    {
        static $tree = array();
        foreach($data as $key=>$value){
            if($value['fid']==$fid){
                $tree[] = $value;
                unset($data->$key);
                $this->tree($data,$value['id']);
            }
        }
        return $tree;
    }

    public function getAll(){
        return Menu::all();
    }
    public function getTop(){
        return $this->getCategoryByFid(0);
    }

    public function getChild($id)
    {
        return $this->getCategoryByFid($id);
    }

    public function getCategoryByFid($fid=0){
        return Menu::where('fid','=',$fid)->get();
    }

    public function getFidByCurrentName($name){
        $category = Menu::where('route_name','=',$name)->firstOrFail();
        return $category->fid;
    }
}