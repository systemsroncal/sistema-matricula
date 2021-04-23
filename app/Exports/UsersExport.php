<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

//class UsersExport implements FromQuery, WithHeadings
class UsersExport implements FromView, WithHeadings
{
    use Exportable;

    private $year;


    public function view(): View
    {
        return view('exports.users-print',[
            'users'=> User::get()
        ]);
    }

    public function forDate($year)
    {
        $this->year = $year;

        return $this;
    }


    public function query()
    {
        return User::query()->whereYear('created_at', $this->year);
    }
    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Created at',
            'Updated at'
        ];
    }
}