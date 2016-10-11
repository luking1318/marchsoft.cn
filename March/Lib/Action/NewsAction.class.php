<?php
class NewsAction extends Action{
	public function index(){
		$news = M('news');
		import("ORG.Util.Page");
		$ncount = $news->where("news_type = '1'")->count();
		$page = new Page($ncount,8); 
		
		$page->setConfig('theme',"<div id=up>%upPage%</div> 
		<div id=link>%linkPage%</div>  <div id=next>%downPage%</div> ");

		$page->setConfig("next","");
		$page->setConfig("prev","");
		
		$show = $page->show();
		
		$news_list = $news->where("news_type = '1'")
			->limit($page
			->firstRow.",".$page->listRows)
			->order("news_stick desc,news_date DESC")
			->select();
		$this->assign("page",$show);
		$this->assign("list",$news_list);
		if(isset($_GET['android'])=='1'){
			$news_count = count($news_list);
			for($i = 0 ; $i < $news_count ; $i++){
				echo $news_list[$i]['idmarch_news'];
				echo '-<>-';
				
				echo $news_list[$i]['news_title'];
				echo '-<>-';
				
				echo $news_list[$i]['news_content'];
				echo '-<>-';
				
				echo $news_list[$i]['news_date'];
				echo '-<>-';
				
				echo $news_list[$i]['news_num'];
				
				echo '-<br>-';
			}
		}else
			$this->display();
	}
	
	public function show(){
		if (isset($_GET['nid'])) {
		//if($_GET){
			$id = intval($_GET['nid']);
			$news = M('news');
			//$result = $news->where("idmarch_news = '".$_GET['nid']."'")->select();
			$result = $news->where("idmarch_news = '".$id."'")->select();
			if($result){
				//更新数据库浏览次数 
				$sql ="update march_news set news_num = news_num+1 where idmarch_news ='".$id."'";
				$news->query($sql);
				$this->assign('result',$result);
				$this->display();
			}else{
				//跳转出错页面
			}
			
		}else	//跳转出错页面
		{
			
		}

	}

	
}
?>
