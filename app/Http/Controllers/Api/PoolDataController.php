<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\PoolData;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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


    public function create()
    {
        //
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


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
