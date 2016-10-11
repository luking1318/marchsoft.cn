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

}

 ?>