<?php
// 本类由系统自动生成，仅供测试用途
class NewsAction extends BaseAction {

	//添加新闻
	public function addnews()
    {	
    	$addtype=0;
    	if(isset($_GET['addtype']))
    	    $addtype=$_GET['addtype']; //指定添加新闻的类型
    	$this->assign('addtype', $addtype); 
    	$this->display();
    }
    
    //提交添加的新闻
    public function submit()
    {
        $news= D('news');
	    $news->news_title=$_POST['title'];
		$news->news_content=$_POST['content'];
		$news->news_date=$_POST['posttime'];
		$news->news_publisher=$_POST['person'];
		$news->news_type=$_POST['type'];
	    $mode=$news->add();
        if($mode)
    	{
    		$this->redirect('addnews', array('addtype'=>$_GET['type']),0,'数据添加成功，页面跳转中。。');
    	}
    	else {
    	
            $this->redirect('addnews', array('addtype'=>$_GET['type']),3,'数据添加失败，页面跳转中。。');
    	}
    }
    
    //大事记列表
    public function newslist()
    {	
       // R("OA://Index/back");        //为选中的导航添加样式
    	if(!isset($_SESSION['login']))
    	{
    		$_SESSION['login']='100';
    	}	
    	$type=$_GET['type'];
    	switch($type){
    		case "1":$title="小组新闻"; break;
    		case "2":$title="通知公告"; break;
    		case "3":$title="大事记";   break;	
    	}; 	
    	
    	import("ORG.Util.Page");
        $Nav = M('news');  
        $count = $Nav->where('news_type ='.$type)->count();
        $p = new Page($count, 10);
        $list = $Nav->limit($p->firstRow.','.$p->listRows)->order('idmarch_news desc')->where('news_type ='.$type)->select();  
        $this->assign('page', $p->show()); 
    	$this->assign("list",$list); 
    	$this->assign("title",$title);
    	$this->assign("type",$type);
    	$this->display();
    }
    
    //删除新闻
    public function del()
    {
    	 $id=$_GET['id'];  //删除新闻的id
    	 $type=$_GET['type'];//删除新闻的类型
    	 $news= D('news');
    	 if($news->delete($id))
    	    $this->redirect('newslist', array('type'=>$type),0,'数据删除成功，页面跳转中。。');
    	 else
    		$this->redirect('newslist', array('type'=>$type),3,'数据修改失败，页面跳转中。。');
    }
    
    //编辑新闻
    public function edit()
    {
        $id=$_GET['id'];
    	$news= D('news');
    	$con=$news->where('idmarch_news='.$id)->select();
    	$this->assign("content",$con[0]);
    	$this->display('editnews');
    }
    
    //保存编辑后的新闻
    public function editsubmit()
    {	
    	$id=$_GET['id'];
    	$news= D('news');
    	$data['news_title']=$_POST['title'];
    	$data['news_content']=$_POST['content'];
    	$data['news_date']=$_POST['posttime'];
    	$data['news_publisher']=$_POST['person'];
    	$data['news_type']=$_POST['type'];
    	$news->where('idmarch_news='.$id)->save($data);   
    	$this->redirect('edit', array('id'=>$id),0,'数据修改成功，页面跳转中。。');
    }
    
}