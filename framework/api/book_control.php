<?php
/**
 * 会员登录，基于API请求
 * @作者 qinggan <admin@phpok.com>
 * @版权 2015-2016 深圳市锟铻科技有限公司
 * @主页 http://www.phpok.com
 * @版本 4.x
 * @授权 http://www.phpok.com/lgpl.html PHPOK开源授权协议：GNU Lesser General Public License
 * @时间 2016年07月25日
**/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class book_control extends phpok_control
{
	/**
	 * 构造函数
	**/
	public function __construct() 
	{
		parent::control();
		$this->config('is_ajax',true);
	} 


	/**
	 * 获得自己的粉丝接口
	**/
	public function like_f()
	{
		$user_id = $this->session->val('user_id');
		$book_id = $this->get('id');
		if(!$user_id){
			$this->error(P_Lang('您已是本站会员，不需要再次登录'));
		}
		if(!$book_id){
			$this->error(P_Lang('您已是本站会员，不需要再次登录'));
		}
		$hkey = 'book_like';


		$array_hmget = array('pats','job');
		$hash_list = $this->kdb->conn->hmget($hkey,$array_hmget);
print_r($hash_list);
		
	/*	$pageid = $this->get("pageid");
		$data = $this->model('fans')->get_fans($user_id,$pageid,100);
		$this->success($data);*/
	}




	/**
	 * 关注/取消关注接口
	 * @参数 user_id 对方用户id
	**/
	public function save_f()
	{
		$user_id = $this->session->val('user_id');
		if(!$user_id){
			$this->error(P_Lang('您已是本站会员，不需要再次登录'));
		}
		$follow_id = $this->get("follow_id");
		if(!$follow_id){
			$this->error(P_Lang('关注失败'));
		}
		$data = $this->model('fans')->get_one($follow_id,$user_id);
		if($data)
		{
			$data = $this->model('fans')->save($user_id,$follow_id,2);
		}
		else
		{
			$data = $this->model('fans')->save($user_id,$follow_id,1);
		}
		$this->success($data);
	}

	/**
	 * 获得自己的粉丝接口
	**/
	public function fans_f()
	{

	//-	$info = $this->kdb->hset('user','119925531','abc');
		$user_id = $this->session->val('user_id');
		if(!$user_id){
			$this->error(P_Lang('您已是本站会员，不需要再次登录'));
		}
		$pageid = $this->get("pageid");
		$data = $this->model('fans')->get_fans($user_id,$pageid,100);
		$this->success($data);
	}
	/**
	 * 验证是否关注了这个用户接口
	 * @参数 user_id 对方用户id
	**/
	
	public function check_f()
	{
		$user_ukey = $this->session->val('user_ukey');
		if(!$user_id){
			$this->error(P_Lang('您已是本站会员，不需要再次登录'));
		}
		$follow_ukey = $this->get("user_ukey");
		if(!$follow_ukey){
			$this->error(P_Lang('您关注的用户id不存在'));
		}
		$data = $this->model('fans')->get_one($follow_ukey,$user_ukey);
		$this->success($data);

	}

	/**
	 * 获得关注用户接口
	**/
	public function follow_f()
	{
		$user_id = $this->session->val('user_id');
		if(!$user_id){
			$this->error(P_Lang('您已是本站会员，不需要再次登录'));
		}
		$pageid = $this->get("pageid");
		$data = $this->model('fans')->get_follow($user_id,$pageid,100);
		$this->success($data);
	}

}
