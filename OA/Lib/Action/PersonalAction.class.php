    <?php
class PersonalAction extends Action{
	/*-----事务管理-----*/
	function thing(){
		$_SESSION["nav_point"] = 8;  //为选中的导航添加样式
		$_SESSION["two_level_nav"] = "p_thing";//为选中的左侧div添加样式
		
		$list = M("module")->where("module_id=".$_SESSION["login"])->find();
		$this->assign("list",$list);
		$this->display();
	}
	//通知公告
	function notice(){
		$news = M("news");
		$where["news_type"] = 2;
		$order = "news_date desc";
		$this->result($news,$where,$order,$Page,$list);	//调用result方法
		$this->assign("page",$Page->show());
		$this->assign("list",$list);
		$this->display();
	}
	function del_all_notice(){
		$where["idmarch_news"] = array("in",$_POST["idmarch_news"]);	//删除news表中数据
		$count = M("news")->where($where)->delete();
		if($count > 0){
			$where1['notice_id'] = array("in",$_POST["idmarch_news"]);	//删除notice表中数据
			M("notice")->where($where1)->delete();
			echo "删除成功";
		}else{
			echo "删除失败";
		}
	}
	function del_notice(){
		$count = M("news")->where("idmarch_news=".$_POST["idmarch_news"])->delete();
		if($count > 0){
			M("notice")->where("notice_id=".$_POST["idmarch_news"])->delete();
			echo "删除成功";
		}else{
			echo "删除失败";
		}
	}
	function add_edit_notice(){
		$list = M("news")->where("idmarch_news=".$_GET["id"])->find();
		if($list){		//成立就编辑通知公告
			M("notice")->where("notice_id=".$_GET["id"])->delete();//删除notice表中数据
			$this->assign("list",$list);
		}		//不成立就添加通知公告
		$this->display();
	}
	function add_edit_notice1(){
		$info = M("user")->where("user_phone=".$_SESSION["phone"])->find();//当前用户的信息
		$_POST["news_publisher"] = $info["user_name"];	//当前用户名
		$_POST["news_type"] = "2";
		$_POST["active_type"] = $_SESSION["login"];
		
		if(M("news")->where("idmarch_news=".$_POST["idmarch_news"])->find()){
			if(M("news")->where($_POST)->find()){
				echo "编辑成功";
			}else{
				$count = M("news")->save($_POST);
				if($count > 0){
					echo "编辑成功";
				}else{
					echo "编辑失败";
				}
			}
		}else{
			$count = M("news")->add($_POST);
			if($count > 0){
				echo "添加成功";
			}else{
				echo "添加失败";
			}
		}
	}
	//讲课资料
	function lecture(){
		import('ORG.Util.Page');// 导入分页类
		$lecture = M("lecture");
		$Page = new Page($lecture->count(),10);
		$list = $lecture
			->field("march_lecture.*,march_sort.sort_name")
			->join("march_sort on march_lecture.lecture_sort = march_sort.idmarch_sort")
			->order("idmarch_lecture desc")
			->limit($Page->firstRow.",".$Page->listRows)
			->select();
		$this->assign("page",$Page->show());
		$this->assign("list",$list);
		$this->display();
	}
	function del_all_lecture(){
		$where["idmarch_lecture"] = array("in",$_POST["idmarch_lecture"]);
		$count = M("lecture")->where($where)->delete();
		if($count > 0){
			echo "删除成功";
		}else{
			echo "删除失败";
		}
	}
	function del_lecture(){
		$count = M("lecture")
			->where("idmarch_lecture=".$_POST["idmarch_lecture"])
			->delete();
		if($count > 0){
			echo "删除成功";
		}else{
			echo "删除失败";
		}
	}
	function add_edit_lecture(){
		$list = M("lecture")->where("idmarch_lecture=".$_GET["id"])->find();
		if($list){
			$this->assign("list",$list);
		}
		$sort = M("sort")->select();
		$this->assign("sort",$sort);
		$this->display();
	}
	function add_edit_lecture1(){
		$list = M("lecture")->where("idmarch_lecture=".$_POST["idmarch_lecture"])->find();
		if($list){	//编辑数据
			if(M("lecture")->where($_POST)->find()){	//没有修改数据显示修改成功
				echo "编辑成功";
			}else{
				$count = M("lecture")->save($_POST);
				if($count > 0){
					//不能删除数据库中"lecture_img"字段中存在的图片
					if(!M("lecture")->where("lecture_img='".$_POST["lecture_img"]."'")->find()){
						unlink("OA/Common/img/lecture/m_".$list["lecture_img"]);//删除原图像
						unlink("OA/Common/img/lecture/s_".$list["lecture_img"]);//删除原图像
					}
					echo "编辑成功";
				}else{
					echo "编辑失败";
				}
			}
		}else{		//添加数据
			$_POST["lecture_date"] = date("Y-m-d");
			$count = M("lecture")->add($_POST);
			if($count > 0){
				echo "添加成功";
			}else{
				echo "添加失败";
			}
		}
	}
	function lecture_upload_img(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();	// 实例化上传类
		$upload->maxSize  = 2000000 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg','bmp');// 设置附件上传类型
		$upload->savePath =  './OA/Common/img/lecture/';// 设置附件上传目录
		$upload->saveRule=uniqid;//必须能保证生成的文件名是唯一的
		$upload->thumb=true;   //是否需要对图片文件进行缩略图处理
		$upload->thumbMaxWidth='144,250';  //缩略图的最大宽度，多个使用逗号分隔 
		$upload->thumbMaxHeight='144,400';	//缩略图的最大高度，多个使用逗号分隔 
		$upload->thumbPrefix='s_,m_';//缩略图的文件前缀
		$upload->thumbRemoveOrigin=1;
		if(!$upload->upload()) {	// 上传错误
			$error = $upload->getErrorMsg();
			echo "<script>parent.error('".$error."')</script>";
		}else{		// 上传成功
			$this->del_lecture_img();	//删除原图片
			$info =  $upload->getUploadFileInfo();
			echo "<script>parent.success('".$info[0]["savename"]."')</script>";
		}
	}
	function del_lecture_img(){
		//不能删除数据库中"lecture_img"字段中存在的图片
		$list = M("lecture")->where("lecture_img='".$_POST["lecture_img"]."'")->find();
		if(!$list){
			unlink("OA/Common/img/lecture/m_".$_POST["lecture_img"]);//删除原图片
			unlink("OA/Common/img/lecture/s_".$_POST["lecture_img"]);//删除原图片
		}
	}

	/*笔记统计*/
	function blog(){
		$result = M("result");
		$order = "result_id desc";	//排序方式
		$this->result($result,$where,$order,$Page,$list);	//调用result方法
		$this->assign("page",$Page->show());
		$this->assign("list",$list);
		$this->display();
	}
	function del_blog(){	//删除选中的统计笔记
		M("result")->where("result_id=".$_POST["result_id"])->delete();
		M("result_info")->where("pid=".$_POST["result_id"])->delete();
		echo "删除成功";
	}
	function del_all_blog(){
		$where["result_id"] = array("in",$_POST["result_id"]);
		M("result")->where($where)->delete();

		$where1["pid"] = array("in",$_POST["result_id"]);
		M("result_info")->where($where1)->delete();
		echo "删除成功";
	}
	function count_blog(){
		$this->display();
	}
	function count_blog1(){		//单击统计笔记中的提交按钮
		$where["article_time"] = array("between","$_POST[starttime],$_POST[endtime]");
		$where["article_type"] = 0;	//0代表笔记
		$arr = M("article")
			->field("march_user.user_name,count(march_article.user_phone) as count")
			->join("march_user on march_user.user_phone = march_article.user_phone")
			->where($where)
			->group("march_article.user_phone")
			->select();
		if(count($arr) > 0){
			$result_id = M("result")->add($_POST);//获取新增记录的主键
			for($i=0;$i<count($arr);$i++){
				$list["pid"] = $result_id;
				$list["username"] = $arr[$i]["user_name"];
				$list["amount"] = $arr[$i]["count"];
				M("result_info")->add($list);
			}
			echo "添加成功";
		}else{
			echo "这段时间没有人写笔记";
		}
	}
	function news_count_result(){
		import("ORG.Util.Page");
		$count = M("result_info")->where("pid=".$_GET["id"])->count();
		$page = new Page($count,10);
		$list = M("result_info")
			->where("pid=".$_GET["id"])
			->limit($page->firstRow.",".$page->listRows)
			->order("amount desc")
			->select();
		if(count($list) > 0){
			$this->assign("list",$list);
			$this->assign("page",$page->show());
		}
		$this->display();
	}

	/*新闻管理和大事件*/
	function news(){
		if($_GET["type"]){		//1代表新闻，3代表大事件
			$type = $_GET["type"];
		}else{
			$type = 1;
		}
		if($_GET["stick_manage"]){	//是否进入置顶管理页面
			$this->assign("stick_manage",$_GET["stick_manage"]);
			$where["news_stick"] = array("gt",0);//只显示已置顶的
		}
		$news = M("news");
		$where["news_type"] = $_GET["type"];
		$order = "news_stick desc,news_date desc";
		$this->result($news,$where,$order,$Page,$list);	//调用result方法
		for($i = 0;$i<count($list);$i++){
			$list[$i]["news_title"] = $this->split($list[$i]["news_title"]);//截取字符串
		}
		$this->assign("type",$type);
		$this->assign("page",$Page->show());
		$this->assign("list",$list);
		$this->display();
	}
	function del_all_news(){
		$where["idmarch_news"] = array("in",$_POST["idmarch_news"]);	//删除news表中数据
		$count = M("news")->where($where)->delete();
		if($count > 0){
			echo "删除成功";
		}else{
			echo "删除失败";
		}
	}
	function del_news(){
		$count = M("news")->where("idmarch_news=".$_POST["idmarch_news"])->delete();
		if($count > 0){
			echo "删除成功";
		}else{
			echo "删除失败";
		}
	}
	function add_edit_news(){
		if($_GET["type"]){
			$type = $_GET["type"];	//1代表新闻，3代表大事件
		}else{
			$type = 1;
		}
		$list = M("news")->where("idmarch_news=".$_GET["id"])->find();
		if($list){		//编辑新闻或大事记
			$this->assign("list",$list);
		}
		$this->assign("id",$list["idmarch_news"]);
		$this->assign("type",$type);
		$this->display();
	}
	function add_edit_news1(){
		if($_POST["news_stick"] == 1){//选中置顶复选框
			$_POST["news_stick"] = M("news")->max("news_stick")+1;//把该新闻显示第一条
		}
		if(M("news")->where("idmarch_news=".$_POST["idmarch_news"])->find()){//成立编辑数据
			if(M("news")->where($_POST)->find()){//没有修改数据显示修改成功
				echo "编辑成功";
			}else{
				$count = M("news")->save($_POST);
				if($count > 0){
					echo "编辑成功";
				}else{
					echo "编辑失败";
				}
			}
		}else{		//增加数据
			$info = M("user")->where("user_phone=".$_SESSION["phone"])->find();
			$_POST["news_publisher"] = $info["user_name"];
			$_POST["news_date"] = date("Y-m-d H:i:s");
			$_POST["active_type"] = $_SESSION["login"];
			$_POST["active_type"] = $_SESSION["login"];
			$count = M("news")->add($_POST);
			if($count > 0){
				echo "添加成功";
			}else{
				echo "添加失败";
			}
		}
	}
	public function stick(){
		$data["news_stick"] = M("news")->max("news_stick")+1;//置顶为该列的最大值+1
		if(M("news")->where("idmarch_news=".$_POST["idmarch_news"])->save($data)){
			echo "置顶成功";
		}else{
			echo "置顶失败";
		}
	}
	public function cancel_stick(){
		$data["news_stick"] = 0;
		if(M("news")->where("idmarch_news=".$_POST["idmarch_news"])->save($data)){
			echo "取消置顶成功";
		}else{
			echo "取消置顶失败";
		}
	}
	public function cancel_stick_all(){
		$data["news_stick"] = 0;
		$where["idmarch_news"] = array("in",$_POST["idmarch_news"]);	//删除news表中数据
		$count = M("news")->where($where)->save($data);
		if($count > 0){
			echo "取消置顶成功";
		}else{
			echo "取消置顶失败";
		}
	}
	public function up_move(){
		//该条记录的news_stick字段值
		$condition["idmarch_news"] = $_POST['idmarch_news'];
		$news_stick = M("news")->where($condition)->getField("news_stick");
		$max = M("news")->max("news_stick");//该表中news_stick的最大值
		if($news_stick == $max){
			echo "已经是第一条，不能移动";
		}else{
			$where["news_type"] = 1;	//新闻
			$where["news_stick"] = array("gt",$news_stick);
			$prev = M("news")->where($where)->order("news_stick")->find();
			$data["news_stick"] = $prev["news_stick"];
			//修改该条记录
			M("news")->where($condition)->save($data);
			//修改上一条记录
			$condition["idmarch_news"] = $prev["idmarch_news"];
			$data["news_stick"] = $news_stick;
			$count = M("news")->where($condition)->save($data);
			if($count > 0){
				echo "上移成功";
			}else{
				echo "上移失败";
			}
		}
		
	}
	public function down_move(){
		//该条记录的news_stick字段值
		$condition["idmarch_news"] = $_POST['idmarch_news'];
		$news_stick = M("news")->where($condition)->getField("news_stick");
		$min = M("news")->where("news_stick > 0")->min("news_stick");//该表中news_stick的最小值
		if($news_stick == $min){
			echo "已经是最后一条，不能移动";
		}else{
			$where["news_type"] = 1;	//新闻
			$where["news_stick"] = array("lt",$news_stick);
			$next = M("news")->where($where)->order("news_stick desc")->find();
			$data["news_stick"] = $next["news_stick"];
			//修改该条记录
			M("news")->where($condition)->save($data);
			//修改上一条记录
			$condition["idmarch_news"] = $next["idmarch_news"];
			$data["news_stick"] = $news_stick;
			$count = M("news")->where($condition)->save($data);
			if($count > 0){
				echo "下移成功";
			}else{
				echo "下移失败";
			}
		}
		
	}


	function result($table,$where,$order,&$Page,&$list){
		import('ORG.Util.Page');// 导入分页类
		$count = $table->where($where)->count();
		$Page = new Page($count,10);
		$list = $table
			->where($where)
			->order($order)
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
	}
	function split($str){
		$str = strip_tags($str);        //该函数始终会剥离 HTML 注释
	    $string = mb_substr($str, 0, 20, 'UTF-8');
	    $string .= (mb_strlen($str, 'UTF-8') > 20)?'...':'';
	    return $string;
	}

	/*---个人资料---*/
	function data(){
		$_SESSION["nav_point"] = 8;  //为选中的导航添加样式
		$_SESSION["two_level_nav"] = "p_data";//为选中的左侧div添加样式

		$user_info = M("user_info");
		$list = $user_info->where(array("user_phone"=>"$_SESSION[phone]"))->find();
		$user = M("user");
		$name = $user->where(array("user_phone"=>"$_SESSION[phone]"))->find();
		$this->assign("list",$list);
		$this->assign("name",$name);
		$this->display();
	}
	function phone(){
		if($_SESSION["phone"] != $_POST["user_phone"]){	//改变了号码
			$m = M("user_info");
			$where["user_phone"] = $_POST["user_phone"];
			$count = $m->where($where)->count();
			if($count > 0){
				echo "yes";		//有重复号码
			}
		}
	}
	function update(){
		$user_info = M('user_info');
		$user = M('user');

		$where["user_sex"] = $_POST["user_sex"];
		$where["department"] = $_POST["department"];
		$where["class"] = $_POST["class"];
		$where["user_phone"] = $_POST["user_phone"];
		$where["QQ"] = $_POST["QQ"];
		$where["blog"] = $_POST["blog"];
		$where["describe"] = $_POST["describe"];
		$user_nomodify = $user_info->where($where)->count();		//如果为1代表没有修改数据
		$info_nomodify = $user->where(array("user_phone"=>"$_SESSION[phone]","user_name"=>"$_POST[user_name]"))->count();//如果为1代表没有修改数据

		$user_modify = $user->where(array("user_phone"=>"$_SESSION[phone]"))->save($_POST);
		$info_modify = $user_info->where(array("user_phone"=>"$_SESSION[phone]"))->save($_POST);
		$_SESSION["phone"] = $_POST["user_phone"];	//如果修改电话号码，重新存session

		if($user_nomodify > 0 && $info_nomodify > 0){	//没有修改数据
			echo "修改成功";
		}else if($user_modify > 0 || $info_modify > 0){	//修改数据并成功
			echo "修改成功";
		}else{					//修改数据没有成功
			echo "修改失败";
		}

	}

	/*------课表管理------*/
	
	function course(){
		$_SESSION["two_level_nav"] = "p_course";//为选中的左侧div添加样式

		$course = M("course");
		$arr = $course->field("First_course,Second_course,Third_course,Fourth_course,Firth_course")
			->where("user_phone=".$_SESSION["phone"])
			->select();
		$num = 0;
		foreach($arr[0] as $key=>$value){		//把我的课表转换成一维数组，下标为数字
			$list1[$num] = $value;
			$num++;
		}
		for($i=0;$i<count($list1);$i++){		//把课表转换成二维数组，传到前台显示
			$list[$i] = explode("=",$list1[$i],5);
		}
		for($i=0;$i<count($list);$i++){
			for($j=0;$j<count($list[$i]);$j++){		//no代表没课，以空字符串的形式显示
				if($list[$i][$j] == "no"){
					$list[$i][$j]="";
				}
			}
		}
		$this->assign("list",$list);
		$this->display();
	}
	function search_str(){
		$newstr = preg_replace('/[@=]/','',$_POST["string"]);
		if($newstr == $_POST["string"]){
			echo "no";		//没有输入@或=
		}else{
			echo $newstr;
		}
	}
	function upadte_course(){
		if($_POST){
			$data=$_POST['course_string'];
			$list=explode("@",$data,25);
			$list[24]=explode('@',$list[24],2);
			$list[24]=$list[24][0];		//去掉最后一个@
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
			for($i=0;$i<5;$i++){	//去掉字符串最后一个等号
				$course_list[$i]=substr($course_list[$i],0,strlen($course_list[$i])-1);
			}
			//写入数据库
			$course=M('course');
			$data=array();
			$data['First_course']=$course_list[0];
			$data['Second_course']=$course_list[1];
			$data['Third_course']=$course_list[2];
			$data['Fourth_course']=$course_list[3];
			$data['Firth_course']=$course_list[4];
			$data['user_phone']=$_SESSION["phone"];
			$phone=$course->where(array("user_phone"=>"$_SESSION[phone]"))->find();
			if($phone['user_phone']){
				if($course->where(array("user_phone"=>"$_SESSION[phone]"))->save($data)){
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
	/*function  member_course(){
		$course=M('course');
		$course_list=array();	//定义分割后的数组
		$course_com_list=array();	//同一节的课程人名合在一块儿
		$list=$course
			->field('march_user.user_name,march_course.First_course,march_course.Second_course,march_course.Third_course,march_course.Fourth_course,march_course.Firth_course')
			->join('march_user ON march_user.user_phone=march_course.user_phone')
			->select();
		for($j=0;$j<count($list);$j++){
			$str=array_chunk($list[$j],1);	//分割课程	把一维数组转换成二维
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
		
		
	}*/

	/*---修改头像---*/
	function photo(){
		$_SESSION["two_level_nav"] = "p_photo";//为选中的左侧div添加样式

		$user_info=M('user_info');
		$avator=$user_info->where(array("user_phone"=>"$_SESSION[phone]"))->select();
		$this->assign('avator',$avator[0]['avator']);
		$this->display();
	}
	function upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 2000000 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg','bmp');// 设置附件上传类型
		$upload->savePath =  './Common/img/photo/photo/';// 设置附件上传目录
		$upload->saveRule=uniqid;//必须能保证生成的文件名是唯一的
		$upload->thumb=true;   //是否需要对图片文件进行缩略图处理
		$upload->thumbMaxWidth='50,200';  //缩略图的最大宽度，多个使用逗号分隔 
		$upload->thumbMaxHeight='50,200';	//缩略图的最大高度，多个使用逗号分隔 
		$upload->thumbPrefix='s_,m_';//缩略图的文件前缀
		$upload->thumbRemoveOrigin=1;
		if(!$upload->upload()) {	// 上传错误
			$error = $upload->getErrorMsg();
			$this->redirect('photo',array(),2,$error.",上传失败，跳转页面中...");
		}else{		// 上传成功
			$info =  $upload->getUploadFileInfo();
			$file = M('user_info');
			$data['avator'] = $info[0]['savename'];		//新图像名称
			$where['user_phone'] = $_SESSION["phone"];
			$user = $file->where($where)->find();	//用户原数据
			$count = $file->where($where)->save($data);	
			if($count > 0){
				unlink("Common/img/photo/photo/m_".$user["avator"]);	//删除原图像
				unlink("Common/img/photo/photo/s_".$user["avator"]);	//删除原图像
				$this->redirect('photo',array(),2,"上传成功，跳转页面中...");
			}
		}
	}

	/*---修改密码---*/
	function password(){
		$_SESSION["two_level_nav"] = "p_pwd";	//为选中的左侧div添加样式

		$this->display();
	}
	function code_pwd(){
		$user=M('user');
		$data["user_phone"] = $_SESSION['phone'];
		$data["user_pwd"] = md5($_POST['user_pwd']);//得到原密码
		$count = $user->where($data)->count();
		if($count>0){
			echo "密码正确";
		}else{
			echo "密码错误";
		}
	}
	function upd_pwd(){
		$user=M('user');
		$data["user_phone"] = $_SESSION['phone'];
		$data["user_pwd"] = md5($_POST['newpwd']);
		$count = $user->save($data);
		if($count > 0){
			echo "修改成功";
		}else{
			echo "修改失败";
		}
	}
		
}
?>