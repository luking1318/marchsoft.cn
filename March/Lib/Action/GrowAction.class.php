<?php

	 class GrowAction extends Action{
	 	public function index(){
	 		$_SESSION['sum'] = 6;
	 		$obj = M('march_jottings');
	 		$sql = "select us.Num,us.Jtitle,us.id,us.Title,us.Img,us.Jcontent,us.Jtime,er.user_name FROM march_jottings us
					left join march_user er on  er.user_phone = us.user_phone where us.State = 1 
					order by Jtime desc limit 6";
		    $sql1 = "select us.Jtime FROM march_jottings us  where State = 1 order by Jtime desc limit 1";
		    $sql2 = "select left(Jtime,4) str FROM march_jottings where State = 1  group by left(Jtime,4) order by left(Jtime,4) DESC;";
		    $sql3 = "select count(*) FROM march_jottings where State = 1";
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
		    	$time = substr($list[$i]['Jtime'],0,4);
		    	$time1 = $time."年-".substr($list[$i]['Jtime'],5,2)."月";
		    	$string = "&nbsp&nbsp&nbsp浏览次数：".$list[$i]['Num'];
		    	if($i%3!=0){
		    		if(empty($list[$i]['Img'])){
		    	      $arr[$i] = '<div  class = "divs1"style="width:281px;margin-right:10px;margin-top:25px"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank href="__ROOT__/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'" class="pic_a"><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    		}else{
		    			$list[$i]['Img'] = "__ROOT__/OA/Common/img/upFile/".$list[$i]['Img'];
		    			$arr[$i]= '<div  class = "divs1"style="width:281px;margin-right:10px;margin-top:25px"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank href="__ROOT__/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'"  class="pic_a"><img  src="'.$list[$i]['Img'].'"onload="ReSizePic(this)"/><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    		}
		    	}else{
		    		if(empty($list[$i]['Img'])){
		    	      $arr[$i] = '<div  class = "divs"style="width:281px;margin-right:10px;margin-top:25px"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank  href="__ROOT__/index.php/Grow/show1/idss/'.$list[$i]['id'].'"name="'.$time.'"  class="pic_a"><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    		}else{
		    			$list[$i]['Img'] = "__ROOT__/OA/Common/img/upFile/".$list[$i]['Img'];
		    			$arr[$i]= '<div  class = "divs"style="width:281px;margin-right:10px;margin-top:25px"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank  href="__ROOT__/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'" href="###" class="pic_a"><img style="" src="'.$list[$i]['Img'].'"onload="ReSizePic(this);"/><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    		}
		    	}	 
		    }
		    $this->assign('arr',$arr);
		    $this->assign('list2',$list2);
		    $this->assign('list3',$list3);
		    $this->assign('arr1', substr($list1[0]['Jtime'],0,4));
		    $this->assign('arr2', substr($list1[0]['Jtime'],5,2));
	 		$this->display();
	 	}
	 	public function addjotting(){
	 		$root = $_POST['root'];
	 		$shu1 = $_SESSION['sum'];
	 		$roots = $_POST['roots'];
	 		$obj = M('march_jottings');
	 		$sql = "select us.Num,us.Jtitle,us.id,us.Title,us.Img,us.Jcontent,us.Jtime,er.user_name FROM march_jottings us
					left join march_user er on  er.user_phone = us.user_phone where us.State = 1 
					order by Jtime desc limit ".$shu1.",3";
		    $list = $obj->query($sql);
		    $ar = "";
		    for($i = 0;$i<count($list);$i++){
		    	$list[$i]['Jtitle'] = $list[$i]['Jtitle']." . . . ";
		    	$string = "&nbsp&nbsp&nbsp浏览次数：".$list[$i]['Num'];
		    	$time = substr($list[$i]['Jtime'],0,4);
		   		$time1 = $time."年-".substr($list[$i]['Jtime'],5,2)."月";
		   		if($i%3!=0){
		    		if(empty($list[$i]['Img'])){
		    			if($ar==""){
		    				$ar .= '<div  class = "divs1"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank  href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'"  class="pic_a"><div><div class="divs2" ><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    			}else{
		    				$ar .= '* <div  class = "divs1"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank  href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'" class="pic_a"><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    			}
		    	      
		    		}else{
		    			$list[$i]['Img'] = $roots.$list[$i]['Img'];
		    			if($ar == ""){
		    				$ar.= '<div  class = "divs1"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank  href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'"  class="pic_a"><img style="" src="'.$list[$i]['Img'].'"onload="ReSizePic(this);"/><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    			}else{
		    			     $ar.= ' * <div  class = "divs1"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank  href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'" href="###" class="pic_a"><img style="" src="'.$list[$i]['Img'].'"onload="ReSizePic(this);"/><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    		     }
		    		}
		    	}else{
		    		if(empty($list[$i]['Img'])){
		    			if($ar==""){
		    				$ar .= '<div  class = "divs"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank  href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'"  class="pic_a"><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    			}else{
		    				$ar .= '* <div  class = "divs"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank  href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'" class="pic_a"><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    			}
		    	      
		    		}else{
		    			$list[$i]['Img'] = $roots.$list[$i]['Img'];
		    			if($ar == ""){
		    				$ar.= '<div  class = "divs"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank  href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'"  class="pic_a"><img style="" src="'.$list[$i]['Img'].'"onload="ReSizePic(this);"/><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    			}else{
		    			     $ar.= ' * <div  class = "divs"><a name="'.$time1.'" ><input id="teshu1" class="yinchang" type="hidden" value="'.$list[$i]['Jtime'].'"></a><a target=_blank  href="'.$root.'/index.php/Grow/show1/idss/'.$list[$i]['id'].'" name="'.$time.'" href="###" class="pic_a"><img style="" src="'.$list[$i]['Img'].'"onload="ReSizePic(this);"/><div><div class="divs2"><b>'.$list[$i]['Title'].'</b></div><br><div style="padding-left:20px;padding-top:30px;text-align:left;color:#AAAAAA">'.$list[$i]['Jtime'].$string.'</div><div style="padding-right:10px;padding-left:20px;padding-top:10px;text-align:left;font-size:15px;color:#333333">&nbsp &nbsp'.$list[$i]['Jtitle'].'</div><div style="border-top:1px solid #D5DCE1;margin-top:20px;padding:20px;text-align:left;font-size:15px;color:#ADACAC">'.$list[$i]['user_name'].'</div></div></a></div>';
		    		     }
		    		}
		    	}
		     }
		     $_SESSION['sum'] = $_SESSION['sum']+3;
		     echo $ar;
	 	}
	 	function addjotting1(){
	 		echo $_SESSION['sum'];
	 	}
	 	function show1(){
	 		$ids = $_GET['idss'];
	 		$obj = M();
	 		$sql = "select us.Num,us.id,us.Title,us.Img,us.Jcontent,us.Jtime,er.user_name FROM march_jottings us
					left join march_user er on  er.user_phone = us.user_phone where us.State = 1 and id=".$ids;
			$sql1 = "select Num from march_jottings where id = ".$ids;
			$list = $obj->query($sql);
	 		$list1 = $obj->query($sql1);
	 		$list1[0]['Num']++;
	 		$list[0]['Num']++;
	 		$sql2 = "update march_jottings set Num = ".$list1[0]['Num']." where id = ".$ids;
	 		$obj->query($sql2);
	 		if($list[0]['Img']==""){
	 			$list[0]['Img']=1;
	 		}
	 		$this->assign('result',$list);
	 		$this->display();
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
	 }
?>