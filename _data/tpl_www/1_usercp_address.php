<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = "收货地址 - 会员中心";?><?php $this->assign("title",$title); ?><?php $this->output("header","file",true,false); ?>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left"><?php $this->output("block/usercp_nav","file",true,false); ?></div>
	<div class="right">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">收货地址</div>
			<table class="am-table am-table-centered am-table-hover ">
				<thead>
					<tr>
						<th colspan="2">收件人</th>
						<th class="am-text-left">地址</th>
						<th>联系方式</th>
						<th style="width:200px">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
					<tr>
						<td>#<?php echo $value['id'];?></td>
						<td><?php echo $value['fullname'];?></td>
						<td class="am-text-left"><?php echo $value['province'];?><?php if($value['province'] != $value['city']){ ?><?php echo $value['city'];?><?php } ?><?php echo $value['county'];?>-<?php echo $value['address'];?></td>
						<td><?php echo $value['mobile'];?><?php if($value['mobile'] && $value['tel']){ ?> / <?php } ?><?php echo $value['tel'];?></td>
						<td>
							<div class="am-btn-group">
								<button type="button" onclick="$.address.edit('<?php echo $value['id'];?>')" class="am-btn am-btn-default am-btn-xs">编辑</button>
								<button type="button" onclick="$.address.del('<?php echo $value['id'];?>')" class="am-btn am-btn-danger am-btn-xs">删除</button>
								<?php if(!$value['is_default']){ ?>
								<button type="button" onclick="$.address.set_default('<?php echo $value['id'];?>')" class="am-btn am-btn-primary am-btn-xs">设为默认</button>
								<?php } else { ?>
								<button type="button" class="am-btn am-btn-default am-btn-xs" disabled>默认地址</button>
								<?php } ?>
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
		
		<?php if($total < 30){ ?>
		<div class="am-panel-bd am-text-center">
			<button type="button" onclick="$.address.add()" class="am-btn am-btn-primary">添加地址</button>
		</div>
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>

<?php $this->output("footer","file",true,false); ?>