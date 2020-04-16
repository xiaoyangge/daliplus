<?php
/**
 * 邮件营销
 * @作者 qinggan <admin@phpok.com>
 * @版权 深圳市锟铻科技有限公司
 * @主页 http://www.phpok.com
 * @版本 5.x
 * @授权 http://www.phpok.com/lgpl.html 开源授权协议：GNU Lesser General Public License
 * @时间 2020年1月23日
**/

/**
 * 安全限制，防止直接访问
**/
if(!defined("PHPOK_SET")){
	exit("<h1>Access Denied</h1>");
}

$condition = "t.sendstatus=1 AND t.tpl_id>0";
$tasklist = $this->model('edm')->task_list($condition,0,999);
if(!$tasklist){
	return true;
}
foreach($tasklist as $key=>$value){
	$queue = $this->model('edm')->queue_one($value['id']);
	if(!$queue){
		continue;
	}
	if(!$queue['email_id']){
		$this->model('edm')->queue_delete($queue['id']);
		continue;
	}
	$email_rs = $this->model('edm')->get_one($queue['email_id']);
	if(!$email_rs){
		$this->model('edm')->queue_delete($queue['id']);
		continue;
	}
	if(!$email_rs['email']){
		$this->model('edm')->email_delete($email_rs['id']);
		$this->model('edm')->queue_delete($queue['id']);
		continue;
	}
	//发送邮件
	$tplinfo = $this->model('email')->get_one($value['tpl_id']);
	if(!$tplinfo){
		continue;
	}
	//开始发送邮件
	$this->gateway('type','email');
	$this->gateway('param',$queue['gateway_id']);
	$this->assign('username',$email_rs['username']);
	$title = $this->fetch($tplinfo['title'],'msg');
	$content = $this->fetch($tplinfo['content'],'msg');
	if(!$title || !$content){
		continue;
	}
	$html = $this->model('edm')->content_format($content,$queue,$email_rs['email']);
	$array = array('email'=>$email_rs['email'],'fullname'=>$email_rs['username'],'title'=>$title,'content'=>$html);
	$this->gateway('exec',$array);
	$data = array('sendtime'=>$this->time,'sendstatus'=>1,'status'=>1);
	$this->model('edm')->queue_update($data,$queue['id']);
	$data = array('lastdate'=>$this->time);
	$this->model('edm')->email_save($data,$email_rs['id']);
}
return true;