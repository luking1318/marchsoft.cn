<?php
class PrizeAction extends BaseAction {

	//添加项目
    public function addprize()
    {
    	$this->display();
    }
    
    //提交添加的项目
    public function submit()
    {
    	if(empty($_FILES))
    	    $this->error('必须选择上传文件'); 
    	else{
    		$info=$this->up();
    	} 	
        $pro= D('prize');
	    $pro->prize_name=$_POST['name'];
	    $pro->prize_con=$_POST['con'];
	    $pro->prize_num=$_POST['num'];
	    $pro->proze_time=date("Y-M-D h:i:s",time());
	    $pro->prize_img="__ROOT__/Admin/Public/Upload/image/prize/".$info[0]['savename'];
	    $mode=$pro->add();
        if($mode)
    	{
    		$this->redirect('prizelist', array(),0,'数据添加成功，页面跳转中。。');
                // dump($info);
    	}
    	else {
    	
            $this->redirect('addprize', array(),3,'数据添加失败，页面跳转中。。');
    	}
    }
    
   
    //项目列表
    public function prizelist()
    {
    	import("ORG.Util.Page");
            $Nav =D('prize');  
            $count = $Nav->count();      
            $p = new Page($count, 5);     
            $page = $p->show(); 
            $list = $Nav->limit($p->firstRow.','.$p->listRows)->order('prize_id desc')->select();  
            $this->assign('page', $page); 
    	$this->assign("list",$list); 
        // dump($list);	
        $this->display();
    }
    
    //删除项目
    public function del()
    {
    	 $id=$_GET['id'];
    	 $project= D('prize');
    	 if($project->delete($id))
    	    $this->redirect('prizelist', array(),0,'数据删除成功，页面跳转中。。');
    	 else
    		$this->redirect('prizelist', array(),3,'数据修改失败，页面跳转中。。');
    }

    //编辑项目
    public function edit()
    {
        $id=$_GET['id'];
    	$news= D('prize');
    	$con=$news->where('prize_id='.$id)->select();
    	if($con[0]['prize_img'] != null) //判断是否有文件上传
    	    $imagemode=1;
    	else 
    		$imagemode=0;
    	$this->assign("content",$con[0]);
    	$this->assign("imagemode",$imagemode);
    	$this->display('editprize');
    }
    
    //提交编辑后的结果
    public function editsubmit()
    {	
    	//判断是否有上传文件
    	if($_FILES['picture']['name']=="")
    	{
    	    $mode=0;
    	}
    	else 
    	{
    		$mode=1;
    		$info=$this->up();
    	}
    	$id=$_GET['id'];	
    	$pro= D('prize');
	     $pro->prize_name=$_POST['name'];
                    $pro->prize_con=$_POST['con'];
                    $pro->prize_num=$_POST['num'];
	    if($mode == 1)
	      $data['prize_img']="__ROOT__/Admin/Public/Upload/image/prize/".$info[0]['savename'];
    	$pro->where('prize_id='.$id)->save($data);   
    	$this->redirect('prizelist', array('id'=>$id),1,'数据修改成功，页面跳转中。。');
    }
    
    //上传文件的方法
    public function up()
    {
    	import('ORG.Net.UploadFile');
                $upload=new UploadFile();
                $upload->maxSize= '100000000000';
                $upload->savePath='./Admin/Public/Upload/image/prize/';//保存路径建议与主文件平级目录或者平级目录的子目录来保存   
                $upload->saveRule=uniqid;//上传文件的文件名保存规则
                $upload->allowExts=explode(',', 'jpg,gif,png,jpeg,rar,zip,txt'); //准许上传的文件类型  
                $upload->thumb=false;//是否开启图片文件缩略图
                if($upload->upload()){
                    $info=$upload->getUploadFileInfo();
                    return $info;
                }else{
                    $error=$upload->getErrorMsg();
                    echo $error;
                }   
    }
    
}
