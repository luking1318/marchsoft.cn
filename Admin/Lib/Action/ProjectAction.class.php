<?php
class ProjectAction extends BaseAction {

	//添加项目
    public function addproject()
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
        $pro= D('project');
	    $pro->project_title=$_POST['title'];
	    $pro->project_type=$_POST['type'];
	    $pro->project_company=$_POST['company'];
	    $pro->project_user=$_POST['account'];
	    $pro->project_pwd=$_POST['password'];
	    $pro->project_intro=$_POST['content'];
	    $pro->project_url=$_POST['link'];
	    $pro->project_img="__ROOT__/Admin/Public/Upload/image/project/".$info[0]['savename'];
	    $mode=$pro->add();
        if($mode)
    	{
    		$this->redirect('projectlist', array(),0,'数据添加成功，页面跳转中。。');
    	}
    	else {
    	
            $this->redirect('addproject', array(),3,'数据添加失败，页面跳转中。。');
    	}
    }
    
   
    //项目列表
    public function projectlist()
    {
    	import("ORG.Util.Page");
        $Nav =M('project');  
        $count = $Nav->count();      
        $p = new Page($count, 5);     
        $page = $p->show(); 
        $list = $Nav->limit($p->firstRow.','.$p->listRows)->order('idmarch_project desc')->select();  
        $this->assign('page', $page); 
    	$this->assign("list",$list); 
    	$this->display();	
    }
    
    //删除项目
    public function del()
    {
    	 $id=$_GET['id'];
    	 $project= D('project');
    	 if($project->delete($id))
    	    $this->redirect('projectlist', array(),0,'数据删除成功，页面跳转中。。');
    	 else
    		$this->redirect('projectlist', array(),3,'数据修改失败，页面跳转中。。');
    }

    //编辑项目
    public function edit()
    {
        $id=$_GET['id'];
    	$news= D('project');
    	$con=$news->where('idmarch_project='.$id)->select();
    	if($con[0]['project_img'] != null) //判断是否有文件上传
    	    $imagemode=1;
    	else 
    		$imagemode=0;
    	$this->assign("content",$con[0]);
    	$this->assign("imagemode",$imagemode);
    	$this->display('editproject');
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
    	$pro= D('project');
	    $data['project_title']=$_POST['title'];
	    $data['project_type']=$_POST['type'];
	    $data['project_company']=$_POST['company'];
	    $data['project_user']=$_POST['account'];
	    $data['project_pwd']=$_POST['password'];
	    $data['project_intro']=$_POST['content'];
	    $data['project_url']=$_POST['link'];   
	    if($mode == 1)
	      $data['project_img']="__ROOT__/Admin/Public/Upload/image/project/".$info[0]['savename'];
    	$pro->where('idmarch_project='.$id)->save($data);   
    	$this->redirect('edit', array('id'=>$id),1,'数据修改成功，页面跳转中。。');
    }
    
    //上传文件的方法
    public function up()
    {
    	import('ORG.Net.UploadFile');
        $upload=new UploadFile();
        $upload->maxSize= '100000000000';
        $upload->savePath='./Admin/Public/Upload/image/project/';//保存路径建议与主文件平级目录或者平级目录的子目录来保存   
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
