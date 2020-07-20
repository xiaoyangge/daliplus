<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header" style="height:auto;padding-top:5px;">
		<form method="post" class="layui-form" id="post_save" onsubmit="return false">
			<div class="layui-form-item">
				<label class="layui-form-label">
					<?php echo P_Lang("时间范围");?>
				</label>
				<div class="layui-input-inline" style="width:120px">
					<input type="text" name="start_date" value="<?php echo $start_date;?>" id="start_date" class="layui-input" placeholder="<?php echo P_Lang("开始时间");?>" />
				</div>
				<div class="layui-form-mid">
					-
				</div>
				<div class="layui-input-inline" style="width:120px">
					<input type="text" name="stop_date" value="<?php echo $stop_date;?>" id="stop_date" class="layui-input" placeholder="<?php echo P_Lang("结束时间");?>" />
				</div>
				<div class="layui-form-mid">
					<?php echo P_Lang("ID范围");?>
				</div>
				<div class="layui-input-inline short">
					<input type="text" name="id_start" value="<?php echo $id_start;?>" id="id_start" class="layui-input" />
				</div>
				<div class="layui-form-mid">
					-
				</div>
				<div class="layui-input-inline short">
					<input type="text" name="id_stop" value="<?php echo $id_stop;?>" id="id_stop" class="layui-input" />
				</div>
				<div class="layui-input-inline auto gray lh38">
					<input type="button" value="<?php echo P_Lang("开始检测");?>" onclick="$.admin_res_clear.start()" class="layui-btn layui-btn-sm" />
				</div>
				<div class="layui-input-inline auto gray lh38 hide" id="cancel_btn_html">
					<input type="button" value="<?php echo P_Lang("取消检测");?>" onclick="$.admin_res_clear.stop()" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
				<div class="layui-form-mid" id="tips"></div>
			</div>
		</form>
	</div>
	<div class="layui-card-body">
		<div id="rslist" class="layui-form checkbox">
			<ul></ul>
			<div class="clear"></div>
		</div>
		
		<div id="pl_action" style="margin-top:10px;">
			<ul class="layout">
				<li>
					<div class="layui-btn-group">
						<input type="button" value="<?php echo P_Lang("全选");?>" class="layui-btn layui-btn-sm" onclick="$.input.checkbox_all()" />
						<input type="button" value="<?php echo P_Lang("全不选");?>" class="layui-btn layui-btn-sm" onclick="$.input.checkbox_none()" />
						<input type="button" value="<?php echo P_Lang("反选");?>" class="layui-btn layui-btn-sm" onclick="$.input.checkbox_anti()" />
					</div>
				</li>
				<li>
					<input type="button" value="<?php echo P_Lang("批量删除");?>" onclick="$.admin_res.pl_delete()" class="layui-btn layui-btn-sm layui-btn-danger" />
				</li>
			</ul>
		</div>
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>