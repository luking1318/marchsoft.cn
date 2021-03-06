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
            $clist = $mc->limit(6)->order("don_time DESC")->select();
            $this->assign('clist',$clist);

            $mc = D("prize");
		$first=$mc->where('prize_kind=0')->order("prize_time DESC")->find();
		$second=$mc->where('prize_kind=1')->order("prize_time DESC")->find();
		$this->assign("first",$first);
		$this->assign("second",$second);

		$this->display();
	}
	public function prizers(){
		$ses = $_GET['ses'];
		$mc = D("prize");
		$s2=$mc ->group('prize_ses')->select();
		$first=$mc->where('prize_ses='.$ses.' and prize_kind=0')->find();
		$second=$mc->where('prize_ses='.$ses.' and prize_kind=1')->find();
		$three=$mc->where('prize_ses='.$ses.' and prize_kind=3')->select();
		// dump($s2);
		$this->assign('num',count($s2)+1);
		$this->assign("first",$first);
		$this->assign("second",$second);
		 $this->assign("three",$three);
		 // dump($second);
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
            $clist = $mc->limit(6)->order("don_time DESC")->select();
            $this->assign('clist',$clist);
		$id = $_GET['id'];
	    	$news= D('prize');
	    	$con=$news->where('prize_id='.$id)->select();
	    	$this->assign("content",$con[0]);
	    	// dump($con);
		$this->display();
	}


}

 ?>