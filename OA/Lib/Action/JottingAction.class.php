<?php
    class JottingAction extends Action{

    	public function index(){
    		$_SESSION["nav_point"] = 3;  //为选中的导航添加样式
    		$_SESSION["two_level_nav"] = "b_myblog";	//为选中的随笔添加样式

    		$_SESSION['sum'] = 5;
    		/*$_SESSION['urls'] = "/";*/
    		$name = $_SESSION['phone'];
	 		$obj = M();
	 		$sql = "select us.Num,us.Jtitle,us.id,us.Title,us.Img,us.Jcontent,us.Jtime,er.user_name FROM march_jottings us
					left join march_user er on  er.user_phone = us.user_phone
					where us.State = 1 and us.user_phone = '".$name."' 
					order by Jtime desc limit 5 ";
		    $sql1 = "select us.Jtime FROM march_jottings us where State = 1  order by Jtime desc limit 1 ";
		    $sql2 = "select left(Jtime,4) str FROM march_jottings where State = 1  group by left(Jtime,4) order by left(Jtime,4) DESC;";
		    $sql3 = "select count(*) FROM march_jottings where State = 1 and user_phone = '".$name."'";
		    $list = $obj->query($sql);
		    $list1 = $obj->query($sql1);
		    $list2 = $obj->query($sql2);
		    $list3 = $obj->query($sql3);
		    for($l = 0;$l<count($list2);$l++){
		    	$list2[$l]["num"] = $l;
		    }
		    $arr = "";
		    for($i = 0;$i<count($list);$i++){
		    	$list[$i]['Jtitle'] = $list[$i]['Jtitle']." . . . ";
		    	$string = "&nbsp&nbsp&nbsp浏览次数：".$list[$i]['Num']; 
		    	$time = substr($list[0]['Jtime'],0,4);
		    	$time1 = $time."年-".substr($list[0]['Jtime'],5,2)."月";
	    		if(empty($list[$i]['Img'])){
	    	      $arr[$i] = '<div style="border:1px solid #D7D6D6;border-radius:5px;width:332px;margin-right:5px;margin-top:20px;"class="divsty"><input  class="yinchang" type="hidden" value="'.$list[$i]['id'].'"><a target=_blank href="__ROOT__/index.php/Grow/show1/idss/'.$list[$i]['id'].'"><div style="margin-top:10px;padding-left:20px;padding-top:10px;float:left;font-size:15px;color:#333333">'.$list[$i]['Title'].'</div><div style="padding-left:20px;padding-top:50px;text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtime'].$string.'</div><div></div><div style="padding:10px 15px 20px 15px; text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtitle'].'</div></a><div style="border-radius:3px;height:43px;background-color:#EAE7E7;border-top:1px solid #D5DCE1;font-size:15px;color:#ADACAC"><span style="padding-left:65px;"><a class="qingling" href="__ROOT__/oa.php/Jotting/reset/shu/'.$list[$i]['id'].'"><img style="width:25px;height:25px;"src="__ROOT__/OA/Common/img/reset.png"/></a></span><span style="margin-left:65px;"><img style="width:2px;height:43px;"src="__ROOT__/OA/Common/img/6.png"/></span><span style="margin-left:65px;"><a href="javascript:void(0);"><img class="san"style="width:25px;height:25px;"src="__ROOT__/OA/Common/img/sanchu.png"/></a></span></div></div>';
	    		}else{
	    		$list[$i]['Img'] = "__ROOT__/OA/Common/img/upFile/".$list[$i]['Img'];
	    			$arr[$i]= '<div style="border:1px solid #D7D6D6;border-radius:5px;width:332px;margin-right:5px;margin-top:20px;"class="divsty"><input  class="yinchang" type="hidden" value="'.$list[$i]['id'].'"><a target=_blank href="__ROOT__/index.php/Grow/show1/idss/'.$list[$i]['id'].'"><div style="margin-top:10px;padding-left:20px;padding-top:10px;float:left;font-size:15px;color:#333333">'.$list[$i]['Title'].'</div><div style="padding-left:20px;padding-top:50px;text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtime'].$string.'</div><div><img style="padding:10px 15px 20px 15px;margin:0px;" src="'.$list[$i]['Img'].'"onload="ReSizePic(this);"/></div><div style="padding:10px 15px 20px 15px; text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtitle'].'</div></a><div style="border-radius:3px;height:43px;background-color:#EAE7E7;border-top:1px solid #D5DCE1;font-size:15px;color:#ADACAC"><span style="padding-left:65px;"><a class="qingling" href="__ROOT__/oa.php/Jotting/reset/shu/'.$list[$i]['id'].'"><img style="width:25px;height:25px;"src="__ROOT__/OA/Common/img/reset.png"/></a></span><span style="margin-left:65px;"><img style="width:2px;height:43px;"src="__ROOT__/OA/Common/img/6.png"/></span><span style="margin-left:65px;"><a href="javascript:void(0);"><img class="san"style="width:25px;height:25px;"src="__ROOT__/OA/Common/img/sanchu.png"/></a></span></div></div>';
	    		} 
		    }
		    $this->assign('arr',$arr);
		    $this->assign('list2',$list2);
		    $this->assign('list3',$list3);
		    $this->assign('arr1', substr($list1[0]['Jtime'],0,4));
		    $this->assign('arr2', substr($list1[0]['Jtime'],5,2));
	 		$this->display();
    	}
    	public function jottinglist(){
    		$_SESSION["nav_point"] = 3;  //为选中的导航添加样式
    		if(!empty($_GET['id'])){
				$_SESSION["two_level_nav"] = "b_myblog";	//为选中的博客或笔记添加样式
			}else{
				$_SESSION["two_level_nav"] = "b_addblog";	//为选中的博客或笔记添加样式
			}
    		
    		$this->display();
    	}
    	public function addjotting(){
    		$name = $_SESSION['phone'];
    		$root = $_POST['root'];
    		$roots = $_POST['roots'];
	 		$shu1 = $_SESSION['sum'];
	 		$obj = M('march_jottings');
	 		$sql = "select us.Num,us.Jtitle,us.id,us.Title,us.Img,us.Jcontent,us.Jtime,er.user_name FROM march_jottings us
					left join march_user er on  er.user_phone = us.user_phone where us.State = 1 and us.user_phone = '".$name."' 
					order by Jtime desc limit ".$shu1.",3";
		    $list = $obj->query($sql);
		    $time = substr($list[0]['Jtime'],0,4);
		    $time1 = $time."年-".substr($list[0]['Jtime'],5,2)."月";
		    $ar = "";
		    for($i = 0;$i<count($list);$i++){
		    	$string = "&nbsp&nbsp&nbsp浏览次数：".$list[$i]['Num']; 
		    	$list[$i]['Jtitle'] = $list[$i]['Jtitle']." . . . ";
		    		if(empty($list[$i]['Img'])){
		    			if($ar==""){
		    				$ar .= '<div style="border:1px solid #D7D6D6;border-radius:5px;width:332px;margin-right:5px;margin-top:20px;"class="divsty"><input  class="yinchang" type="hidden" value="'.$list[$i]['id'].'"><a target=_blank href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'"><div style="margin-top:10px;padding-left:20px;padding-top:10px;float:left;font-size:15px;color:#333333">'.$list[$i]['Title'].'</div><div style="padding-left:20px;padding-top:50px;text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtime'].$string.'</div><div></div><div style="padding:10px 15px 20px 15px; text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtitle'].'</div></a><div style="border-radius:3px;height:43px;background-color:#EAE7E7;border-top:1px solid #D5DCE1;font-size:15px;color:#ADACAC"><span style="padding-left:65px;"><a class="qingling" href="'.$root.'/oa.php/Jotting/reset/shu/'.$list[$i]['id'].'"><img style="width:25px;height:25px;"src="'.$root.'/OA/Common/img/reset.png"/></a></span><span style="margin-left:65px;"><img style="width:2px;height:43px;"src="'.$root.'/OA/Common/img/6.png"/></span><span style="margin-left:65px;"><a href="javascript:void(0);"><img class="san"style="width:25px;height:25px;"src="'.$root.'/OA/Common/img/sanchu.png"/></a></span></div></div>';
		    			}else{
		    				$ar .= '* <div style="border:1px solid #D7D6D6;border-radius:5px;width:332px;margin-right:5px;margin-top:20px;"class="divsty"><input  class="yinchang" type="hidden" value="'.$list[$i]['id'].'"><a target=_blank href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'"><div style="margin-top:10px;padding-left:20px;padding-top:10px;float:left;font-size:15px;color:#333333">'.$list[$i]['Title'].'</div><div style="padding-left:20px;padding-top:50px;text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtime'].$string.'</div><div></div><div style="padding:10px 15px 20px 15px; text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtitle'].'</div></a><div style="border-radius:3px;height:43px;background-color:#EAE7E7;border-top:1px solid #D5DCE1;font-size:15px;color:#ADACAC"><span style="padding-left:65px;"><a class="qingling" href="'.$root.'/oa.php/Jotting/reset/shu/'.$list[$i]['id'].'"><img style="width:25px;height:25px;"src="'.$root.'/OA/Common/img/reset.png"/></a></span><span style="margin-left:65px;"><img style="width:2px;height:43px;"src="'.$root.'/OA/Common/img/6.png"/></span><span style="margin-left:65px;"><a href="javascript:void(0);"><img class="san"style="width:25px;height:25px;"src="'.$root.'/OA/Common/img/sanchu.png"/></a></span></div></div>';
		    			}
		    	      
		    		}else{
		    			$list[$i]['Img'] = $roots.$list[$i]['Img'];
		    			if($ar == ""){
		    				$ar.= '<div style="border:1px solid #D7D6D6;border-radius:5px;width:332px;margin-right:5px;margin-top:20px;"class="divsty"><input  class="yinchang" type="hidden" value="'.$list[$i]['id'].'"><a target=_blank href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'"><div style="margin-top:10px;padding-left:20px;padding-top:10px;float:left;font-size:15px;color:#333333">'.$list[$i]['Title'].'</div><div style="padding-left:20px;padding-top:50px;text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtime'].$string.'</div><div><img style="padding:10px 15px 20px 15px;margin:0px;" src="'.$list[$i]['Img'].'"onload="ReSizePic(this);"/></div><div style="padding:10px 15px 20px 15px; text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtitle'].'</div></a><div style="border-radius:3px;height:43px;background-color:#EAE7E7;border-top:1px solid #D5DCE1;font-size:15px;color:#ADACAC"><span style="padding-left:65px;"><a class="qingling" href="'.$root.'/oa.php/Jotting/reset/shu/'.$list[$i]['id'].'"><img style="width:25px;height:25px;"src="'.$root.'/OA/Common/img/reset.png"/></a></span><span style="margin-left:65px;"><img style="width:2px;height:43px;"src="'.$root.'/OA/Common/img/6.png"/></span><span style="margin-left:65px;"><a href="javascript:void(0);"><img class="san"style="width:25px;height:25px;"src="'.$root.'/OA/Common/img/sanchu.png"/></a></span></div></div>';
		    			}else{
		    			$ar.= ' * <div style="border:1px solid #D7D6D6;border-radius:5px;width:332px;margin-right:5px;margin-top:20px;"class="divsty"><input  class="yinchang" type="hidden" value="'.$list[$i]['id'].'"><a target=_blank href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'"><div style="margin-top:10px;padding-left:20px;padding-top:10px;float:left;font-size:15px;color:#333333">'.$list[$i]['Title'].'</div><div style="padding-left:20px;padding-top:50px;text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtime'].$string.'</div><div><img style="padding:10px 15px 20px 15px;margin:0px;" src="'.$list[$i]['Img'].'"onload="ReSizePic(this);"/></div><div style="padding:10px 15px 20px 15px; text-align:left;font-size:15px;color:#333333">'.$list[$i]['Jtitle'].'</div></a><div style="border-radius:3px;height:43px;background-color:#EAE7E7;border-top:1px solid #D5DCE1;font-size:15px;color:#ADACAC"><span style="padding-left:65px;"><a class="qingling" href="'.$root.'/oa.php/Jotting/reset/shu/'.$list[$i]['id'].'"><img style="width:25px;height:25px;"src="'.$root.'/OA/Common/img/reset.png"/></a></span><span style="margin-left:65px;"><img style="width:2px;height:43px;"src="'.$root.'/OA/Common/img/6.png"/></span><span style="margin-left:65px;"><a href="javascript:void(0);"><img class="san"style="width:25px;height:25px;"src="'.$root.'/OA/Common/img/sanchu.png"/></a></span></div></div>';
		    		}
		    		} 
		    }
		    $_SESSION['sum'] = $_SESSION['sum']+3;
		    echo $ar;
	 	}
	 	//
	 	function qingling(){
	 		$_SESSION['sum'] = 5;
	 	}
	 	function fanhui(){
	 		$_SESSION['sum'] = 5;
	 		if($_SESSION['sum'] == 5){
	 			echo 1;
	 		}
	 	}
		function reset(){
			$shu = $_GET['shu'];
			$sql = "select Title,Img,Jcontent from march_jottings where id=".$shu;
			$obj = M();
			$list = $obj->query($sql);
			$this->assign("shuju",$list);
			$this->assign("shuid",$shu);
			if($list[0]['Img'] ==""){
				$sr = 'photo4.png';
			}else{
				$sr = $list[0]['Img'];
			}
			$this->assign("imgs",$sr);
			$this->display();
		}
    	function submitsu(){
	    	 $obj = M('jottings');
	    	 $data['Title'] = $_POST["title"];
	    	 $data['Jcontent'] = $_POST["content"];
	    	 $data['Jtitle'] = $_POST["content1"];
	    	 $data['Img'] = $_POST["isrc"];
	    	 $data['Jtime'] = date('Y-m-d H:i:s',time());
	    	 $data['user_phone'] = $_SESSION['phone'];
             $i= $obj->add($data);
             if($_POST["content"]!=""){
             	 echo 1;
             }
    	}
    	function sanchu(){
    		$ids = $_POST['ids'];
    		$sql = 'update march_jottings set State = 0 where id='.$ids;
	    	$obj = M();
	    	$list = $obj->query($sql);
    		echo $ids;
    	}
    	function addjotting1(){
    		echo $_SESSION['sum'];
    	}
    	function xiugai(){
	    	 $obj = M('jottings');
	    	 $data['id'] = $_POST['ids'];
	    	 $data['Title'] = $_POST["title"];
	    	 $data['Jcontent'] = $_POST["content"];
	    	 $data['Jtitle'] = $_POST["content1"];
	    	 $data['Img'] = $_POST["isrc"];
	    	 $data['Jtime'] = date('Y-m-d H:i:s',time());
	    	 $data['user_phone'] = $_SESSION['phone'];
             $obj->save($data);
             if($_POST["content"]!=""){
             	 echo 1;
             }
    	} 
    	function get_word($string, $length, $dot = '..',$charset='gbk') {
	       if(strlen($string) <= $length) {
	             return $string;
	        }
		    $string = str_replace(array('　',' ', '&', '"', '<', '>'), array('','','&', '"', '<', '>'), $string);
		    $strcut = '';
		    if(strtolower($charset) == 'utf-8') {
		        $n = $tn = $noc = 0;
		        while($n < strlen($string)) {
		            $t = ord($string[$n]);
		            if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
		                $tn = 1; $n++; $noc++;
		            } elseif(194 <= $t && $t <= 223) {
		                $tn = 2; $n += 2; $noc += 2;
		            } elseif(224 <= $t && $t < 239) {
		                $tn = 3; $n += 3; $noc += 2;
		            } elseif(240 <= $t && $t <= 247) {
		                $tn = 4; $n += 4; $noc += 2;
		            } elseif(248 <= $t && $t <= 251) {
		                $tn = 5; $n += 5; $noc += 2;
		            } elseif($t == 252 || $t == 253) {
		                $tn = 6; $n += 6; $noc += 2;
		            } else {
		                $n++;
		            }
		            if($noc >= $length) {
		                break;
		            }
		        }
		        if($noc > $length) {
		            $n -= $tn;
		        }
		        $strcut = substr($string, 0, $n);
		     } else {
		        for($i = 0; $i < $length; $i++) {
		            $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		        }
		     }
		     return $strcut.$dot;
		}
		/*
		select guide.PostsNumber,guide.PostsTitle,guide.Views,u.PetName,u.PhoneNumber,u.Region,
					case when u.ImgState = '0' then '__ROOT__/Home/Public/UserImg/model.jpg' 
		                    else concat('__ROOT__/Home/Public/UserImg/',u.PhoneNumber,'/',u.ImgName)END as title_img,
					case when u.Sex = '男' then '1' else '0' END as Sex,
					case when guide.PostsState = '0' then '闲' else '忙' END as PostsState,
					u.UserSort,u.Grade,u.Region_pca,u.DetailedAddress,
					top.TopAuditState,substring_index(u.Region_pca,'-',-1) dep,sum(vi.PeoperNumber) indent 
					from vk_posts p 
					inner join vk_posts_guide guide on p.PostsNumber=guide.PostsNumber and guide.AuditState=1  
					inner join vk_user u on p.PhoneNUmber=u.PhoneNumber   
					left join vk_indent vi on vi.PostsNumber=p.PostsNumber 
					left join vk_posts_top top on top.PostsNumber=p.PostsNumber and top.TopAuditState = 1 
					where guide.PostsState != '3' 
					group by (p.PostsNumber) order by top.TopAuditState DESC,top.TopMoney DESC,guide.id DESC
张琦守 2013/10/28 19:58:26
https://210.43.32.51:8081/svn/sunwukong
张琦守 2013/11/10 17:37:08
我是我的情人

张琦守  22:08:00
//截取字符串
	public function split_notice($str){
		$string = $str;
	    $len = 35;
	    //原来的做法
	    // 先清掉 html tag, 以免 html tag 被破壞
	    // $string = strip_tags($string);
	    // $string = mb_substr($string, 0, $len, 'UTF-8');
	    // $string .= (mb_strlen($string, 'UTF-8') < $len)?'...':'';
	    // return $string;

	    // //现在更好的做法
	    $string = strip_tags($string);
	    $string = mb_strimwidth($string, 0, $len, '...', 'UTF-8');
	    return $string;
	}
		*/
    	 //上传图片
		 function upload(){
			if($_POST['leadExcel'] == "true")
			{  
				$Sort=$_POST['LeadSort'];
				$file = $_FILES['inputExcel']['name']; 		     
				$tmp_name = $_FILES['inputExcel']['tmp_name'];			
	  		    $FileSize=filesize($tmp_name);
				//echo"<script>parent.SetSize('FileSize')</script>";
	  		    echo "parent.alert('后重试');";
				if($FileSize>1572864)
				{
					echo"<script>parent.SetSize(".$Sort.")</script>";
					exit();
				}			
				$str = "";
				$filename=explode(".",$file);//把上传的文件名以“.”好为准做一个数组。			
				$time=date("ymdHiss");//去当前上传的时间		
				$filename[0]=$time;//取文件名t替换
				$filePath = 'OA/Common/img/upFile/';		
				mkdir($filePath,"0777");
				$name=implode(".",$filename); //上传后的文件名		
				$uploadfile=$filePath.$name;//上传后的文件名地址 
				$result=move_uploaded_file($tmp_name,$uploadfile);//假如上传到当前目录下			
				if($result)
				{				
					
					$image=$uploadfile;
					$img=GetImageSize($image);
					switch($img[2])
					{
						case 1:		
						$im=@ImageCreateFromGIF($image);	
						break;
						case 2:
						$im=@ImageCreateFromJPEG($image);
						break;
						case 3:
						$im=@ImageCreateFromPNG($image);
						break;
					}
					
					$double=$img[0]/500;
					$heights=$img[1]/$double;
					if($img[0]<500)
					{
						$new=ImageCreateTrueColor($img[0],$img[1]);
						ImageCopyResized($new,$im,0,0,0,0,$img[0],$img[1],$img[0],$img[1]);
					}
					else
					{
						$new=ImageCreateTrueColor(500,$heights);
						ImageCopyResized($new,$im,0,0,0,0,500,$heights,$img[0],$img[1]);
					}
					
					$newname=date("ymdHis").'.jpg';
					$newimg=$filePath.$newname;
					$DBFile=$newname;
					if(ImageJpeg($new,$newimg))
					{
						unlink($uploadfile);
						echo "<script>parent.hide6();parent.SetOk('$Sort','$DBFile');</script>";
						exit();
					}
					else
					{
						echo "<script>parent.alert('图片上传错误，请稍后重试');</script>";
						exit();
					}
					
				}
				else
				{
					echo "<script>parent.hide6();parent.SetError1('$Sort');</script>";
					exit();
				}									
			}
	    }
    }
?>