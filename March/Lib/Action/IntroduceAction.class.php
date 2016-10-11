<?php
class IntroduceAction extends Action {
	
	//老师简介
    public function introteacher(){
    	$intro=D('intro');
    	$con=$intro->where('idmarch_intro = 2')->select();
    	$introteahcer=$con[0]['intro_content'];
    	$this->assign("intro",$introteahcer);
		$this->display();
    }
    
    //小组简介
    public function introteam()
    {
    	$intro=D('intro');
    	$con=$intro->where('idmarch_intro = 1')->select();
    	$introteam=$con[0]['intro_content'];
    	$this->assign("intro",$introteam);
		$this->display();
    }
    
    //毕业生简介
    public  function introstudent()
    {
    	$start=2003;//起始日期
    	
    	$end=(int)date('Y')-4;//最近一届毕业生的入学时间
    	
    	//生成了两个数组，前台页面遍历时使用。
    	for($i=$start; $i<=$end; $i++)
    	{
    		$arrlevel1[] = $i;
    	}
        for($i=$start+1; $i<=$end; $i++)
    	{
    		$arrlevel[] = $i;
    	}	
    	$sql = "select * from march_user inner join march_user_info on march_user.user_phone=march_user_info.user_phone where march_user_info.level <= ".$end;
		$result = M()->query($sql);
    	$this->assign("result",$result);
    	$this->assign("arrlevel",$arrlevel);
    	$this->assign("arrlevel1",$arrlevel1);
    	$this->display();
    }
}
?>