<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><style type="text/css">
ul.checkbox_<?php echo $_rs['identifier'];?>{list-style:none;margin:0;padding:0;line-height:36px;}
ul.checkbox_<?php echo $_rs['identifier'];?> label{vertical-align:middle;display:inline-block;}
ul.checkbox_<?php echo $_rs['identifier'];?> input{margin:-3px 5px 0 0;padding:0;border:0;vertical-align:middle;}
</style>
<?php if($_rs['put_order']){ ?>
<style type="text/css">
ul.checkbox_<?php echo $_rs['identifier'];?> li{display:block;}
</style>
<?php } else { ?>
<style type="text/css">
ul.checkbox_<?php echo $_rs['identifier'];?>:after{content:'&nbsp;';display: block;visibility:hidden;height:0;line-height:0;clear:both;overflow:hidden;}
ul.checkbox_<?php echo $_rs['identifier'];?> li{float:left;margin-right:15px;}
</style>
<?php } ?>
<ul class="checkbox checkbox_<?php echo $_rs['identifier'];?>">
	<?php $_rslist_id["num"] = 0;$_rslist=is_array($_rslist) ? $_rslist : array();$_rslist_id = array();$_rslist_id["total"] = count($_rslist);$_rslist_id["index"] = -1;foreach($_rslist as $key=>$value){ $_rslist_id["num"]++;$_rslist_id["index"]++; ?>
	<li><label><input type="checkbox" lay-ignore name="<?php echo $_rs['identifier'];?>[]" title="<?php echo $value['title'];?>" value="<?php echo $value['val'];?>"<?php if($value && $_rs['content'] && in_array($value['val'],$_rs['content'])){ ?> checked<?php } ?> /><?php echo $value['title'];?></label></li>
	<?php } ?>
</ul>