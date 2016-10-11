<?php
class CourseAction extends Action{
	function index(){
		$course=M('course');
		$list=$course->field('First_course,Second_course,Third_course,Fourth_course,Firth_course')
			->where(array("user_phone"=>"$_SESSION[phone]"))->select();
		$course_list=array();	//定义分割后的数组
		foreach($list as $jet){
			$str=array_chunk($jet,1);	//将原数组合成字符串
			for($i=0;$i<count($str);$i++){
				$course_list[$i]=explode("=",$str[$i][0],5);
			}
			for($i=0;$i<count($course_list);$i++){
				for($j=0;$j<count($course_list[$i]);$j++){
					if($course_list[$i][$j]=='no'){
						$course_list[$i][$j]="";
					}
				}
			}
		};
		$this->assign("list",$course_list);
		
		$this->display();
	}
	
	function upadte_data(){
		if($_POST){
			$data=$_POST['course_string'];
			$list=explode("@",$data,25);
			$list[24]=explode('@',$list[24],2);
			$list[24]=$list[24][0];
			$course_list=array();
			for($i=0;$i<25;$i++){
				switch($i){
					case ($i>0&&$i<5):$course_list[0].=$list[$i]."="; break;
					case ($i>=5&&$i<10):$course_list[1].=$list[$i]."=";break;
					case ($i>=10&&$i<15):$course_list[2].=$list[$i]."=";break;
					case ($i>=15&&$i<20):$course_list[3].=$list[$i]."=";break;
					case ($i>=20&&$i<25):$course_list[4].=$list[$i]."=";break;
				}
			}
			for($i=0;$i<5;$i++){//去掉字符串后边的等号
				$course_list[$i]=substr($course_list[$i],0,($course_list[$i].LengthException)-1);
			}
			//写入数据库
			$course=M('course');
			$data=array();
			$data['First_course']=$course_list[0];
			$data['Second_course']=$course_list[1];
			$data['Third_course']=$course_list[2];
			$data['Fourth_course']=$course_list[3];
			$data['Firth_course']=$course_list[4];
			$data['user_phone']=$_GET[phone];
			$phone=$course->where(array("user_phone"=>"$_GET[phone]"))->find();
			if($phone['user_phone']){
				if($course->where(array("user_phone"=>"$_GET[phone]"))->save($data)){
					echo "1";
				}else{
					echo "0";
				}
			}else{
				if($course->add($data)){
					echo "1";
				}else{
					echo "0";
				}
			}
		}else{
			echo "0";
		}
	}
	
	//成员列表
	function  member_course(){
		$course=M('course');
		$course_list=array();	//定义分割后的数组
		$course_com_list=array();	//同一节的课程人名合在一块儿
		$list=$course
			->field('march_user.user_name,march_course.First_course,march_course.Second_course,march_course.Third_course,march_course.Fourth_course,march_course.Firth_course')
			->join('march_user ON march_user.user_phone=march_course.user_phone')
			->select();
			$i=0;
		for($j=0;$j<count($list);$j++){
			$str=array_chunk($list[$j],1);	//分割课程
			for($i=0;$i<count($str)-1;$i++){
				$course_list[$j][$i]=explode("=",$str[$i+1][0],5);
			}
		}
		for($i=0;$i<count($course_list);$i++){ //把每节有课的名称转换成成员姓名
			for($j=0;$j<5;$j++){
				for($m=0;$m<5;$m++){
					if($course_list[$i][$j][$m]!="no"){
						$course_list[$i][$j][$m]=$list[$i]['user_name'];
					}
				}
			}
		}	
		$k=0;
		for($i=0;$i<5;$i++){	//合并在同一节上课的人员
			for($j=0;$j<5;$j++){
				$count_nem=count($course_list);
				$m=0;	//每加入一个成员，$M+1；
				foreach($course_list as $jet){
					$m++;
					//判断字段为no的不加入，判断最后一个成员的后边不加“，”号;
					$course_com_list[$i][$k].=($jet[$i][$j]!="no")?(($m!=$count_nem)?($jet[$i][$j].","):($jet[$i][$j])):"";
				}
				$k++;
			}
		}
		$this->assign("com_list",$course_com_list);
		$this->display();
		
		
	}
}

?>