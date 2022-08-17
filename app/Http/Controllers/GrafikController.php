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
        if ($id == NULL) {
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


        return view('dataSensor.datagrafik', [
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
        $from = $request->from;
        $to = $request->to;

        if ($id == NULL) {
            $pool = Pool::all();
            $first = $pool->first();
            $id = $first->id;
        }

        if ($from == NULL && $to == NULL) {
            $data = PoolData::where("pool_id", $id)->get();
        } else {
            $data = PoolData::where("pool_id", $id)->whereBetween("created_at", [$from, $to])->get();
        }

        $kolam = Pool::all();

        return view('dataSensor.datatable', [
            'kolam' => $kolam,
            'data' => $data,
            'id' => $id,
            'from' => $from,
            'to' => $to,
        ]);
    }
}
