<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\PoolData;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PoolDataController extends Controller
{

    public function index()
    {
        $data = PoolData::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'pool_id' => 'required',
                'temper_val' => 'required',
                'ph_val' => 'required',
                'humidity_val' => 'required',
                'oxygen_val' => 'required',
                'tds_val' => 'required',
                'turbidities_val' => 'required',
            ]);

            $poolData = PoolData::create([
                'pool_id' => $request->pool_id,
                'temper_val' => $request->temper_val,
                'ph_val' => $request->ph_val,
                'humidity_val' => $request->humidity_val,
                'oxygen_val' => $request->oxygen_val,
                'tds_val' => $request->tds_val,
                'turbidities_val' => $request->turbidities_val,
            ]);

            $data = PoolData::where('id', '=', $poolData->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function test()
    {
        $res = Http::get('https://aquaponic.sinamlab.com/api/pooldata');

        $data = json_decode($res, true);

        // Fetch Latest Data
        foreach($data['data'] as $item)
        {
            $id = $item['id'];
            $ph = $item['ph_val'];
            $temp = $item['temper_val'];
            $humidity = $item['humidity_val'];
            $oxygen = $item['oxygen_val'];
            $tds = $item['tds_val'];
            $turbidities = $item['turbidities_val'];
        }

        return $res;
    }
}
