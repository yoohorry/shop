<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Tuijianwei;

class Tjw extends Controller
{
    public function index()
    {
        $tjw = Tuijianwei::select();
        
        return $this->fetch('', [
            'tjw' => $tjw,
        ]);
    }

    public function edit($id)
    {
        $tjw = Tuijianwei::find($id);
        // dump($tjw);die;
        return $this->fetch('', [
            'tjw' => $tjw,
        ]);
    }

    public function update($id)
    {
        $tjw = Tuijianwei::find($id);

        $data = input('post.');
        unset($data['file']);
        if($data['image'] == "") {
            unset($data['image']);
        }
        
        $res = $tjw->update($data);
        if($res) {
            $this->success('成功', 'Tjw/index');
        } else {
            $this->error('失败');
        }
    }
}