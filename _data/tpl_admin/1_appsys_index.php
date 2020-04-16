<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("列表");?>
		<?php if($popedom['setting'] || $popedom['remote']){ ?>
		<div class="layui-btn-group test-table-operate-btn fr">
			<?php if($popedom['setting']){ ?>
			<button class="layui-btn layui-btn-sm" onclick="$.admin_appsys.add()"><i class="layui-icon">&#xe654;</i><?php echo P_Lang("创建应用");?></button>
			<button class="layui-btn layui-btn-sm" onclick="$.admin_appsys.import_zip()"><i class="layui-icon">&#xe653;</i><?php echo P_Lang("导入应用");?></button>
			<button class="layui-btn layui-btn-sm" onclick="$.admin_appsys.setting()"><i class="layui-icon">&#xe716;</i> <?php echo P_Lang("配置环境");?></button>
			<?php } ?>
			<?php if($popedom['remote']){ ?>
			<button class="layui-btn layui-btn-sm" onclick="$.admin_appsys.remote()"><i class="layui-icon">&#xe601;</i> <?php echo P_Lang("更新远程数据");?></button>
			<?php } ?>
			<button class="layui-btn layui-btn-sm" onclick="$.win('<?php echo P_Lang("应用备份列表");?>','<?php echo phpok_url(array('ctrl'=>'appsys','func'=>'backup_list'));?>')"><i class="layui-icon">&#xe623;</i> <?php echo P_Lang("备份列表");?></button>
		</div>
		<?php } ?>
	</div>
	
	<div class="layui-card-body">
		
		<table class="layui-table">
			<thead>
				<tr>
					<th><?php echo P_Lang("名称");?></th>
					<th><?php echo P_Lang("标识");?></th>
					<th class="center"><?php echo P_Lang("后台管理");?></th>
					<th class="center"><?php echo P_Lang("前台");?></th>
					<th class="center"><?php echo P_Lang("接口");?></th>
					<th class="center"><?php echo P_Lang("安装状态");?></th>
					<th></th>
				</tr>
			</thead>
			<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<tr>
				<td id="<?php echo $key;?>_title"><?php echo $value['title'];?><?php if($value['local']){ ?><span class="red"> / <?php echo P_Lang("本地");?></span><?php } ?></td>
				<td><?php echo $key;?></td>
				<td class="center">
					<?php if($value['status'] && $value['status']['admin']){ ?><?php echo P_Lang("支持");?><?php } else { ?><span class="gray"><?php echo P_Lang("不支持");?></span><?php } ?>
				</td>
				<td class="center">
					<?php if($value['status'] && $value['status']['www']){ ?><?php echo P_Lang("支持");?><?php } else { ?><span class="gray"><?php echo P_Lang("不支持");?></span><?php } ?>
				</td>
				<td class="center">
					<?php if($value['status'] && $value['status']['api']){ ?><?php echo P_Lang("支持");?><?php } else { ?><span class="gray"><?php echo P_Lang("不支持");?></span><?php } ?>
				</td>
				<td class="center"><?php if($value['installed']){ ?><span class="gray"><?php echo P_Lang("已安装");?></span><?php } else { ?><span class="red"><?php echo P_Lang("未安装");?></span><?php } ?></td>
				<td>
					<div class="layui-btn-group">
						<input type="button" value="<?php echo P_Lang("备份");?>" onclick="$.admin_appsys.backup_zip('<?php echo $key;?>')" class="layui-btn layui-btn-sm" />
						<?php if($value['local']){ ?>
						<input type="button" value="<?php echo P_Lang("导出");?>" onclick="$.admin_appsys.export_zip('<?php echo $key;?>')" class="layui-btn layui-btn-sm" />
						<?php } ?>
						<?php if($value['installed']){ ?>
						<input type="button" value="<?php echo P_Lang("卸载");?>" onclick="$.admin_appsys.uninstall('<?php echo $key;?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
						<?php } else { ?>
						<input type="button" value="<?php echo P_Lang("安装");?>" onclick="$.admin_appsys.install('<?php echo $key;?>')" class="layui-btn layui-btn-sm" />
							<?php if($value['local']){ ?>
							<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_appsys.delete_apps('<?php echo $key;?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
							<?php } ?>
						
						<?php } ?>
					</div>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>