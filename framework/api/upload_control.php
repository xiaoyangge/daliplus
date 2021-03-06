<?php
/*****************************************************************************************
	文件： {phpok}/api/upload_control.php
	备注： 前端附件上传接口
	版本： 4.x
	网站： www.phpok.com
	作者： qinggan <qinggan@188.com>
	时间： 2014年7月10日
*****************************************************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class upload_control extends phpok_control
{
	private $u_id = 0; //会员ID
	private $u_name = 'guest'; //会员名字，游客使用guest
	private $is_client = false;//判断是否客户端
	function __construct()
	{
		parent::control();
		$token = $this->get('token');
		if($token){
			$this->lib('token')->keyid($this->site['api_code']);
			$info = $this->lib('token')->decode($token);
			if(!$info || !$info['user_id'] || !$info['user_name']){
				$this->json(P_Lang('您还没有登录，请先登录或注册'));
			}
			$this->u_id = $info['user_id'];
			$this->u_name = $info['user_name'];
			$this->is_client = true;
		}else{
			if($_SESSION['user_id']){
				$this->u_id = $_SESSION['user_id'];
				$this->u_name = $_SESSION['user_name'];
			}
		}
	}

	//存储上传的数据，游客仅能上传jpg,png,gif,jpeg附件
	//普通会员能上传的附件有：jpg,png,gif,jpeg,zip,rar,doc,xls,docx,xlsx,txt,ppt,pptx
	public function save_f()
	{
		if($this->u_id){
			if(!$this->site['upload_user']){
				$this->json(P_Lang('你没有上传权限'));
			}
		}else{
			if(!$this->site['upload_guest']){
				$this->json(P_Lang('游客没有上传权限'));
			}
		}
		$cateid = $this->get('cateid','int');
		if($cateid){
			$cate_rs = $this->model('rescate')->get_one($cateid);
		}
		if(!$cate_rs){
			$cate_rs = $this->model('rescate')->get_default();
			if(!$cate_rs){
				$this->json(P_Lang('未配置附件存储方式'));
			}
		}
		$filetypes = $this->u_id ? $cate_rs['filetypes'] : 'jpg,png,jpeg,gif,rar,zip';
		$this->lib('upload')->set_type($filetypes);
		$this->lib('upload')->set_cate($cate_rs);
		$upload = $this->lib('upload')->upload('upfile');
		if(!$upload || !$upload['status']){
			$this->json(P_Lang('附件上传失败'));
		}
		if($upload['status'] != 'ok'){
			$this->json($upload['content']);
		}
		$array = array();
		$array["cate_id"] = $this->lib('upload')->get_cate();
		$array["folder"] = $this->lib('upload')->get_folder();
		$array["name"] = $upload['name'];
		$array["ext"] = $upload["ext"];
		$array["filename"] = $upload['filename'];
		$array["addtime"] = $this->time;
		$array['title'] = $upload['title'];
		$array["mime_type"] = $upload['mime_type'];
		$arraylist = array("jpg","gif","png","jpeg");
		if(in_array($upload['ext'],$arraylist)){
			$img_ext = getimagesize($this->dir_root.$upload['filename']);
			$my_ext = array("width"=>$img_ext[0],"height"=>$img_ext[1]);
			$array["attr"] = serialize($my_ext);
		}
		if(!$this->is_client){
			$array["session_id"] = $this->session->sessid();
		}
		$array['user_id'] = $this->u_id;
		$id = $this->model('res')->save($array);
		if(!$id){
			$this->lib('file')->rm($this->dir_root.$upload['filename']);
			$this->json(P_Lang('图片存储失败'));
		}
		$this->model('res')->gd_update($id);
		$rs = $this->model('res')->get_one($id);
		$this->json($rs,true);
	}


/*
	public function base64_f()
	{
		if($this->u_id){
			if(!$this->site['upload_user']){
				$this->json(P_Lang('你没有上传权限'));
			}
		}else{
			if(!$this->site['upload_guest']){
				$this->json(P_Lang('游客没有上传权限'));
			}
		}
		$cateid = $this->get('cateid','int');
		if($cateid){
			$cate_rs = $this->model('rescate')->get_one($cateid);
		}
		if(!$cate_rs){
			$cate_rs = $this->model('rescate')->get_default();
			if(!$cate_rs){
				$this->json(P_Lang('未配置附件存储方式'));
			}
		}
		$filetypes = $this->u_id ? $cate_rs['filetypes'] : 'jpg,png,gif,rar,zip';
		$this->lib('upload')->set_type($filetypes);
		$this->lib('upload')->set_cate($cate_rs);


			$data = $this->get('data');
			if(!$data){
				$this->error(P_Lang('图片内容不能为空'));
			}
			if(strpos($data,',') === false){
				$this->error(P_Lang('附片格式不正确'));
			}
			$tmp = explode(",",$data);
			$tmpinfo = substr($data,strlen($tmp[0]));
			$content = base64_decode($tmpinfo);
			if($content == $tmpinfo){
				$this->error(P_Lang('不是合法的图片文件'));
			}
			$info = explode(";",$tmp[0]);
			$ext = 'png';
			if($info[0]){
				$tmp = explode("/",$info[0]);
				if($tmp[1]){
					$ext = $tmp[1];
				}
			}
			if(!in_array($ext,array('jpg','png','gif','jpeg'))){
				$this->error(P_Lang('上传的文件格式不附合系统要求'));
			}
			if($ext == 'jpeg'){
				$ext = 'jpg';
			}
			$file_name = $this->u_id.time().'.'.$ext;
			$save_pic = $this->lib('upload')->get_folder().$file_name;
			$this->lib('file')->rm($this->dir_root.$save_pic);
			$this->lib('file')->save_pic($content,$this->dir_root.$save_pic);
			//生成正方式
			$this->lib('gd')->thumb($this->dir_root.$save_pic,$this->u_id,100,100);
		//	$this->lib('file')->mv('res/user/_'.$this->u_id.'.'.$ext,$save_pic);

		$array = array();
		$array["cate_id"] = $this->lib('upload')->get_cate();
		$array["folder"] = $this->lib('upload')->get_folder();
		$array["name"] = $file_name;
		$array["ext"] = $ext;
		$array["filename"] = $array["folder"].$file_name;
		$array["addtime"] = $this->time;
		$array['title'] = "";
		//-$array["mime_type"] = $upload['mime_type'];
		$arraylist = array("jpg","gif","png","jpeg");

		if(in_array($ext,$arraylist)){
			$img_ext = getimagesize($this->dir_root.$save_pic);
			$my_ext = array("width"=>$img_ext[0],"height"=>$img_ext[1]);
			$array["attr"] = serialize($my_ext);
			$array["mime_type"] = $img_ext['mine'];
		}
		if(!$this->is_client){
			$array["session_id"] = $this->session->sessid();
		}
		$array['user_id'] = $this->u_id;
		$id = $this->model('res')->save($array);
		if(!$id){
			$this->lib('file')->rm($this->dir_root.$file_name);
			$this->json(P_Lang('图片存储失败'));
		}
		$this->model('res')->gd_update($id);
		$rs = $this->model('res')->get_one($id);
		$this->json($rs,true);
	}
*/
	public function base64_f()
	{
		if($this->u_id){
			if(!$this->site['upload_user']){
				$this->json(P_Lang('你没有上传权限'));
			}
		}else{
			if(!$this->site['upload_guest']){
				$this->json(P_Lang('游客没有上传权限'));
			}
		}
		$cateid = $this->get('cateid','int');
		$data = array();
		if($cateid == 1)
		{
			$data_img = $this->get('data_img');
			$data['img']=$this->_file($cateid,$data_img,true);

		}else if($cateid == 24)
		{
			$data_video = $this->get('data_video');
			$data['video']=$this->_file($cateid,$data_video);
			$data_img = $this->get('data_video_img');
			$data['video_img']=$this->_file($cateid,$data_img,true);
		}
		return $this->json($data,true);

	}
public function _file($cateid,$data,$is_gd=false)
	{
		if($cateid){
			$cate_rs = $this->model('rescate')->get_one($cateid);
		}
		$filetypes = $cate_rs['filetypes'];
		$this->lib('upload')->set_type($filetypes);
		$this->lib('upload')->set_cate($cate_rs);
			$tmp = explode(",",$data);
			$tmpinfo = substr($data,strlen($tmp[0]));
			$content = base64_decode($tmpinfo);
			if($content == $tmpinfo){
				$this->error(P_Lang('不是合法的文件'));
			}
			$info = explode(";",$tmp[0]);
			if($info[0]){
				$tmp = explode("/",$info[0]);
				if($tmp[1]){
					$ext = $tmp[1];
				}
			}
			$file_name = $this->u_id.time().'.'.$ext;
			$save_file = $this->lib('upload')->get_folder().$file_name;
			$this->lib('file')->rm($this->dir_root.$save_file);
			$this->lib('file')->save_pic($content,$this->dir_root.$save_file);

			$array = array();
			$array["cate_id"] = $this->lib('upload')->get_cate();
			$array["folder"] = $this->lib('upload')->get_folder();
			$array["name"] = $file_name;
			$array["ext"] = $ext;
			$array["filename"] = $array["folder"].$file_name;
			$array["addtime"] = $this->time;
			$array['title'] = "";
				$img_ext = getimagesize($this->dir_root.$save_file);
				$my_ext = array("width"=>$img_ext[0],"height"=>$img_ext[1]);
				$array["attr"] = serialize($my_ext);
				$array["mime_type"] = $img_ext['mime'];
			
			if(!$this->is_client){
				$array["session_id"] = $this->session->sessid();
			}
			$array['user_id'] = $this->u_id;
			$id = $this->model('res')->save($array);
			if(!$id){
				$this->lib('file')->rm($this->dir_root.$file_name);
				$this->json(P_Lang('图片存储失败'));
			}
			if($is_gd)
			{
				$this->model('res')->gd_update($id);
			}
		
			$rs = $this->model('res')->get_one($id);
			return $rs;
	}

}
