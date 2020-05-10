<?php
/**
 * 好友关注增删查改
 * @作者 qinggan <admin@phpok.com>
 * @版权 深圳市锟铻科技有限公司
 * @主页 http://www.phpok.com
 * @版本 4.x
 * @授权 http://www.phpok.com/lgpl.html PHPOK开源授权协议：GNU Lesser General Public License
 * @时间 2017年09月07日
**/

class fans_model_base extends phpok_model
{
	public $psize = 20;
	public function __construct()
	{
		parent::model();
	}

	/**
	 * 关注对方
	 * @参数 $user_id 自己的id
	 * @参数 $fans_id 关注他人的id
	 * @参数 $set 1代表关注，2代表取消关注
	**/
	public function save($user_id,$follow_id,$set=1)
	{
		if(!$user_id){
			return false;
		}
		if(!$fans_id){
			return false;
		}
		if($set == 1){
			$data = array('user_id'=>$follow_id,'fans_id'=>$user_id);
			$rs = $this->db->insert_array($data,"fans");
			return $rs;
		}	
		elseif($set == 2){
			$condition = array('user_id'=>$follow_id,'fans_id'=>$user_id);
			$status = $this->db->delete("fans",$condition);
			return true;
		}
	}

	/**
	 * 查询自己的粉丝列表
	 * @参数 $condition 查询条件，主表使用关键字 u，扩展表使用关键字 e
	 * @参数 $offset 起始位置
	 * @参数 $psize 查询数量
	 * @参数 $pri 绑定的主键
	**/
	public function get_fans($user_id="",$offset=0,$psize=30)
	{
		$flist = $this->fields_all();
		$ufields = "f.*,u.nickname,u.desc";
		if($flist){
			foreach($flist as $key=>$value){
				$ufields .= ",u.".$value['identifier'];
			}
		}
		$sql = " SELECT ".$ufields." FROM ".$this->db->prefix."fans f ";
		$sql.= " LEFT JOIN ".$this->db->prefix."user_ext u ON(f.fans_id=u.id) ";
		$condition = " WHERE user_id = {$user_id} ";
		$sql.=$condition;
		/*if($condition){
			$sql .= " WHERE ".$condition;
		}*/
		$offset = intval($offset);
		$psize = intval($psize);
		$sql.= " ORDER BY f.dateline DESC,f.id DESC ";
		if($psize){
			$offset = intval($offset);
			$sql .= "LIMIT ".$offset.",".$psize;
		}
		$rslist = $this->db->get_all($sql,"id");

		foreach($rslist as $k=>$v)
		{
			$ids[$v['fans_id']] = $v['fans_id'];
		}
		$ids = implode(",",$ids);
		$sql = "select id,avatar,ukey from ".$this->db->prefix."user where id in ({$ids})";
		$rs_user = $this->db->get_all($sql,"id");
		foreach($rslist as $k=>$v)
                {
			if(isset($rs_user[$v['fans_id']]))
			{
                        	$rslist[$k]['avatar'] = $rs_user[$v['fans_id']]['avatar'];
				$rslist[$k]['ukey'] = $rs_user[$v['fans_id']]['ukey'];
			}
                }
		if(!$rslist){
			return false;
		}
		return $rslist;
	}

	/**
	 * 查询自己的粉丝列表
	 * @参数 $condition 查询条件，主表使用关键字 u，扩展表使用关键字 e
	 * @参数 $offset 起始位置
	 * @参数 $psize 查询数量
	 * @参数 $pri 绑定的主键
	**/
	public function get_follow($user_id="",$offset=0,$psize=30)
	{
		$flist = $this->fields_all();
		$ufields = "f.*,u.nickname";
		if($flist){
			foreach($flist as $key=>$value){
				$ufields .= ",u.".$value['identifier'];
			}
		}
		$sql = " SELECT ".$ufields." FROM ".$this->db->prefix."fans f ";
		$sql.= " LEFT JOIN ".$this->db->prefix."user_ext u ON(f.fans_id=u.id) ";
		$condition = " WHERE fans_id = {$user_id} ";
		$sql.=$condition;
		/*if($condition){
			$sql .= " WHERE ".$condition;
		}*/
		$offset = intval($offset);
		$psize = intval($psize);
		$sql.= " ORDER BY f.dateline DESC,f.id DESC ";
		if($psize){
			$offset = intval($offset);
			$sql .= "LIMIT ".$offset.",".$psize;
		}
		$rslist = $this->db->get_all($sql,"id");
		if(!$rslist){
			return false;
		}
		return $rslist;
	}

/**
	 * 查看粉丝的情况或查看对方和自己的短息，一对一查询
	 * @参数 $user_id 自己的id
	 * @参数 $fans_id 关注他人的id
	**/
	public function get_one($user_id,$fans_id)
	{
		if(!$user_id){
			return false;
		}
		if(!$fans_id){
			return false;
		}
		$sql = "SELECT * FROM ".$this->db->prefix."fans WHERE user_id='".$user_id."' and fans_id='".$fans_id."'  ";
		$status = $this->db->get_one($sql);
		return $status;
	}


}
