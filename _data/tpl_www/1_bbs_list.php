<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("header","file",true,false); ?>
<?php if($cate_rs['banner'] || $page_rs['banner']){ ?>
<div class="banner" style="background-image:url('<?php echo $cate_rs['banner'] ? $cate_rs['banner']['filename'] : $page_rs['banner']['filename'];?>');"><img src="images/blank.gif" alt="<?php echo $cate_rs['title'];?>" /></div>
<?php } ?>

<?php include($this->dir_php."bbs_list.php");?>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<table class="am-table am-table-bordered am-table-striped am-table-hover" style="margin-bottom:0;">
		<thead>
			<tr>
				<th>论坛主题</th>
				<th class="am-text-center">发帖人</th>
				<th class="am-text-center">点击数</th>
				<th class="am-text-center">时间</th>
			</tr>
		</thead>
		<tbody>
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<tr>
				<td><em class="<?php echo $value['_icon'];?> am-icon-fw"></em><a href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a></td>
				<td class="am-text-center"><?php echo $value['_author'];?></td>
				<td class="am-text-center"><?php echo $value['hits'];?></td>
				<td class="am-text-center"><?php echo $value['_lastdate'];?></td>
			</tr>
			<?php } ?>
			<?php if(!$rslist){ ?>
			<tr>
				<td colspan="4"><div style="padding:30px;text-align: center;">暂无主题</div></td>
			<?php } ?>
		</tbody>
	</table>
	<div class="am-g am-g-collapse">
		<div class="am-u-sm-3" style="margin-top:1.5rem;">
			<?php if($session['user_id']){ ?>
			<a class="am-btn am-btn-primary" href="<?php echo phpok_url(array('ctrl'=>'post','id'=>$page_rs['identifier'],'cateid'=>$cate_rs['id']));?>">发布新主题</a>
			<?php } else { ?>
			<a class="am-btn am-btn-danger"  href="<?php echo phpok_url(array('ctrl'=>'login','_back'=>$cate_rs['url']));?>" class="red">仅限会员才有发布权限，请先登录或注册</a>
			<?php } ?>
		</div>
		<div class="am-u-sm-9"><?php $this->output("block/pagelist","file",true,false); ?></div>
	</div>
</div>

<?php $this->output("footer","file",true,false); ?>