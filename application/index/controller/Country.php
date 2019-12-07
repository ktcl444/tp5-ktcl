<?php

namespace app\index\controller;

use think\Controller;

class Country extends Controller
{
	public function index(){
		/* 分页开始  */
		$list  =\app\index\model\Country::paginate(5);
		$this->assign('list',$list);
		/* 结束 */
		return $this->fetch('index');
	}

	public function add(){
		//判断页面是否提交
		if(request()->isPost()){
			//打印接收到的参数
			//dump(input('post.'));
			$data = [  //接受传递的参数
				'code' => input('code'),
				'name' => input('name')
			];
			/* Db('表名') 数据库助手函数*/
			if(Db('country') -> insert($data)){    //添加数据
				$this->success('添加成功','index'); //成功后跳转 lst 界面
			}else{
				 $this->error('添加失败');
			}
		}
		return $this->fetch('add');
	}
}