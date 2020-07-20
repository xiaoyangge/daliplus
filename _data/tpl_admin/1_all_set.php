<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" id="post_save" class="layui-form" onsubmit="return $.admin_all.ext_save()">
<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("内容");?>_<?php echo P_Lang("标识");?> <span class="darkblue"><?php echo $rs['identifier'];?></span>
		<?php if($popedom['gset'] && $session['adm_develop']){ ?>
		<div class="layui-btn-group fr">
			<input type="button" value="<?php echo P_Lang("维护设置");?>" onclick="$.admin_all.group(<?php echo $id;?>)" class="layui-btn layui-btn-sm" />
			<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_all.group_delete(<?php echo $id;?>)" class="layui-btn layui-btn-sm layui-btn-danger" />
		</div>
		<?php } ?>
	</div>
	<div class="layui-card-body">
		<?php $extlist_id["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$extlist_id = array();$extlist_id["total"] = count($extlist);$extlist_id["index"] = -1;foreach($extlist as $key=>$value){ $extlist_id["num"]++;$extlist_id["index"]++; ?>
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
					<input type="button" value="<?php echo P_Lang("编辑");?>" class="layui-btn layui-btn-xs" onclick="ext_edit('<?php echo $value['identifier'];?>','<?php echo $ext_module;?>')" />
					<input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-xs layui-btn-danger" onclick="ext_delete('<?php echo $value['identifier'];?>','<?php echo $ext_module;?>','<?php echo $value['title'];?>')" />
				</div>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		<?php if($popedom['ext'] && $session['adm_develop']){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("扩展");?>
			</label>
			<div class="layui-input-inline long" id="_quick_insert" data-id="<?php echo $ext_module;?>"></div>
		</div>
		<?php } ?>
	</div>
</div>
<input type="hidden" data-name="fields" value="<?php echo $value['identifier'];?>" disabled />
<div class="submit-info-clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("提交");?>" class="layui-btn layui-btn-lg layui-btn-danger" />
		<input type="button" value="<?php echo P_Lang("取消关闭");?>" class="layui-btn layui-btn-lg layui-btn-primary" onclick="$.admin.close()" />
	</div>
</div>

</form>
<?php $this->output("foot_lay","file",true,false); ?>