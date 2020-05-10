<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><input type="hidden" name="ext_form_id" id="ext_form_id" value="cate_id,is_multiple" />
<div class="table">
	<div class="title">
		<?php echo P_Lang("附件分类");?> <span class="note"><?php echo P_Lang("选择附件所属分类，注意不同分类上传不同类型的文件");?></span>
	</div>
	<div class="content">
		<select id="cate_id" name="cate_id" class="w99">
			<option value=""><?php echo P_Lang("默认存储到…");?></option>
			<?php $tmpid["num"] = 0;$catelist=is_array($catelist) ? $catelist : array();$tmpid = array();$tmpid["total"] = count($catelist);$tmpid["index"] = -1;foreach($catelist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<option value="<?php echo $value['id'];?>"<?php if($rs['cate_id'] == $value['id']){ ?> selected<?php } ?>>
				<?php echo $value['title'];?><?php if($value['filetypes']){ ?>(<?php echo $value['filetypes'];?>)<?php } ?><?php if($value['etype']){ ?>_<?php echo P_Lang("云存储");?><?php } else { ?>_<?php echo P_Lang("根目录");?>/<?php echo $value['root'];?><?php echo $value['folder'];?><?php } ?>
			</option>
			<?php } ?>
		</select>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("附件数量");?><span class="note"></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><label><input type="radio" name="is_multiple" value="0"<?php if(!$rs['is_multiple']){ ?> checked<?php } ?> /><?php echo P_Lang("单附件上传");?></label></li>
			<li><label><input type="radio" name="is_multiple" value="1"<?php if($rs['is_multiple']){ ?> checked<?php } ?> /><?php echo P_Lang("多附件上传");?></label></li>
		</ul>
	</div>
</div>