<?php

namespace App\Http\Controllers;

use App\Models\Humidity;
use App\Models\Oxygen;
use App\Models\Phval;
use App\Models\Pool;
use App\Models\Temperature;
use App\Models\TotalDissolvedSolid;
use App\Models\Turbidity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    
    public function grafik(){
        $kolam = Pool::all();

       
        return view('datagrafik',['kolam' => $kolam]);
    }
    public function grafikph($id){
        $ph = Phval::where("pool_id",$id)->latest()->get();
        return view('grafik.grafikph', ['ph'=>$ph] );
    }
    public function grafikOx($id){
        $oxygen = Oxygen::where("pool_id",$id)->latest()->get();

        return view('grafik.grafikOx', ['oxygen'=>$oxygen] );
    }
    public function grafikHum($id){
        $humidity = Humidity::where("pool_id",$id)->get();

        return view('grafik.grafikHum', ['humidity'=>$humidity] );
    }
    public function grafikTDS($id){
        $TDS = TotalDissolvedSolid::where("pool_id",$id)->get();

        return view('grafik.grafikTDS', ['TDS'=>$TDS] );
    }
    public function grafikTemp($id){
        $temperature = Temperature::where("pool_id",$id)->get();

        return view('grafik.grafikTemp', ['temperature'=>$temperature] );
    }
    public function grafikTurbidity($id){
        $turbidity = Turbidity::where("pool_id",$id)->get();

        return view('grafik.grafikTurbidity', ['turbidity'=>$turbidity] );
    }
}
