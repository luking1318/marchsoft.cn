<?php
/**
 * 微信测试Action
 * @author fanchangfa
 *
 */
class WxAction extends Action {
    /**
     * 首页模板
     */
    public function index(){
    	//define your token
		//define("TOKEN", "fanchangfa");
		//$this->valid();
		$this->responseMsg();
    }

    //接收微信服务器消息，对其进行回复
    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();

                $wx = M('wx');

                $result = $wx->where("march_wx.key like '%".$keyword."%'")->field("content")->select();

                $ct_res = count($result);

                if($ct_res){
                    //结果不为空
                    $num = rand(0,$ct_res-1);
                    $content = $result[$num]['content'];
                }else{
                    $content = "sorry,词库正在丰富中。。";
                }

                

                $textTpl = "<xml>
							<ToUserName>".$fromUsername."</ToUserName>
							<FromUserName>".$toUsername."</FromUserName>
							<CreateTime>".$time."</CreateTime>
							<MsgType>text</MsgType>
							<Content>".$content."</Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "Welcome to wechat world!";
                	//$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $textTpl;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }

    //登录
    function login(){
        $this->display('login');
    }

    //增加消息回复关键词
    function addkey(){
        if($_SESSION['wx_user'] == '')
            $this->login();
        else
            $this->display();
    }

    //匹配登录
    function ajax_login(){

        if($_POST){
            $user = M('wxuser');
            $data['user']=$_POST['user'];
            $data['pwd']=md5($_POST['pwd']);
            
            $result = $user->where($data)->select();
            if($result!=NULL){
                $_SESSION['wx_user'] = $_POST['user'];
                echo '1';
            }else{
                echo '0';
            }
            exit;
        }

    }

    //注销
    function zx(){
        $_SESSION['wx_user'] = '';
        $this->login();
    }

    //个人词库列表
    function ownkey(){
        $wx = M('wx');

        //删除词库记录
        if($_GET['del']){
            if(!$wx->where("id = '".$_GET['del']."'")->delete()){
                echo '<script>alert("服务器繁忙，请稍后再试!")</script>';
            }
        }

        $result = $wx->where("user = '".$_SESSION['wx_user']."'")->Select();

        $this->list = $result;

        $this->display('ownkey');
    }

    //新增词库记录
    function add(){
        if($_POST){

            $_POST['user'] = $_SESSION['wx_user'];
            $wx = M('wx');
            if($wx->add($_POST)){
                echo '<script>alert("新增成功!")</script>';
                $this->ownkey();
                exit;

            }   //end of if add successful
            else{
                 echo '<script>alert("服务器繁忙，请稍后再试!")</script>';
            }

        }   //end of if $_POST


        $this->display();
    }

    //修改词库记录
    function modify(){
        $wx = M('wx');

        if($_POST){
            if($wx->where("id = '".$_POST['id']."'")->save(array('march_wx.key'=>$_POST['key'],content=>$_POST['content']))){
                echo '<script>alert("修改成功!")</script>';
                $this->ownkey();
                exit;
            } else{
                 echo '<script>alert("服务器繁忙，请稍后再试!")</script>';
                 echo $wx->getlastsql();
                 exit;
            }

            echo $wx->getlastsql();

        }

        $md = $wx->where("id = '".$_GET['id']."'")->find();

        $this -> md = $md;

        $this->display();
    }

    //全部词库列表
    function allkey(){
        $wx = M('wx');

        $result = $wx->Select();

        $this->list = $result;

        $this->display();
    }

    //查看词库信息
    function viewkey(){
        $wx = M('wx');
        $md = $wx->where("id = '".$_GET['id']."'")->find();

        $this -> md = $md;

        $this->display();
    }

    //初始化成为开发者时验证接口

    /*
    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }
		
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}*/
	
	
}