<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><input type="hidden" name="ext_form_id" id="ext_form_id" value="option_list,is_multiple,width,ext_select,empty_val" />
<div class="table">
	<div class="title">
		内容来源：
		<span class="note">请选择下拉菜单信息来源</span>
	</div>
	<div class="content">
		<table>
		<tr>
			<td><select name="option_list" id="option_list">
					<option value="">请选择…</option>
					<optgroup label="选项">
						<?php $opt_list_id["num"] = 0;$opt_list=is_array($opt_list) ? $opt_list : array();$opt_list_id = array();$opt_list_id["total"] = count($opt_list);$opt_list_id["index"] = -1;foreach($opt_list as $key=>$value){ $opt_list_id["num"]++;$opt_list_id["index"]++; ?>
						<option value="opt:<?php echo $value['id'];?>"<?php if($rs['option_list'] == "opt:".$value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
						<?php } ?>
					</optgroup>
					<?php if($project_list){ ?>
					<optgroup label="子项">
						<?php $project_list_id["num"] = 0;$project_list=is_array($project_list) ? $project_list : array();$project_list_id = array();$project_list_id["total"] = count($project_list);$project_list_id["index"] = -1;foreach($project_list as $key=>$value){ $project_list_id["num"]++;$project_list_id["index"]++; ?>
						<option value="project:<?php echo $value['id'];?>"<?php if($rs['option_list'] == "project:".$value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
						<?php } ?>
					</optgroup>					
					<?php } ?>
					<?php if($title_list){ ?>
					<optgroup label="主题">
						<?php $title_list_id["num"] = 0;$title_list=is_array($title_list) ? $title_list : array();$title_list_id = array();$title_list_id["total"] = count($title_list);$title_list_id["index"] = -1;foreach($title_list as $key=>$value){ $title_list_id["num"]++;$title_list_id["index"]++; ?>
						<option value="title:<?php echo $value['id'];?>"<?php if($rs['option_list'] == "title:".$value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
						<?php } ?>
					</optgroup>
					<?php } ?>
					<?php if($catelist){ ?>
					<optgroup label="分类">
						<?php $catelist_id["num"] = 0;$catelist=is_array($catelist) ? $catelist : array();$catelist_id = array();$catelist_id["total"] = count($catelist);$catelist_id["index"] = -1;foreach($catelist as $key=>$value){ $catelist_id["num"]++;$catelist_id["index"]++; ?>
						<option value="cate:<?php echo $value['id'];?>"<?php if($rs['option_list'] == "cate:".$value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
						<?php } ?>
					</optgroup>
					<?php } ?>
				</select>
			</td>
		</tr>
		</table>		
	</div>
</div>
<div class="table">
	<div class="title">
		单选内容：
		<span class="note">仅限于下内容来源为空的情况下有效，这里一行一个值，复杂操作请到表单选项里维护</span>
	</div>
	<div class="content">
		<textarea name="ext_select" style="width:98%;height:180px;"><?php echo $rs['ext_select'];?></textarea>
	</div>
</div>
<div class="table">
	<div class="title">
		属性：
		<span class="note">设置下拉的类型</span>
	</div>
	<div class="content">
		<table>
		<tr>
			<td><label><input type="radio" name="is_multiple" value="0"<?php if(!$rs['is_multiple']){ ?> checked<?php } ?> /> 单选</label></td>
			<td><label><input type="radio" name="is_multiple" value="1"<?php if($rs['is_multiple']){ ?> checked<?php } ?> /> 多选</label></td>
		</tr>
		</table>
	</div>
</div>

<div class="table">
	<div class="title">
		表单宽度：
		<span class="note">设置表单的宽度，这是只需要<span class="red">填写数字</span></span>
	</div>
	<div class="content">
		<input type="text" name="width" id="width" value="<?php echo $rs['width'];?>" /> px
	</div>
</div>
<div class="table">
	<div class="title">
		空值选项：
		<span class="note">不使用空值选项，请留空</span>
	</div>
	<div class="content">
		<input type="text" name="empty_val" id="empty_val" value="<?php echo $rs['empty_val'];?>" />
	</div>
</div>