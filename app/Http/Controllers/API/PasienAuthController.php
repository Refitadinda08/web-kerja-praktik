<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

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

        $user = Pasien::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'code' => 400,
                'pesan' => "gagal login"
            ]);
        }

        $user->tokens()->delete();

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

    public function logout(Request $request){
        $user = Pasien::where('id', $request->id)->first();

        if (!$user) {
            return response()->json([
                'code' => 400,
                'pesan' => "gagal logout"
            ]);
        }

        $user->tokens()->delete();

        return response()->json([
            'code' => 200,
            'pesan' => "login berhasil"
        ]);
    }

    public function update(Request $request){
        $user = $request->user();
        $userToken = $user->currentAccessToken();

        if($userToken){
            $user->update([
                'nama_pasien' => $request->name,
                'umur_pasien' => $request->umur,
                'alamat_pasien' => $request->alamat
            ]);

            return response()->json([
                'code' => 200,
                'pesan' => "Update pasien berhasil",
                'user' => [
                    'id' => $user->id,
                    'name' => $user->nama_pasien,
                    'umur' => $user->umur_pasien,
                    'alamat' => $user->alamat_pasien
                ]
            ]);
        }
    }
}
