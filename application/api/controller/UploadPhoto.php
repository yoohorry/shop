<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class UploadPhoto extends Controller
{
    public function upload() {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                return [
                    'status' => 1,
                    'msg' => '上传成功',
                    'data' => $info->getSaveName()
                ];
            }else{
                return [
                    'status' => 0,
                    'msg' => $file->getError()
                ];
            }
        }
    }
}
