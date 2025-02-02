<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $data = DB::table('penjualans')
            ->join('marketings', 'penjualans.marketing_id', '=', 'marketings.id')
            ->select('marketings.name', 'penjualans.date', 'penjualans.grand_total')
            ->get();
        
        $komisi_nominal = 0;

        foreach($data as $key => $value){
            $komisi = 0;
            if($value->grand_total >= 0 && $value->grand_total < 100000000){
                $komisi = 0;
            } else if ($value->grand_total >= 100000000 && $value->grand_total < 200000000){
                $komisi = 0.025;
            } else if ($value->grand_total >= 200000000 && $value->grand_total < 500000000){
                $komisi = 0.05;
            } else if ($value->grand_total >= 500000000){
                $komisi = 0.1;
            }

            Carbon::setLocale('id');
            $value->date = Carbon::parse($value->date)->translatedFormat('F');

            $komisi_nominal = $value->grand_total + ($value->grand_total * $komisi);
            $value->komisi = $komisi * 100 . '%';
            $value->komisi_nominal = (int) $komisi_nominal;
        }

        return response()->json($data);
    }
}
