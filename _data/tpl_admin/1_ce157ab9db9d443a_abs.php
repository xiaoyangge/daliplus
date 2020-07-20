<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php if($_rs['is_multiple']){ ?>
<select name="<?php echo $_rs['identifier'];?>[]" id="<?php echo $_rs['identifier'];?>" lay-ignore multiple="true" style="<?php echo $_rs['form_style'];?>">
	<?php if($_grouplist){ ?>
		<?php $tmpid["num"] = 0;$_grouplist=is_array($_grouplist) ? $_grouplist : array();$tmpid = array();$tmpid["total"] = count($_grouplist);$tmpid["index"] = -1;foreach($_grouplist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<optgroup label="<?php echo $value;?>">
			<?php $idxx["num"] = 0;$_rslist=is_array($_rslist) ? $_rslist : array();$idxx = array();$idxx["total"] = count($_rslist);$idxx["index"] = -1;foreach($_rslist as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
			<?php if($v['cate_id'] == $key){ ?>
			<option value="<?php echo $v['val'];?>"<?php if($_rs['content'] && in_array($v['val'],$_rs['content'])){ ?> selected<?php } ?>><?php echo $v['title'];?></option>	
			<?php } ?>
			<?php } ?>
		</optgroup>
		<?php } ?>
	<?php } else { ?>
		<?php $tmpid["num"] = 0;$_rslist=is_array($_rslist) ? $_rslist : array();$tmpid = array();$tmpid["total"] = count($_rslist);$tmpid["index"] = -1;foreach($_rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<option value="<?php echo $value['val'];?>"<?php if(in_array($value['val'],$_rs['content'])){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
		<?php } ?>
	<?php } ?>
</select>
<?php } else { ?>
	<?php if($_is_step){ ?>
	<style type="text/css">
	ul.select{list-style:none;margin:0;padding:0;}
	ul.select li{float:left;margin-right:10px;}
	</style>
	<div id="<?php echo $_rs['identifier'];?>_html"></div>
	<script type="text/javascript">
	$(document).ready(function(){
		$.phpok_form_select.change('<?php echo $_group_id;?>','<?php echo $_rs['identifier'];?>','<?php echo $_rs['content'];?>','<?php echo $_group_type;?>');
	});
	</script>
	<?php } else { ?>
	<select id="<?php echo $_rs['identifier'];?>" name="<?php echo $_rs['identifier'];?>" lay-ignore>
		<?php if($_rs['empty_val']){ ?>
		<option value=""><?php echo $_rs['empty_val'];?></option>
		<?php } ?>
		<?php $_rs['content'] = is_array($_rs['content']) ? $_rs['content']['id'] : $_rs['content'];?>
		<?php $tmpid["num"] = 0;$_rslist=is_array($_rslist) ? $_rslist : array();$tmpid = array();$tmpid["total"] = count($_rslist);$tmpid["index"] = -1;foreach($_rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<option value="<?php echo $value['val'];?>"<?php if($value['val'] == $_rs['content']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
		<?php } ?>
	</select>
	<?php } ?>
<?php } ?>
