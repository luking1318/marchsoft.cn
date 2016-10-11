<?php 
/**
* 
*/
class PrizeAction extends Action{

	public function index(){
            $mc = M('prize_don');
            $clist = $mc->limit(10)->select();
            $this->assign('clist',$clist);
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


}

 ?>