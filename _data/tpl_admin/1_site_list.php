<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header ">
		<?php echo P_Lang("多站点维护");?>
		<div class="fr">
			<button class="layui-btn layui-btn-sm" onclick="$.phpok_site.add()">
				<i class="layui-icon">&#xe608;</i> <?php echo P_Lang("添加新站点");?>
			</button>
		</div>
	</div>

	<div class="layui-card-body">
		<blockquote class="layui-elem-quote">
			<?php echo P_Lang("本系统支持多站点多语言模式，所有站点可以通过代码来实现跳转：");?> <span class="layui-bg-red">{$sys.url}?siteId=站点ID</span><br>
			<?php echo P_Lang("要开启多语言功能，请在 _config/global.ini.php 里开启 multiple_language=true");?> <br>
			<?php echo P_Lang("站点列表（别名用于后台管理，在前台并不调用）");?>
		</blockquote>
		<table class="layui-table">
		<thead>
		<tr>
			<th><?php echo P_Lang("站点ID");?></th>
			<th><?php echo P_Lang("名称");?></th>
			<th><?php echo P_Lang("目录");?></th>
			<th><?php echo P_Lang("别名");?></th>
			<th><?php echo P_Lang("域名");?></th>
			<th>&nbsp;</th>
		</tr>
		</thead>
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr>
			<td><?php echo $value['id'];?></td>
			<td>
				<?php echo $value['title'];?>
				<?php if($value['is_default']){ ?>
				<span class="layui-bg-green">(<?php echo P_Lang("默认站点");?>)</span>
				<?php } ?>
			</td>
			<td><?php echo $value['dir'];?></td>
			<td>
				<input type="button" value="<?php echo $value['alias'] ? $value['alias'] : '无别名，点击设置';?>" onclick="$.phpok_site.alias('<?php echo $value['id'];?>','<?php echo $value['alias'];?>')" class="layui-btn layui-btn-sm" />
			</td>
			<td><?php echo $value['dlist_string'];?></td>
			<td>
				<div class="layui-btn-group">
					<?php if(!$value['is_default'] && $popedom['default']){ ?>
					<input type="button" value="<?php echo P_Lang("设为默认站点");?>" onclick="$.phpok_site.set_default('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm" />
					<?php } ?>
					<?php if($popedom['delete'] && !$value['is_default']){ ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.phpok_site.del('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
					<?php } ?>
					<input type="button" value="<?php echo P_Lang("复制链接");?>" onclick="" class="layui-btn layui-btn-sm site-url-copy"  data-clipboard-text="{$sys.url}?siteId=<?php echo $value['id'];?>" />
				</div>
			</td>
		</tr>
		<?php } ?>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>