<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title","核心设置"); ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-body">
		<form method="post" id="ext_post" action="<?php echo admin_url('system','save');?>" class="layui-form">
		<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("名称");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="title" name="title" class="layui-input" value="<?php echo $rs['title'];?>" />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("设置应用的名称，该名称将在后台左侧/头部显示");?></div>
		</div>
		<?php if($parent_list){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("上级项目");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select name="parent_id">
				     <?php $tmpid["num"] = 0;$parent_list=is_array($parent_list) ? $parent_list : array();$tmpid = array();$tmpid["total"] = count($parent_list);$tmpid["index"] = -1;foreach($parent_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				     <option value="<?php echo $value['id'];?>" <?php if($value['id'] == $pid){ ?> selected = "selected"<?php } ?>  ><?php echo $value['title'];?></option>
				     <?php } ?>
			    </select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("设置上级项目");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("快捷图标");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="hidden" name="icon" id="icon"  value="<?php echo $rs['icon'];?>" />
				<dl class="dropdown">
					<dt><span><?php if($rs['icon']){ ?><i class="icon-<?php echo $rs['icon'];?>" style="font-size:16px;"></i> <?php echo $rs['icon'];?><?php } else { ?>不使用图标<?php } ?></span></dt>
					<dd>
					<ul>
						<li>不使用图标<span class="value"></span></li>
						<?php $tmpid["num"] = 0;$iconlist=is_array($iconlist) ? $iconlist : array();$tmpid = array();$tmpid["total"] = count($iconlist);$tmpid["index"] = -1;foreach($iconlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
						<li><i class="icon-<?php echo $value;?>" style="font-size:16px;"></i> <?php echo $value;?><span class="value"><?php echo $value;?></span></li>
						<?php } ?>
					</ul>
					</dd>
				</dl>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("启用快捷图标后，将在桌面显示相应的快捷链接");?></div>
		</div>
		<?php } ?>

		<?php if($pid && $dirlist){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("控制层");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select name="appfile" id="appfile" lay-verify="required" >
					<?php $tmpid["num"] = 0;$dirlist=is_array($dirlist) ? $dirlist : array();$tmpid = array();$tmpid["total"] = count($dirlist);$tmpid["index"] = -1;foreach($dirlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $rs['appfile']){ ?> selected="selected"<?php } ?>><?php echo $value['title'];?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("请不要随意修改，不熟请设为");?><span class="red">list_control.php</span></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("执行方法");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="func" name="func" class="layui-input" value="<?php echo $rs['func'];?>" />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("请选择要执行的方法动作，不熟悉请留空");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("扩展参数");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="ext" name="ext" class="layui-input" value="<?php echo $rs['ext'];?>" />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("不清楚的请留空");?></div>
		</div>
		<?php } ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("排序");?>
			</label>
			<div class="layui-input-inline short-auto">
				<input type="text" id="taxis" name="taxis" class="layui-input" value="<?php echo $rs['taxis'];?>" />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("自定义排序，值越小越往前靠，最大不超过255");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("此项用于二次扩展开发时使用，对各个功能的权限分配，不熟悉请阅读官网帮助");?>">&#xe702;</i>
				<?php echo P_Lang("配置权限");?>
			</label>
			<div class="layui-input-inline long-auto">
				<table id="popedom" class="layui-table">
				<thead>	
				<tr>
					<th><?php echo P_Lang("名称");?></th>
					<th><?php echo P_Lang("标识");?></td>
					<th><?php echo P_Lang("排序");?></td>
					<th><input type="button" value="<?php echo P_Lang("添加");?>" class="layui-btn layui-btn-xs" onclick="add_trtd()" /></th>
				</tr>
				</thead>
				<?php $popedom_list_id["num"] = 0;$popedom_list=is_array($popedom_list) ? $popedom_list : array();$popedom_list_id = array();$popedom_list_id["total"] = count($popedom_list);$popedom_list_id["index"] = -1;foreach($popedom_list as $key=>$value){ $popedom_list_id["num"]++;$popedom_list_id["index"]++; ?>
				<tr id="popedom_<?php echo $value['id'];?>">
					<td align="center"><input type="text" name="popedom_title_<?php echo $value['id'];?>" value="<?php echo $value['title'];?>" class="layui-input" /></td>
					<td align="center"><input type="text" name="popedom_identifier_<?php echo $value['id'];?>" value="<?php echo $value['identifier'];?>" class="layui-input" /></td>
					<td align="center"><input type="text" name="popedom_taxis_<?php echo $value['id'];?>" value="<?php echo $value['taxis'];?>" class="layui-input" /></td>
					<td align="center"><input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-xs layui-btn-danger" onclick="popedom_del('<?php echo $value['id'];?>')" /></td>
				</tr>
				<?php } ?>
				</table>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				&nbsp;
			</label>
			<div class="layui-input-block">
				<input value="<?php echo P_Lang("提交");?>" type="submit" class="layui-btn">
				<input type="button" value="<?php echo P_Lang("返回");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'system'));?>')" class="layui-btn layui-btn-normal" />
			</div>
		</div>
		</form>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>