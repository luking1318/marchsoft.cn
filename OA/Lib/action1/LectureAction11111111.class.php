<?php
	class LectureAction extends Action{
		function index(){
			$sort=M("sort");
			$list=$sort->select();
			
			$this->assign("list",$list);
			$this->display();
		}
		//查询讲课内容
		function lect_sel(){
			import("ORG.Util.Page");// 导入分页类
			$lecture=M("lecture");
			if($_GET[id]=="0"){
				$count=$lecture->count();
			}else{
				$count=$lecture->where('lecture_sort='.$_GET[id])->count();	
			}
			
			$page=new Page($count,6);
			$show=$page->show();
			if($_GET[id]=="0"){
				$list=$lecture->limit($page->firstRow.','.$page->listRows)->select();
			}else{
				$list=$lecture->where('lecture_sort='.$_GET[id])->limit($page->firstRow.','.$page->listRows)->select();
			}
			
			//权限验证
			$lecture=M('authority');
			$alist=$lecture->where(array("user_phone"=>"$_SESSION[phone]","module_id"=>"001"))->find();
			
			$this->assign("list",$list);
			$this->assign('show',$show);
			$this->assign("alist",$alist['user_phone']);
			$this->assign('session',$_SESSION[phone]);
			$this->display();
		}
		
		//查找讲课基础分类
		function add_lect_sel(){
			$sort=M("sort");
			$list=$sort->select();
			$this->assign("list",$list);
			$this->display("add_lect");
		}
		
		//添加讲课
		function add_lect(){
		$lecture=M("lecture");
			if($_POST){
				$allowed=array('application/octet-stream');	//存放上传格式
				if(in_array($_FILES['lecture_file']['type'],$allowed)){		//检验上传格式是否正确
					$_POST['lecture_file']=$_FILES['lecture_file']['name'];
				}
				if($lecture->add($_POST)){
					if($this->upfile()==1){
						$this->redirect('index', array(),1,'添加成功，页面跳转中。。');
					}else if($this->upfile()==2){
						$this->redirect('index', array(),1,'课件格式不符合，页面跳转中。。');
					}else if($this->upfile()==3){
						$this->redirect('index', array(),1,'没有上传课件，页面跳转中。。');
					}else{
						//echo $this->upfile();exit;
						$this->redirect('index', array(),1,'课件添加失败，页面跳转中。。');
					}
				}else{
					$this->redirect('add_lect_sel', array(),1,'添加失败，页面跳转中。。');
				}
			}
		}
		
		//上传大文件
		function upfile(){
			$filename=$_FILES['lecture_file'];
			$allowed=array('application/octet-stream');
			if(isset($_FILES)){
				if(in_array($filename['type'],$allowed)){
					//返回路径数组
					$path=pathinfo($filename['name']);
					$length=@filesize($filename['size']);
					if($length>=12000*1024*1024)
					{
						return 0;
					}
					//写入文件地址
					$path0=iconv('UTF-8','GBK',$path['basename']);	//转换编码格式
					$filename0='./Common/uploadfile'."//".$path0;  //在你的目录下要有这个K文件夹   其实还可以判断来动态创建文件夹   这个以后有空写个详细的分享给大家
					//开始读取文件
					
					$handle=fopen($filename['tmp_name'],"r+");
					$content="";
					$bb=0;
					do{
					
						$data=@fread($handle,506*1024);
						$bb+=1;
						if(strlen($data)===0)
						{
							$bb=0;
							break;  //读取不到内容退出循环
						}
						$content=$data;  //每读取一次写入一次后重新赋值
						//写入文件
					
						if(!$handle0=fopen($filename0,"a"))
						{
							return 5;
						}
						if(!@fwrite($handle0,$content))
						{
							return 6;
						}		
					}while(true);
					@rewind($handle0);
					@fclose($handle);
					return 1;
				}else{
					return 2;	//课件格式不符合上传规则
				}
			}else{
				return 3;	//没有上传课件
			}
		}
		
		//删除单个讲课
		function sel_del(){
			$lecture=M("lecture");
			if($_POST){
				$file=$lecture->field('lecture_file')->where($_POST)->find();
				if($lecture->where($_POST)->delete()){
					$path0=iconv('UTF-8','GBK',$file['lecture_file']);	//转换编码格式
					if(@unlink("Common/uploadfile/".$path0)){
						echo "1";
					}else{
						echo "0";
					}
				}else{
					echo "0";
				}
			}
		}
		
		//删除选择项
		function del_all(){
			$lecture=M("lecture");
			if($_POST){
				$list=explode(",",$_POST['idmarch_lecture']);
				$count=0;
				foreach($list as $jet){
					if($lecture->where('idmarch_lecture='.$jet)->delete()){
						$count++;
					}
				}
				if($count==count($list)){
					echo "1";
				}else{
					echo "0";
				}
			}
		}
	}
?>