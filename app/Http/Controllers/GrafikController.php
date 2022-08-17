<?php

namespace App\Http\Controllers;

use App\Models\Humidity;
use App\Models\Oxygen;
use App\Models\Phval;
use App\Models\Pool;
use App\Models\PoolData;
use App\Models\Temperature;
use App\Models\TotalDissolvedSolid;
use App\Models\Turbidity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{

    public function grafik(Request $request)
    {
        $id = $request->id;
        if($id == NULL){
            $pool = Pool::all();
            $first = $pool->first();
            $id = $first->id;
        }


        $kolam = Pool::all();
        $ph = PoolData::select('ph_val', 'created_at')->where("pool_id", $id)->get();
        $oxygen = PoolData::select('oxygen_val', 'created_at')->where("pool_id", $id)->get();
        $humidity = PoolData::select('humidity_val', 'created_at')->where("pool_id", $id)->get();
        $TDS = PoolData::select('tds_val', 'created_at')->where("pool_id", $id)->get();
        $temperature = PoolData::select('temper_val', 'created_at')->where("pool_id", $id)->get();
        $turbidity = PoolData::select('turbidities_val', 'created_at')->where("pool_id", $id)->get();


        return view('datagrafik', [
            'kolam' => $kolam,
            'ph' => $ph,
            'oxygen' => $oxygen,
            'humidity' => $humidity,
            'TDS' => $TDS,
            'temperature' => $temperature,
            'turbidity' => $turbidity,
            'id' => $id
            
        ]);
    }


    public function table(Request $request)
    {
        $id = $request->pool;

        if ($id == NULL) {
            $pool = Pool::all();
            $first = $pool->first();
            $id = $first->id;
        }

        $data = PoolData::where("pool_id", $id)->get();

        $kolam = Pool::all();

        return view('datatable', [
            'kolam' => $kolam,
            'data' => $data,
            'id' => $id,
        ]);
    }
}
