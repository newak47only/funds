<?php

namespace App\Exports;

use App\Information;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

use Maatwebsite\Excel\Concerns\WithMapping;

use Auth;

class InformationExport implements FromCollection,WithHeadings,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $admin_id=Auth::user()->id; 
        
        return Information::where([
            ['emp_id','=',$admin_id],
            ['process','=','0'],
        ])->get(['id', 'name','country_id','industry','investment','currency','cont_main','cont_unit','cont_name','cont_phone','major_pro','content','appeal','created_at','is_show','process']);
    }

    public function headings(): array
    {
        return ['项目ID', '项目名称', '项目国别', '行业类别', '投资金额','货币类型','资方负责人','主要投资方','资方联系人','联系方式','是否重大项目','项目简介','项目诉求','创建时间','是否上报','项目进度'];
    }


    public function title(): string
    {
        return '洽谈项目列表';
    }

    public function map($row): array
    {
        return [

           

        ];
    }


}
