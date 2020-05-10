<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<style type="text/css">
.layui-form-label{width:30%;text-align: right;}
</style>
<div class="layui-card">
	<div class="layui-card-body">
		<?php $tmpid["num"] = 0;$list=is_array($list) ? $list : array();$tmpid = array();$tmpid["total"] = count($list);$tmpid["index"] = -1;foreach($list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<div class="layui-form-item">
			<label class="layui-form-label" >
				<?php if($value[3]){ ?><i class="layui-icon layui-tips" lay-tips="<?php echo $value[3];?>">&#xe702;</i><?php } ?>
				<?php echo $value[0];?>
			</label>
			<div class="layui-form-mid"<?php if($value[2]){ ?> style="<?php echo $value[2];?>"<?php } ?>>
				<?php echo $value[1];?>
			</div>
		</div>
		<?php } ?>
		<?php if($showphpinfo){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label" >
				<?php echo P_Lang("查看PHPInfo");?>
			</label>
			<div class="layui-form-mid">
				<a href="javascript:$.phpok.open('<?php echo phpok_url(array('ctrl'=>'index','func'=>'info','php'=>'1'));?>');void(0)">PHPInfo</a>
			</div>
		</div>
		<?php } ?>
		
	</div>
</div>

<?php $this->assign("is_open","true"); ?><?php $this->output("foot_lay","file",true,false); ?>