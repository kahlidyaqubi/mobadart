<?php

namespace App\Imports;

use App\Activist;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ActivistExport implements FromCollection,WithHeadings
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    //
    public $the_collection;
    public function __construct($the_collection)
    {
        //dd(Project::all());
        $this->the_collection = $the_collection;
    }
    public function headings(): array
    {
        return [
            '#',
            'الاسم الاول',
            'اسم الأب','اسم الجد','العائلة','رقم الهوية','المحافظة','المدينة','العنوان','رقم التواصل'
        ];
    }
    public function collection()
    {
        return $this->the_collection;
    }
}
