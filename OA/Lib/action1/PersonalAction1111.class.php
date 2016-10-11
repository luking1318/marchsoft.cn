<?php 
	class PersonalAction extends Action{
		function index(){
			$news=M("news");
			$article=M('article');
			$list_imp=array();			//大事记
			$list_news=array();			//小组新闻
			$list_notice=array();		//通知公告
			$list_blog=array();			//博客
			$list_note=array();			//笔记
			$count=0;
			//最新动态查询
			$list_all=$news->field('news_title,news_type,news_date,idmarch_news')->limit(20)->order('news_date desc')->select();
			//知识库查询
			$list_article=$article->field('article_title,article_type,article_time,article_id')->limit(20)->order('article_time desc')->select();
			foreach($list_all as $array1){	//最新动态分类
				if($array1['news_type']=='1'){
					$list_news[$count]['news_title']=$array1['news_title'];
					$list_news[$count]['news_date']=$array1['news_date'];
					$list_news[$count]['idmarch_news']=$array1['idmarch_news'];
					$count++;
				}else if($array1['news_type']=='2'){
					$list_notice[$count]['news_title']=$array1['news_title'];
					$list_notice[$count]['news_date']=$array1['news_date'];
					$list_notice[$count]['idmarch_news']=$array1['idmarch_news'];
					$count++;
				}else if($array1['news_type']=='3'){
					$list_imp[$count]['news_title']=$array1['news_title'];
					$list_imp[$count]['news_date']=$array1['news_date'];
					$list_imp[$count]['idmarch_news']=$array1['idmarch_news'];
					$count++;
				}
			}
			
			foreach($list_article as $array1){		//知识库分类
				if($array1['article_type']=='0'){
					$list_note[$count]['article_title']=$array1['article_title'];
					$list_note[$count]['article_time']=$array1['article_time'];
					$list_note[$count]['article_id']=$array1['article_id'];
					$count++;
				}else if($array1['article_type']=='1'){
					$list_blog[$count]['article_title']=$array1['article_title'];
					$list_blog[$count]['article_time']=$array1['article_time'];
					$list_blog[$count]['article_id']=$array1['article_id'];
					$count++;
				}
			}
			
			//笔记查询
			//$list_note=$article->where(array('article_type'=>'0'))->limit(20)->order('article_time desc')->select();
			//博客查询
			//$list_blog=$article->where(array('article_type'=>'1'))->limit(20)->order('article_time desc')->select();
			//通知公告查询
			//$list_notice=$news->where(array('news_type'=>'2'))->limit(20)->order('news_date desc')->select();
			//小组新闻查询
			//$list_news=$news->where(array('news_type'=>'1'))->limit(20)->order('news_date desc')->select();
			//大事记查询
			//$list_imp=$news->where(array('news_type'=>'3'))->limit(20)->order('news_date desc')->select();
			//笔记查询
			//$list_note=$article->where(array('article_type'=>'0'))->limit(20)->order('article_time desc')->select();
			//博客查询
			//$list_blog=$article->where(array('article_type'=>'1'))->limit(20)->order('article_time desc')->select();
			
			$this->assign('list_news',$list_news);
			$this->assign('list_all',$list_all);
			$this->assign('list_notice',$list_notice);
			$this->assign('list_imp',$list_imp);
			$this->assign('list_note',$list_note);
			$this->assign('list_blog',$list_blog);
			$this->display();
		}
	}
?>