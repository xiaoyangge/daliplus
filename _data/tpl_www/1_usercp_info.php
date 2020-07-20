<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = "修改个人资料 - 会员中心";?><?php $this->assign("title",$title); ?><?php $this->output("header","file",true,false); ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#userinfo_submit").submit(function(){
		$(this).ajaxSubmit({
			type:'post',
			url: api_url('usercp','info'),
			dataType:'json',
			success: function(rs){
				if(rs.status){
					$.dialog.alert("您的信息更新成功",function(){
						$.phpok.reload();
					},'succeed');
				}else{
					$.dialog.alert(rs.info);
					return false;
				}
			}
		});
		return false;
	});
});
</script>
<style type="text/css">
.cp-gender{margin-top:10px;}
</style>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left"><?php $this->output("block/usercp_nav","file",true,false); ?></div>
	<div class="right">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">修改个人资料</div>
			<div class="am-panel-bd">
				<form method="post" id="userinfo_submit" class="am-form am-form-horizontal">
					<input type="hidden" name="avatar" id="avatar" value="<?php echo $rs['avatar'];?>" />
					<?php $extlist_id["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$extlist_id = array();$extlist_id["total"] = count($extlist);$extlist_id["index"] = -1;foreach($extlist as $key=>$value){ $extlist_id["num"]++;$extlist_id["index"]++; ?>
					<div class="am-form-group">
						<label class="am-u-sm-2 am-form-label"><?php echo $value['title'];?></label>
						<div class="am-u-sm-10 cp-<?php echo $value['identifier'];?>"><?php echo $value['html'];?></div>
					</div>
					<?php } ?>
					<div class="am-form-group">
						<label class="am-u-sm-2 am-form-label"></label>
						<div class="am-u-sm-10"><input type="submit" value="提交修改" class="am-btn am-btn-primary" /></div>
					</div>
				</form>
			</div>
		</div>		
	</div>
	<div class="clear"></div>
</div>
<?php $this->output("footer","file",true,false); ?>