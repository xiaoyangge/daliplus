<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file",true,false); ?>
<?php $list = phpok('m_picplayer');?>
<?php if($list['total']){ ?>
<div data-am-widget="slider" class="am-slider am-slider-a5" data-am-slider='{"directionNav":false}'>
	<ul class="am-slides">
		<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id = array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] as $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
		<li><a href="<?php echo $value['link'];?>" target="<?php echo $value['target'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['picmobile']['filename'];?>" alt="<?php echo $value['title'];?>" /></a></li>
		<?php } ?>
	</ul>
</div>
<?php } ?>
<?php $list = phpok('new_products');?>
<?php if($list['rslist']){ ?>
<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-5 am-gallery-bordered">
	<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id = array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] as $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
	<li>
		<div class="am-gallery-item">
			<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>">
				<img src="<?php echo $value['thumb']['gd']['thumb'];?>" alt="<?php echo $value['title'];?>" />
				 <h3 class="am-gallery-title"><?php echo $value['title'];?></h3>
				<?php if($list['project']['is_biz']){ ?><div class="am-gallery-desc red"><?php echo price_format($value['price'],$value['currency_id']);?></div><?php } ?>
			</a>
		</div>
	</li>
	<?php } ?>
</ul>
<?php } ?>
<?php $about = phpok('aboutus');?>
<div data-am-widget="titlebar" class="am-titlebar am-titlebar-multi" >
    <h2 class="am-titlebar-title "><?php echo $about['title'];?></h2>
    <nav class="am-titlebar-nav">
        <a href="<?php echo $about['url'];?>">更多 <span class="am-icon-angle-right"></span><span class="am-icon-angle-right"></span></a>
    </nav>
</div>
<article class="am-article" style="padding:0.5em;">
	<div class="am-article-bd">
		<?php if($about['pic']){ ?>
		<div style="padding:0.5em;">
			<img src="<?php echo $about['pic'];?>" alt="<?php echo $about['title'];?>" style="max-width:100%"/>
		</div>
		<?php } ?>
		<?php echo $about['note'];?>
	</div>
</article>
<?php $list = phpok('news');?>
<div class="am-panel am-panel-default" style="margin:0 0.5em">
	<div class="am-panel-hd">
		<h3 class="am-panel-title"><?php echo $list['project']['title'];?></h3>
	</div>
	<div class="am-panel-bd">
		<ul class="am-list">
			<?php $tmpid["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$tmpid = array();$tmpid["total"] = count($list['rslist']);$tmpid["index"] = -1;foreach($list['rslist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<li class="am-g am-list-item-dated">
				<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>" class="am-list-item-hd "><?php echo $value['title'];?></a><span class="am-list-date"><?php echo date('Y-m-d',$value['dateline']);?></span>
			</li>
			<?php } ?>
		</ul>
		<a class="am-btn am-btn-danger" href="<?php echo $list['project']['url'];?>">查看更多</a>
	</div>
</div>
<div style="margin:0.5em">
	<?php $this->assign("showmore","true"); ?><?php $this->output("block/contact","file",true,false); ?>
</div>

<?php $list = phpok('link');?>
<div class="am-panel am-panel-default" style="margin:0 0.5em;">
	<div class="am-panel-hd">
		<h3 class="am-panel-title"><?php echo $list['project']['title'];?></h3>
	</div>
	
	<div class="am-panel-bd link">
		<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id = array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] as $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
		<a href="<?php echo $value['linkurl'];?>" target="<?php echo $value['target'];?>" title="<?php echo $value['sitename'];?>"><?php echo $value['sitename'];?></a>
		<?php } ?>
	</div>
</div>

<?php $this->output("foot","file",true,false); ?>