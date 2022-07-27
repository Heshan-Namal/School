<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MyStudentsExport implements FromView
{

    public function __construct($std=array(),$sub=array(),$mark=array())
    {
        $this->std = $std;
        $this->sub = $sub;
        $this->mark = $mark;

    }

    public function view(): View
    {
        return view('exports.students', [
            'std' => $this->std,
            'sub'=>$this->sub,
            'mark'=>$this->mark
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
