<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<?php if($project_list){ ?>
<script type="text/javascript">

$(document).ready(function(){
	$("#project li").mouseover(function(){
		$(this).addClass("hover");
	}).mouseout(function(){
		$(this).removeClass("hover");
	}).click(function(){
		var url = $(this).attr("href");
		var txt = $(this).text();
		if(txt == '' || $.trim(txt) == ''){
			txt = $(this).attr('title');
		}
		if(url){
			$.win(txt,url);
			return true;
		}
		$.dialog.alert(p_lang('未指定动作'));
		return false;
	});
});
</script>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("子项信息，请点击操作");?></div>
	<div class="layui-card-body">
		<ul class="project" id="project">
			<?php $project_list_id["num"] = 0;$project_list=is_array($project_list) ? $project_list : array();$project_list_id = array();$project_list_id["total"] = count($project_list);$project_list_id["index"] = -1;foreach($project_list as $key=>$value){ $project_list_id["num"]++;$project_list_id["index"]++; ?>
			<li id="project_<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" status="<?php echo $value['status'];?>" href="<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$value['id']));?>">
				<div class="img"><img src="<?php echo $value['ico'] ? $value['ico'] : 'images/ico/default.png';?>" /></div>
				<div class="txt" id="txt_<?php echo $value['id'];?>"><?php echo $value['nick_title'] ? $value['nick_title'] : $value['title'];?></div>
			</li>
			<?php } ?>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<?php } ?>
<script type="text/javascript">
function save()
{
	$("#post_save").ajaxSubmit({
		'url':get_url('list','save'),
		'type':'post',
		'dataType':'json',
		'success':function(rs){
			if(rs.status){
				$.dialog.tips(p_lang('编辑成功')).lock();
				return true;
			}
			$.dialog.alert(rs.info);
			return false;
		}
	});
	return false;
}
</script>
<form method="post" class="layui-form" id="post_save" onsubmit="return save()">
<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
<div class="layui-card">
	<div class="layui-card-body">
		<input type="hidden" name="style" id="style" value="<?php echo $rs['style'];?>" />
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("名称");?>
			</label>
			<div class="layui-input-block">
				<div class="layui-col-sm9">
					<input type="text" id="title" name="title" class="layui-input" style="<?php echo $rs['style'];?>" value="<?php echo $rs['title'];?>" />
				</div>
			    <div class="layui-col-sm2" style="margin-left:10px;margin-top:3px;">
				    <button type="button" class="layui-btn layui-btn-sm" onclick="$.admin_list.style_setting('style','title')">
						<i class="layui-icon">&#xe64e;</i> <?php echo P_Lang("样式");?>
					</button>
			    </div>
			</div>
		</div>
		<?php $extlist_id["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$extlist_id = array();$extlist_id["total"] = count($extlist);$extlist_id["index"] = -1;foreach($extlist as $key=>$value){ $extlist_id["num"]++;$extlist_id["index"]++; ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo $value['title'];?>
				<div class="darkblue">[<?php echo $value['identifier'];?>]</div>
			</label>
			<div class="layui-input-block">
				<?php echo $value['html'];?>
			</div>
			<?php if($value['note']){ ?><div class="layui-input-block mtop"><?php echo $value['note'];?></div><?php } ?>
		</div>
		<?php } ?>
		
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header hand" onclick="$.admin.card(this)">
		<?php echo P_Lang("SEO优化");?>
		<i class="layui-icon layui-icon-right"></i>
	</div>
	<div class="layui-card-body hide">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("SEO标题");?>
			</label>
			<div class="layui-input-block">
				<input type="text" id="seo_title" name="seo_title" class="layui-input" value="<?php echo $rs['seo_title'];?>" />
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("设置此标题后，网站Title将会替代默认定义的，不能超过85个汉字");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("SEO关键字");?>
			</label>
			<div class="layui-input-block">
				<input type="text" id="seo_keywords" name="seo_keywords" class="layui-input" value="<?php echo $rs['seo_keywords'];?>" />
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("多个关键字用英文逗号或下划线或竖线隔开");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("SEO描述");?>
			</label>
			<div class="layui-input-block">
				<textarea name="seo_desc" id="seo_desc" class="layui-textarea"><?php echo $rs['seo_desc'];?></textarea>
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("简单描述该主题信息，用于搜索引挈，不支持HTML，不能超过85个汉字");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("标签");?>
			</label>
			<div class="layui-input-block">
				<input type="text" id="tag" name="tag" class="layui-input" value='<?php echo $rs['tag'];?>' />
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("多个标签用 [title] 分开，最多不能超过10个",array('title'=>'<span style="color:red">'.$tag_config['separator'].'</span>'));?></div>
		</div>
	</div>
</div>
<div class="clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("提交");?>" class="layui-btn layui-btn-lg layui-btn-danger" />
		<input type="button" value="<?php echo P_Lang("取消关闭");?>" class="layui-btn layui-btn-lg layui-btn-primary" onclick="$.admin.close()" />
	</div>
</div>
</form>

<?php $this->output("foot_lay","file",true,false); ?>