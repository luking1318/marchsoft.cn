<?php
// 本类由系统自动生成，仅供测试用途
class BaseAction extends Action {
    public function _initialize(){
        if($_SESSION['march_user'] === null || trim($_SESSION['march_user']) == ""){
            $this->redirect("Index/login");
        }
    }
}