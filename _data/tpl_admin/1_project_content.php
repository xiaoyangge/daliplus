<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" class="layui-form" id="<?php echo $ext_module;?>" onsubmit="return $.admin_project.extinfo_save('<?php echo $ext_module;?>')">
<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("扩展字段");?></div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("名称");?></label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="title" name="title" class="layui-input" value="<?php echo $rs['title'];?>" />
			</div>
			<div class="layui-input-inline auto gray"><?php echo P_Lang("设置名称，该名称将在网站前台导航中使用");?></div>
		</div>
		<?php $tmpid["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$tmpid = array();$tmpid["total"] = count($extlist);$tmpid["index"] = -1;foreach($extlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo $value['title'];?>
				<div class="darkblue"><small>[<?php echo $value['identifier'];?>]</small></div>
			</label>
			<?php if($value['note']){ ?><div class="layui-input-block gray" style="line-height:38px;"><?php echo $value['note'];?></div><?php } ?>
			<div class="layui-input-block">
				<?php echo $value['html'];?>
			</div>
			<?php if($popedom['ext'] && $session['adm_develop']){ ?>
			<div class="layui-input-block mtop">
				<div class="layui-btn-group">
					<?php if($ext_module != 'add-cate'){ ?>
					<input type="button" value="<?php echo P_Lang("编辑");?>" class="layui-btn layui-btn-xs" onclick="ext_edit('<?php echo $value['identifier'];?>','<?php echo $ext_module;?>')" />
					<?php } ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-xs layui-btn-normal" onclick="ext_delete('<?php echo $value['identifier'];?>','<?php echo $ext_module;?>','<?php echo $value['title'];?>')" />
				</div>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		<?php if($popedom['ext']){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("扩展字段");?></label>
			<div class="layui-input-inline long" id="_quick_insert" data-module="<?php echo $ext_module;?>"></div>
		</div>
		<?php } ?>
	
	</div>
</div>
<div class="submit-info-clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("保存数据");?>" class="layui-btn layui-btn-lg layui-btn-danger" />
		<input type="button" value="<?php echo P_Lang("关闭");?>" class="layui-btn layui-btn-lg layui-btn-primary" onclick="$.admin.close()" />
		<span style="padding-left:2em;color:#ccc;">保存不会关闭页面，请手动关闭</span>
	</div>
</div>

</form>
<?php $this->output("foot_lay","file",true,false); ?>