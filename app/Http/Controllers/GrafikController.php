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

    public function grafik()
    {
        $kolam = Pool::all();

        return view('datagrafik', ['kolam' => $kolam]);
    }
    public function grafikph($id)
    {
        $ph = PoolData::select('ph_val', 'created_at')->where("pool_id", $id)->get();
        return view('grafik.grafikph', ['ph' => $ph]);
    }
    public function grafikOx($id)
    {
        $oxygen = PoolData::select('oxygen_val', 'created_at')->where("pool_id", $id)->get();

        return view('grafik.grafikOx', ['oxygen' => $oxygen]);
    }
    public function grafikHum($id)
    {
        $humidity = PoolData::select('humidity_val', 'created_at')->where("pool_id", $id)->get();

        return view('grafik.grafikHum', ['humidity' => $humidity]);
    }
    public function grafikTDS($id)
    {
        $TDS = PoolData::select('tds_val', 'created_at')->where("pool_id", $id)->get();

        return view('grafik.grafikTDS', ['TDS' => $TDS]);
    }
    public function grafikTemp($id)
    {
        $temperature = PoolData::select('temper_val', 'created_at')->where("pool_id", $id)->get();

        return view('grafik.grafikTemp', ['temperature' => $temperature]);
    }
    public function grafikTurbidity($id)
    {
        $turbidity = PoolData::select('turbidities_val', 'created_at')->where("pool_id", $id)->get();

        return view('grafik.grafikTurbidity', ['turbidity' => $turbidity]);
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
