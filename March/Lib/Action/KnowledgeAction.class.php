<?php
class KnowledgeAction extends Action {
    //知识库首页
    public function blog(){
    	//成员博客 
		$where["user_name"] = array("neq","");
		$where["blog"] = array("neq","");
		$count = M("user")
			->join("march_user_info on march_user.user_phone = march_user_info.user_phone")
			->where($where)
			->count();
		import("ORG.Util.Page");// 导入分页类
		$page = new Page($count,40);
		$list = M("user")
			->join("march_user_info on march_user.user_phone = march_user_info.user_phone")
			->where($where)
			->limit($page->firstRow.",".$page->listRows)
			->order("level")
			->select();
		$this->assign("list",$list);
		$this->assign("page",$page->show());
		$this->display();
    }
	public function knowledge(){
		//知识库
		$sort=D('sort')->select();//读取分类列表
		$this->assign("sort",$sort);
		$this->display();
	}
	
	//文章列表      分两种 （1）全部分类  （2）有名字的分类
	public function klist(){
		if($_GET['sort'] == '0000000000')//全部分类
		{
			$this->produce_result($map, $list, $page,$count);
		}
		else 
		{
			$map['march_article.article_sort']=$_GET['sort'];
			$this->produce_result($map, $list,$page,$count);
		}
		$this->changearr($list);//处理读取数组的内容  
		$this->assign("count",$count);	
		$this->assign("list",$list);
		$this->assign("page",$page);		
		$this->display();

	}
	
	//显示文章
	public function show()
	{
		if($_GET){
			$article = M('article');
			$result=$article
				->field('march_user.user_name,march_article.article_title,march_article.article_id,march_article.article_time,march_article.article_tags,march_article.article_num,march_sort.sort_name,march_user_info.avator,march_user_info.blog,march_article.article_content')
				->join('march_user ON march_user.user_phone = march_article.user_phone')
				->join('march_user_info ON march_user_info.user_phone = march_article.user_phone')
				->join('march_sort ON march_article.article_sort=march_sort.idmarch_sort')
				->where('march_article.article_id='.$_GET['id'])
				->select();	
			
				if($result){
				//更新数据库浏览次数 
				$sql ="update march_article set article_num = article_num+1 where article_id ='".$_GET['id']."'";
				$article->query($sql);
				$this->assign('result',$result);
				$this->display();
			}else{
				//跳转出错页面
			}
		}
		else{
			echo "页面出现错误。";
		}
	}
	
	//显示查询结果列表
	public function searchlist()
	{
		$this->produce_condition($_GET['search'], $map);//生成查询条件
		$this->produce_result($map, $list,$page,$count); //生成查询结果
		$this->changearr($list);//处理读取数组的内容  	
		$this->assign("count",$count);
		$this->assign("list",$list);
		$this->assign("page",$page);	
		$this->display();
		
	}
	
	//生成查询结果
	function produce_result(&$map,&$list,&$page,&$count)
	{
		import("ORG.Util.Page");// 导入分页类
		$article=M('article');
		$count=$article->where($map)->count();	
		$p=new Page($count,10);   
	    $page = $p->show();
	    $list=$article
				->field('march_user.user_name,march_article.article_title,march_article.article_id,march_article.article_time,march_article.article_tags,march_article.article_num,march_sort.sort_name,march_user_info.avator,march_user_info.blog,march_article.article_content')
				->join('march_user ON march_user.user_phone = march_article.user_phone')
				->join('march_user_info ON march_user_info.user_phone = march_article.user_phone')
				->join('march_sort ON march_article.article_sort=march_sort.idmarch_sort')
				->where($map)
				->limit($p->firstRow.','.$p->listRows)
				->order('march_article.article_id desc')
				->select();	
	}
	
	//生成查询条件
	function produce_condition($search,&$map)
	{
		$search=preg_replace('/ +/',' ',$search);//把多个空格替换成一个空格
		$arr=split(' ',$search);  //分割字符串
		for($i=0;$i<count($arr);$i++)
		{
			$maplike[]=array('LIKE',"%".$arr[$i]."%");	
			$maplike[]='or';//使查询条件数组中的关系为or 默认and    
		}
		
		
		$map['march_article.article_title'] = $maplike;
		$map['_logic'] = 'or';
		$map['march_article.article_tags'] = $maplike;
	}
	
	//处理数据库读取出来的数据，（1）去掉标签，接触前150个字符，在前台显示 （2）处理标签数据 生成数组
	function changearr(&$list)
	{
		//引用传递参数
		for($i=0;$i<count($list);$i++){
			//处理文章的内容
			$con=strip_tags($list[$i]['article_content']);//去掉html标签
			$con=$this->msubstr($con, 0,150,'utf-8')."....";//截取字符串
			$list[$i]['con']=$con; //把截取的字符串添加到数组中
			
			//处理文章的标签
			$tags=split(',',$list[$i]['article_tags']);
			$list[$i]['tags']=$tags;
		}
	}
	
	//处理字符串，接触一定数量的字符长度，在结尾加上省略号  （因为加载不上，只有自己复制过来了）
    function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
	{
		    if(function_exists("mb_substr"))
		        return mb_substr($str, $start, $length, $charset);
		    elseif(function_exists('iconv_substr')) {
		        return iconv_substr($str,$start,$length,$charset);
		    }
		    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		    preg_match_all($re[$charset], $str, $match);
		    $slice = join("",array_slice($match[0], $start, $length));
		    if($suffix) return $slice."…";
		    return $slice;
	}
	
}
?>