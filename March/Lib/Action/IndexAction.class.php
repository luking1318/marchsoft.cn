<?php
/**
 * 小组网站首页Action
 * @author fanchangfa
 *
 */
class IndexAction extends Action {


	public function index(){
		$this->display('guide/huang/index');
	}


    /**
     * 首页模板
     */
    public function home(){
    	//简介
    	$intro = M('intro');
    	$intro = $intro->where("idmarch_intro = '1'")->field("intro_content")->select();
    	$this->intro = $intro[0]['intro_content'];
    	
    	//新闻列表
    	$news = M('news');
    	$nlist = $news->where("news_type = '1'")->order("idmarch_news DESC")->limit(6)->select();
    	$this->nlist = $nlist;
    	
    	//项目列表
    	$project = M('project');
    	$project = $project->limit(6)->order("idmarch_project DESC")->select();
		$this->project = $project;
		
		//博客
		$blog = M('article');

		$blog_list = $blog->where("article_type = '1'")->limit(6)->select();

		$this->blog = $blog_list;
		    	
		$this->display('index');
    }
	
	/**
	 * 首页滚动图片
	 */
	public function inedx_rmg(){
		$this->display();
	}
	
	/**
	 * 联系我们 
	 */
	public function contact(){
		$this->display();
	}
}
