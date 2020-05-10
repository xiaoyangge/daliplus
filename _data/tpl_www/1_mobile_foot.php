<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><div data-am-widget="navbar" class="am-navbar am-cf am-navbar-gray " id="">
	<ul class="am-navbar-nav am-cf am-avg-sm-4">
		<li<?php if($sys['ctrl'] == 'index'){ ?> class='am-active'<?php } ?>>
			<a href="<?php echo $sys['url'];?>"> <span class="ok-icon ok-icon-home"></span> <span class="am-navbar-label">首页</span>
			</a>
		</li>
		<li<?php if($page_rs['identifier'] == 'product'){ ?> class="am-active"<?php } ?>>
			<a href="<?php echo phpok_url(array('id'=>'product'));?>"> <i class="ok-icon ok-icon-all"></i> <span class="am-navbar-label">产品</span>
			</a>
		</li>

		<li<?php if($sys['ctrl'] == 'cart'){ ?> class='am-active'<?php } ?>>
			<div class="cart">
			<a href="<?php echo phpok_url(array('ctrl'=>'cart'));?>">
				<i class="ok-icon ok-icon-cart"></i>
				<span class="am-navbar-label">购物车</span>
				<span id="head_cart_num" class="am-badge am-badge-danger hide">0</span>
			</a>
			</div>
		</li>
		<li<?php if($page_rs['identifier'] == 'contactus' || $rs['identifier'] == 'contactus'){ ?> class="am-active"<?php } ?>>
			<a href="<?php echo phpok_url(array('id'=>'contactus'));?>"> <i class="ok-icon ok-icon-service"></i> <span class="am-navbar-label">服务</span>
			</a>
		</li>
		<?php if($session['user_id']){ ?>
		<li<?php if($sys['ctrl'] == 'usercp'){ ?> class='am-active'<?php } ?>>
			<a href="<?php echo phpok_url(array('ctrl'=>'usercp'));?>"> <i class="ok-icon ok-icon-account"></i> <span class="am-navbar-label">我</span></a>
		</li>
		<?php } else { ?>
		<li<?php if($sys['ctrl'] == 'login' || $sys['ctrl'] == 'register'){ ?> class='am-active'<?php } ?>>
			<a href="<?php echo phpok_url(array('ctrl'=>'login'));?>"> <i class="ok-icon ok-icon-account"></i> <span class="am-navbar-label">我</span></a>
		</li>
		<?php } ?>
	</ul>
</div>

<?php $this->output("footer","file",true,false); ?>
