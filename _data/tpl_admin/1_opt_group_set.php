<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_open","file",true,false); ?>
<script type="text/javascript">
function save()
{
	var opener = $.dialog.opener;
	$("#post_save").ajaxSubmit({
		'url':get_url('opt','group_save'),
		'type':'post',
		'dataType':'json',
		'success':function(rs){
			if(rs.status){
				var tip = ($("#id").val() > 0) ? '<?php echo P_Lang("组信息修改成功");?>' : '<?php echo P_Lang("组信息添加成功");?>';
				$.dialog.alert(tip,function(){
					opener.$.phpok.reload();
				},'succeed');
				return true;
			}
			$.dialog.alert(rs.info);
			return false;
		}
	});
}
</script>
<form method="post" id="post_save">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
<div class="table">
	<div class="title">
		<?php echo P_Lang("名称：");?><span class="note"><?php echo P_Lang("请填写选项组名称");?></span>
	</div>
	<div class="content">
		<input type="text" name="title" id="title" value="<?php echo $rs['title'];?>" class="default" />
	</div>
</div>
<div class="table">
	<div class="title">
		分割符：<span class="note">仅限组有联动数组时有效，留空时使用英文竖线表示，一经设置请不要轻易改动，否则会解析错误</span>
	</div>
	<div class="content">
		<input type="text" name="link_symbol" id="link_symbol" value="<?php echo $rs['link_symbol'];?>" class="short" />
	</div>
</div>
</form>
<?php $this->output("foot_open","file",true,false); ?>