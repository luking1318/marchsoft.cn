<?php
// 本类由系统自动生成，仅供测试用途
class IntroduceAction extends Action {
    public function introduce(){
    	$type=$_GET['type'];
	    if($type == 1)
	    {
	    	$title="小组简介";
	    }
	    else {
	    	$title="老师简介";
	    }
	    $intro= M('intro');
    	$arr=$intro->where("idmarch_intro=".$type)->select();
    	$this->assign("content",$arr[0]['intro_content']);
	    $this->assign("title",$title);
	    $this->assign("type",$type);
		$this->display('introduce');
    }
    public function submit()
    {
    	$type=$_GET['type'];
    	$intro= M('intro');
        $mode=$intro->where("idmarch_intro=".$type)->setField('intro_content',$_POST['content']);
    	if($mode)
    	{
    		$this->redirect('introduce', array('type'=>$type),1,'数据修改成功，页面跳转中。。');
    	}
    	else 
    	{
            $this->redirect('introduce', array('type'=>$type),3,'数据修改失败，页面跳转中。。');
    	}
    }
}