<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Sensor;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function insertSensor(Request $request)
    {
        return 'insert sensor'; 
        // $sensor = Sensor::create([
        //     'fhr' => $request->fhr,
        //     'toco' => $request->toco
        // ]);

        // return response()->json([
        //     "code" => 200,
        //     "pesan" => "insert data berhasil"
        // ]);
    }

    public function getRiwayatMonitoring(Request $request)
    {
        return 'get riwayat monitoring';
    }

    public function getDetailRiwayatMonitoring(Request $request)
    {
        return 'get detail riwayat monitoring';
    }
}
