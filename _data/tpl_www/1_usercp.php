<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title","会员中心"); ?><?php $this->output("header","file",true,false); ?>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left"><?php $this->output("block/usercp_nav","file",true,false); ?></div>
	<div class="right am-panel-group">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">会员基本资料</div>
			<div class="am-panel-bd">
				<div class="am-g">
					<div class="am-u-sm-3 am-text-center cp-avatar"><img src="<?php echo $rs['avatar'] ? $rs['avatar'] : 'tpl/www/images/avatar.gif';?>" class="am-circle am-img-thumbnail"></div>
					<div class="am-u-sm-9">
						<ul class="am-list am-list-static">
							<li><strong>会员账号：</strong><?php echo $rs['user'];?></li>
							<?php if($rs['email']){ ?><li><strong>会员邮箱：</strong><?php echo $rs['email'];?></li><?php } ?>
							<?php $tmpid["num"] = 0;$user['wealth']=is_array($user['wealth']) ? $user['wealth'] : array();$tmpid = array();$tmpid["total"] = count($user['wealth']);$tmpid["index"] = -1;foreach($user['wealth'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<li><strong><?php echo $value['title'];?>：</strong><?php echo $value['val'];?><?php echo $value['unit'];?></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php if($rslist){ ?>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">最新订单</div>
			<table class="am-table am-table-striped am-table-hover am-table-centered">
			<thead>
		        <tr>
		            <th class="am-text-left">订单编号</th>
		            <th>价格</th>
		            <th>下单时间</th>
		            <th>&nbsp;</th>
		        </tr>
		    </thead>
		    <tbody>
			    <?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		        <tr>
		            <td class="am-text-left"><?php echo $value['sn'];?></td>
		            <td><?php echo price_format($value['price'],$value['currency_id']);?></td>
		            <td><?php echo time_format($value['addtime']);?></td>
		            <td><a href="<?php echo phpok_url(array('ctrl'=>'order','func'=>'info','id'=>$value['id']));?>">查看明细</a></td>
		        </tr>
		        <?php } ?>
		    </tbody>
			</table>
		</div>
		<?php } ?>
		<?php if($reslist){ ?>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">最新上传文件</div>
			<table class="am-table am-table-hover am-table-centered">
			<thead>
		        <tr>
		            <th class="am-text-left">文件名</th>
		            <th>缩略图</th>
		            <th>类型</th>
		            <th>上传时间</th>
		            
		            <th>&nbsp;</th>
		        </tr>
		    </thead>
		    <tbody>
			    <?php $tmpid["num"] = 0;$reslist=is_array($reslist) ? $reslist : array();$tmpid = array();$tmpid["total"] = count($reslist);$tmpid["index"] = -1;foreach($reslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		        <tr>
		            <td class="am-text-left"><?php echo $value['title'];?></td>
		            <td><img src="<?php echo $value['ico'];?>" class="cp-ico" /></td>
		            <td><?php echo $value['ext'];?></td>
		            <td><?php echo time_format($value['addtime']);?></td>
		            <td>
			            <a href="<?php echo phpok_url(array('ctrl'=>'download','id'=>$value['id']));?>">下载</a>
			            <?php if($value['ext'] == 'jpg' || $value['ext'] == 'png' || $value['ext'] == 'gif'){ ?>
			            | <a href="<?php echo $value['filename'];?>" target="_blank">查看</a>
			            <?php } ?>
			        </td>
		        </tr>
		        <?php } ?>
		    </tbody>
			</table>
		</div>
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>

<?php $this->output("footer","file",true,false); ?>