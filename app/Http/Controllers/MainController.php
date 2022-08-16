<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\PoolData;
use App\Models\User;
use Illuminate\Http\Request;

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

        return view('main', [
            'pools_count' => $pools_count,
            'pools_data_count' => $pools_data_count,
            'users_count' => $users_count,
        ]);
    }
}
