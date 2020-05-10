<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("搜索");?></div>
	<div class="layui-card-body">
		<div class="layui-form layuiadmin-card-header-auto">
			<form method="post" action="<?php echo phpok_url(array('ctrl'=>'fav'));?>">
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label"><?php echo P_Lang("会员账号");?></label>
					<div class="layui-input-inline">
						<input type="text" name="keywords[user]" value="<?php echo $keywords['user'];?>" class="layui-input">
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label"><?php echo P_Lang("会员Email");?></label>
					<div class="layui-input-inline">
						<input type="text" name="keywords[email]" value="<?php echo $keywords['email'];?>" class="layui-input">
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label"><?php echo P_Lang("会员手机号");?></label>
					<div class="layui-input-inline">
						<input type="text" name="keywords[mobile]" value="<?php echo $keywords['mobile'];?>" class="layui-input">
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label"><?php echo P_Lang("标题");?></label>
					<div class="layui-input-inline">
						<input type="text" name="keywords[title]" value="<?php echo $keywords['title'];?>" class="layui-input" />
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label"><?php echo P_Lang("摘要");?></label>
					<div class="layui-input-inline">
						<input type="text" name="keywords[note]" value="<?php echo $keywords['note'];?>" class="layui-input" />
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label"><?php echo P_Lang("缩略图名称");?></label>
					<div class="layui-input-inline">
						<input type="text" name="keywords[thumb]" value="<?php echo $keywords['thumb'];?>" class="layui-input" />
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label"><?php echo P_Lang("开始时间");?></label>
					<div class="layui-input-inline">
						<input type="text" name="startdate" id="startdate" value="<?php echo $startdate;?>" class="layui-input" />
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label"><?php echo P_Lang("结束时间");?></label>
					<div class="layui-input-inline">
						<input type="text" name="stopdate" id="stopdate" value="<?php echo $stopdate;?>" class="layui-input" />
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label"></label>
					<div class="layui-input-inline">
						<input type="submit" value="<?php echo P_Lang("搜索");?>" class="layui-btn" />
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("收藏列表");?></div>
	<div class="layui-card-body">
		<table width="100%" class="layui-table">
		<colgroup>
			<col width="50">
			<col>
			<col width="150">
			<col width="170">
			<col>
		</colgroup>
		<thead>
		<tr>
			<th>ID</th>
			<th class="lft"><?php echo P_Lang("标题");?></th>
			<th><?php echo P_Lang("会员账号");?></th>
			<th><?php echo P_Lang("收藏时间");?></th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr data-id="<?php echo $value['id'];?>">
			<td class="center"><?php echo $value['id'];?></td>
			<td>
				<?php if($value['thumb']){ ?><a href="<?php echo $value['thumb'];?>" target="_blank"><img src="<?php echo $value['thumb'];?>" width="50px" valign="absmiddle" /></a><?php } ?>
				<?php echo $value['title'];?>
			</td>
			<td class="center"><?php echo $value['user'];?></td>
			<td class="center"><?php echo time_format($value['addtime']);?></td>
			<td class="center">
				<div class="layui-btn-group">
					<button class="layui-btn layui-btn-sm" onclick="$.phpok.open('<?php echo $sys['www_file'];?>?id=<?php echo $value['lid'];?>')"><?php echo P_Lang("访问");?></button>
					<button class="layui-btn layui-btn-sm layui-btn-danger" onclick="$.admin_fav.del('<?php echo $value['id'];?>')">删除</button>
				</div>
			</td>
		</tr>
		<?php } ?>
		</tbody>
		</table>
		<?php $this->output("pagelist","file",true,false); ?>
	</div>
</div>


<?php $this->output("foot_lay","file",true,false); ?>