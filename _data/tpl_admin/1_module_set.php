<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("nopadding","true"); ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" class="layui-form" id="module_submit_post" onsubmit="return false;">
<?php if($id){ ?><input type="hidden" id="id" name="id" value="<?php echo $id;?>" /><?php } ?>
<div class="layui-card">
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("名称");?>
			</label>
			<div class="layui-input-block">
				<input type="text" id="title" name="title" class="layui-input" value="<?php echo $rs['title'];?>" />
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("设置一个名称，该名称将在应用中读取，不受站点影响");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("备注");?>
			</label>
			<div class="layui-input-block">
				<input type="text" id="note" name="note" class="layui-input" value="<?php echo $rs['note'];?>" />
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("仅限后台管理使用，用于查看该模块主要做什么");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("独立运行");?>
			</label>
			<div class="layui-input-block">
				<input type="radio" name="mtype" lay-filter="mtype" value="0"<?php if(!$rs['mtype']){ ?> checked<?php } ?> title="<?php echo P_Lang("否");?>" />
				<input type="radio" name="mtype" lay-filter="mtype" value="1"<?php if($rs['mtype']){ ?> checked<?php } ?> title="<?php echo P_Lang("是");?>" />
			</div>
			<div class="layui-input-block mtop gray"><?php echo P_Lang("启用独立运行后，需要设置相应的标识，且不支持项目关联，功能比较简单");?></div>
		</div>
		<div class="layui-form-item<?php if($rs && $rs['mtype']){ ?> hide<?php } ?>" id="tbl_html">
			<label class="layui-form-label">
				<?php echo P_Lang("关联主表");?>
			</label>
			<div class="layui-input-block">
				<select id="tbl" name="tbl">
				<?php $tmpid["num"] = 0;$tblist=is_array($tblist) ? $tblist : array();$tmpid = array();$tmpid["total"] = count($tblist);$tmpid["index"] = -1;foreach($tblist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<option value="<?php echo $key;?>"<?php if($key == $tblid){ ?> selected<?php } ?>><?php echo $value;?></option>
				<?php } ?>
				</select>
			</div>
			<div class="layui-input-block mtop gray"><?php echo P_Lang("请选择集成环境对应的主表，目前官网仅对分类及主题进行横向扩展");?></div>
		</div>
		<?php if($id && $rs){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("后台字段布局");?>
			</label>
			<div class="layui-input-block">
				<?php if(!$rs['mtype'] && $tblid != 'cate'){ ?>
				<input type="checkbox" name="layout[]" value="hits"<?php if(in_array("hits",$layout)){ ?> checked<?php } ?> title="<?php echo P_Lang("查看次数");?>" />
				<input type="checkbox" name="layout[]" value="dateline"<?php if(in_array("dateline",$layout)){ ?> checked<?php } ?> title="<?php echo P_Lang("发布时间");?>" />
				<input type="checkbox" name="layout[]" value="user_id"<?php if(in_array("user_id",$layout)){ ?> checked<?php } ?> title="<?php echo P_Lang("会员账号");?>" />
				<input type="checkbox" name="layout[]" value="sort"<?php if(in_array("sort",$layout)){ ?> checked<?php } ?> title="<?php echo P_Lang("排序");?>" />
				<?php } ?>
				<?php $used_list_id["num"] = 0;$used_list=is_array($used_list) ? $used_list : array();$used_list_id = array();$used_list_id["total"] = count($used_list);$used_list_id["index"] = -1;foreach($used_list as $key=>$value){ $used_list_id["num"]++;$used_list_id["index"]++; ?>
				<input type="checkbox" name="layout[]" id="layout_<?php echo $value['identifier'];?>" value="<?php echo $value['identifier'];?>"<?php if(in_array($value['identifier'],$layout)){ ?> checked<?php } ?> title="<?php echo $value['title'];?>" />
				<?php } ?>
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("在这里设置后台要显示的字段");?></div>
		</div>
		<?php } ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("排序");?>
			</label>
			<div class="layui-input-inline short">
				<input type="text" id="taxis" name="taxis" class="layui-input" value="<?php echo $rs['taxis'];?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("值越小越往前靠，最小值为0，最大值为255");?>
			</div>
		</div>
		
	</div>
</div>

</form>
<?php $this->assign("is_open","true"); ?><?php $this->output("foot_lay","file",true,false); ?>