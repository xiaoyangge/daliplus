<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_open","file",true,false); ?>
<form method="post" id="post_save" onsubmit="return false">
<?php if($id){ ?><input type="hidden" id="id" name="id" value="<?php echo $id;?>" /><?php } ?>
<div class="table">
	<div class="title">
		<?php echo P_Lang("字段名称：");?>
		<span class="note"><?php echo P_Lang("设置一个名称，该名称在表单的头部信息显示");?></span></span>
	</div>
	<div class="content">
		<input type="text" id="title" name="title" class="w99" value="<?php echo $rs['title'];?>" />
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("字段备注：");?>
		<span class="note"><?php echo P_Lang("仅限后台管理使用，用于查看这个字段主要做什么");?></span></span>
	</div>
	<div class="content"><input type="text" id="note" name="note" class="w99" value="<?php echo $rs['note'];?>" /></div>
</div>
<?php if(!$id){ ?>
<div class="table">
	<div class="title">
		<?php echo P_Lang("字段标识：");?>
		<span class="note"><?php echo P_Lang("要求");?><span class="darkblue"><?php echo P_Lang("字母、数字及下划线，且必须以字母开头");?></span></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><input type="text" id="identifier" name="identifier" class="default" value="<?php echo $rs['identifier'];?>" /></li>
			<li>
				<div class="button-group">
					<input type="button" value="<?php echo P_Lang("随机生成");?>" onclick="$('#identifier').val($.phpok.rand(10,'letter'))" class="layui-btn" />
				</div>
			</li>
		</ul>		
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("字段类型：");?><span class="note"><?php echo P_Lang("请慎重选择，一经确定后是不能修改的");?></span>
	</div>
	<div class="content">
		<select name="field_type" id="field_type" class="w99">
			<option value=""><?php echo P_Lang("请选择字段类型…");?></option>
			<?php $field_list_id["num"] = 0;$field_list=is_array($field_list) ? $field_list : array();$field_list_id = array();$field_list_id["total"] = count($field_list);$field_list_id["index"] = -1;foreach($field_list as $key=>$value){ $field_list_id["num"]++;$field_list_id["index"]++; ?>
			<option value="<?php echo $key;?>"<?php if($rs['field_type'] == $key){ ?> selected<?php } ?>><?php echo $value['title'];?><?php if($value['note']){ ?>（<?php echo $value['note'];?>）<?php } ?></option>
			<?php } ?>
		</select>
	</div>
</div>
<?php } ?>
<div class="table">
	<div class="title">
		<?php echo P_Lang("表单类型：");?>
		<span class="note"><?php echo P_Lang("请选择字段要使用的表单");?></span>
	</div>
	<div class="content">
		<select id="form_type" name="form_type" class="w99" onchange="$._configForm.option(this.value,'form_type_ext','<?php echo $id;?>','user')">
			<option value=""><?php echo P_Lang("请选择表单…");?></option>
			<?php $tmpid["num"] = 0;$form_list=is_array($form_list) ? $form_list : array();$tmpid = array();$tmpid["total"] = count($form_list);$tmpid["index"] = -1;foreach($form_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<option value="<?php echo $key;?>"<?php if($key == $rs['form_type']){ ?> selected<?php } ?>><?php echo $value['title'];?><?php if($value['note']){ ?>（<?php echo $value['note'];?>）<?php } ?></option>
			<?php } ?>
		</select>
	</div>
</div>
<div id="form_type_ext"></div>
<div class="table">
	<div class="title">
		<span class="edit">
			<?php echo P_Lang("表单样式：");?>
			<span class="note"><?php echo P_Lang("不能超过250个字符，不熟悉CSS，请查相关手册");?></span>
		</span>
	</div>
	<div class="content"><input type="text" id="form_style" name="form_style" class="w99" value="<?php echo $rs['form_style'];?>" /></div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("表单默认值：");?>
		<span class="note"><?php echo P_Lang("设置表单默认值，如果表单中有多个值，请用英文逗号隔开");?></span>
	</div>
	<div class="content"><input type="text" id="content" name="content" class="w99" value="<?php echo $rs['content'];?>" /></div>
</div>


<div class="table">
	<div class="title">
		<?php echo P_Lang("接收数据格式化：");?>
		<span class="note"><?php echo P_Lang("设置文本常见格式，如HTML，整型，浮点型等");?></span>
	</div>
	<div class="content">
		<select name="format" id="format" class="w99">
			<?php $tmpid["num"] = 0;$format_list=is_array($format_list) ? $format_list : array();$tmpid = array();$tmpid["total"] = count($format_list);$tmpid["index"] = -1;foreach($format_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<option value="<?php echo $key;?>"<?php if($rs['format'] == $key){ ?> selected<?php } ?>><?php echo $value['title'];?><?php if($value['note']){ ?>（<?php echo $value['note'];?>）<?php } ?></option>
			<?php } ?>
		</select>
	</div>
</div>

<div class="table">
	<div class="title">
		排序：
		<span class="note">值越小越往前靠，最小值为0，最大值为255</span>
	</div>
	<div class="content"><input type="text" id="taxis" name="taxis" class="short" value="<?php echo $rs['taxis'] ? $rs['taxis'] : 255;?>" /></div>
</div>

<div class="table">
	<div class="title">
		前台可编辑：
		<span class="note">设置字段在前台个人中心是否可编写</span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><label><input type="radio" name="is_front" value="1"<?php if($rs['is_front']){ ?> checked<?php } ?>>是</label></li>
			<li><label><input type="radio" name="is_front" value="0"<?php if(!$rs['is_front']){ ?> checked<?php } ?>>否</label></li>
		</ul>
	</div>
</div>
</form>
<script type="text/javascript">
$(document).ready(function(){
	$._configForm.option("<?php echo $rs['form_type'];?>","form_type_ext",'<?php echo $id;?>','user');
});
</script>
<?php $this->output("foot_open","file",true,false); ?>