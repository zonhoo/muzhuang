<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/3/31
 * Time: 下午2:51
 */

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class UploadController extends Controller{

    public function upload(Request $request){
        //$file = Request::file('file');
        if ($request->hasFile('file'))
        {

            //本程序未涉及多文件操作。
            $files = $request->file('file');
            foreach($files as $file)
            {
                if($file->isValid()){
                    $realPath = $file->getRealPath(); //取得上传文件所在的路径
                    $name = $file->getClientOriginalName(); //取得上传文件的原始名称
                    $extension = $file->getClientOriginalExtension();//取得上传文件的后缀名
                    $path = 'uploads/posts/';
                    $savePath = $path.date('Ymd',time());
                    is_dir($savePath) || mkdir($savePath); //如果目录不存在则创建

                    //
                    $uniqid = uniqid(); //函数基于以微秒计的当前时间，生成一个唯一的 ID。
                    $saveFileName = $uniqid.'_cover.'.$extension;
                    $file->move($savePath,$saveFileName);

                    $fullFileName = $savePath.'/'.$saveFileName;
                }
            }

        }

        return response()->json(['msg' => '上传成功', 'state' => 'success','url'=>url('').'/'.$fullFileName]);
    }
} 