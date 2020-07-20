<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("支付管理");?>
		<div class="fr">
			<a href="<?php echo phpok_url(array('ctrl'=>'payment','func'=>'groupset'));?>" class="layui-btn layui-btn-sm" ><?php echo P_Lang("创建组");?></a>
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th><?php echo P_Lang("名称");?></th>
			<th><?php echo P_Lang("排序");?></th>
			<th><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<thead>
		<tr>
			<td><?php echo $value['title'];?>
				<?php if(!$value['status']){ ?> <span class="gray i"><?php echo P_Lang("停用");?></span><?php } ?>
				<?php if($value['is_wap']){ ?><span class="red"><?php echo P_Lang("手机端");?></span><?php } ?>
			</td>
			<td><div class="gray i hand center" title="<?php echo P_Lang("点击调整排序");?>" name="taxis" data="<?php echo $value['id'];?>" onclick="$.admin_payment.taxis(this)" type="group"><?php echo $value['taxis'];?></div></td>
			<td>
				<div class="layui-btn-group">
					<?php if($popedom['groupedit']){ ?><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'payment','func'=>'groupset','id'=>$value['id']));?>')" class="layui-btn  layui-btn-sm" /><?php } ?>
					<?php if($popedom['groupdelete']){ ?><input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_payment.group_delete('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn  layui-btn-sm layui-btn-danger" /><?php } ?>
					<?php if($popedom['add']){ ?><input type="button" value="添加支付方案" onclick="$.admin_payment.add('<?php echo $value['id'];?>')" class="layui-btn  layui-btn-sm layui-btn-normal" /><?php } ?>
				</div>
			</td>
		</tr>
		</thead>
		<?php $value_paylist_id["num"] = 0;$value['paylist']=is_array($value['paylist']) ? $value['paylist'] : array();$value_paylist_id = array();$value_paylist_id["total"] = count($value['paylist']);$value_paylist_id["index"] = -1;foreach($value['paylist'] as $k=>$v){ $value_paylist_id["num"]++;$value_paylist_id["index"]++; ?>
		<tr>
			<td>
				<div style="padding-left:2em;"><?php echo $v['title'];?>
					<?php if(!$v['status']){ ?><span class="gray i"><?php echo P_Lang("停用");?></span><?php } ?>
					<?php if($v['wap']){ ?><span class="red"><?php echo P_Lang("手机端");?></span><?php } ?>
				</div>
			</td>
			<td>
				<div class="gray i hand center" title="<?php echo P_Lang("点击调整排序");?>" name="taxis" data="<?php echo $v['id'];?>" onclick="$.admin_payment.taxis(this)" type="payment"><?php echo $v['taxis'];?></div>
			</td>
			<td>
				<div class="layui-btn-group">
					<?php if($popedom['edit']){ ?><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'payment','func'=>'set','id'=>$v['id']));?>')" class="layui-btn  layui-btn-sm" /><?php } ?>
					<?php if($popedom['delete']){ ?><input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_payment.del('<?php echo $v['id'];?>','<?php echo $v['title'];?>')" class="layui-btn  layui-btn-sm layui-btn-danger" /><?php } ?>
				</div>
			</td>
		</tr>	
		<?php } ?>
		<?php } ?>
		</table>
	</div>
</div>

<div class="hide" id="payment_select_info">
<select id="code">
	<?php $codelist_id["num"] = 0;$codelist=is_array($codelist) ? $codelist : array();$codelist_id = array();$codelist_id["total"] = count($codelist);$codelist_id["index"] = -1;foreach($codelist as $key=>$value){ $codelist_id["num"]++;$codelist_id["index"]++; ?>
	<option value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
	<?php } ?>
</select>
</div>
<?php $this->output("foot_lay","file",true,false); ?>