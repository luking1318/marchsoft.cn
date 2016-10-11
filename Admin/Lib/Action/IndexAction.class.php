<?php
/**
 * ��̨����ϵͳ��Action
 * @author fanchangfa
 *
 */
class IndexAction extends Action {
    public function index(){
    	if($_SESSION['march_user'] == '')
    		$this->redirect("login");
    		
		$this->display();
    }
    
    public function admin_top(){
	    if($_GET['out']){
    		unset($_SESSION['march_user']);
    		echo '<script>top.location.href="',__ROOT__,'/index.php"</script>';
    	}
	    	
    	$this->display();
    }
    
    /**
     * ��̨����ϵͳ���˵�
     */
    public function left()
    {
    	$this->display();
    }
    
    /**
     * ��½
     */
    public function login(){
    	//�����ύ�û��������
    	if($_POST){
    		//��֤��֤���Ƿ���ȷ
    		if($_SESSION['verify'] != md5($_POST['verifycode'])){
    			echo '1';	//��֤�����
    			exit;
    		}else{
	    		$user = M('user');
	    		$password=md5($_POST['password']);
	    		$res = $user->where(array('user_login'=>$_POST['username'],'user_pwd'=>$password))->select();
	    		if($res == NULL){
	    			echo '2';	//�û�����������
	    			exit;
	    		}else{			//�ж��Ƿ���Ȩ��
	    			$authority = M('authority');
	    			$auth = $authority->where(array('user_phone' => $res[0]['user_phone'],'module_id'=>'007'))->select();
	    			if($auth == NULL){
	    				echo '3';		//û��Ȩ��
	    				exit;
	    			}else{
	    				$_SESSION['march_user'] = $res[0]['user_login'];
	    				echo '4';		//��֤�ɹ�
	    				exit;
	    			}
	    		}
    		}

    		
    	}
    	$this->display();
    }
    
    /**
     * �����֤��
     */
    Public function verify(){
	import("ORG.Util.Image");
	
	Image::buildImageVerify();
	
	}
	
	    
}