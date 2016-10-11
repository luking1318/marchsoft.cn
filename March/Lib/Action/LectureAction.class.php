<?php
	class LectureAction extends Action{

		public function index(){
			$list = M("lecture")
				->order("idmarch_lecture desc")
				->limit(10)
				->select();
			$this->assign("lecture_count",10);
			$this->assign("list",$list);
			$this->display();
		}
		public function content(){		//选择一个讲课，往模态对话框中赋值
			$list = M("lecture")->where("idmarch_lecture=".$_POST["idmarch_lecture"])->find();
			echo json_encode($list);
		}
		public function add_lecture(){		//加载10条数据
			$list = M("lecture")
				->order("idmarch_lecture desc")
				->limit("$_POST[lecture_count],10")
				->select();
			$list["lecture_count"] = $_POST["lecture_count"] + 10;
			echo json_encode($list);
		}
	}
?>