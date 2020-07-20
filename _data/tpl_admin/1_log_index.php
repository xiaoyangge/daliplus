<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("日志清单");?>
		<div class="layui-btn-group fr">
			<button class="layui-btn layui-btn-sm"  onclick="$.admin_log.search('start_time','<?php echo $date30;?>')"><?php echo P_Lang("最近30天内日志");?></button>
			<button class="layui-btn layui-btn-sm "  onclick="$.admin_log.search('start_time','<?php echo $date7;?>')"><?php echo P_Lang("最近7天内日志");?></button>
			<?php if($session['admin_rs']['if_system']){ ?>
			<button class="layui-btn layui-btn-sm layui-btn-danger"  onclick="$.admin_log.delete30()" ><?php echo P_Lang("删除30天之前的日志");?></button>
			<?php } ?>
		</div>
	</div>
	<div class="layui-card-body">
		<form method="post" class="layui-form" action="<?php echo phpok_url(array('ctrl'=>'log'));?>">
		<div class="layui-form-item">
			<div class="layui-inline">
				<select name="psize" >
					<option value="20"<?php if($psize==20){ ?> selected<?php } ?>><?php echo P_Lang("每页[total]条",array('total'=>'<span style="color:red">20</span>'));?></option>
					<option value="30"<?php if($psize==30){ ?> selected<?php } ?>><?php echo P_Lang("每页[total]条",array('total'=>'<span style="color:red">30</span>'));?></option>
					<option value="40"<?php if($psize==40){ ?> selected<?php } ?>><?php echo P_Lang("每页[total]条",array('total'=>'<span style="color:red">40</span>'));?></option>
					<option value="50"<?php if($psize==50){ ?> selected<?php } ?>><?php echo P_Lang("每页[total]条",array('total'=>'<span style="color:red">50</span>'));?></option>
					<option value="60"<?php if($psize==60){ ?> selected<?php } ?>><?php echo P_Lang("每页[total]条",array('total'=>'<span style="color:red">60</span>'));?></option>
					<option value="70"<?php if($psize==70){ ?> selected<?php } ?>><?php echo P_Lang("每页[total]条",array('total'=>'<span style="color:red">70</span>'));?></option>
					<option value="90"<?php if($psize==90){ ?> selected<?php } ?>><?php echo P_Lang("每页[total]条",array('total'=>'<span style="color:red">90</span>'));?></option>
					<option value="100"<?php if($psize==100){ ?> selected<?php } ?>><?php echo P_Lang("每页[total]条",array('total'=>'<span style="color:red">100</span>'));?></option>
					<option value="150"<?php if($psize==150){ ?> selected<?php } ?>><?php echo P_Lang("每页[total]条",array('total'=>'<span style="color:red">150</span>'));?></option>
				</select>
			</div>
			<div class="layui-inline">
				<select name="position">
					<option value="admin"<?php if($position == 'admin'){ ?> selected<?php } ?>>后台</option>
					<option value="www"<?php if($position == 'www'){ ?> selected<?php } ?>>前台</option>
					<option value="api"<?php if($position == 'api'){ ?> selected<?php } ?>>接口</option>
				</select>
			</div>
			<div class="layui-inline">
                <input type="text" id="start_date" class="layui-input" name="start_time" value="<?php echo $start_time;?>"  placeholder="<?php echo P_Lang("开始时间");?>">
            </div>
            <div class="layui-inline">
                <input type="text" id="stop_date" class="layui-input" name="stop_time" value="<?php echo $stop_time;?>"  placeholder="<?php echo P_Lang("结束时间");?>">
            </div>
			<div class="layui-inline">
				<input type="text" id="keywords" name="keywords" value="<?php echo $keywords;?>" placeholder="<?php echo P_Lang("请输入要搜索的关键字");?>" class="layui-input">
			</div>
			<div class="layui-inline">
				<input type="text" name="adminer" value="<?php echo $adminer;?>" placeholder="<?php echo P_Lang("管理员账号");?>" class="layui-input">
			</div>
			<div class="layui-inline">
				<input type="text" name="user" value="<?php echo $user;?>" placeholder="<?php echo P_Lang("会员账号");?>" class="layui-input">
			</div>
			
			<div class="layui-inline">
				<input type="submit" value="提交搜索" class="layui-btn layui-btn-sm" />
			</div>
		</div>
		</form>
		<table class="layui-table layui-form">
			<thead>
			<tr>
				<th>	
				</th>
				<th >
					<div class="layui-table-cell laytable-cell-1-id">
						<span>备注/网址</span>
					</div>
				</th>
				<th data-field="label" data-minwidth="100">
					<div class="layui-table-cell laytable-cell-1-label">
						<span>IP</span>
					</div>
				</th>
				<th data-field="title">
					<div class="layui-table-cell laytable-cell-1-title">
						<span>操作人</span>
					</div>
				</th>
				<th data-field="author">
					<div class="layui-table-cell laytable-cell-1-author">
						<span>文件</span>
					</div>
				</th>
				<th data-field="uploadtime">
					<div class="layui-table-cell laytable-cell-1-uploadtime">
						<span>时间</span>
					</div>
				</th>
				<?php if($session['admin_rs']['if_system']){ ?>
				<th data-field="7" data-minwidth="150">
					<div class="layui-table-cell laytable-cell-1-7" align="center">
						<span>操作</span>
					</div>
				</th>
				<?php } ?>
			</tr>
			</thead>
		
				<tbody>
				<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<tr data-index="0" id="list_<?php echo $value['id'];?>">
					<td data-field="0">
						<div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
							<input type="checkbox" name="ids[]" id="id_<?php echo $value['id'];?>" value="<?php echo $value['id'];?>" lay-skin="primary">
							<div class="layui-unselect layui-form-checkbox" lay-skin="primary">
								<i class="layui-icon layui-icon-ok"></i>
							</div>
						</div>
					</td>
					<td data-field="label" >
						<div class="laytable-cell-1-id">
							<label for="id_<?php echo $value['id'];?>" lay-tips="<?php echo $value['url'];?>">
								<?php if($value['note']){ ?><div><?php echo $value['note'];?></div><?php } ?>
							</label>
							<style type="text/css">
								.layui-layer-tips{
									word-break:break-all;

								}
							</style>
						</div>
					</td>
					<td data-field="label" data-minwidth="100">
						<div class="layui-table-cell laytable-cell-1-label"><?php echo $value['ip'];?></div>
					</td>
					<td data-field="title">
						<div class="layui-table-cell laytable-cell-1-title">
							<?php if($value['account']){ ?><span class="red"><?php echo $value['account'];?></span><?php } ?>
							<?php if($value['account'] && $value['user']){ ?> / <?php } ?>
							<?php if($value['user']){ ?><span class="blue"><?php echo $value['user'];?></span><?php } ?>
							<?php if(!$value['admin_id'] && !$value['user_id']){ ?><?php echo P_Lang("访客");?><?php } ?>
						</div>
					</td>
					<td data-field="author">
						<div class="layui-table-cell laytable-cell-1-author">
							<?php echo $value['ctrl'];?>_control.php &raquo; <?php echo $value['func'];?>_f
						</div>
					</td>
					<td data-field="uploadtime">
						<div class="layui-table-cell laytable-cell-1-uploadtime"><?php echo time_format($value['dateline']);?></div>
					</td>
					<?php if($session['admin_rs']['if_system']){ ?>
					<td data-field="7" align="center" data-off="true" data-minwidth="150">
						<div class="layui-table-cell laytable-cell-1-7">
							<a class="layui-btn layui-btn-danger layui-btn-xs" onclick="$.admin_log.del('<?php echo $value['id'];?>')">
								<i class="layui-icon layui-icon-delete"></i>删除
							</a>
						</div>
					</td>
					<?php } ?>
				</tr>
				<?php } ?>
				</tbody>
		</table>
		<div style="margin-top:10px;">
			<div class="layui-btn-group test-table-operate-btn">
				<input type="button" value="<?php echo P_Lang("全选");?>" onclick="$.checkbox.all()" class="layui-btn  layui-btn-sm" />
				<input type="button" value="<?php echo P_Lang("全不选");?>" onclick="$.checkbox.none()" class="layui-btn  layui-btn-sm" />
				<input type="button" value="<?php echo P_Lang("反选");?>" onclick="$.checkbox.anti()" class="layui-btn  layui-btn-sm" />
				<input type="button" value="<?php echo P_Lang("删除选中日志");?>" onclick="$.admin_log.delete_selected()" class="layui-btn  layui-btn-sm layui-btn-danger" />
			</div>
		</div>
		<?php $this->output("pagelist","file",true,false); ?>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>