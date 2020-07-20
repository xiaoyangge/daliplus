<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("header","file",true,false); ?>
<?php if($cate_rs['banner'] || $page_rs['banner']){ ?>
<div class="banner" style="background-image:url('<?php echo $cate_rs['banner'] ? $cate_rs['banner']['filename'] : $page_rs['banner']['filename'];?>');"><img src="images/blank.gif" alt="<?php echo $rs['title'];?>" /></div>
<?php } ?>

<?php include($this->dir_php."bbs_content.php");?>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<ul class="am-comments-list">
		<?php if($pageid == 1){ ?>
		<li class="am-comment">
			<a href="<?php echo phpok_url(array('ctrl'=>'user','id'=>$rs['user']['id']));?>" title="查看<?php echo $rs['user']['user'];?>的主页"><img class="am-comment-avatar" alt="<?php echo $rs['user']['nickname'] ? $rs['user']['nickname'] : $rs['user']['user'];?>" src="<?php echo $rs['user']['avatar'] ? $rs['user']['avatar'] : 'tpl/www/images/avatar.gif';?>" /></a>
			<div class="am-comment-main">
				<div class="am-comment-hd">
					<div class="am-comment-meta">
						<a href="<?php echo phpok_url(array('ctrl'=>'user','id'=>$rs['user']['id']));?>" class="am-comment-author"><?php echo $rs['user']['nickname'] ? $rs['user']['nickname'] : $rs['user']['user'];?></a>于 <time><?php echo time_format($rs['dateline']);?></time> 发布主题：<b><?php echo $rs['title'];?></b>
					</div>
				</div>
				<div class="am-comment-bd"><?php echo $rs['content'];?><div class="am-fr gray">楼主</div></div>
			</div>
		</li>
		<?php } ?>
		<?php $tmpid["num"] = 0;$comment['rslist']=is_array($comment['rslist']) ? $comment['rslist'] : array();$tmpid = array();$tmpid["total"] = count($comment['rslist']);$tmpid["index"] = -1;foreach($comment['rslist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<li class="am-comment">
			<a href="<?php echo phpok_url(array('ctrl'=>'user','id'=>$value['uid']['id']));?>" target="_blank">
				<img src="<?php echo $value['uid']['avatar'];?>" class="am-comment-avatar" width="48" height="48" />
			</a>
			<div class="am-comment-main">
				<div class="am-comment-hd">
					<div class="am-comment-meta">
						<a href="<?php echo phpok_url(array('ctrl'=>'user','id'=>$value['uid']['id']));?>" target="_blank" class="am-comment-author"><?php echo $value['uid']['user'];?></a> 于 <time><?php echo time_format($value['addtime']);?></time> 回复
					</div>
				</div>
				<div class="am-comment-bd">
					<?php echo $value['content'];?>
					<div class="am-fr gray"><?php echo $value['_layer'];?></div>
				</div>
			</div>
		</li>
			<?php if($value['adm_reply']){ ?>
			<?php $idxx["num"] = 0;$value['adm_reply']=is_array($value['adm_reply']) ? $value['adm_reply'] : array();$idxx = array();$idxx["total"] = count($value['adm_reply']);$idxx["index"] = -1;foreach($value['adm_reply'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
			<li class="am-comment am-comment-flip am-comment-highlight">
				<img src="tpl/www/images/adminer.png" class="am-comment-avatar" width="48" height="48" />
				<div class="am-comment-main">
					<div class="am-comment-hd">
						<div class="am-comment-meta">
							管理员回复于<time><?php echo time_format($v['addtime']);?></time>
						</div>
					</div>
					<div class="am-comment-bd">
						<?php echo $v['content'];?>
					</div>
				</div>
			</li>
			<?php } ?>
			<?php } ?>
		<?php } ?>
		<?php if($session['user_id']){ ?>
		<li class="am-comment">
			<img src="<?php echo $comment['avatar'];?>" class="am-comment-avatar" width="48" height="48" />
			<div class="am-comment-main">
				<div class="am-comment-hd">
					<div class="am-comment-meta">
						提交新回复<?php if($comment['total']){ ?>，当前已有 <?php echo $comment['total'];?> 条回复<?php } ?>
					</div>
				</div>
				<div class="am-comment-bd">
					<form method="post" id="comment-post" class="am-form">
						<input type="hidden" name="tid" value="<?php echo $tid ? $tid : $rs['id'];?>" />
						<input type="hidden" name="vtype" value="title" />
						<?php if($comment['uid']){ ?>
						<div class="am-form-group"><?php echo form_edit('comment',$comment['content'],'editor','width=100%&height=150&btns[image]=1');?></div>
						<?php } else { ?>
						<div class="am-form-group">
							<textarea rows="5" name="comment" id="comment" placeholder="填写评论信息" style="resize: none;"></textarea>
						</div>
						<?php } ?>
						<?php if($is_vcode){ ?>
						<div class="am-g am-form-group am-g-collapse">
							<div class="am-u-sm-2"><input class="vcode"  type="text" name="_chkcode" id="_chkcode" placeholder="请填写验证码" /></div>
							<div class="am-u-sm-4" style="padding-left:10px;padding-top:5px;"><img src="" border="0" align="absmiddle" id="vcode" class="hand" /></div>
							<div class="am-u-sm-6"></div>
						</div>
						<script type="text/javascript">
						$(document).ready(function(){
							$("#vcode").phpok_vcode();
							$("#vcode").click(function(){
								$(this).phpok_vcode();
							});
						});
						</script>
						<?php } ?>
						<div>
							<input name="" type="submit" class="am-btn am-btn-primary" value="提交" />
						</div>
					</form>
				</div>
			</div>
		</li>
		<?php } else { ?>
		<li class="am-comment">
			<img src="<?php echo $comment['avatar'];?>" class="am-comment-avatar" width="48" height="48" />
			<div class="am-comment-main">
				<div class="am-comment-hd">
					<div class="am-comment-meta">
						提交新回复<?php if($comment['total']){ ?>，当前已有 <?php echo $comment['total'];?> 条回复<?php } ?>
					</div>
				</div>
				<div class="am-comment-bd">
					<div style="padding:20px;text-align:center">请先 <a href="<?php echo phpok_url(array('ctrl'=>'login','_back'=>$rs['url']));?>" title="会员登录">登录</a> 或 <a href="<?php echo phpok_url(array('ctrl'=>'register','_back'=>$rs['url']));?>" title="新会员注册">注册</a></div>
				</div>
			</div>
		</li>
		<?php } ?>
	</ul>
	<?php $this->assign("pageurl",$rs['url']); ?><?php $this->assign("total",$comment['total']); ?><?php $this->assign("pageid",$comment['pageid']); ?><?php $this->assign("psize",$comment['psize']); ?><?php $this->output("block/pagelist","file",true,false); ?>
</div>
<?php $this->output("footer","file",true,false); ?>