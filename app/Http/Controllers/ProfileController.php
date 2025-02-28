<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = ""){
        $data = [
            'nama'=> $nama,
            'kelas'=> $kelas,
            'npm' => $npm,
        ];
       

    return view('profile', $data);

}
}

// 'nama'=> 'Putri Alena Sari',
// 'kelas'=> 'D3MI',
// 'npm' => '2307051024',

