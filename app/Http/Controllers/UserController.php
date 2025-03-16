<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = ""){
        $data = [
            'nama'=> $nama,
            'kelas'=> $kelas,
            'npm' => $npm,
        ];
       
        dd($kelas);
    return view('profile', $data);
    }
    
    public function create(){
        return view('create_user', [
            'kelas' => Kelas::all(),
        ]);
    }
    
    public function store(UserRequest $request)
    {
        $validatedData = $request->validate([
            'nama' =>'required|string|max:255',
            'npm' =>'required|string|max:255',
            'kelas_id' =>'required|exists:kelas,id',

        ]);
    
        $useer = UserModel::create($validatedData);
    
        $useer->load('kelas');     
       

        return view('profile', [
        'nama' => $useer->nama,
        'npm' => $useer->npm,
        'nama_kelas' => optional($useer->kelas)->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);    
    }

}