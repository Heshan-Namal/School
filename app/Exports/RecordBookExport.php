<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use App\Models\ClassRecordBook;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
class RecordBookExport implements FromView
{

    use Exportable;

    public function __construct($data=array(),$term)
    {
        $this->data = $data;
        $this->term = $term;

    }

    public function view(): View
    {
        return view('exports.recordbook', [
            'data' => $this->data,
            'term'=>$this->term
        ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //



    }
}
