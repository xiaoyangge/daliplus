<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card" id="search_html"<?php if(!$keywords){ ?> style="display:none"<?php } ?>>
	<div class="layui-card-header"><?php echo P_Lang("搜索");?></div>
	<div class="layui-card-body">
		<div class="layui-form layuiadmin-card-header-auto">
			<form method="post" action="<?php echo phpok_url(array('ctrl'=>'address'));?>">
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label layui-icon layui-icon-tips" lay-tips="<?php echo P_Lang("包括会员的账号，邮箱及手机号，不支持模糊搜索");?>"> <?php echo P_Lang("会员");?></label>
					<div class="layui-input-inline">
						<input type="text" name="keywords[user]" value="<?php echo $keywords['user'];?>" class="layui-input">
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label layui-icon layui-icon-tips" lay-tips="<?php echo P_Lang("支持模糊搜索，可以填写国家，省份，城市及地址明细信息");?>"> <?php echo P_Lang("地址");?></label>
					<div class="layui-input-inline">
						<input type="text" name="keywords[address]" value="<?php echo $keywords['address'];?>" class="layui-input">
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label layui-icon layui-icon-tips" lay-tips="<?php echo P_Lang("包括地址库里的手机，固定电话及Email，不支持模糊搜索");?>"> <?php echo P_Lang("联系方式");?></label>
					<div class="layui-input-inline">
						<input type="text" name="keywords[contact]" value="<?php echo $keywords['contact'];?>" class="layui-input">
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label layui-icon layui-icon-tips" lay-tips="<?php echo P_Lang("地址库里的联系人姓名，不支持模糊搜索");?>"> <?php echo P_Lang("姓名");?></label>
					<div class="layui-input-inline">
						<input type="text" name="keywords[fullname]" value="<?php echo $keywords['fullname'];?>" class="layui-input">
					</div>
				</div>
				<div class="layui-inline">
					<input type="submit" value="<?php echo P_Lang("搜索");?>" class="layui-btn" />
					<input type="button" value="<?php echo P_Lang("取消搜索");?>" class="layui-btn layui-btn-primary" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'address'));?>')" />
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header clearfix"><?php echo P_Lang("列表");?>
		<div class="layui-btn-group fr">
			<button class="layui-btn layui-btn-sm" onclick="$.admin_address.add()">
				<i class="layui-icon">&#xe654;</i>
				<?php echo P_Lang("添加");?>
			</button>
			<button class="layui-btn layui-btn-primary layui-btn-sm" onclick="$.admin.hide_show('search_html')">
				<i class="layui-icon">&#xe615;</i>
				<?php echo P_Lang("搜索");?>
			</button>
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
			<thead>
				<tr>
					<th width="50">ID</th>
					<th><?php echo P_Lang("会员");?></th>
					<th><?php echo P_Lang("姓名");?></th>
					<th><?php echo P_Lang("地址");?></th>
					<th><?php echo P_Lang("联系方式");?></th>
					<th><?php echo P_Lang("邮编");?></th>
					<th><?php echo P_Lang("操作");?></th>
				</tr>
			</thead>
			<tbody>
				<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<tr id="address_<?php echo $value['id'];?>">
					<td><?php echo $value['id'];?></td>
					<td><?php echo $value['user'];?></td>
					<td><?php echo $value['fullname'];?></td>
					<td>
						<?php echo $value['country'];?>
						<?php if($value['province'] != $value['city']){ ?>/ <?php echo $value['province'];?><?php } ?>
						<?php if($value['city'] != $value['county'] && $value['city']){ ?>/ <?php echo $value['city'];?><?php } ?>
						<?php if($value['county']){ ?>/ <?php echo $value['county'];?><?php } ?>
						/ <?php echo $value['address'];?>
						<?php if($value['is_default']){ ?><span class="layui-badge-rim"><?php echo P_Lang("默认");?></span><?php } ?>
					</td>
					<td>
						<?php if($value['mobile']){ ?><div class="layui-icon icon-mobile"> <?php echo $value['mobile'];?></div><?php } ?>
						<?php if($value['email']){ ?><div class="layui-icon icon-envelope" style="margin-top:7px"> <?php echo $value['email'];?></div><?php } ?>
						<?php if($value['tel']){ ?><div class="layui-icon icon-phone" style="margin-top:7px"> <?php echo $value['tel'];?></div><?php } ?>
					</td>
					<td><?php echo $value['zipcode'];?></td>
					<td>
						<button class="layui-btn layui-btn-sm" onclick="$.admin_address.edit('<?php echo $value['id'];?>')"><?php echo P_Lang("编辑");?></button>
						<button class="layui-btn layui-btn-danger layui-btn-sm" onclick="$.admin_address.del('<?php echo $value['id'];?>')"><?php echo P_Lang("删除");?></button>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>