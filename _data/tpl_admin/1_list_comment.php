<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("nopadding","true"); ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript" src="<?php echo phpok_url(array('ctrl'=>'js','func'=>'ext','js'=>'admin.reply.js'));?>"></script>
<div class="layui-card">
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th>ID</th>
			<th width="20"></th>
			<th><?php echo P_Lang("星数");?></th>
			<th><?php echo P_Lang("内容");?></th>
			<th><?php echo P_Lang("图片");?></th>
			<th><?php echo P_Lang("时间");?></th>
			<th width="160"></th>
		</tr>
		</thead>
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr data-id="replylist_<?php echo $value['id'];?>">
			<td><?php echo $value['id'];?></td>
			<td>
				<span class="status<?php echo $value['status'];?>" id="status_<?php echo $value['id'];?>" <?php if($popedom['status']){ ?>onclick="$.admin_reply.status(<?php echo $value['id'];?>)"<?php } else { ?> style="cursor:default"<?php } ?> value="<?php echo $value['status'];?>"></span>
			</td>
			<td>
				<?php if($value['star'] == 1){ ?><div class="layui-tips" lay-tips="<?php echo P_Lang("一星");?>">★☆☆☆☆</div><?php } ?>
				<?php if($value['star'] == 2){ ?><div class="layui-tips" lay-tips="<?php echo P_Lang("二星");?>">★★☆☆☆</div><?php } ?>
				<?php if($value['star'] == 3){ ?><div class="layui-tips" lay-tips="<?php echo P_Lang("三星");?>">★★★☆☆</div><?php } ?>
				<?php if($value['star'] == 4){ ?><div class="layui-tips" lay-tips="<?php echo P_Lang("四星");?>">★★★★☆</div><?php } ?>
				<?php if($value['star'] == 5){ ?><div class="layui-tips" lay-tips="<?php echo P_Lang("五星");?>">★★★★★</div><?php } ?>
			</td>
			<td>
				<div><?php echo $value['content'];?></div>
			</td>
			<td>
				<?php $idxx["num"] = 0;$value['res']=is_array($value['res']) ? $value['res'] : array();$idxx = array();$idxx["total"] = count($value['res']);$idxx["index"] = -1;foreach($value['res'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
				<img src="<?php echo $v['ico'];?>" width="60px" class="hand" onclick="$.admin_reply.preview_attr(<?php echo $v['id'];?>)" />
				<?php } ?>
			</td>
			<td><?php echo date('Y-m-d H:i:s',$value['addtime']);?></td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("新回复");?>" onclick="$.admin_reply.adm(<?php echo $value['id'];?>)" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("修改");?>" onclick="$.admin_reply.edit(<?php echo $value['id'];?>)" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_reply.del(<?php echo $value['id'];?>)" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
			</td>
		</tr>
		<?php $idxx["num"] = 0;$value['adm_reply']=is_array($value['adm_reply']) ? $value['adm_reply'] : array();$idxx = array();$idxx["total"] = count($value['adm_reply']);$idxx["index"] = -1;foreach($value['adm_reply'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
		<tr data-id="replylist_<?php echo $value['id'];?>" id="adm_reply_<?php echo $v['id'];?>">
			<td colspan="6">
				<span class="red"><?php echo P_Lang("管理员回复");?> - <?php echo $idxx['num'];?></span>
				<small class="gray"><?php echo P_Lang("回复时间");?> <?php echo date('Y-m-d H:i:s',$value['addtime']);?></small>
				<?php echo $v['content'];?>
			</td>
			<td>
				<?php if(($popedom['delete'] && $v['admin_id'] == $session['admin_id']) || $session['admin_rs']['if_system']){ ?>
				<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_reply.del(<?php echo $v['id'];?>,'reply')" class="layui-btn layui-btn-sm layui-btn-danger" />
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
		<?php } ?>
		</table>
		<div class="center"><?php $this->output("pagelist","file",true,false); ?></div>
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>