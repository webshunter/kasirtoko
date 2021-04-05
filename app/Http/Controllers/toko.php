<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class toko extends Controller
{

    private $mydb = "usertoko";

    public function dashboard()
    {
        return view('toko.dashboard.index');
    }

    public function loginmenu()
    {
        return view('toko.login');
    }

    public function login()
    {
        $cek = DB::table($this->mydb)->where('username', '=', $_POST['username'])->get();
        $getdata = $cek[0];
        if(Hash::check($_POST['password'], $getdata->password)){
            Session::put("toko-user", [$getdata->username, "nama_perusahaan" => $getdata->nama_perusahaan]);
        }
        return redirect('toko');
    }

    public function logout()
    {
        Session::forget('toko-user');
        return redirect('toko');
    }

    public function pendaftaranSimpan()
    {

        DB::table($this->mydb)->insert([
            	'username' => $_POST['user']
            	, 'password' => Hash::make($_POST['password'])
            	, 'nama_perusahaan' => $_POST['nama_usaha']
            	, 'created_at' => date('Y-m-d H:i:s')
        ]);

        Session::put("toko-user", ["username" => $_POST['user'], "nama_perusahaan" => $_POST['nama_usaha']]);

        return redirect('toko');
    }
}
