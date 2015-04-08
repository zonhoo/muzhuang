<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/2
 * Time: 上午9:22
 */

namespace App\Repositories;


class KeywordRepository {

    public function checkKeyword($keyword)
    {
        if(strpos($keyword,',')){
            return explode(',',$keyword);
        }else{
            return $keyword;
        }
    }

    /*
     * @param $keyword 被屏蔽的关键字
     * @param $data 被搜索的内容
     * @param $string 替换内容***
     *
     * */
    public function filterStr($keyword,$data,$string='***')
    {
        if(!empty($keyword)){
            $keywords = $this->checkKeyword($keyword);
            if(is_array($keywords)){
                foreach($keywords as $key){
                    $filter[] = '/'.$key.'/i';
                }
            }else{
                $filter = '/'.$keyword.'/i';
            }

            $result = preg_replace($filter,$string,$data);
        }else{
            $result = $data;
        }

        return $result;
    }
} 