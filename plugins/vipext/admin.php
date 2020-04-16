<?php
/**
 * PHPOK-VIP插件扩展<后台应用>
 * @package phpok\plugins
 * @作者 phpok.com
 * @版本 5.3.135
 * @授权 http://www.phpok.com/lgpl.html PHPOK开源授权协议：GNU Lesser General Public License
 * @时间 2019年11月11日 10时21分
**/
class admin_vipext extends phpok_plugin
{
	public $me;
	public function __construct()
	{
		parent::plugin();
		$this->me = $this->_info();
	}

	/**
	 * 项目管理扩展按钮
	**/
	public function html_project_index_foot()
	{
		$this->_show('admin_project.html');
	}

	public function data_move()
	{
		$condition = "module>0";
		$project_list = $this->model('project')->get_all_project($this->session->val('admin_site_id'),$condition);
		$this->assign('plist',$project_list);
		$this->_view('admin_data_move.html');
	}

	public function data_clear()
	{
		$condition = "module>0";
		$project_list = $this->model('project')->get_all_project($this->session->val('admin_site_id'),$condition);
		$this->assign('plist',$project_list);
		$this->_view('admin_data_clear.html');
	}

	public function start_clear()
	{
		$clear_id = $this->get('clear_id','int');
		if(!$clear_id){
			$this->error('未指定项目ID');
		}
		$project = $this->model('project')->get_one($clear_id,false);
		if(!$project){
			$this->error('项目不存在');
		}
		$module = $this->model('module')->get_one($project['module']);
		if(!$module){
			$this->error('没有模块信息');
		}
		if($module['mtype']){
			$sql = "DELETE FROM ".$this->db->prefix.$module['id']." WHERE project_id='".$project['id']."'";
			$this->db->query($sql);
			//查看是否还有内容
			$sql = "SELECT count(id) FROM ".$this->db->prefix.$module['id'];
			$chk = $this->db->count($sql);
			if(!$chk){
				$sql = "TRUNCATE ".$this->db->prefix.$module['id'];
				$this->db->query($sql);
			}
			$this->success();
		}
		//删除扩展分类
		$sql = "DELETE FROM ".$this->db->prefix."list_cate WHERE id IN(SELECT n.id FROM (SELECT id FROM ".$this->db->prefix."list WHERE project_id='".$project['id']."') as n)";
		$this->db->query($sql);
		//删除电商信息
		$sql = "DELETE FROM ".$this->db->prefix."list_biz WHERE id IN(SELECT n.id FROM (SELECT id FROM ".$this->db->prefix."list WHERE project_id='".$project['id']."') as n)";
		$this->db->query($sql);
		//删除电商属性
		$sql = "DELETE FROM ".$this->db->prefix."list_attr WHERE tid IN(SELECT n.id FROM (SELECT id FROM ".$this->db->prefix."list WHERE project_id='".$project['id']."') as n)";
		$this->db->query($sql);
		//删除扩展模块信息
		$sql = "DELETE FROM ".$this->db->prefix.'list_'.$module['id']." WHERE project_id='".$project['id']."'";
		$this->db->query($sql);
		//删除主题内容
		$sql = "DELETE FROM ".$this->db->prefix."list WHERE project_id='".$project['id']."'";
		$this->db->query($sql);
		$this->success();
	}

	public function start_move()
	{
		$output_id = $this->get('output_id','int');
		$input_id = $this->get('input_id','int');
		if(!$output_id || !$input_id){
			$this->error('未选择要迁移的项目数据或要导入的目标项目');
		}
		if($output_id == $input_id){
			$this->error('项目一样，不支持导入');
		}
		$old = $this->model('project')->get_one($output_id,false);
		$new = $this->model('project')->get_one($input_id,false);
		if(!$old || !$new){
			$this->error('项目不存在');
		}
		if(!$old['module'] || !$new['module']){
			$this->error('有项目未绑定模块');
		}
		$old_m = $this->model('module')->get_one($old['module']);
		$new_m = $this->model('module')->get_one($new['module']);
		if($old_m['mtype'] || $new_m['mtype']){
			$this->error('迁移功暂时不支持独立模块');
		}
		if($old_m['tbl'] != $new_m['tbl']){
			$this->error('模块类型不一致');
		}
		$old_f = $this->model('fields')->flist($old['module'],'identifier');
		$new_f = $this->model('fields')->flist($new['module'],'identifier');
		if(!$old_f || !$new_f){
			$this->error('模块未定义相关字段');
		}
		$old_ids = array_keys($old_f);
		$new_ids = array_keys($new_f);
		if(!array_intersect($old_ids,$new_ids)){
			$this->error('两个模块没有共同的字段');
		}
		//删除扩展分类
		$sql = "DELETE FROM ".$this->db->prefix."list_cate WHERE id IN(SELECT n.id FROM (SELECT id FROM ".$this->db->prefix."list WHERE project_id='".$old['id']."') as n)";
		$this->db->query($sql);
		//更改分类
		if($old['cate'] && $old['cate'] != $new['cate']){
			$sql = "UPDATE ".$this->db->prefix."list SET cate_id=0 WHERE project_id='".$old['id']."'";
			$this->db->query($sql);
			$sql = "UPDATE ".$this->db->prefix."list_".$old['module']." SET cate_id=0 WHERE project_id='".$old['id']."'";
			$this->db->query($sql);
		}
		if($old['module'] == $new['module']){
			//将旧的主题项目ID改成新的项目ID
			$sql = "UPDATE ".$this->db->prefix."list SET project_id='".$new['id']."' WHERE project_id='".$old['id']."'";
			$this->db->query($sql);
			$sql = "UPDATE ".$this->db->prefix."list_".$old['module']." SET project_id='".$new['id']."' WHERE project_id='".$old['id']."'";
			$this->db->query($sql);
			$this->success();
		}
		$flist = array_intersect($old_ids,$new_ids);
		$fields = "id,site_id,project_id,cate_id";
		foreach($flist as $key=>$value){
			$fields.= ",".$value;
		}
		$sql = "INSERT INTO ".$this->db->prefix."list_".$new['module']."(".$fields.") SELECT ".$fields." FROM ".$this->db->prefix."list_".$old['module']." WHERE project_id='".$old['id']."'";
		$this->db->query($sql);
		$sql = "UPDATE ".$this->db->prefix."list_".$new['module']." SET project_id='".$new['id']."' WHERE project_id='".$old['id']."'";
		$this->db->query($sql);
		//删除旧的数据
		$sql = "DELETE FROM ".$this->db->prefix."list_".$old['module']." WHERE project_id='".$old['id']."'";
		$this->db->query($sql);
		//更新主表关联
		$sql = "UPDATE ".$this->db->prefix."list SET project_id='".$new['id']."',module_id='".$new['module']."' WHERE project_id='".$old['id']."'";
		$this->db->query($sql);
		$this->success();
	}
	
	/**
	 * 更新或添加保存完主题后触发动作，如果不使用，请删除这个方法
	 * @参数 $id 主题ID
	 * @参数 $project 项目信息，数组
	 * @返回 true 
	**/
	public function system_admin_title_success($id,$project)
	{
		//PHP代码;
	}
	
	
}