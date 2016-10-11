<?php
	class LectureAction extends Action{
		function index(){
			$sort=M('sort');
			$list=$sort->select();
			$this->assign('list',$list);
			$this->display();
		}
		//分类查询
		function content(){
			import("ORG.Util.Page");							//导入分页类
			$lecture=M("lecture");
			if($_GET[id]!="0"&&!isset($_GET[str])){									//判断是分类id不为0
				$count=$lecture->where('lecture_sort='.$_GET[id])->count();	
			}else if($_GET[id]=="0"){							//判断是全部分类id为0
				$count=$lecture->count();
			}else if(isset($_GET[str])){								//判断是搜索框搜索的
				$count=$lecture->where($this->search_handle($_GET[str]))->count();
			}
			$page=new Page($count,10);
			$show=$page->show();
			$list=$lecture
			->where($_GET[id]?("lecture_sort=".$_GET[id]):($this->search_handle($_GET[str])))
			->limit($page->firstRow.','.$page->listRows)->order("lecture_date desc")->select();
			
			$this->assign("show",$show);
			$this->assign("list",$list);
			$this->display();
		}
		
		//对要检索的字段进行处理
		function search_handle($str){
			$search=preg_replace('/ +/',' ',$str);			//把多个空格替换成一个空格
			$arr=explode(' ',$search);  					//分割字符串
			for($i=0;$i<count($arr);$i++)
			{
				$maplike[]=array('LIKE',"%".$arr[$i]."%");	 
				$maplike[]='or';							//使查询条件数组中的关系为or 默认and 
			}
			  
			$map['march_lecture.lecture_theme'] = $maplike;
			$map['march_lecture.lecture_content'] = $maplike;
			$map['_logic'] = 'or';
			return $map;
		}
	}
?>