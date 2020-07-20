<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><input type="hidden" name="ext_form_id" id="ext_form_id" value="p_name,p_val,p_type,p_width,p_add,p_line,lock_row" />
<div class="table">
	<div class="title">
		<?php echo P_Lang("参数列表：");?>
		<span class="note"><?php echo P_Lang("一行一个参数名称");?></span>
	</div>
	<div class="content">
		<textarea name="p_name" id="p_name" class="long" style="height:80px;"><?php echo $rs['p_name'];?></textarea>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("参数扩展：");?><span class="note"><?php echo P_Lang("启用后允许自行添加扩展属性名称（默认为支持）");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><label><input type="radio" name="p_add" value="yes"<?php if(!$rs['p_add'] || $rs['p_add'] != 'no'){ ?> checked<?php } ?> /><?php echo P_Lang("支持");?></label></li>
			<li><label><input type="radio" name="p_add" value="no"<?php if($rs['p_add'] && $rs['p_add'] == 'no'){ ?> checked<?php } ?> /><?php echo P_Lang("不支持");?></label></li>
		</ul>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("属性：");?>
		<span class="note"><?php echo P_Lang("内容模式即是一个参数名称对应一个内容，列表模式即支持多条内容扩展");?></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><label><input type="radio" name="p_type" id="p_type" value="0"<?php if(!$rs['p_type']){ ?> checked<?php } ?> onclick="$.phpokform.param_type_set(0)" />内容模式</label></td>
			<td><label><input type="radio" name="p_type" id="p_type" value="1"<?php if($rs['p_type']){ ?> checked<?php } ?> onclick="$.phpokform.param_type_set(1)" />列表模式</label></td>
		</tr>
		</table>
	</div>
</div>
<div id="p_val_type_html"<?php if(!$rs['p_type']){ ?> style="display:none"<?php } ?>>
<div class="table">
	<div class="title">
		<?php echo P_Lang("参数值：");?>
		<span class="note"><?php echo P_Lang("一行一组参数值，列表模式的参数值有多个，用英文逗号隔开");?></span>
	</div>
	<div class="content">
		<textarea name="p_val" id="p_val" class="long" style="height:80px;"><?php echo $rs['p_val'];?></textarea>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("行操作：");?>
		<span class="note"><?php echo P_Lang("是否支持行删除或添加");?></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><label><input type="radio" name="p_line" id="p_line" value="0"<?php if(!$rs['p_line']){ ?> checked<?php } ?> />禁止</label></td>
			<td><label><input type="radio" name="p_line" id="p_line" value="1"<?php if($rs['p_line']){ ?> checked<?php } ?> />允许</label></td>
		</tr>
		</table>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("列锁定：");?>
		<span class="note"><?php echo P_Lang("不锁定请输入0，要锁定请输入指定的列序，如第一列写1，第二列写2");?></span>
	</div>
	<div class="content">
		<input type="text" name="lock_row" id="lock_row" value="<?php echo $rs['lock_row'];?>" class="short" />
	</div>
</div>
</div>
