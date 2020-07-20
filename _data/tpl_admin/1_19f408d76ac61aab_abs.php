<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><input type="hidden" name="ext_form_id" id="ext_form_id" value="height,is_code:checkbox,is_read:checkbox,inc_tag:checkbox,paste_text,btns,is_float:checkbox,auto_height:checkbox" />
<div class="table">
	<div class="title">
		<?php echo P_Lang("编辑器最小高度设置");?>：
		<span class="note"><?php echo P_Lang("只需要填写数字，宽度强制为百分百");?></span>
	</div>
	<div class="content"><input type="text" name="height" id="height" value="<?php echo $rs['height'];?>" class="short" /> px</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("编辑器扩展按钮");?>：
		<span class="note"><?php echo P_Lang("请根据实际情况需要设置编辑器扩展按钮，前台不支持地图");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li style="width:17%"><label><input type="checkbox" name="btns[image]"<?php if($rs['btns'] && $rs['btns']['image']){ ?> checked<?php } ?>><?php echo P_Lang("图片");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[info]"<?php if($rs['btns'] && $rs['btns']['info']){ ?> checked<?php } ?>><?php echo P_Lang("资料");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[video]"<?php if($rs['btns'] && $rs['btns']['video']){ ?> checked<?php } ?>><?php echo P_Lang("视频");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[file]"<?php if($rs['btns'] && $rs['btns']['file']){ ?> checked<?php } ?>><?php echo P_Lang("文件");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[page]"<?php if($rs['btns'] && $rs['btns']['page']){ ?> checked<?php } ?>><?php echo P_Lang("分页");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[table]"<?php if($rs['btns'] && $rs['btns']['table']){ ?> checked<?php } ?>><?php echo P_Lang("表格");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[emotion]"<?php if($rs['btns'] && $rs['btns']['emotion']){ ?> checked<?php } ?>><?php echo P_Lang("表情");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[map]"<?php if($rs['btns'] && $rs['btns']['map']){ ?> checked<?php } ?>><?php echo P_Lang("地图");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[spechars]"<?php if($rs['btns'] && $rs['btns']['spechars']){ ?> checked<?php } ?>><?php echo P_Lang("符号");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[insertcode]"<?php if($rs['btns'] && $rs['btns']['insertcode']){ ?> checked<?php } ?>><?php echo P_Lang("代码");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[paragraph]"<?php if($rs['btns'] && $rs['btns']['paragraph']){ ?> checked<?php } ?>><?php echo P_Lang("段落");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[fontsize]"<?php if($rs['btns'] && $rs['btns']['fontsize']){ ?> checked<?php } ?>><?php echo P_Lang("字号");?></label></li>
			<li style="width:17%"><label><input type="checkbox" name="btns[fontfamily]"<?php if($rs['btns'] && $rs['btns']['fontfamily']){ ?> checked<?php } ?>><?php echo P_Lang("字体");?></label></li>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("默认粘贴方式");?>：<span class="note"><?php echo P_Lang("前台使用默认都是纯文本粘贴");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><label><input type="radio" name="paste_text" value="0"<?php if(!$rs['paste_text']){ ?> checked<?php } ?>><?php echo P_Lang("带格式粘贴");?></label></li>
			<li><label><input type="radio" name="paste_text" value="1"<?php if($rs['paste_text']){ ?> checked<?php } ?>><?php echo P_Lang("纯文本粘贴");?></label></li>
		</ul>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("编辑器属性");?>：
		<span class="note"><?php echo P_Lang("设置编辑器常用属性");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><label><input type="checkbox" name="is_code"<?php if($rs['is_code']){ ?> checked<?php } ?>><?php echo P_Lang("显示源码");?></label></li>
			<li><label><input type="checkbox" name="is_read"<?php if($rs['is_read']){ ?> checked<?php } ?>><?php echo P_Lang("只读");?></label></li>
			<li><label><input type="checkbox" name="is_float"<?php if($rs['is_float']){ ?> checked<?php } ?>><?php echo P_Lang("浮动");?></label></li>
			<li><label><input type="checkbox" name="auto_height"<?php if($rs['auto_height']){ ?> checked<?php } ?>><?php echo P_Lang("自动高度");?></label></li>
			<li><label><input type="checkbox" name="inc_tag"<?php if($rs['inc_tag']){ ?> checked<?php } ?>><?php echo P_Lang("标签格式化到内容");?></label></li>
		</ul>
		<div class="clear"></div>
	</div>
</div>
