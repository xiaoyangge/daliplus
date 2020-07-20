<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("js","js/art-template.js"); ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-row layui-col-space15">
	<div class="layui-col-xs12 layui-col-sm4">
		<form method="post" class="layui-form">
		<div class="layui-card" id="report_filter">
			<div class="layui-card-header">
				<?php echo P_Lang("统计筛选");?>
			</div>
			<div class="layui-card-body">
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("统计类型");?>
					</label>
					<div class="layui-input-block">
						<select name="type" lay-filter="type">
							<option value=""><?php echo P_Lang("统计类型…");?></option>
							<?php $tmpid["num"] = 0;$plist=is_array($plist) ? $plist : array();$tmpid = array();$tmpid["total"] = count($plist);$tmpid["index"] = -1;foreach($plist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<option value="<?php echo $key;?>"<?php if($type == $key){ ?> selected<?php } ?>><?php echo $value;?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="layui-form-item <?php if(!$xlist){ ?>hide<?php } ?>" data-id="line-x">
					<label class="layui-form-label">
						<?php echo P_Lang("分组");?>
					</label>
					<div class="layui-input-block">
						<select name="x">
							<option value=""><?php echo P_Lang("请选择…");?></option>
							<?php $tmpid["num"] = 0;$xlist=is_array($xlist) ? $xlist : array();$tmpid = array();$tmpid["total"] = count($xlist);$tmpid["index"] = -1;foreach($xlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<option value="<?php echo $key;?>"<?php if($x == $key){ ?> selected<?php } ?>><?php echo $value;?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div<?php if(!$ylist){ ?> class="hide"<?php } ?> data-id="line-y">
					<div class="layui-form-item">
						<label class="layui-form-label">
							<?php echo P_Lang("统计选项");?>
						</label>
						<div class="layui-input-block">
							<?php $tmpid["num"] = 0;$ylist=is_array($ylist) ? $ylist : array();$tmpid = array();$tmpid["total"] = count($ylist);$tmpid["index"] = -1;foreach($ylist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<div style="margin-bottom:5px">
							<select name="data_mode[<?php echo $key;?>]">
								<option value=""><?php echo $value;?>_<?php echo P_Lang("不统计");?></option>
								<option value="count" <?php if($data_mode && $data_mode[$key]=='count'){ ?> selected<?php } ?>><?php echo $value;?>_<?php echo P_Lang("数量计算_COUNT");?></option>
								<option value="sum" <?php if($data_mode && $data_mode[$key]=='sum'){ ?> selected<?php } ?>><?php echo $value;?>_<?php echo P_Lang("和计算_SUM");?></option>
							</select>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("开始时间");?>
					</label>
					<div class="layui-input-block">
						<input type="text" name="startdate" id="startdate" class="layui-input" value="<?php echo $startdate;?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("开始时间");?>
					</label>
					<div class="layui-input-block">
						<input type="text" name="stopdate" id="stopdate" class="layui-input" value="<?php echo $stopdate;?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("条件限制");?>
					</label>
					<div class="layui-input-block">
						<input type="text" name="sqlext" id="sqlext" class="layui-input" value="<?php echo $sqlext;?>" placeholder="<?php echo P_Lang("仅限熟悉系统的开发人员使用");?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("图表模式");?>
					</label>
					<div class="layui-input-block">
						<select name="chart">
						<option value="line"<?php if($chart == 'line'){ ?> selected<?php } ?>><?php echo P_Lang("折线图");?></option>
						<option value="bar"<?php if($chart == 'bar'){ ?> selected<?php } ?>><?php echo P_Lang("柱状图");?></option>
					</select>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						&nbsp;
					</label>
					<div class="layui-input-inline">
						<button type="submit" class="layui-btn layui-btn-sm" >
							<?php echo P_Lang("开始统计");?>
						</button>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
	<?php if($y_title || $rslist){ ?>
	<div class="layui-col-xs12 layui-col-sm8">
		<div class="layui-card" id="report_echart">
			<div class="layui-card-header">
				<?php echo P_Lang("统计图示");?>
			</div>
			<div class="layui-card-body">
				<?php if($chart){ ?>
				<div id="chart_main" class="layui-carousel" data-anim="fade" lay-filter="LAY-index-normcol" lay-anim="fade" style="width: 100%; height:550px;"></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="layui-col-xs12">
		<div class="layui-card">
			<div class="layui-card-header">
				<?php echo P_Lang("统计结果");?>
			</div>
			<div class="layui-card-body">
				<table class="layui-table">
				<thead>
				<tr>
					<th><?php echo $x_title;?></th>
					<?php $tmpid["num"] = 0;$y_title=is_array($y_title) ? $y_title : array();$tmpid = array();$tmpid["total"] = count($y_title);$tmpid["index"] = -1;foreach($y_title as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<th class="center" name="y_title"><?php echo $value;?></th>
					<?php } ?>
				</tr>
				</thead>
				<tbody>
				<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<tr name="chart">
					<td>
						<span><?php echo $value['x'];?></span>
						<?php if($value['x_title']){ ?>/ <b><?php echo $value['x_title'];?></b><?php } ?>
					</td>
					<?php $idx["num"] = 0;$y_title=is_array($y_title) ? $y_title : array();$idx = array();$idx["total"] = count($y_title);$idx["index"] = -1;foreach($y_title as $k=>$v){ $idx["num"]++;$idx["index"]++; ?>
					<td class="center"><?php echo $value['y_'.$k];?></td>
					<?php } ?>
				</tr>
				<?php } ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<script id="line-y-html" type="text/html">
<div class="layui-form-item">
	<label class="layui-form-label">
		<?php echo P_Lang("统计选项");?>
	</label>
	<div class="layui-input-block">
		<% for(var i in ylist){ %>
		<div style="margin-bottom:5px">
		<select name="data_mode[<%= i %>]">
			<option value=""><%= ylist[i] %>_<?php echo P_Lang("不统计");?></option>
			<option value="count"><?php echo P_Lang("数计算_COUNT");?></option>
			<option value="sum"><?php echo P_Lang("和计算_SUM");?></option>
		</select>
		</div>
		<% } %>
	</div>
</div>
</script>
<?php if($chart){ ?>
<script type="text/javascript">
    $(document).ready(function(){
        var myChart = echarts.init(document.getElementById('chart_main'));
        var chart = "<?php echo $chart;?>";
        var data_x = new Array();
        var data_y = new Array();
        var y_title = new Array();
        var series_data = new Array();
        $("th[name=y_title]").each(function(i){
            y_title[i] = $(this).text();
            var tmp = {'name':y_title[i],'type':chart};
            var tmp_data = new Array();
            $("tr[name=chart]").each(function(m){
                var m_i = i+1;
                tmp_data[m] = $(this).find('td:eq('+m_i+')').text();
            });
            tmp.data = tmp_data;
            series_data[i] = tmp;
        });
        $("tr[name=chart]").each(function(i){
            data_x[i] = $(this).find('td:eq(0)').find("span").text();
        });
        var option = {
            title:{text:'<?php echo $lead_title;?>'},
            legend: {data:y_title},
            xAxis: {data: data_x},
            yAxis: {},
            series: series_data
        };
        myChart.setOption(option);
    });
</script>
<?php } ?>
<?php $this->output("foot_lay","file",true,false); ?>