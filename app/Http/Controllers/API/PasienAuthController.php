<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PasienAuthController extends Controller
{
    public function register(Request $request){

        // cari user yang sudah ada
        $user = Pasien::where('email', $request->email)->first();
        
        // jika ada user yang sama batalkan
        if($user && Hash::check($request->password, $user->password)){
            return response()->json([
                'code' => 400,
                'pesan' => "User sudah ada"
            ]);
        }

        // enksripsi password
        $password = Hash::make($request->password);
        
        // buat user baru
        $result = Pasien::create([
            "nama_pasien" => $request->nama,
            "email" => $request->email,
            "password" => $password,
        ]);

        // buat akses token
        $token = $result->createToken('access_token');

        // kembalikan response ke android
        return response()->json([
            "code" => 200,
            "pesan" => "Registrasi Berhasil",
            "access_token" => $token->plainTextToken,
            "user" => [
                'id' => $result->id,
                'nama' => $result->nama_pasien,
                'email' => $result->email,
                'alamat' => $result->alamat_pasien,
                'umur' => $result->umur_pasien,
                'created_at' => Carbon::parse($result->created_at)->format('d-m-Y')
            ]
        ]);
    }


    public function login(Request $request){

        $credentiial = $request->all();
        
        if (!Auth::guard('patient')->attempt($credentiial)){
            return response()->json([
                'code' => 400,
                'pesan' => "anda belum memiliki akun, silahkan registrasi"
            ]);
        }

        $user = Pasien::where('email', $request->email)->first();

        $token = $user->createToken('access_token');

        // kembalikan response ke android
        return response()->json([
            "code" => 200,
            "pesan" => "Registrasi Berhasil",
            "access_token" => $token->plainTextToken,
            "user" => [
                'id' => $user->id,
                'nama' => $user->nama_pasien,
                'email' => $user->email,
                'alamat' => $user->alamat_pasien,
                'umur' => $user->umur_pasien,
                'created_at' => Carbon::parse($user->created_at)->format('d-m-Y')
            ]
        ]);
    }
}
