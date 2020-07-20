<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript" src="js/masonry-docs.min.js"></script>
<div class="layui-row layui-col-space15">
	<div class="layui-col-xs12 layui-col-sm6 layui-col-md4 prd">
		<div class="layui-card ">
			<div class="layui-card-header layui-bg-black">
				<?php echo P_Lang("标签信息");?>
				<div class="fr">
					<button type="button" onclick="$.admin_tag.node_set('<?php echo $rs['id'];?>','add')" class="layui-btn layui-btn-sm">
						<i class="layui-icon layui-icon-add-1"></i> <?php echo P_Lang("添加节点");?>
					</button>
				</div>
			</div>
			<div class="layui-card-body">
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("标签名");?>
					</label>
					<div class="layui-form-mid red">
						<?php echo $rs['title'];?>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("主题数");?>
					</label>
					<div class="layui-form-mid">
						<?php echo $rs['total'];?>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("节点数");?>
					</label>
					<div class="layui-input-inline default-auto">
						
					</div>
					<div class="layui-form-mid">
						<?php if($total){ ?><?php echo $total;?><?php } else { ?><span class="red"><?php echo P_Lang("暂无");?></span><?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
	<div class="layui-col-xs12 layui-col-sm6 layui-col-md4 prd">
		<div class="layui-card">
			<div class="layui-card-header">
				#<?php echo $value['id'];?>_<?php echo $value['title'];?>
				<div class="layui-btn-group fr">
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_tag.node_set('<?php echo $value['id'];?>','edit')" class="layui-btn layui-btn-sm" />
					<?php if(!$value['pid']){ ?>
					<input type="button" value="<?php echo P_Lang("绑定");?>" onclick="$.admin_tag.node_title('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" />
					<?php } ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_tag.node_delete('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
			</div>
			<div class="layui-card-body">
				<?php if(!$value['ids']){ ?>
				<div style="padding:30px 5px;">
					<?php if($value['pid']){ ?>
					<span><?php echo P_Lang("已绑定项目");?></span>
					<?php } ?>
					<?php if($value['pid'] && $value['cid']){ ?> / <?php } ?>
					<?php if($value['cid']){ ?>
					<span><?php echo P_Lang("已绑定分类");?></span>
					<?php } ?>
					<?php if(!$value['psize'] && !$value['pid'] && !$value['cid']){ ?>
					<span class="red"><?php echo P_Lang("未绑定主题，未指定数量，此节点无效");?></span>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if($value['tlist']){ ?>
				<table class="layui-table">
				<thead>
				<tr>
					<th>ID</th>
					<th><?php echo P_Lang("标题");?></th>
					<th><?php echo P_Lang("删除");?></th>
				</tr>
				</thead>
				<?php $idxx["num"] = 0;$value['tlist']=is_array($value['tlist']) ? $value['tlist'] : array();$idxx = array();$idxx["total"] = count($value['tlist']);$idxx["index"] = -1;foreach($value['tlist'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
				<tr id="t<?php echo $value['id'];?>_<?php echo $v['id'];?>">
					<td><?php echo $v['id'];?></td>
					<td<?php if(!$v['status']){ ?> class="red"<?php } ?>><?php echo $v['title'];?><small class="gray i">_<?php echo $v['type'];?></small></td>
					<td>
						<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_tag.node_delete_ids('<?php echo $v['id'];?>','<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
					</td>
				</tr>
				<?php } ?>
				</table>
				
				<?php } ?>
				<div class="gray">
					<span class="darkblue">{</span><span class="darkblue">$rs.<?php echo $value['identifier'];?></span><span class="darkblue">}</span>
					<?php if(!$value['type']){ ?>
					<small>
						<?php echo P_Lang("仅读取一篇内容信息");?>
					</small>
					<?php } ?>
					<?php if(!$value['status']){ ?>
					<small class="red fr"><?php echo P_Lang("未启用");?></small>
					<?php } ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="layui-col-xs12 layui-col-sm6 layui-col-md4 prd">
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('.layui-row').masonry({
		itemSelector: '.prd',
		columnWidth: '.prd',
		percentPosition: true
	})
});
</script>
<?php $this->output("foot_lay","file",true,false); ?>