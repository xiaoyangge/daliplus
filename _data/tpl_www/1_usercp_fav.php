<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = "收藏夹 - 会员中心";?><?php $this->assign("title",$title); ?><?php $this->output("header","file",true,false); ?>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left"><?php $this->output("block/usercp_nav","file",true,false); ?></div>
	<div class="right">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">收藏夹</div>
			<table class="am-table am-table-striped am-table-hover am-table-centered">
				<thead>
					<tr>
						<th class="am-text-left">主题</th>
						<th>收藏时间</th>
						<th width="120">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<tr>
						<td class="am-text-left"><?php echo $value['title'];?></td>
						<td><?php echo time_format($value['addtime']);?></td>
						<td>
							<div class="am-btn-group">
								<button type="button" onclick="$.phpok.open('<?php echo phpok_url(array('id'=>$value['lid']));?>')" class="am-btn am-btn-default am-btn-xs">访问</button>
								<button type="button" onclick="$.phpok_app_fav.del('<?php echo $value['id'];?>')" class="am-btn am-btn-danger am-btn-xs">删除</button>
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
		<?php $this->output("block/pagelist","file",true,false); ?>
	</div>
	<div class="clear"></div>
</div>

<?php $this->output("footer","file",true,false); ?>