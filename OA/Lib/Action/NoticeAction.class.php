<?php
class NoticeAction extends Action{
	
	public function index(){
		$_SESSION["nav_point"] = 5;  //为选中的导航添加样式
		$this->notice();
		$this->display();
	}
	public function notice(){
		$user_info = M('user_info');
		$info = $user_info->where("user_phone=".$_SESSION["phone"])->find();
		$user_id = $info["iduser_info"];	//获得该用户的id

		$weekend = array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
		$news = M("news");
		$where["news_type"] = 2;
		if(empty($_GET['date'])){		
			$where["news_date"] = array("like",date("Y-m-d")."%");
			$list = $news->where($where)->order("idmarch_news desc")->select();
			$this->assign("list",$list);
			$this->assign("count",count($list));
			$this->assign("date",date("Y-m-d"));
			$this->assign("weekend",$weekend[date("w")]);	//星期三
		}else{
			$where["news_date"] = array("like",$_GET["date"]."%");
			$list = $news->where($where)->order("idmarch_news desc")->select();
			if(count($list) > 0){
				$notice = M("notice");
				for($i=0;$i<count($list);$i++){		//往march_notice表中添加已阅读的数据
					$data["user_id"] = $user_id;
					$data["notice_id"] = $list[$i]["idmarch_news"];
					$data["date"] = $list[$i]["news_date"];
					$count = $notice->where($data)->count();
					if($count == 0){
						$notice->add($data);
					}
				}
			}
			$this->assign("list",$list);
			$this->assign("count",count($list));
			$this->assign("date",$_GET["date"]);	//往隐藏标签中赋值，改变选中日期的样式
			$this->assign("weekend",$weekend[date("w",strtotime($_GET["date"]))]);	//选中的星期
		}
		$x = 0;		//把星期重新排序
		for($i = date("w");$i < 7; $i++){
			$arr[$x]["date"] = date("Y-m-d",strtotime("+$x day"));
			$arr[$x]["wed"] = $weekend[$i];
			if($arr[$x]["date"] == date("Y-m-d")){	//标记当天的样式
				$arr[$x]["today"] = 1;
			}else{
				$arr[$x]["today"] = 0;
			}
			$where["news_date"] = array("like",$arr[$x]["date"]."%");
			$total_count = $news->where($where)->count();		//总记录数量
			$where1["date"] = array("like",$arr[$x]["date"]."%");
			$where1["user_id"] = $user_id;
			$read_count = M("notice")->where($where1)->count();		//已经阅读的数量
			$arr[$x++]["count"] = $total_count - $read_count;		//未读的数量
		}
		for($i = 0; $i < date("w"); $i++){
			$arr[$x]["date"] = date("Y-m-d",strtotime("+$x day"));
			$arr[$x]["wed"] = $weekend[$i];
			if($arr[$x]["date"] == date("Y-m-d")){	//标记当天的样式
				$arr[$x]["today"] = 1;
			}else{
				$arr[$x]["today"] = 0;
			}
			$where["news_date"] = array("like",$arr[$x]["date"]."%");
			$total_count = $news->where($where)->count();			//总记录数量
			$where1["date"] = array("like",$arr[$x]["date"]."%");
			$where1["user_id"] = $user_id;
			$read_count = M("notice")->where($where1)->count();	//已经阅读的数量
			$arr[$x++]["count"] = $total_count - $read_count;	//未读的数量
		}
		$this->assign("arr",$arr);	//重新排列数组后的星期
	}

}
?>