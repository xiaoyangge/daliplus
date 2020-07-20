<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_open","file",true,false); ?>
<script type="text/javascript">
function save()
{
	var opener = $.dialog.opener;
	$("#post_save").ajaxSubmit({
		'url':get_url('tag','save'),
		'type':'post',
		'dataType':'json',
		'success':function(rs){
			if(rs.status){
				$.dialog.alert('标签提交成功',function(){
					opener.$.phpok.reload();
				},'succeed');
				return true;
			}
			opener.$.dialog.alert(rs.info);
			return false;
		}
	});
	return true;
}
</script>
<form method="post" id="post_save" onsubmit="return false">
<?php if($id){ ?><input type="hidden" name="id" id="id" value="<?php echo $id;?>" /><?php } ?>
<div class="table">
	<div class="title">
		<?php echo P_Lang("标签");?> <span class="note"><?php echo P_Lang("请设置好相应的标签");?></span>
	</div>
	<div class="content">
		<input type="text" name="title" id="title" value="<?php echo $rs['title'];?>" class="long" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("提示文字");?> <span class="note"><?php echo P_Lang("自定义链接的提示文字，有助于SEO优化");?></span>
	</div>
	<div class="content">
		<input type="text" name="alt" id="alt" value="<?php echo $rs['alt'];?>" class="long" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("自定义标签网址");?> <span class="note"><?php echo P_Lang("仅限字母，数字及中划线");?></span>
	</div>
	<div class="content">
		<input type="text" name="identifier" id="identifier" value="<?php echo $rs['identifier'];?>" class="long" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("目标网址");?> <span class="note"><?php echo P_Lang("这里主要是填写外部网址，如不需要，请留空");?></span>
	</div>
	<div class="content">
		<input type="text" name="url" id="url" value="<?php echo $rs['url'];?>" class="long" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("SEO标题");?> <span class="note"><?php echo P_Lang("用于替代系统原有的标题，仅限目标网址为空有效");?></span>
	</div>
	<div class="content">
		<input type="text" name="seo_title" id="seo_title" value="<?php echo $rs['seo_title'];?>" class="long" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("SEO关键字");?> <span class="note"><?php echo P_Lang("多个关键字建议用英文逗号隔开，仅限目标网址为空有效");?></span>
	</div>
	<div class="content">
		<input type="text" name="seo_keywords" id="seo_keywords" value="<?php echo $rs['seo_keywords'];?>" class="long" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("SEO描述");?> <span class="note"><?php echo P_Lang("建议不超过80个汉字，仅限目标网址为空有效");?></span>
	</div>
	<div class="content">
		<input type="text" name="seo_desc" id="seo_desc" value="<?php echo $rs['seo_desc'];?>" class="long" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("自定义模板");?> <span class="note"><?php echo P_Lang("自定义标签模板，仅列表有效");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><input type="text" name="tpl" id="tpl" value="<?php echo $rs['tpl'];?>" class="default" /></li>
			<li>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('tpl')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#tpl').val('');" class="layui-btn layui-btn-sm layui-btn-warm" />
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("打开方式");?> <span class="note"><?php echo P_Lang("链接打开方式");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><label><input type="radio" name="target" value="1"<?php if($rs['target']){ ?> checked<?php } ?> /><?php echo P_Lang("新窗口");?></label></li>
			<li><label><input type="radio" name="target" value="0"<?php if(!$rs['target']){ ?> checked<?php } ?> /><?php echo P_Lang("当前窗口");?></label></li>
		</ul>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("替换次数");?> <span class="note"><?php echo P_Lang("请选择要替换的次数，默认为3次");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><label><input type="radio" name="replace_count" value="1"<?php if($rs['replace_count'] == 1){ ?> checked<?php } ?> /><?php echo P_Lang("1次");?></label></li>
			<li><label><input type="radio" name="replace_count" value="3"<?php if($rs['replace_count'] == 3 || !$rs['replace_count']){ ?> checked<?php } ?> /><?php echo P_Lang("3次");?></label></li>
			<li><label><input type="radio" name="replace_count" value="5"<?php if($rs['replace_count'] == 5){ ?> checked<?php } ?> /><?php echo P_Lang("5次");?></label></li>
			<li><label><input type="radio" name="replace_count" value="7"<?php if($rs['replace_count'] == 7){ ?> checked<?php } ?> /><?php echo P_Lang("7次");?></label></li>
			<li><label><input type="radio" name="replace_count" value="9"<?php if($rs['replace_count'] == 9){ ?> checked<?php } ?> /><?php echo P_Lang("9次");?></label></li>
			<li><label><input type="radio" name="replace_count" value="0"<?php if(!$rs['replace_count']){ ?> checked<?php } ?> /><?php echo P_Lang("不替换");?></label></li>
		</ul>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("全局属性");?> <span class="note"><?php echo P_Lang("设置为是，表示系统为空时，会尝试以这些标签作为文章标签来使用");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><label><input type="radio" name="is_global" value="1"<?php if($rs['is_global']){ ?> checked<?php } ?> /><?php echo P_Lang("是");?></label></li>
			<li><label><input type="radio" name="is_global" value="0"<?php if(!$rs['is_global']){ ?> checked<?php } ?> /><?php echo P_Lang("否");?></label></li>
		</ul>
	</div>
</div>
</form>
<?php $this->output("foot_open","file",true,false); ?>