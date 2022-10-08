<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\PoolData;
use Illuminate\Http\Request;

class GrafikController extends Controller
{

    public function grafik(Request $request)
    {
        $id = $request->id;
        $from = $request->from;
        $to = $request->to;

        if ($id == NULL) {
            $pool = Pool::all();
            if ($pool->isEmpty()) {
                $id = null;
            } else {
                $first = $pool->first();
                $id = $first->id;
            }
        }

        $kolam = Pool::all();

        if ($from == NULL && $to == NULL) {
            $ph = PoolData::select('ph_val', 'created_at')->where("pool_id", $id)->latest()->limit(20)->get();
            $oxygen = PoolData::select('oxygen_val', 'created_at')->where("pool_id", $id)->latest()->limit(20)->get();
            $humidity = PoolData::select('humidity_val', 'created_at')->where("pool_id", $id)->latest()->latest()->limit(20)->get();
            $TDS = PoolData::select('tds_val', 'created_at')->where("pool_id", $id)->latest()->limit(20)->get();
            $temperature = PoolData::select('temper_val', 'created_at')->where("pool_id", $id)->latest()->limit(20)->get();
            $turbidity = PoolData::select('turbidities_val', 'created_at')->where("pool_id", $id)->latest()->limit(20)->get();
        } else {
            $ph = PoolData::select('ph_val', 'created_at')->where("pool_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
            $oxygen = PoolData::select('oxygen_val', 'created_at')->where("pool_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
            $humidity = PoolData::select('humidity_val', 'created_at')->where("pool_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
            $TDS = PoolData::select('tds_val', 'created_at')->where("pool_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
            $temperature = PoolData::select('temper_val', 'created_at')->where("pool_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
            $turbidity = PoolData::select('turbidities_val', 'created_at')->where("pool_id", $id)->latest()->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        }

        return view('dataSensor.datagrafik', [
            'kolam' => $kolam,
            'ph' => $ph,
            'oxygen' => $oxygen,
            'humidity' => $humidity,
            'TDS' => $TDS,
            'temperature' => $temperature,
            'turbidity' => $turbidity,
            'id' => $id,
            'from' => $from,
            'to' => $to,
        ]);
    }


    public function table(Request $request)
    {
        $id = $request->pool;
        $from = $request->from;
        $to = $request->to;

        if ($id == NULL) {
            $pool = Pool::all();
            if ($pool->isEmpty()) {
                $id = null;
            } else {
                $first = $pool->first();
                $id = $first->id;
            }
        }

        if ($from == NULL && $to == NULL) {
            $data = PoolData::where("pool_id", $id)->orderBy('created_at', 'desc')->get();
        } else {
            $data = PoolData::where("pool_id", $id)->whereBetween("created_at", [$from, $to])->orderBy('created_at', 'desc')->get();
        }

        $count = $data->count();
        if ($count == NULL) {
            $count = 1;
        }

        $kolam = Pool::all();

        return view('dataSensor.datatable', [
            'kolam' => $kolam,
            'data' => $data,
            'id' => $id,
            'from' => $from,
            'to' => $to,
            'count' => $count,
        ]);
    }
}
