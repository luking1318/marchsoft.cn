<?php
	/*本方法返回当前用户未读通知公告的数量*/
	function getNotice_Num(){
		$news = M("news");
		$where["news_type"] = 2;
		$start = date("Y-m-d")." 00:00:00";		//开始时间
		$end = date("Y-m-d",strtotime("+6 day"))." 23:59:59";	//结束时间
		$where["news_date"] = array("between","$start,$end");
		$total_count = $news->where($where)->count();		//一周之内通知公告总记录数

		$user_info = M("user_info")->where("user_phone=".$_SESSION["phone"])->find();//该用户的信息
		$where1["user_id"] = $user_info["iduser_info"];		//当前用户的id
		$where1["date"] = array("between","$start,$end");
		$read_count = M("notice")->where($where1)->count();		//通知公告,一周之内已读记录数
		return $total_count - $read_count;	//通知公告,一周之内未读记录数
	}

	/*本方法返回当前用户的姓名*/
	function getName(){	
		$user = M("user")->where("user_phone=".$_SESSION["phone"])->find();
		return $user["user_name"];
	}

?>
