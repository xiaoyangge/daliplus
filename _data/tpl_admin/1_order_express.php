<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("nopadding","true"); ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header" style="padding:5px 5px 0 5px;">
		<form method="post" id="postsave" class="layui-form" onsubmit="return $.admin_order_express.save()">
		<input type="hidden" name="id" id="id" value="<?php echo $rs['id'];?>" />
		<ul class="layout">
			<li>
				<select name="express_id" id="express_id">
					<option value=""><?php echo P_Lang("请选择物流公司");?></option>
					<?php $tmpid["num"] = 0;$expresslist=is_array($expresslist) ? $expresslist : array();$tmpid = array();$tmpid["total"] = count($expresslist);$tmpid["index"] = -1;foreach($expresslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
					<?php } ?>
				</select>
			</li>
			<li><input type="text" name="code" id="code" class="layui-input" placeholder='<?php echo P_Lang("快递单号");?>' /></li>
			<li><input type="submit" value="<?php echo P_Lang("添加");?>" class="layui-btn" /></li>
		</ul>
		</form>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th><?php echo P_Lang("单号");?></th>
			<th><?php echo P_Lang("信息");?></th>
			<th><?php echo P_Lang("公司名称");?></th>
			<th><?php echo P_Lang("时间");?></th>
			<th>&nbsp;</th>
		</tr>
		</thead>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<td><?php echo $value['code'];?></td>
			<td><?php echo $value['title'];?></td>
			<td><?php echo $value['company'];?></td>
			<td><?php echo date('Y-m-d H:i',$value['addtime']);?></td>
			<td>
				<?php if(!$value['is_end']){ ?>
				<div><input type="button" value="<?php echo P_Lang("远程更新数据");?>" onclick="$.admin_order_express.remote('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" /></div>
				<?php } ?>
				<div class="mtop"><input type="button" value="<?php echo P_Lang("删除记录");?>" onclick="$.admin_order_express.del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" /></div>
			</td>
		</tr>
		<?php $value_invoicelist_id["num"] = 0;$value['invoicelist']=is_array($value['invoicelist']) ? $value['invoicelist'] : array();$value_invoicelist_id = array();$value_invoicelist_id["total"] = count($value['invoicelist']);$value_invoicelist_id["index"] = -1;foreach($value['invoicelist'] as $k=>$v){ $value_invoicelist_id["num"]++;$value_invoicelist_id["index"]++; ?>
		<tr>
			<td><?php echo $value['code'];?></td>
			<td><?php echo $v['note'];?></td>
			<td><?php echo $v['who'];?></td>
			<td><?php echo date('Y-m-d H:i',$v['addtime']);?></td>
			<td></td>
		</tr>
		<?php } ?>
		<?php } ?>
		</table>
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>