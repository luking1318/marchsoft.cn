<?php
/**
* 三月捐款
*
*/
import('ORG.Alipay.Alibuy');
import("ORG.Alipay.lib.AlipayNotify");
import("ORG.Alipay.lib.AlipaySubmit");
header("content-type:text/html;charset=utf-8");
class PayAction extends Action {
	public function index(){
		$mc = M('prize_don');
		// $s1=$mc ->order('don_num desc')->find();//一次捐赠最高的
		$s2=$mc ->group('don_name')->select();
		$name = "";//累计捐赠最高的名字
		$n = 0;//累计捐赠最高的钱数
		for($i=0;$i<count($s2);$i++){
			$s=$mc ->where('don_name="'.$s2[$i]['don_name'].'"')->sum('don_num');
			if($s>$n){
				$name=$s2[$i]['don_name'];
				$n=$s;
			}
		}
		$this->assign("name",$name);
		$this->assign("n",$n);
		// $this->assign("s1",$s1);
		$clist = $mc->limit(3)->order("don_time DESC")->select();
		$this->assign('clist',$clist);
		$this->display('view');
	}
	public function pay(){
		$this->display();
	}
	     public function dobuy(){
	        $out_trade_no = date('YmdHis').rand(0,9).rand(0,9).rand(0,9);
	        $baseurl = 'http://'.$_SERVER['HTTP_HOST'];
	        $total =  $_POST['total'];
	        $args = array(
	            'out_trade_no'=>$out_trade_no,
	            'notify_url'=> $baseurl.'/index.php/Pay/notifyurl.html',
	            'return_url'=> $baseurl.'/index.php/Pay/returnurl.html',
	            // 'name' => $_POST['name'],
	            'total'=> $total,
	            // 'content' => $_POST['content'],
	            );
	        $o = D('order');
	        $o->number = $out_trade_no;
	        $o->name = $_POST['name'];
	        $o->mark = $_POST['content'];
	        $o->total = $total;
	        $o->status = 0;
	        $res = $o->add();
	        if($res){
		        $s = new Alibuy();
		        $s->pay(C('alipay'),$args);
		    }else{
		    	$this->error('错误');
		    }
	        // var_dump(C('alipay'));
	    }
	    // 同步跳转
	    public function returnurl(){
	        $alipay_config = C('alipay');
	        //计算得出通知验证结果
	        $alipayNotify = new AlipayNotify($alipay_config);
	        $verify_result = $alipayNotify->verifyReturn();
	        if($verify_result) {//验证成功
	            //商户订单号
	            $out_trade_no = $_GET['out_trade_no'];
	            //支付宝交易号
	            $trade_no = $_GET['trade_no'];
	            //交易状态
	            $trade_status = $_GET['trade_status'];
	            if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
	            	$order = M('order');
	            	 $row = $order->where(array('number'=>$out_trade_no))->find();
	            	 // var_dump($row);
	            	 if($row){
	                    if($order->where(array('id'=>$row['id']))->save(array('status'=>1))){
	                    	$mc = D('prize_don');
		                $mc->don_name = $row['name'];
		                $mc->don_num = $row['total'];
		                $mc->don_mark = $row['mark'];
		                $mc->don_time = date("Y-m-d H:i:s");
		                $res = $mc->add();
		                if($res){
		                	$this->index();
		                }
	                    }else{
	                        $this->error('错误');    
	                    }
	                }else{
	                    	$this->error('错误');
	                  }
	                
	            }else {
	              echo "trade_status=".$_GET['trade_status'];
	            }   
	            echo "验证成功<br />";
	            // $this->display('index');
	            }else {
	            //验证失败
	            //如要调试，请看alipay_notify.php页面的verifyReturn函数
	            echo "验证失败";
	        }
	    }
	   // 异步跳转
	    public function notifyurl(){
	        $alipay_config = C('alipay');
	        //计算得出通知验证结果
	        $alipayNotify = new AlipayNotify($alipay_config);
	        $verify_result = $alipayNotify->verifyNotify();
	        if($verify_result) {//验证成功
	            $out_trade_no = $_POST['out_trade_no'];
	            //支付宝交易号
	            $trade_no = $_POST['trade_no'];
	            //交易状态
	            $trade_status = $_POST['trade_status'];
	            if($_POST['trade_status'] == 'TRADE_FINISHED'||$_POST['trade_status'] == 'TRADE_SUCCESS') {
	              $order = M('order');
	            	 $row = $order->where(array('number'=>$out_trade_no))->find();
	            	 if($row){
	                    if($order->where(array('id'=>$row['id']))->save(array('status'=>1))){
	                    	$mc = D('prize_don');
		                $mc->don_name = $row['name'];
		                $mc->don_num = $row['total'];
		                $mc->don_mark = $row['mark'];
		                $mc->don_time = date("Y-m-d H:i:s");
		                $res = $mc->add();
		                if($res){
		                	$this->index();
		                }
	                    }else{
	                        $this->error('错误');    
	                    }
	                }else{
	                    	$this->error('错误');
	                    }
	            }
	            echo "success";     //请不要修改或删除
	            // $this->display('view');
	        }
	        else {
	            //验证失败
	            echo "fail";
	            //调试用，写文本函数记录程序运行情况是否正常
	            //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
	        }
	    }
}