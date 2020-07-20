<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_open","file",true,false); ?>
<form method="post" id="post_save" onsubmit="return false">
<div class="table">
	<div class="title">
		<?php echo P_Lang("忽略域名：");?><span class="note"><?php echo P_Lang("请填写图片不需要本地化的域名，一行一个域名，网站自身域名自动忽略");?></span>
	</div>
	<div class="content">
		<textarea name="domain1" id="domain1" class="long" style="height:160px"><?php echo $rs['domain1'];?></textarea>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("本地化的域名：");?><span class="note"><?php echo P_Lang("全部都要请填写星号，一行一个域名");?></span>
	</div>
	<div class="content">
		<textarea name="domain2" id="domain2" class="long" style="height:160px"><?php echo $rs['domain2'];?></textarea>
	</div>
</div>
</form>
<?php $this->output("foot_open","file",true,false); ?>