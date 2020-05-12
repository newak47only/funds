@extends('layouts.app')
@section('content')
<body>
	<div class="wap-container">
		<article class="Hui-admin-content clearfix">

			<div class="row-24 clearfix" style="margin-left: -12px; margin-right: -12px;">
				<div class="col-24-xs-24 col-24-sm-12 col-24-md-12 col-24-lg-12 col-24-xl-6" style="padding-left: 12px; padding-right: 12px; margin-bottom: 24px;" >
					<div class="panel" >
						<div class="panel-header" style="padding:15px 24px;font-weight: 400;color:#999;">在库项目总数：</div>
						<div class="panel-body" style="padding:0 24px;">
							<div class="c-primary text-c mt-10" style="font-size: 36px;line-height: 38px;padding-bottom: 24px; ">
								{{$info_count}}
							</div>
							<div class="f-14" style="padding: 10px 0;border-top:solid 1px #eee"><span class="c-999">今日入库项目</span> <span>{{$info_new_count}}个</span></div>
						</div>
					</div>
				</div>
				<div class="col-24-xs-24 col-24-sm-12 col-24-md-12 col-24-lg-12 col-24-xl-6" style="padding-left: 12px; padding-right: 12px; margin-bottom: 24px;">
					<div class="panel">
						<div class="panel-header" style="padding:15px 24px;font-weight: 400;color:#999;">洽谈项目总数：</div>
						<div class="panel-body" style="padding:0 24px;">
							<div class="c-success text-c mt-10" style="font-size: 36px;line-height: 38px;padding-bottom: 24px;">
								{{$info_nego_count}}
							</div>
							<div class="f-14" style="padding: 10px 0;border-top:solid 1px #eee"><span class="c-999">进度记录总共</span> <span>{{$recode_count}}条</span></div>
						</div>
					</div>
				</div>
				<div class="col-24-xs-24 col-24-sm-12 col-24-md-12 col-24-lg-12 col-24-xl-6" style="padding-left: 12px; padding-right: 12px; margin-bottom: 24px;">
					<div class="panel">
						<div class="panel-header" style="padding:15px 24px;font-weight: 400;color:#999;">流转项目总数：</div>
						<div class="panel-body" style="padding:0 24px;">
							<div class="c-danger text-c mt-10" style="font-size: 36px;line-height: 38px;padding-bottom: 24px;">
								{{$info_cir_count}}
							</div>
							<div class="f-14" style="padding: 10px 0;border-top:solid 1px #eee"><span class="c-999">您的流转项目</span> <span>12个</span></div>
						</div>
					</div>
				</div>
				<div class="col-24-xs-24 col-24-sm-12 col-24-md-12 col-24-lg-12 col-24-xl-6" style="padding-left: 12px; padding-right: 12px; margin-bottom: 24px;">
					<div class="panel">
						<div class="panel-header" style="padding:15px 24px;font-weight: 400;color:#999;">落地项目总数：</div>
						<div class="panel-body" style="padding:0 24px;">
							<div class="c-warning text-c mt-10" style="font-size: 36px;line-height: 38px;padding-bottom: 24px;">
								{{$info_land_count}}
							</div>
							<div class="f-14" style="padding: 10px 0;border-top:solid 1px #eee"><span class="c-999">今日新增</span> <span>1,234</span></div>
						</div>
					</div>
				</div>
			</div>


				<div class="row-24 clearfix" style="margin-left: -12px; margin-right: -12px;">

						<div class="col-24-xs-16" style="padding-left: 12px; padding-right: 12px; ">
							<div class="panel" >
								<div class="panel-header" >
									各区域招商项目统计图表
								</div>
								<div class="panel-body" style="padding:25px 24px;">
									<div id="echarts-2" style="height: 300px;"></div>
								</div>
							</div>
						</div>
						<div class="col-24-xs-8" style="padding-left: 12px; padding-right: 12px; margin-bottom: 24px;">
							<div class="panel">
								<div class="panel-header" >
									各区域招商项目统计
								</div>
								<div class="panel-body" style="padding:10px 24px;">
									@foreach($depts as $v)
									@if($v->id <= 24)
										<span style="font-weight: bold;">{{$v->dept_name}}:</span>
												在库项目<span class="c-primary" style="font-size: 18px;line-height: 18px; font-weight: bold; color: red;"><em>{{$v->num1}}</em></span>&nbsp;个，流转项目<span class="c-primary" style="font-size: 18px;line-height: 18px; font-weight: bold;color: red;"><em>{{$v->num1}}</em></span>&nbsp;个;<br />
										@endif
										
											@endforeach
									
								</div>
							</div>
						</div>
				</div>

		</article>
		
	</div>
	<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="lib/layer/3.1.1/layer.js"></script>
	<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>

	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript" src="static/business/js/main.js"></script>
	<script type="text/javascript" src="/lib/echarts/4.1.0.rc2/echarts.min.js"></script>
	<script type="text/javascript">
		$(function () {
		// 手机号运营商


		// 已经完善生日年龄统计
    var echarts2 = echarts.init(document.getElementById('echarts-2'));
    var echarts2_option = {
      title : {
        show: false
      },
      color: '#1890ff',
			grid: {
				top: '3%',
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
      },
      xAxis: {
        type: 'category',
        //data:"{{$dept}}",
        data: ['海曙区', '江北区', '北仑区', '镇海区', '鄞州区', '奉化区', '余姚市', '慈溪市', '象山县', '宁海县','高新区']
      },
      yAxis: {
        type: 'value'
      },
      label: {
        fontSize: 14,
        color: '#666',
      },
      series: [
        {
          data: [10, 30, 35, 34, 50, 45, 43, 37, 30, 8,9],
          type: 'bar',
          itemStyle: {
            emphasis: {
              shadowBlur: 10,
              shadowOffsetX: 0,
              shadowColor: 'rgba(0, 0, 0, 0.5)'
            }
          },
          barWidth : 24,
        }
      ]
    }
    echarts2.setOption(echarts2_option);
	});
	</script>

</body>
@endsection