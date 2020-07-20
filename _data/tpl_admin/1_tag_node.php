<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("nopadding","true"); ?><?php $this->assign("overflowy","true"); ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" class="layui-form" id="post_save" onsubmit="return false">
<input type="hidden" name="tag_id" id="tag_id" value="<?php echo $tag['id'];?>" />
<?php if($id){ ?><input type="hidden" name="id" id="id" value="<?php echo $id;?>" /><?php } ?>
<div class="layui-card">
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("项目");?>
			</label>
			<div class="layui-input-block">
				<select id="pid" name="pid" lay-ignore onchange="update_catelist(this)" style="border:1px solid #D2D2D2;line-height:32px;width:100%;">
					<option value=""><?php echo P_Lang("不关联项目");?></option>
					<?php $tmpid["num"] = 0;$plist=is_array($plist) ? $plist : array();$tmpid = array();$tmpid["total"] = count($plist);$tmpid["index"] = -1;foreach($plist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>"<?php if($rs && $rs['pid'] && $rs['pid'] == $value['id']){ ?> selected<?php } ?>>
						<?php if($value['parent_id']){ ?>├ <?php } ?>
						<?php echo $value['title'];?>
					</option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("分类");?>
			</label>
			<div class="layui-input-block" id="cid_html">
				<select id="cid" name="cid" lay-ignore style="border:1px solid #D2D2D2;line-height:32px;width:100%;">
					<option value=""><?php if(!$clist){ ?><?php echo P_Lang("无分类");?><?php } else { ?><?php echo P_Lang("不关联分类");?><?php } ?></option>
					<?php $tmpid["num"] = 0;$clist=is_array($clist) ? $clist : array();$tmpid = array();$tmpid["total"] = count($clist);$tmpid["index"] = -1;foreach($clist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>"<?php if($rs && $rs['cid'] && $rs['cid'] == $value['id']){ ?> selected<?php } ?>>
						<?php echo $value['_space'];?>
						<?php echo $value['title'];?>
					</option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("名称");?>
			</label>
			<div class="layui-input-block">
				<input type="text" name="title" value="<?php echo $rs['title'];?>" class="layui-input" />
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("标识");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" name="identifier" id="identifier" value="<?php echo $rs['identifier'];?>" class="layui-input" />
			</div>
			<div class="layui-input-inline auto gray lh38">
				<div class="layui-btn-group" id="HTML_NODE_BUTTONS_INDENTIFIER">
					<input type="button" value="<?php echo P_Lang("随机");?>" onclick="$.admin.rand('identifier')" class="layui-btn layui-btn-sm" />
				</div>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("数量");?>
			</label>
			<div class="layui-input-inline short">
				<input type="text" name="psize" value="<?php echo $rs['psize'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("设置默认要读取标签下的文章数，仅在未指定文章时有效");?>
			</div>
		</div>
		
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("类型");?>
			</label>
			<div class="layui-input-block">
				<input type="radio" name="type" value="0"<?php if(!$rs['type']){ ?> checked<?php } ?> title="<?php echo P_Lang("内容");?>" />
				<input type="radio" name="type" value="1"<?php if($rs['type']){ ?> checked<?php } ?> title="<?php echo P_Lang("列表");?>" />
			</div>
			<div class="layui-input-block mtop">
				<?php echo P_Lang("内容即只读一条信息，有绑定主题随机读绑定的，无绑定读随机一条");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("状态");?>
			</label>
			<div class="layui-input-block">
				<input type="radio" name="status" value="0"<?php if(!$rs['status']){ ?> checked<?php } ?> title="<?php echo P_Lang("未启用");?>" />
				<input type="radio" name="status" value="1"<?php if($rs['status']){ ?> checked<?php } ?> title="<?php echo P_Lang("已启用");?>" />
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("排序");?>
			</label>
			<div class="layui-input-inline short">
				<input type="text" name="taxis" value="<?php echo $rs['taxis'] ? $rs['taxis'] : 255;?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("值越小越往前排");?>
			</div>
		</div>	
	</div>
</div>
</form>
<?php $this->assign("is_open","true"); ?><?php $this->output("foot_lay","file",true,false); ?>