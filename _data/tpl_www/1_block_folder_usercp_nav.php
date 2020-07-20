<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><div class="am-panel-group">
	<div class="am-panel am-panel-default">
		<div class="am-panel-hd">个人中心</div>
		<ul class="am-list">
			<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp'));?>"<?php if($sys['ctrl'] == 'usercp' && $sys['func'] == 'index'){ ?> class="am-active"<?php } ?>><i class="am-icon-home am-icon-fw"></i> 会员首页</a></li>
			<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'info'));?>"<?php if($sys['func'] == 'info'){ ?> class="am-active"<?php } ?>><i class="am-icon-user am-icon-fw"></i> 个人资料</a></li>
			<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'avatar'));?>"<?php if($sys['func'] == 'avatar'){ ?> class="am-active"<?php } ?>><i class="am-icon-photo am-icon-fw"></i> 修改头像</a></li>
			<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'address'));?>"<?php if($sys['func'] == 'address'){ ?> class="am-active"<?php } ?>><i class="am-icon-map-marker am-icon-fw"></i> 收货地址</a></li>
			<li><a href="<?php echo phpok_url(array('ctrl'=>'fav'));?>"<?php if($sys['ctrl'] == 'fav'){ ?> class="am-active"<?php } ?>><i class="am-icon-heart am-icon-fw"></i> 收藏夹</a></li>
		</ul>
	</div>
	<div class="am-panel am-panel-default">
		<div class="am-panel-hd">安全设置</div>
		<ul class="am-list">
			<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'passwd'));?>"<?php if($sys['func'] == 'passwd'){ ?> class="am-active"<?php } ?>><i class="am-icon-lock am-icon-fw"></i> 修改密码</a></li>
			<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'mobile'));?>"<?php if($sys['func'] == 'mobile'){ ?> class="am-active"<?php } ?>><i class="am-icon-phone am-icon-fw"></i> 修改手机</a></li>
			<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'email'));?>"<?php if($sys['func'] == 'email'){ ?> class="am-active"<?php } ?>><i class="am-icon-envelope-o am-icon-fw"></i> 修改邮箱</a></li>
		</ul>
	</div>
	<div class="am-panel am-panel-default">
		<div class="am-panel-hd">交易及财富</div>
		<ul class="am-list">
			<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'wealth'));?>"<?php if($sys['func'] == 'wealth'){ ?> class="am-active"<?php } ?>><i class="am-icon-money am-icon-fw"></i> 我的财富</a></li>
			<li><a href="<?php echo phpok_url(array('ctrl'=>'payment'));?>"<?php if($sys['ctrl'] == 'payment' && $sys['func'] == 'index'){ ?> class="am-active"<?php } ?>><i class="am-icon-credit-card am-icon-fw"></i> 在线充值</a></li>
			<li><a href="<?php echo phpok_url(array('ctrl'=>'order'));?>"<?php if($sys['ctrl'] == 'order'){ ?> class="am-active"<?php } ?>><i class="am-icon-gift am-icon-fw"></i> 我的订单</a></li>
		</ul>
	</div>
	<div class="am-panel am-panel-default">
		<div class="am-panel-hd">营销及其他</div>
		<ul class="am-list">
			<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'introducer'));?>"<?php if($sys['func'] == 'introducer'){ ?> class="am-active"<?php } ?>><i class="am-icon-send am-icon-fw"></i> 推荐链接</a></li>
			<?php $list = usercp_project();?>
			<?php $list_id["num"] = 0;$list=is_array($list) ? $list : array();$list_id = array();$list_id["total"] = count($list);$list_id["index"] = -1;foreach($list as $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
			<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'list','id'=>$value['identifier']));?>"<?php if($sys['func'] == 'list' && $id == $value['identifier']){ ?> class="am-active"<?php } ?>><i class="am-icon-arrow-circle-o-right  am-icon-fw"></i> <?php echo $value['title'];?></a></li>
			<?php } ?>
		</ul>
	</div>
	<?php if($session['user_gid'] == 8){ ?>
	<div class="am-panel am-panel-default">
		<div class="am-panel-hd">代理商平台</div>
		<ul class="am-list">
			<li>这是代理商专用</li>
		</ul>
	</div>
	<?php } ?>
</div>
