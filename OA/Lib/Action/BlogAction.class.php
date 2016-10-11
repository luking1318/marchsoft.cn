<?php
class BlogAction extends Action{
	
	//显示我的博客或者我的笔记,0代表笔记，1代表博客
	function myblog(){
		$type=$_GET['type'];
		if($type == 0){
			$_SESSION["nav_point"] = 2;  //为选中的导航添加样式
		}else{
			$_SESSION["nav_point"] = 4;  //为选中的导航添加样式
		}
		$_SESSION["two_level_nav"] = "b_myblog";	//为选中的博客或笔记添加样式
		
		$condition['march_article.user_phone']=$_SESSION['phone']; 
		$condition['march_article.article_type']=$type;
		$this->produce_result($condition, $list, $page);//查询结果
		for($i = 0;$i<count($list);$i++){
			$list[$i]["article_title"] = $this->split($list[$i]["article_title"]);//截取字符串
		}
		$this->assign("list",$list);
		$this->assign("page",$page);
		$this->assign("type",$type);
		$this->display();
	}
	
	//添加或修改博客、笔记
	function add_edit(){
		$type=$_GET['type'];
		if($type == 0){
			$_SESSION["nav_point"] = 2;  //为选中的导航添加样式
		}else{
			$_SESSION["nav_point"] = 4;  //为选中的导航添加样式
		}
		if(!empty($_GET['id'])){
			$_SESSION["two_level_nav"] = "b_myblog";	//为选中的博客或笔记添加样式
		}else{
			$_SESSION["two_level_nav"] = "b_addblog";	//为选中的博客或笔记添加样式
		}

		$sort=M('sort');
		$sortinfo=$sort->select();
		$this->assign("sort",$sortinfo);
		$this->assign("type",$type);
		if(!empty($_GET['id'])){
			$tags= array();
			$article= D('article');
			$list=$article->find($_GET["id"]);
			if($list['article_tags'])
			{
				
				$tags=split(',', $list['article_tags']);
			}
			$this->assign("tags",$tags);
			$this->assign("id",$_GET['id']);
		    $this->assign("list",$list);
		}
		$this->display();
	}

	//添加或修改博客、笔记
	function submit(){
	    $article = M('article');
	    $data["article_title"] = $_POST['title'];
		$data["article_content"] = $_POST['content'];
		$data["article_sort"] = $_POST['sort'];	
		$data["article_tags"] = $_POST['tags'];
		
		if($article->where("article_id=".$_POST["id"])->count()){//成立更新数据
			$data["article_id"] = $_POST["id"];
			$article->save($data);
			echo "更新成功";
		}else{
			$data["user_phone"] = $_SESSION['phone'];		//添加数据
			$data["article_time"] = date('Y-m-d');
			$data["article_type"] = $_POST["type"];
			$count = $article->add($data);
			if($count > 0){
				echo "添加成功";
			}else{
				echo "添加失败";
			}
		}
		
	}
    
	//删除笔记或者博客
	function del(){
	    $m = M('article');
	    $count = $m->delete($_POST['article_id']);
    	if($count > 0){
    		echo "删除成功";
    	}else{
    		echo "删除失败";
    	}
    }
	
	/*--------------------成员笔记--------------------*/
	function blog(){
		$_SESSION["two_level_nav"] = "p_photo";	//为选中的博客或笔记添加样式
		//session值需要登录时定义    $_SESSION['phone']    $_SESSION['login']
		//区分是博客还是笔记 type=0笔记，type=1 博客 
		if(isset($_GET['type'])){
		    $type = $_GET['type'];
		}
		else{	//默认值
			$type = 1;
		}
		$condition['march_article.article_type']=$type;
		$this->produce_result($condition, $list, $page);//查询结果
		for($i = 0;$i<count($list);$i++){	//截取字符串
			$list[$i]["article_title"] = $this->split($list[$i]["article_title"]);
		}
		$this->assign("list",$list);
		$this->assign("page",$page);
		$this->assign("type",$type);
		$this->display();
	}
	
	/*---------------------笔记统计-----------------------*/
    function countblog(){
    	$_SESSION["two_level_nav"] = "b_countblog";	//为选中的博客或笔记添加样式

    	import("ORG.Util.Page");	//导入分页类
		$note = M('result');
	    $count = $note->count();
		$p = new Page($count,8);
        $page = $p->show();
        $list = $note->limit($p->firstRow.','.$p->listRows)->order('result_id desc')->select();	
		$this->assign("list",$list);
		$this->assign("page",$page);
    	$this->display();
    }

    //删除一条统计结果
    function delresult(){
    	 echo $id= $_GET['id'];
    	 $result=M('result');
    	 $resultinfo=M('result_info');
    	 $result->delete($id);
    	 $resultinfo->where('pid='.$id)->delete();
    	 $this->redirect('checkcount', array(),0,'数据删除成功，页面跳转中。。');
    }
    //显示统计的详细结果
    function countinfo(){
    	import("ORG.Util.Page");
        $pid= $_GET['id'];
        $info=M('result_info');
        $count= $info->where('pid='.$pid)->count();
        $page = new Page($count,6);
        $list = $info
        	->limit($page->firstRow.','.$page->listRows)
        	->where('pid='.$pid)
        	->order('amount desc')
        	->select();
        $this->assign("page",$page->show());
        $this->assign("result",$list);
    	$this->display();
    }
	
    /*--------------------管理员统计笔记-------------------*/
    function countnote(){
    	$this->display();
    }

    //笔记管理员直接看到的笔记统计结果，并保存数据库
    function countresult()
    {
    	$start=$_POST['start'];
        $end=$_POST['end'];
	    $sql="select count(*),march_article.user_phone,march_user.user_name  from march_article inner join march_user "
	          ." on march_user.user_phone = march_article.user_phone where march_article.article_time <="."'".$end."'"
	          ." and march_article.article_time >="."'".$start."'"." group by user_phone";
	    $result = M()->query($sql);
        if(count($result)>0)
        {
        	//添加一条记录
	        $note=M('result');
	        $count=M('result_info');
		    $note->starttime=$start;
		    $note->endtime= $end;
		    $note->add();
		    
		    //获取刚添加的记录的	id
	        $info=$note->order('result_id desc')->find();
	        $id=$info['result_id'];  
	       
	        //把查询到的笔记提交情况逐一提交数据库
	        for($i=0;$i<count($result);$i++)
	        {
	        	$count->pid=$id;
	        	$count->username=$result[$i]['user_name'];
	        	$count->amount=$result[$i]['count(*)'];
	        	$count->add();	
	        }
        }

	    $this->assign("result",$result);
    	$this->display();
        
    }
	
    
    
    function produce_result(&$condition,&$list,&$page)
    {
    	import("ORG.Util.Page");// 导入分页类
		$article=M('article');
	    $count=$article->where($condition)->count();	
		$p = new Page($count,8);   
        $page = $p->show();
		$list=$article
			->field('march_user.user_name,march_article.article_title,march_article.article_id,march_article.article_content,march_article.article_time,march_article.article_content,march_article.article_type,march_sort.sort_name')
			->join('march_user ON march_user.user_phone = march_article.user_phone')
			->join('march_sort ON march_article.article_sort=march_sort.idmarch_sort')
			->limit($p->firstRow.','.$p->listRows)
			->order('march_article.article_id desc')
			->where($condition)
			->select();	
    }
    function split($str){
		$str = strip_tags($str);        //该函数始终会剥离 HTML 注释
	    $string = mb_substr($str, 0, 20, 'UTF-8');
	    $string .= (mb_strlen($str, 'UTF-8') > 20)?'...':'';
	    return $string;
	}
}
?>