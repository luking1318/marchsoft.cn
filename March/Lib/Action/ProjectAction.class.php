<?php
class ProjectAction extends Action {

	public function project(){
		$project= D('project');
		$list=$project->order('idmarch_project DESC')->select();
		$this->assign("list",$list);
		$this->display();
	}
}
?>
