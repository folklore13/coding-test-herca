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
            ->groupByRaw("strftime('%m', penjualans.date), marketings.name")
            ->selectRaw("marketings.name as marketing, penjualans.date as bulan, sum(penjualans.grand_total) as omzet")
            ->get();
        
        $komisi_nominal = 0;

        foreach($data as $key => $value){
            $komisi = 0;
            if($value->omzet >= 0 && $value->omzet < 100000000){
                $komisi = 0;
            } else if ($value->omzet >= 100000000 && $value->omzet < 200000000){
                $komisi = 0.025;
            } else if ($value->omzet >= 200000000 && $value->omzet < 500000000){
                $komisi = 0.05;
            } else if ($value->omzet >= 500000000){
                $komisi = 0.1;
            }

            Carbon::setLocale('id');
            $value->bulan = Carbon::parse($value->bulan)->translatedFormat('F');

            $komisi_nominal = $value->omzet + ($value->omzet * $komisi);
            $value->komisi = $komisi * 100 . '%';
            $value->komisi_nominal = (int) $komisi_nominal;
        }

        return response()->json($data);
    }
}
