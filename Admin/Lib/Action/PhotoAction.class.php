<?php 
class PhotoAction extends BaseAction{
	function index(){
		$photo=M('photo');
		$list=$photo->select();
		$this->assign('list',$list);
		$this->display();
	}
	
	//创建相册
	function create_pho(){
		$photo=M("photo");
		if($_POST[photo_name]!="undefined"||$_POST[photo_name]!=null){
			$data['photo_name']=$_POST[photo_name];
		}else{
			$data['photo_name']="未命名相册";
		}
		if($photo->add($data)){
			echo "1";
		}
		else{
			echo "0";
		}
	}
	//删除相册
	function del_photo(){
		$photo=M('photo_list');
		if($_POST){
			if($name_list=$photo->where(array("parent_photo"=>"$_POST[idmarch_photo]"))->select()){
				if($photo->where(array("parent_photo"=>"$_POST[idmarch_photo]"))->delete()){//删除数据库中的图片
					//删除文件中的图片
					foreach($name_list as $vo){
						@unlink("Common/img/photo/m_".$vo['photo_name']);
						@unlink("Common/img/photo/s_".$vo['photo_name']);
					}
					
					$photo=M('photo');
					if($photo->where(array("idmarch_photo"=>"$_POST[idmarch_photo]"))->delete()){
						echo "1";
					}
					else{
						echo "2";
					}
				}else{
					echo "3";
				}
			}else{
				$photo=M('photo');
				if($photo->where(array("idmarch_photo"=>"$_POST[idmarch_photo]"))->delete()){
					echo "1";
				}
				else{
					echo "2";
				}
			}
		}else{
			echo "4";
		}
	}
	
	//修改相册名称
	function upl_pho(){
		$photo=M('photo');
		if($_POST){
			if($photo->save($_POST)){
				echo "1";
			}else{
				echo "0";
			}
		}else{
			echo "0";
		}
	}
	
	//打开相册
	function open_photo(){
		$photo=M('photo_list');
		if($_GET){
			if($list=$photo->where(array("parent_photo"=>"$_GET[id]"))->select()){
					$this->assign("list",$list);
					$this->display();
				}else{
					$this->assign("title","赶快添加几张照片吧......");
					$this->display();
			}
		}else{
			echo "系统出错！";
		}
	}
	
	//删除照片
	function del_pho(){
		$photo=M('photo_list');
		if($_POST){
			$name=$photo->where(array("idmarch_photo_list"=>"$_POST[idmarch_photo_list]"))->find();
			if($photo->where(array("idmarch_photo_list"=>"$_POST[idmarch_photo_list]"))->delete()){
				@unlink("Common/img/photo/m_".$name['photo_name']);
				@unlink("Common/img/photo/s_".$name['photo_name']);
				echo "1";
			}else{
				echo "0";
			}
		}else{
			echo "0";
		}
	}
	
	//设置为封面
	function set_cover(){
		$photo=M('photo');
		if($_POST){
			if($photo->save($_POST)){
				echo "1";
			}else{
				echo "2";
			}
		}else{
			echo "3";
		}
	}
	
	//上传照片
	function upload(){
		if ($_GET[pid]){
				import('ORG.Net.UploadFile');
		        $upload=new UploadFile();
		        $upload->maxSize='2000000';
		        $upload->savePath='./Common/img/photo/';	//上传文件的保存路径  
		        $upload->saveRule=uniqid;//上传文件的文件名保存规则
		        $upload->allowExts=explode(',', 'jpg,gif,png,jpeg,rar,zip,txt'); //准许上传的文件类型  
		        $upload->thumb=true;   //是否开启图片文件缩略
				$upload->thumbMaxWidth='200,900';  //以字串格式来传，如果你希望有多个，那就在此处，用,分格，写上多个最大宽
				$upload->thumbMaxHeight='200,500';	//最大高度
				$upload->thumbPrefix='s_,m_';//缩略图文件前缀
				$upload->thumbRemoveOrigin=1;  //如果生成缩略图，是否删除原图
		        if(@$upload->upload()){
		        	$info=@$upload->getUploadFileInfo();
			        //$tempFile = $_FILES['Filedata']['tmp_name'];
					//$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
					$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
					$photo=M("photo_list");
					$data['parent_photo']=$_GET[pid];
					$data['photo_name']=$info[0]['savename'];
					if(@$photo->add($data)){
						echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
					}
					
		        }else{
		            //$this->error($upload->getErrorMsg());//专门用来获取上传的错误信息的   
		            $error=$upload->getErrorMsg();
		            echo $error;
		        }
		}
		$photo=M('photo');
		$list=$photo->select();
		$this->assign("list",$list);
	    $this->display();
	}
	
}

?>