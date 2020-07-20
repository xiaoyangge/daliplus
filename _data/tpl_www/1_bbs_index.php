<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("header","file",true,false); ?>
<?php if($page_rs['banner']){ ?>
<div class="banner" style="background-image:url('<?php echo $page_rs['banner']['filename'];?>');"><img src="images/blank.gif" alt="<?php echo $page_rs['title'];?>" /></div>
<?php } ?>
<div class="main" style="padding:6px 0;">
	<div class="am-panel-group">
		<?php $list=phpok('_catelist',array('pid'=>$page_rs['id']));?>
		<?php $tmpid["num"] = 0;$list['sublist']=is_array($list['sublist']) ? $list['sublist'] : array();$tmpid = array();$tmpid["total"] = count($list['sublist']);$tmpid["index"] = -1;foreach($list['sublist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">
				 <h3 class="am-panel-title"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></h3>
			</div>
			<div class="am-g am-panel-bd">
				<div class="am-u-sm-1"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['thumb'] ? $value['thumb']['filename'] : 'tpl/www/images/bbs.png';?>" alt="<?php echo $value['title'];?>" /></a></div>
				<div class="am-u-sm-4">
					<div class="am-title"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></div>
					<?php if($value['note']){ ?><?php echo nl2br($value['note']);?><?php } else { ?>暂无摘要<?php } ?>
				</div>
				<div class="am-u-sm-1 am-text-center"><?php $total = phpok('_total','pid='.$page_rs['id'].'&cateid='.$value['id']);?><?php echo $total;?></div>
				<div class="am-u-sm-6">
					<?php $list=phpok('_arclist',array('pid'=>$page_rs['id'],'cateid'=>$value['id'],'psize'=>"3"));?>
					<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id = array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] as $k=>$v){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
					<div><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo phpok_cut($v['title'],'70','…');?></a></div>
					<?php } ?>
					<?php if(!$list['rslist']){ ?>无主题<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php $this->output("footer","file",true,false); ?>