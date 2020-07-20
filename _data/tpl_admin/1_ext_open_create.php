<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_open","file",true,false); ?>
<script type="text/javascript" src="<?php echo add_js('fields.js');?>"></script>
<script type="text/javascript">
function save()
{
	var obj = art.dialog.opener;
	$("#ext_add").ajaxSubmit({
		'url':get_url('ext','save'),
		'type':'post',
		'dataType':'json',
		'success':function(rs){
			if(rs.status){
				$.dialog.alert('添加成功',function(){
					obj.$.dialog.close();
					obj.$.phpok.reload();
				},'succeed');
				return true;
			}
			$.dialog.alert(rs.info);
			return false;
		}
	});
}
</script>
<form method="post" id="ext_add">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
<div class="table">
	<div class="title">
		字段名称：
		<span class="note">设置一个名称，该名称在表单的头部信息显示</span></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="text" id="title" name="title" class="default" /></td>
			<td><div id="title_note"></div></td>
		</tr>
		</table>
	</div>
</div>

<div class="table">
	<div class="title">
		字段备注：
		<span class="note">仅限后台管理使用，用于查看这个字段主要做什么</span></span>
	</div>
	<div class="content"><input type="text" id="note" name="note" class="long" /></div>
</div>

<div class="table">
	<div class="title">
		字段标识：
		<span class="note">仅限 <span class="darkblue b">字母、数字及下划线，且必须以字母开头</span></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="text" id="identifier" name="identifier" class="default" /></td>
			<td><div id="identifier_note"></div></td>
		</tr>
		</table>
	</div>
</div>

<div class="table">
	<div class="title">
		表单类型：
		<span class="note">请选择字段要使用的表单</span>
	</div>
	<div class="content">
		<select name="form_type" id="form_type" onchange="_phpok_form_opt(this.value,'form_type_ext','<?php echo $id;?>','fields')">
			<option value="">请选择…</option>
			<?php $form_list_id["num"] = 0;$form_list=is_array($form_list) ? $form_list : array();$form_list_id = array();$form_list_id["total"] = count($form_list);$form_list_id["index"] = -1;foreach($form_list as $key=>$value){ $form_list_id["num"]++;$form_list_id["index"]++; ?>
			<option value="<?php echo $key;?>"<?php if($key == $rs['form_type']){ ?> selected<?php } ?>><?php echo $value;?></option>
			<?php } ?>
		</select>
	</div>
</div>

<div id="form_type_ext" style="display:none;"></div>

<div class="table">
	<div class="title">
		CSS：
		<span class="note">长度不能超过250个字符，建议您不要在这里设置宽高</span>
	</div>
	<div class="content"><input type="text" id="form_style" name="form_style" class="long" value="<?php echo $rs['form_style'];?>" /></div>
</div>

<div class="table">
	<div class="title">
		表单默认值：
		<span class="note">设置表单默认值，如果表单中有多个值，请用英文逗号隔开</span>
	</div>
	<div class="content"><input type="text" id="content" name="content" class="long" value="<?php echo $rs['content'];?>" /></div>
</div>


<div class="table">
	<div class="title">
		接收数据格式化：
		<span class="note">设置文本常见格式，如HTML，整型，浮点型等</span>
	</div>
	<div class="content">
		<select name="format" id="format">
			<?php if(!$id){ ?><option value="">请选择…</option><?php } ?>
			<?php $format_list_id["num"] = 0;$format_list=is_array($format_list) ? $format_list : array();$format_list_id = array();$format_list_id["total"] = count($format_list);$format_list_id["index"] = -1;foreach($format_list as $key=>$value){ $format_list_id["num"]++;$format_list_id["index"]++; ?>
			<option value="<?php echo $key;?>"<?php if($rs['format'] == $key){ ?> selected<?php } ?>><?php echo $value;?></option>			
			<?php } ?>
		</select>
	</div>
</div>

<div class="table">
	<div class="title">
		排序：
		<span class="note">用于被使用的字段人工排序</span>
	</div>
	<div class="content"><input type="text" id="taxis" name="taxis" class="short" value="<?php echo $taxis;?>" /></div>
</div>
</form>
<?php $this->output("foot_open","file",true,false); ?>