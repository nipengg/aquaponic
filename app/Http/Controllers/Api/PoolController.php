<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Pool;
use Exception;
use Illuminate\Http\Request;

class PoolController extends Controller
{

    public function index()
    {
        $data = Pool::all();

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
                'name' => 'required',
                'area' => 'required',
                'desc' => 'required',
            ]);

            $pool = Pool::create([
                'name' => $request->name,
                'area' => $request->area,
                'desc' => $request->desc,
            ]);

            $data = Pool::where('id', '=', $pool->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
