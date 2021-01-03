<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport_FromView implements FromView
{
    public function view(): View
    {
        return view('Site.about', [
            'invoices' => User::all()
        ]);
    }
}
