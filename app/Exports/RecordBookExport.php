<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use App\Models\ClassRecordBook;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
class RecordBookExport implements FromQuery,WithHeadings
{

    use Exportable;

    public function __construct($classid,$subjectid,$term)
    {
        $this->classid = $classid;
        $this->subjectid = $subjectid;
        $this->term = $term;

    }
    public function headings(): array
    {
        return [
            'Date',
            'Period',
            'Term',
            'Record',
            'Submited At'
        ];
    }

    public function query()
    {
        return ClassRecordBook::query()->where('class_id',$this->classid)
        ->where('subject_id', $this->subjectid)
        ->where('term','=',$this->term)
        ->select('day','period','term','record','updated_at');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //



    }
}
