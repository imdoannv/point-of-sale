<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportsController extends Controller implements FromCollection
{
    public function export()
    {
        $currentTime = date('Y-m-d_H-i-s');
//        $currentTime = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d_H-i-s');
        $fileName = 'list_users_' .$currentTime. Str::random(3) . '.xlsx';
        return Excel::download($this, $fileName);
    }

    public function collection()
    {
        return User::all();
    }
}
