<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title",$rs['title']); ?><?php $this->output("head_open","file",true,false); ?>
<div class="list">
<table width="100%">
<tr>
	<td><?php echo P_Lang("复制操作");?></td>
	<td>
		<div class="button-group">
			<input type="button" value="<?php echo P_Lang("名称");?>" class="layui-btn phpok-copy" data-clipboard-text="<?php echo $rs['title'];?>" title="<?php echo $rs['title'];?>" />
			<input type="button" value="<?php echo P_Lang("文件名");?>" class="layui-btn phpok-copy" data-clipboard-text="<?php echo $rs['name'];?>" title="<?php echo $rs['name'];?>" />
			<input type="button" value="<?php echo P_Lang("扩展名");?>" class="layui-btn phpok-copy" data-clipboard-text="<?php echo $rs['ext'];?>" title="<?php echo $rs['ext'];?>" />
			<input type="button" value="<?php echo P_Lang("目录");?>" class="layui-btn phpok-copy" data-clipboard-text="<?php echo $rs['folder'];?>" title="<?php echo $rs['folder'];?>" />
			<input type="button" value="<?php echo P_Lang("目录+文件名");?>" class="layui-btn phpok-copy" data-clipboard-text="<?php echo $rs['filename'];?>" title="<?php echo $rs['filename'];?>" />
			<input type="button" value="<?php echo P_Lang("附件地址");?>" class="layui-btn phpok-copy" data-clipboard-text="<?php echo $sys['url'];?><?php echo $rs['filename'];?>" title="<?php echo $sys['url'];?><?php echo $rs['filename'];?>" />
		</div>
	</td>
</tr>
<tr>
	<td><?php echo P_Lang("附件名称");?></td>
	<td><?php echo $rs['title'];?></td>
</tr>
<tr>
	<td>上传时间：</td>
	<td><?php echo date('Y-m-d H:i:s',$rs['addtime']);?></td>
</tr>
<tr>
	<td>存储目录：</td>
	<td><?php echo $rs['folder'];?></td>
</tr>
<tr>
	<td>文件名：</td>
	<td><?php echo $rs['name'];?></td>
</tr>
<tr>
	<td>下载次数：</td>
	<td><?php echo $rs['download'];?></td>
</tr>
</table>
</div>
<?php if($ispic){ ?>
<style type="text/css">
.img{max-width:100%}
</style>
<div style="margin-top:3px;"><img src="<?php echo $rs['filename'];?>" class="img"/></div>
<?php } else { ?>
<div class="list">
<table>
<tr>
	<td>&nbsp;</td>
	<td><input type="button" value="点这里下载" class="layui-btn" onclick="window.open('<?php echo $rs['filename'];?>')" /></td>
</tr>
</table>
</div>
<?php } ?>

<?php $this->output("foot_open","file",true,false); ?>