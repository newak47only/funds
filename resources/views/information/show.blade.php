@extends('layouts.app')
@section('content')
<body>

  <div class="pd-20">
    <table class="table table-border table-bordered table-hover">
      <tbody>

        <tr>
          <th class="text-r" width="100">项目名称：</th>
          <td colspan='5'>{{$information['name']}} </td>

        </tr>
         <tr>
          <th class="text-r">项目国别：</th>
          <td colspan='2'>
           {{$information->info_area->YAT_CNNAME}}
         </td>
          <th class="text-r">项目类型：</th>
          <td colspan='2'>{{$information['industry']}} </td>
        </tr>

        <tr>
          <th class="text-r" width="100">投资金额：</th>
          <td colspan='2'>{{$information['investment']}}@if($information['currency'] =='0')万人民币
                    @elseif($information['currency'] =='1')万美元
                    @elseif($information['currency'] =='2')万欧元
                    @endif 
          </td>
          <th class="text-r" width="100">资方负责人：</th>
          <td colspan='2'>{{$information['cont_main']}} </td>
        </tr>
        <tr>
          <th class="text-r" width="100">主要投资方：</th>
          <td colspan='2'>{{$information['cont_unit']}} </td>
          <th class="text-r" width="100">资方联系人：</th>
          <td colspan='2'>{{$information['cont_name']}} </td>
        </tr>
        <tr>
          <th class="text-r" width="100">资方联系方式：</th>
          <td colspan='2'>{{$information['cont_phone']}} </td>
          <th class="text-r" width="100">是否重大项目：</th>
          <td colspan='2'>
            @if($information['major_pro'] == 0 )
              否
            @else
              @foreach($major as $x)
                @if($x->id == $information['major_pro'])
                 {{$x->p_name}}
                @endif
              @endforeach
            @endif


          </td>
        </tr>
        @if($information['circule_id'] == '0')

        <tr>
          <th class="text-r" width="100">首谈地：</th>
          <td>
            @foreach($emps as $e )
              @if($e->id == $information['emp_id'])
                @foreach($depts as $d)
                  @if($d->id == $e->dept_id)
                  {{$d->dept_name}}
                  @endif
                @endforeach
              @endif
            @endforeach
          </td>
          <th class="text-r" width="100">首谈地联系人：</th>
          <td>            
            @foreach($emps as $e )
              @if($e->id == $information['emp_id'])
                {{$e->username}}
              @endif
            @endforeach 
          </td>
          <th class="text-r" width="100">首谈地联系方式：</th>
          <td>
            @foreach($emps as $e )
              @if($e->id == $information['emp_id'])
                {{$e->phone}}
              @endif
            @endforeach
          </td>
        </tr>

        @else
        <tr>
          <th class="text-r" width="100">首谈地：</th>
          <td>
            @foreach($emps as $e )
              @if($e->id == $information['emp_id'])
                @foreach($depts as $d)
                  @if($d->id == $e->dept_id)
                  {{$d->dept_name}}
                  @endif
                @endforeach
              @endif
            @endforeach 
          </td>
          <th class="text-r" width="100">首谈地联系人：</th>
          <td>            
            @foreach($emps as $e )
              @if($e->id == $information['emp_id'])
                {{$e->username}}
              @endif
            @endforeach  
          </td>
          <th class="text-r" width="100">首谈地联系方式：</th>
          <td>
            @foreach($emps as $e )
              @if($e->id == $information['emp_id'])
                {{$e->phone}}
              @endif
            @endforeach
          </td>
        </tr>
        <tr>
          <th class="text-r" width="100">落户地：</th>
          <td>
            @foreach($depts as $e )
              @if($e->id == $information['circule_to'])
                {{$e->dept_name}}
              @endif
            @endforeach 
          </td>
          <th class="text-r" width="100">落户地联系人：</th>
          <td>
            @foreach($emps as $e )
              @if($e->id == $information['circule_id'])
                {{$e->username}}
              @endif
            @endforeach  
          </td>
          <th class="text-r" width="100">落户地联系方式：</th>
          <td>
            @foreach($emps as $e )
              @if($e->id == $information['circule_id'])
                {{$e->phone}}
              @endif
            @endforeach 
          </td>
        </tr>
        @endif
        <tr>
          <th class="text-r" >项目简介：</th>
          <td colspan='5'>{{$information['content']}} </td>
        </tr>
        <tr>
          <th class="text-r" >项目诉求：</th>
          <td colspan='5'>{{$information['appeal']}} </td>
        </tr>

      
      </tbody>
    </table>
  </div>
  <!--_footer 作为公共模版分离出去-->
  <script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="lib/layer/3.1.1/layer.js"></script>
  <script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
  <!--/_footer /作为公共模版分离出去-->
</body>
@endsection
