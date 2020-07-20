<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><article class="am-article">
	<div class="am-article-hd">
		<h2 class="am-article-title">协议说明</h2>
	</div>
	<div class="am-article-bd">
		<div class="content">
			<p>用户在本站网页上发布信息或者使用本站服务时必须符合中国有关法规，<span class="red">不得在网页上制作、复制、发布、传播以下信息</span></p>
			<ol>
				<li>违反宪法确定的基本原则的；</li>
				<li>危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；</li>
				<li>损害国家荣誉和利益的；</li>
				<li>煽动民族仇恨、民族歧视，破坏民族团结的；</li>
				<li>破坏国家宗教政策，宣扬邪教和封建迷信的；</li>
				<li>散布谣言，扰乱社会秩序，破坏社会稳定的；</li>
				<li>散布淫秽、色情、赌博、暴力、恐怖或者教唆犯罪的；</li>
				<li>侮辱或者诽谤他人，侵害他人合法权益的；</li>
				<li>煽动非法集会、结社、游行、示威、聚众扰乱社会秩序的；</li>
				<li>以非法民间组织名义活动的；</li>
				<li>故意制作、传播计算机病毒等破坏性程序的</li>
				<li>含有法律、行政法规禁止的其他内容的</li>
				<li>其他危害计算机信息网络安全的行为</li>
			</ol>
			<p>如果您已经是我们的会员，请点这里 <a href="<?php echo phpok_url(array('ctrl'=>'login'));?>" title="登录" class="am-btn am-btn-secondary am-btn-xs">登录</a></p>
			<p>如果您已经是我们的会员，但忘记密码，请点这里 <a href="<?php echo phpok_url(array('ctrl'=>'login','func'=>'getpass'));?>" title="忘记密码？" class="am-btn am-btn-secondary am-btn-xs">取回密码</a></p>
		</div>
	</div>
</article>
