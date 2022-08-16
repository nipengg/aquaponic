<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function index()
    {
        $pools = Pool::all();

        return view('kolam.index', ['pools' => $pools]);
    }

    public function create()
    {
        return view('kolam.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Pool::create($data);
        return redirect()->route('kolam');
    }

    public function edit($id)
    {
        $pool = Pool::findOrFail($id);

        return view('kolam.edit', ['pool' => $pool]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $pool = Pool::findOrFail($id);
        $pool->update($data);

        return redirect()->route('kolam');
    }

    public function destroy($id)
    {
        $data = Pool::findOrFail($id);
        $data->delete();

        return redirect()->route('kolam');
    }
}
