<?php
	class CourseAction extends Action {
	    public function Course(){
	    	$obj = M();
	        $sql="select cl.*,co.* FROM march_user co
				left join march_course cl on  cl.user_phone = co.user_phone
				where co.user_phone=".$_SESSION["phone"];
			$list = $obj->query($sql);

			$one[0] = explode("=",$list[0]["First_course"]);
			$one[1] = explode("=",$list[0]["Second_course"]);
			$one[2] = explode("=",$list[0]["Third_course"]);
			$one[3] = explode("=",$list[0]["Fourth_course"]);
			$one[4] = explode("=",$list[0]["Firth_course"]);
			for($m = 0;$m<7;$m++){
				for($k = 0;$k<5;$k++){
					if($one[$m][$k]=="no"){
						$one[$m][$k] = "";
					}
				}	
			}
			$this->assign("name",$list[0]["user_name"]);	//当前用户的姓名
			$this->assign("one",$one);
	    }
	    public function search(){
	    	$datas = $_POST["str"];
	    	$arr = explode(",",$datas);
	    	$obj = M();
	    	$sql="";
	    	if(count($arr) ==1){
	    		$sql="select cl.*,co.* FROM march_user co
				left join march_course cl on  cl.user_phone = co.user_phone
					where co.user_name='".$arr[0]."'";
				$list = $obj->query($sql);
				$one = array();  
				$one[0] = explode("=",$list[0]["First_course"]);
				$one[1] = explode("=",$list[0]["Second_course"]);
				$one[2] = explode("=",$list[0]["Third_course"]);
				$one[3] = explode("=",$list[0]["Fourth_course"]);
				$one[4] = explode("=",$list[0]["Firth_course"]);
				for($m = 0;$m<5;$m++){
					for($k = 0;$k<5;$k++){
						if($one[$m][$k]=="no"){
							$one[$m][$k] = "";
						}
					}	
				}
				$this->assign("one",$one);
	    	}else if(count($arr) >1){
	    		for($i =0,$k = 1;$i<count($arr);$i++,$k++){
	    			if($k == count($arr)){
		    		    $sql .="select cl.*,co.* FROM march_user co
						left join march_course cl on  cl.user_phone = co.user_phone
						where co.user_name='".$arr[$i]."'";
					}else{
					     $sql .="select cl.*,co.* FROM march_user co
						left join march_course cl on  cl.user_phone = co.user_phone
						where co.user_name='".$arr[$i]."' union all ";
					}  
	    		}
	    		$list = $obj->query($sql);
	    		$arrs = array();
	    		for($m = 0;$m<count($list);$m++){
		    		$one1[$m][0] = explode("=",$list[$m]["First_course"]);
					$one1[$m][1] = explode("=",$list[$m]["Second_course"]);
					$one1[$m][2] = explode("=",$list[$m]["Third_course"]);
					$one1[$m][3] = explode("=",$list[$m]["Fourth_course"]);
					$one1[$m][4] = explode("=",$list[$m]["Firth_course"]);
					$one1[$m][5] = $list[$m]["user_name"];
					if(!empty($list[$m]['First_course'])||!empty($list[$m]['Second_course'])||!empty($list[$m]['Third_course'])||!empty($list[$m]['Fourth_course'])||!empty($list[$m]['Firth_course'])){
						for($n = 0;$n<5;$n++){
							for($p = 0;$p<5;$p++){
								if($one1[$m][$n][$p]!="no"){
									if(!empty($one[$n][$p])){ 
									   $one[$n][$p].=" , ".$one1[$m][5];
								    }else{
								    	$one[$n][$p].=$one1[$m][5];
								    }
								}else{
									$one[$n][$p].="";
								}
							}	
						}
					}else{
						for($n = 0;$n<5;$n++){
							for($p = 0;$p<5;$p++){
								$one[$n][$p].="";
							}	
						}
					}
				}
	    	}
	    	$this->assign("one",$one);
	    	$this->display("course_search");
	    }
	    public function searchone(){
	    	$people = $_POST['str'];
	    	$longs = $_POST['longs']+160;
	    	$obj = M();
	    	if($people ==""){
	    		$people="------";
			}
			$sql = "select user_name FROM march_user where user_name like '%".$people."%'";
	    	$li = $obj->query($sql);
	    	for($i=0;$i<count($li);$i++){
	    		$li[$i]['num'] =$i*20+50;
	    	}
	    	$this->assign("long",$longs);
	    	$this->assign("on",$li);
	    	$this->display("course_searchone");
	    }
	    public function searchtwo(){
	    	$obj = M();
			$sql = "select user_name FROM march_user";
	    	$li = $obj->query($sql);
	    	$this->assign("lis",$li);
	    	$_SESSION['uase_name'] = $li;
	    	$this->display("course_searchtwo");
	    }
	    /*public function check($list,$one){
	  		if($list["Section"]=="1-2"){
				$one[0] = $list["Lesson"]." ".$list["Room"];
			}
			if($list["Section"]=="3-4"){
				$one[1] = $list["Lesson"]." ".$list["Room"];
			}
			if($list["Section"]=="5-6"){
				$one[2] = $list["Lesson"]." ".$list["Room"];
			}
			if($list["Section"]=="7-8"){
				$one[3] = $list["Lesson"]." ".$list["Room"];
			}
			if($list["Section"]=="9-10"){
				$one[4] = $list["Lesson"]." ".$list["Room"];
			}
			return $one;
	    }*/
	}
?>