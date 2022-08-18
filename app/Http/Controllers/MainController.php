<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\PoolData;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {
        $pools = Pool::all();
        $pools_count = $pools->count();


        $pools_data = PoolData::all();
        $pools_data_count = $pools_data->count();

        $users = User::all();
        $users_count = $users->count();

        $today = Carbon::now();

        return view('main', [
            'pools'=> $pools,
            'pools_count' => $pools_count,
            'pools_data_count' => $pools_data_count,
            'users_count' => $users_count,
            'pools_data' => $pools_data,
            'today' => $today
        ]);
    }
}
