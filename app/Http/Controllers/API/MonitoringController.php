<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Pasien;
use App\Sensor;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function insertSensor(Request $request)
    {
        $currentMonitoring = $this->getIdPemeriksaan();

        if($currentMonitoring != null){
            Sensor::create([
                'id_pemeriksaan' => $currentMonitoring + 1,
                'fhr' => $request->fhr,
                'toco' => $request->toco
            ]);

            return response()->json([
                "code" => 200,
                "pesan" => "insert data berhasil"
            ]);
        }

        return response()->json([
            "code" => 400,
            "pesan" => "insert data gagal"
        ]);
    }

    public function getIdPemeriksaan()
    {
        $lastTotalMonitoring = Pasien::find(1)->toArray();
        return $lastTotalMonitoring['total_pemeriksaan'];
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
