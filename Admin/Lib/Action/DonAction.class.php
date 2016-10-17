<?php
class DonAction extends BaseAction {

	//添加项目
    public function adddon()
    {
    	$this->display();
    }
    
    //提交添加的项目
    public function submit()
    {

                 $pro= D('prize_don');
	    $pro->don_name=$_POST['name'];
	    $pro->don_mark=$_POST['con'];
	    $pro->don_num=$_POST['num'];
	    $pro->don_time=date("Y-m-d h:i:s",time());
	    
	    $mode=$pro->add();
        if($mode)
    	{
    		$this->redirect('donlist', array(),0,'数据添加成功，页面跳转中。。');
                // dump($info);
    	}
    	else {
    	
            $this->redirect('adddon', array(),3,'数据添加失败，页面跳转中。。');
    	}
    }
    
   
    //项目列表
    public function donlist()
    {
    	import("ORG.Util.Page");
            $Nav =D('prize_don');  
            $count = $Nav->count();      
            $p = new Page($count, 5);     
            $page = $p->show(); 
            $list = $Nav->limit($p->firstRow.','.$p->listRows)->order('don_id desc')->select();  
            $this->assign('page', $page); 
    	$this->assign("list",$list); 
        // dump($list);	
        $this->display();
    }
    
    //删除项目
    public function del()
    {
    	 $id=$_GET['id'];
    	 $project= D('prize_don');
    	 if($project->delete($id))
    	    $this->redirect('donlist', array(),0,'数据删除成功，页面跳转中。。');
    	 else
    		$this->redirect('donlist', array(),3,'数据修改失败，页面跳转中。。');
    }

    //编辑项目
    public function edit()
    {
        $id=$_GET['id'];
    	$news= D('prize_don');
    	$con=$news->where('don_id='.$id)->select();
    	$this->assign("content",$con[0]);
    	$this->display('editdon');
    }
    
    //提交编辑后的结果
    public function editsubmit()
    {	
    	//判断是否有上传文件
    	$id=$_GET['id'];	
    	$pro= D('prize_don');
	$pro->don_name=$_POST['name'];
             $pro->don_mark=$_POST['con'];
              $pro->don_num=$_POST['num'];
    	$pro->where('don_id='.$id)->save($data);   
    	$this->redirect('donlist', array('id'=>$id),1,'数据修改成功，页面跳转中。。');
    }  
}
