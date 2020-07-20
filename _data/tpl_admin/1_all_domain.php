<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-row layui-col-space15">
	<div class="layui-col-md12">
		<div class="layui-card">
			<div class="layui-card-header"><?php echo P_Lang("网站域名维护");?></div>
			<div class="layui-card-body">
				<table class="layui-table">
					<colgroup>
						<col width="150">
						<col width="500">
						<col>
					</colgroup>
					<thead>
					<tr>
						<th>ID</th>
						<th><?php echo P_Lang("域名");?></th>
						<th><?php echo P_Lang("操作");?></th>
					</tr>
					</thead>
					<tbody>
					<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
					<tr>
						<td><?php echo $value['id'];?></td>
						<td><input type="text" id="domain_<?php echo $value['id'];?>" value="<?php echo $value['domain'];?>" class="layui-input" /></td>
						<td>
							<div class="layui-btn-group">
								<input type="button" value="<?php echo P_Lang("更新");?>" id="domain_<?php echo $value['id'];?>_submit" onclick="$.admin_all.domain_update(<?php echo $value['id'];?>)" class="layui-btn" />
								<input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-danger" onclick="$.admin_all.domain_delete(<?php echo $value['id'];?>)" />
								<?php if($value['id'] != $rs['domain_id']){ ?>
								<input type="button" value="<?php echo P_Lang("设主域名");?>" class="layui-btn" onclick="$.admin_all.domain_default(<?php echo $value['id'];?>)" />
									<?php if($value['is_mobile']){ ?>
									<input type="button" value="<?php echo P_Lang("取消手机版专用");?>" class="layui-btn" onclick="$.admin_all.domain_mobile(<?php echo $value['id'];?>,0)" />
									<?php } else { ?>
									<input type="button" value="<?php echo P_Lang("设为手机版专用");?>" class="layui-btn" onclick="$.admin_all.domain_mobile(<?php echo $value['id'];?>,1)" />
									<?php } ?>
								<?php } ?>
							</div>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td><?php echo P_Lang("添加");?></td>
						<td><input type="text" id="domain_0" class="layui-input" /></td>
						<td>
							<input type="button" value="<?php echo P_Lang("添加");?>" id="domain_0_submit" class="layui-btn" onclick="$.admin_all.domain_add()" />
						</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>