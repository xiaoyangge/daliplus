<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("通知内容管理");?>
		<?php if($popedom['add']){ ?>
		<div class="layui-btn-group fr">
			<button class="layui-btn layui-btn-sm" onclick="$.win('<?php echo P_Lang("添加邮件模版");?>','<?php echo phpok_url(array('ctrl'=>'email','func'=>'set','type'=>'email'));?>')"> <i class="layui-icon">&#xe608;</i><?php echo P_Lang("邮件模版");?></button>
			<button class="layui-btn layui-btn-sm" onclick="$.win('<?php echo P_Lang("添加短信模版");?>','<?php echo phpok_url(array('ctrl'=>'email','func'=>'set','type'=>'sms'));?>')"> <i class="layui-icon">&#xe608;</i><?php echo P_Lang("短信模版");?></button>
		</div>
		<?php } ?>
	</div>

	<div class="layui-card-body">
		<blockquote class="layui-elem-quote">
			<?php echo P_Lang("短信模板以标识");?> <b class="layui-bg-red">sms_</b> <?php echo P_Lang("开头");?><?php echo P_Lang("，");?><?php echo P_Lang("发送的内容不带样式");?>
		</blockquote>
		<table class="layui-table">
			<thead>
			<tr>
				<th>ID</th>
				<th><?php echo P_Lang("标题头");?></th>
				<th><?php echo P_Lang("类型");?></th>
				<th><?php echo P_Lang("标识");?></th>
				<?php if($popedom['modify'] || $popedom['delete']){ ?><th><?php echo P_Lang("操作");?></th><?php } ?>
			</tr>
			</thead>
			<tbody>
			<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<tr title="<?php echo $value['note'];?>">
				<td><?php echo $value['id'];?></td>
				<td><?php echo $value['title'];?><?php if($value['note']){ ?><span class="gray i">（<?php echo $value['note'];?>）</span><?php } ?></td>
				<td><?php if(substr($value['identifier'],0,4) == 'sms_'){ ?><?php echo P_Lang("短信");?><?php } else { ?><?php echo P_Lang("邮件");?><?php } ?></td>
				<td><?php echo $value['identifier'];?></td>
				<?php if($popedom['modify'] || $popedom['delete']){ ?>
				<td>
					<div class="layui-btn-group">
						<?php if($popedom['add']){ ?>
						<input type="button" value="<?php echo P_Lang("复制");?>" onclick="$.win('<?php echo P_Lang("添加通知模板");?>','<?php echo phpok_url(array('ctrl'=>'email','func'=>'set','tid'=>$value['id']));?>')" class="layui-btn layui-btn-sm" />
						<?php } ?>
						<?php if($popedom['modify']){ ?>
						<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.win('<?php echo P_Lang("编辑通知模板");?>_<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'email','func'=>'set','id'=>$value['id']));?>')" class="layui-btn layui-btn-sm" />
						<?php } ?>
						<?php if($popedom['delete']){ ?>
						<input type="button" value="<?php echo P_Lang("删除");?>" onclick="mail_delete('<?php echo $value['id'];?>','<?php echo $value['identifier'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
						<?php } ?>
					</div>
				</td>
				<?php } ?>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php $this->output("pagelist","file",true,false); ?>
	</div>
</div>
<script type="text/javascript">
    function mail_delete(id,title)
    {
        $.dialog.confirm("确定要删除标识 <span class='red'>"+title+"</span> 的模板内容吗?<br />删除后不能正常发送通知",function(){
            var url = get_url("email","del")+"&id="+id;
            var rs = $.phpok.json(url);
            if(rs.status == "ok"){
                $.phpok.reload();
            }else{
                $.dialog.alert(rs.content);
                return false;
            }
        });
    }
</script>
<?php $this->output("foot_lay","file",true,false); ?>