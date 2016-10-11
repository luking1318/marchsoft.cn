<?php
	class EditphotoAction extends Action{
		function index(){
			$user_info=M('user_info');
			$avator=$user_info->field('avator')->where(array("user_phone"=>"$_SESSION[phone]"))->select();
			$this->assign('avator',$avator[0]['avator']);
			$this->display();
		}
		
	function upload(){
			if($_FILES){
				$file=$this->up();
				if(isset($file)){
					if($this->file_s($file,$_POST[phone])){
						redirect('index');
					}else{
						$this->redirect('index', array(),2,'      上传失败，跳转页面中...');
					}
				}else{
					$this->redirect('index', array(),2,'      上传失败，跳转页面中...');
				}
			}else{
				$this->redirect('index', array(),2,'			上传失败，跳转页面中...');
			}
		}
		
		function up(){
			if($_FILES[file][size]<=2000000){
				import('ORG.Net.UploadFile');
		        $upload=new UploadFile();
		        $upload->maxSize= '2000000';
		        $upload->savePath='./Common/img/photo/photo/';	//涓婁紶鏂囦欢鐨勪繚瀛樿矾寰�  
		        $upload->saveRule=uniqid;//涓婁紶鏂囦欢鐨勬枃浠跺悕淇濆瓨瑙勫垯
		        $upload->allowExts=explode(',', 'jpg,gif,png,jpeg,txt'); //鍑嗚涓婁紶鐨勬枃浠剁被鍨�  
		        $upload->thumb=true;   //鏄惁寮�鍚浘鐗囨枃浠剁缉鐣�
				$upload->thumbMaxWidth='50,200';  //浠ュ瓧涓叉牸寮忔潵浼狅紝濡傛灉浣犲笇鏈涙湁澶氫釜锛岄偅灏卞湪姝ゅ锛岀敤,鍒嗘牸锛屽啓涓婂涓渶澶у
				$upload->thumbMaxHeight='50,200';	//鏈�澶ч珮搴�
				$upload->thumbPrefix='s_,m_';//缂╃暐鍥炬枃浠跺墠缂�
				$upload->thumbRemoveOrigin=1;  //濡傛灉鐢熸垚缂╃暐鍥撅紝鏄惁鍒犻櫎鍘熷浘
		        if(@$upload->upload()){
		            $info=@$upload->getUploadFileInfo();
		            return $info;
		        }else{
		            //$this->error($upload->getErrorMsg());//涓撻棬鐢ㄦ潵鑾峰彇涓婁紶鐨勯敊璇俊鎭殑   
		            $error=@$upload->getErrorMsg();
		            echo $error;
		        }
			}
		}
		
		function file_s($data,$phone){
			$file=M('user_info');
			$data['avator']=$data[0]['savename'];
			$name_photo=$file->where(array('user_phone'=>"$phone"))->find();
			if($file->where(array("user_phone"=>"$phone"))->save($data)){
				@unlink("Common/img/photo/photo/m_".$name_photo['avator']);
				@unlink("Common/img/photo/photo/s_".$name_photo['avator']);
				return true;
			}
			else{
				return false;
			}
		}
	}
?>