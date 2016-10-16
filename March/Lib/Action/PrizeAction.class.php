<?php 
/**
* 三月奖项
*
*/
class PrizeAction extends Action{

	public function index(){
            $mc = M('prize_don');
            $s1=$mc ->order('don_num desc')->find();//一次捐赠最高的
            $s2=$mc ->group('don_name')->select();
            $name = "";//累计捐赠最高的名字
            $n = 0;//累计捐赠最高的钱数
            for($i=0;$i<count($s2);$i++){
            	$s=$mc ->where('don_name="'.$s2[$i]['don_name'].'"')->sum('don_num');
            	if($s>$n){
            		$name=$s2[$i]['don_name'];
            		$n=$s;
            	}
            }
            $this->assign("name",$name);
            $this->assign("n",$n);
            $this->assign("s1",$s1);
            $clist = $mc->limit(6)->select();
            $this->assign('clist',$clist);

            $mp = M('prize');
            $zuop = $mp->where('prize_num = 1')->limit(2)->select();
            $this->assign("zuop",$zuop);
            $xinp =  $mp->where('prize_num = 0')->limit(3)->select();
            $this->assign("xinp",$xinp);
		$this->display();
	}
	public function ff(){
		$this->display();
	}

	public function prize(){
		$news = M('prize_don');
		import("ORG.Util.Page");
		$ncount = $news->count();
		$page = new Page($ncount,8); 
		
		$page->setConfig('theme',"<div id=up>%upPage%</div> 
		<div id=link>%linkPage%</div>  <div id=next>%downPage%</div> ");

		$page->setConfig("next",">");
		$page->setConfig("prev","<");
		
		$show = $page->show();
		
		$news_list = $news
			->limit($page->firstRow.",".$page->listRows)
			->order("don_time DESC")
			->select();
		$this->assign("page",$show);
		$this->assign("list",$news_list);
		$this->display('prize');
	}

	public function prizer() {
		$id = $_GET['id'];
		$this->display();
	}


}

 ?>