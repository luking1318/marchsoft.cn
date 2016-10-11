<?php
class AddressbookAction extends Action{

	function index(){
		$_SESSION["nav_point"] = 7;  //为选中的导航添加样式

		import("ORG.Util.Page");	//导入分页类
		$user = M('user');
		$res = $user	//查询出每个年级和每年级的人数
			->field('level,count(level) count')
			->join('march_user_info ON march_user.user_phone = march_user_info.user_phone')
			->group("march_user_info.level")
			->order("level desc")
			->select();
		$user_info = M("user_info");
		$info = $user_info->where("user_phone=".$_SESSION["phone"])->find();
		$user_id = $info["iduser_info"];	//存储当前用户的id号
		$address = M("address");

		if(!empty($_GET["level"])){
			$active_list = $user		//得到选中年级的数组
				->field("march_user.user_name,march_user_info.*")
				->join('march_user_info ON march_user.user_phone = march_user_info.user_phone')
				->where("level=".$_GET["level"])
				->select();
			$page = new Page(count($active_list),4);
			$list = $user
				->field("march_user.user_name,march_user_info.*")
				->join('march_user_info ON march_user.user_phone = march_user_info.user_phone')
				->limit($page->firstRow.','.$page->listRows)
				->where("level=".$_GET["level"])
				->select();
			$this->assign("level",$_GET["level"]);	//把选中的年级传到前台，改变该年级的样式
			
			/*往march_address表中添加已经查看过的用户信息*/
			if(count($active_list) > 0){
				for($i=0; $i<count($active_list); $i++){	
					$data["user_id"] = $user_id;
					$data["iduser_info"] = $active_list[$i]["iduser_info"];
					$data["level"] = $active_list[$i]["level"];
					if($address->where($data)->count() == 0){	//往address表中添加该表不存在已经查看的记录
						$address->add($data);
					}
				}
			}
		}else{			//默认显示最低年级的信息
			$page = new Page($res[0]['count'],4);
			$list = $user
				->field("march_user.user_name,march_user_info.*")
				->join('march_user_info ON march_user.user_phone = march_user_info.user_phone')
				->limit($page->firstRow.','.$page->listRows)
				->where("level=".$res[0]['level'])
				->select();
			$this->assign("level",$res[0]['level']);	//把最低年级传到前台
		}

		/*把年级最多分成7组*/
		$where["user_id"] = $user_id;
		if(count($res) > 7){
			for($i=0;$i<7;$i++){		
				$where["level"] = $res[$i]["level"];
				$read_count = $address->where($where)->count();		//已读的记录数
				$total_count = $user_info->where("level=".$res[$i]["level"])->count();	//总记录数
				$nav[$i]["count"] = $total_count - $read_count;	//未读的记录数
				$nav[$i]["level"] = $res[$i]["level"];
				if($i == 0){
					$nav[0]["one"] = 1;		//设置最低年级的样式
				}else{
					$nav[$i]["one"] = 0;
				}
			}
		}else{
			for($i=0;$i<count($res);$i++){
				$where["level"] = $res[$i]["level"];
				$read_count = $address->where($where)->count();		//已读的记录数
				$total_count = $user_info->where("level=".$res[$i]["level"])->count();	//总记录数
				$nav[$i]["count"] = $total_count - $read_count;	//未读的记录数
				$nav[$i]["level"] = $res[$i]["level"];
				if($i == 0){
					$nav[0]["one"] = 1;		//设置最低年级的样式
				}else{
					$nav[$i]["one"] = 0;
				}
			}
		}

		$this->assign('nav',$nav);
		$this->assign('list',$list);
		$this->assign('page',$page->show());
		$this->display();
	}
}
?>