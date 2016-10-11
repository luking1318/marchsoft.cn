<?php
/**
 * 小组OA网页版首页框架Action
 * @author fanchangfa
 */
class IndexAction extends Action {
    /**
     * 首页框架
     */
    public function index(){
    	//登陆数据处理，判断账号密码是否正确
    	if($_POST){
    		$user = M('user');
    		$data['user_login'] = $_POST['user_login'];
    		$data['user_pwd'] = md5($_POST['user_pwd']);
    		$result = $user->where($data)->select();
    		if($result != NULL){
    			$_SESSION['user_login'] = $_POST['user_login'];//拼音用户名
    			$_SESSION['phone'] = $result[0]['user_phone'];   //用户电话
    			$auth = M('authority');
    			$login = $auth->where("user_phone = ".$result[0]['user_phone'])->select();
    			if($login){
    				$_SESSION["login"] = $login[0]['module_id'];    //模块权限id：002
    			}
    			echo '1';
    		}else{
    			echo '0';
    		}
    		exit;
    	}
    	if($_SESSION['user_login'] == ''){
            echo '<script>location.href="'.__ROOT__.'/index.php"</script>';
        }
        $_SESSION["nav_point"] = 1;  //为选中的导航添加样式
        R("Notice/notice");     //首页右侧显示通知公告
        R("Course/course");     //首页右侧显示课表

    	$this->display();
    }
    
    /*---------------退出系统-------------------*/
    public function doLogout(){
        $_SESSION = array();
        if(isset($COOKIE[session_name()])){
             setcookie(session_name(),'',time()-1,'/');
        }
        session_destroy();
        $this->redirect('index');
    }
}
