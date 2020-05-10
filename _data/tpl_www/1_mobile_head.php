<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title",$title); ?><?php $this->assign("css",$css); ?><?php $this->assign("js",$js); ?><?php $this->output("header","file",true,false); ?>
<header data-am-widget="header" class="am-header am-header-default">
	<div class="am-header-left am-header-nav">
		<?php if($showhome){ ?>
		<a href="<?php echo $sys['url'];?>"><i class="am-icon-home am-icon-fw am-icon-sm"></i></a>
		<?php }elseif($sys['ctrl'] == 'index'){ ?>
		<a href="<?php echo phpok_url(array('ctrl'=>'search'));?>"><i class="am-icon-search am-icon-fw"></i></a>
		<?php } else { ?>
		<a href="javascript:window.history.go(-1);void(0);"><i class="am-icon-angle-left am-icon-fw"></i></a>
		<?php } ?>
	</div>
	<h1 class="am-header-title">
		<?php if($title){ ?>
		<?php echo $title;?>
		<?php } else { ?>
			<?php if($config['logo_mobile']){ ?><img src="<?php echo $config['logo_mobile'];?>" /><?php } else { ?><?php echo $config['title'];?><?php } ?>
		<?php } ?>
	</h1>
	<div class="am-header-right am-header-nav"></div>
</header>
<nav data-am-widget="menu" class="am-menu  am-menu-offcanvas1" data-am-menu-offcanvas>
	<a href="javascript:void(0)" class="am-menu-toggle"> <i class="am-menu-toggle-icon am-icon-bars"></i></a>
	<div class="am-offcanvas">
		<div class="am-offcanvas-bar">
			<ul class="am-menu-nav am-avg-sm-1">
				<?php $list = menu('top');?>
				<?php $tmpid["num"] = 0;$list=is_array($list) ? $list : array();$tmpid = array();$tmpid["total"] = count($list);$tmpid["index"] = -1;foreach($list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<li<?php if($value['sublist']){ ?> class="am-parent"<?php } ?>>
					<a href="<?php if(!$value['sublist']){ ?><?php echo $value['url'];?><?php } else { ?>javascript:void(0);<?php } ?>"<?php if($value['highlight']){ ?> class="am-active"<?php } ?>><?php echo $value['title'];?></a>
					<?php if($value['sublist']){ ?>
					<ul class="am-menu-sub am-collapse">
						<?php if($value['url']){ ?><li><a href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a></li><?php } ?>
						<?php $value_sublist_id["num"] = 0;$value['sublist']=is_array($value['sublist']) ? $value['sublist'] : array();$value_sublist_id = array();$value_sublist_id["total"] = count($value['sublist']);$value_sublist_id["index"] = -1;foreach($value['sublist'] as $k=>$v){ $value_sublist_id["num"]++;$value_sublist_id["index"]++; ?>
						<li<?php if($v['highlight']){ ?> class="am-active"<?php } ?>><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="<?php echo $v['target'];?>"><?php echo $v['title'];?></a></li>
						<?php } ?>
					</ul>
					<?php } ?>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
