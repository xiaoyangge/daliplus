<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $page_rs['title'].' - 会员中心';?>
<?php $this->assign("title",$title); ?><?php $this->assign("menutitle","会员中心"); ?><?php $this->output("header","file",true,false); ?>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left"><?php $this->output("block/usercp_nav","file",true,false); ?></div>
	<div class="right">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd"><?php echo $page_rs['title'];?></div>
			<table class="am-table am-table-centered am-table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th class="am-text-left"><?php echo $page_rs['alias_title'] ? $page_rs['alias_title'] : '主题';?></th>
						<th>状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<tr>
						<td><?php echo $value['id'];?></td>
						<td class="am-text-left">
							<a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['title'];?></a><br />
							<span class="gray">发布时间：<?php echo time_format($value['dateline']);?>，查看次数：<?php echo $value['hits'];?></span>
						</td>
						<td><?php if($value['status']){ ?>正常<?php } else { ?><span class="am-text-danger">审核中</span><?php } ?></td>
						<td><a href="<?php echo phpok_url(array('ctrl'=>'post','func'=>'edit','id'=>$value['id']));?>" class="am-btn am-btn-warning am-btn-xs" target="_blank">编辑</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div style="padding:10px;text-align:center">
			<a href="<?php echo phpok_url(array('ctrl'=>'post','id'=>$id));?>" target="_blank" class="am-btn am-btn-primary">添加</a>
		</div>
		<?php $this->output("block/pagelist","file",true,false); ?>
	</div>
	<div class='clear'></div>
</div>


<?php $this->output("footer","file",true,false); ?>