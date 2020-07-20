<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("nopadding","true"); ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-body">
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<input type="button" value="<?php echo $value['title'];?>" class="layui-btn layui-btn-sm" onclick="$.admin_tag.selected(this.value,'<?php echo $rs['separator'];?>')" />
		<?php } ?>
		<div class="clear"></div>
		<?php $this->output("pagelist","file",true,false); ?>
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>
