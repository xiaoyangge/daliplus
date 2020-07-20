<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><table id="prolist" class="layui-table">
<thead>
<tr class="prolist">
	<th width="90px" class="center"><?php echo P_Lang("产品图片");?></th>
	<th><?php echo P_Lang("产品名称");?></th>
	<th class="center"><?php echo P_Lang("类型");?></th>
	<th class="center"><?php echo P_Lang("单价");?></th>
	<th class="center"><?php echo P_Lang("数量");?></th>
	<th class="center"><input type="button" value="<?php echo P_Lang("增加产品");?>" onclick="$.admin_order_set.add()" class="layui-btn layui-btn-sm" /></th>
</tr>
</thead>
<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
<tr id="product_<?php echo $value['id'];?>">
	<td class="center"><img src="<?php echo $value['thumb'] ? $value['thumb'] : 'images/picture_default.png';?>" class="hand" width="80px" height="80px" border="0" /></td>
	<td>
		<div><?php echo $value['title'];?></div>
		<?php if($value['weight']){ ?>
		<div class="gray"><?php echo P_Lang("重量");?> <?php echo $value['weight'];?> Kg</div>
		<?php } ?>
		<?php if($value['weight']){ ?>
		<div class="gray"><?php echo P_Lang("体积");?> <?php echo $value['volume'];?> M<sup>3</sup></div>
		<?php } ?>
		<?php $idxx["num"] = 0;$value['ext']=is_array($value['ext']) ? $value['ext'] : array();$idxx = array();$idxx["total"] = count($value['ext']);$idxx["index"] = -1;foreach($value['ext'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
		<div class="gray"><?php echo $v['title'];?> - <?php echo $v['content'];?></div>
		<?php } ?>
		<?php if($value['note']){ ?>
		<div class="gray"><?php echo P_Lang("备注");?> - <?php echo $value['note'];?></div>
		<?php } ?>
	</td>
	<td class="center"><?php if($value['is_virtual']){ ?><?php echo P_Lang("服务");?><?php } else { ?><?php echo P_Lang("实物");?><?php } ?></td>
	<td class="center"><?php echo price_format($value['price'],$rs['currency_id']);?></td>

	<td class="center"><?php echo $value['qty'];?></td>
	<td class="center">
		<div><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_order_set.edit('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" /></div>
		<div class="mtop"><input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_order_set.del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" /></div>
	</td>
</tr>
<?php } ?>
</table>				
