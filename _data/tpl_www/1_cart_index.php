<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title","购物车"); ?><?php $this->output("header","file",true,false); ?>
<script type="text/javascript">
function cart_checkout()
{
	var id = $.checkbox.join();
	if(!id){
		$.dialog.alert('未指定要结算的产品');
		return false;
	}
	return true;
}
</script>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<form method="post" action="<?php echo phpok_url(array('ctrl'=>'cart','func'=>'checkout'));?>" class="am-form" onsubmit="return cart_checkout()">
	<table class="am-table am-table-bordered am-table-centered">
		<thead>
			<tr>
				<th colspan="2">图片</th>
				<th class="am-text-left">名称</th>
				<th width="80px">数量</th>
				<th>售价</th>
			</tr>
		</thead>
		<tbody>
			<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<tr>
				<td><input type="checkbox" name="id[]" id="id_<?php echo $value['id'];?>" value="<?php echo $value['id'];?>" checked onchange="$.cart.price()" /></td>
				<td>
					<?php if($value['tid']){ ?>
					<a href="<?php echo phpok_url(array('id'=>$value['tid']));?>" title="<?php echo $value['title'];?>" target="_blank"><img src="<?php echo $value['thumb'] ? $value['thumb'] : 'tpl/www/images/nopic.png';?>" width="80px" border="0" alt="<?php echo $value['title'];?>" /></a>
					<?php } else { ?>
					<img src="<?php echo $value['thumb'] ? $value['thumb'] : 'tpl/www/images/nopic.png';?>" width="80px" border="0" alt="<?php echo $value['title'];?>" />
					<?php } ?>
				</td>
				<td class="am-text-left">
					<?php if($value['tid']){ ?>
					<a href="<?php echo phpok_url(array('id'=>$value['tid']));?>" title="<?php echo $value['title'];?>" target="_blank"><h3 id="title_<?php echo $value['id'];?>"><?php echo $value['title'];?></h3></a>
					<?php } else { ?>
					<h3 id="title_<?php echo $value['id'];?>"><?php echo $value['title'];?></h3>
					<?php } ?>
					<?php $tmpid["num"] = 0;$value['_attrlist']=is_array($value['_attrlist']) ? $value['_attrlist'] : array();$tmpid = array();$tmpid["total"] = count($value['_attrlist']);$tmpid["index"] = -1;foreach($value['_attrlist'] as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<div><?php echo $v['title'];?>：<?php echo $v['content'];?></div>
					<?php } ?>
					<div>单价：<?php echo price_format($value['price'],$value['currency_id']);?></div>
				</td>
				<td>
					<div><input type="number" class="qty" min="1" name="qty_<?php echo $value['id'];?>" id="qty_<?php echo $value['id'];?>" value="<?php echo $value['qty'];?>" onchange="$.cart.update('<?php echo $value['id'];?>')" /></div>
				</td>
				<td class="am-text-danger"><?php echo price_format($value['price']*$value['qty'],$value['currency_id']);?></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="5" class="am-text-right">当前选中的产品价格是：<span class="am-text-danger" id="total_price"><?php echo $price;?></span></td>
				
			</tr>
		</tbody>
	</table>
	<div class="am-g">
		<div class="am-u-sm-6">
			<div class="am-btn-group">
				<input type="button" value="全选" onclick="$.checkbox.all();$.cart.price()" class="am-btn am-btn-default am-btn-xs" />
				<input type="button" value="全不选" onclick="$.checkbox.none();$.cart.price()" class="am-btn am-btn-default am-btn-xs" />
				<input type="button" value="反选" onclick="$.checkbox.anti();$.cart.price()" class="am-btn am-btn-default am-btn-xs" />
			</div>
			<input type="button" value="批量删除" onclick="$.cart.del()" class="am-btn am-btn-danger am-btn-xs" />
		</div>
		<div class="am-u-sm-6 am-text-middle">
			<button type="submit" class="am-btn am-btn-primary am-btn-lg am-fr">
				去结算
				<span class="am-icon-angle-double-right"></span>
			</button>
		</div>
	</div>
	</form>
</div>
<?php $this->output("foot","file",true,false); ?>