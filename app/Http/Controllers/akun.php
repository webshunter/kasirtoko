<?php

namespace App\Http\Controllers;

use App\gugusDatatable;
use App\createDatatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class akun extends Controller
{
    private $table1 = 'akun';
    
    public function show()
    {
        // table create
        $datatabel = new createDatatable;
        $datatabel->location('toko/akun/data');
        $datatabel->table_name('tableku');
        $datatabel->create_row([ 'no', 'id akun', 'nama akun', 'created at','action']);
        $datatabel->order_set('0,3,4');
        $show = $datatabel->create();
        return view('toko.akun.index', ['datatable'=> $show]);
    }

    public function akun($action = 'show', $keyword = '')
    {
        if ($action == "show") {
        
            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $datatable = new gugusDatatable;
            $datatable->datatable(
                [
                    "table" => $this->table1,
                    "select" => [
                        "*"
                    ],
                    'where' => [
                        ['perusahaan', '=', Session::get("toko-user")['nama_perusahaan']],
                    ],
                    'limit' => [
                        'start' => gugusDatatable::post('start'),
                        'end' => gugusDatatable::post('length')
                    ],
                    'search' => [
                        'value' => gugusDatatable::search(),
                        'row' => [
                            'id_akun'
                            ,'nama_akun'
                        ]
                    ],
                    'table-draw' => gugusDatatable::post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => [
                            'id_akun'
                            ,'nama_akun'
                            ,'created_at'
                        ]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'DESC'],
                        'order-data' => $setorder,
                        'order-option' => [
                            "1" => "id_akun",
                            "2" => "nama_akun",
                        ],
                    ],
                ]
            );
            $datatable->table_show();
        }elseif ($action == "update") {
            $dataedit = DB::table($this->table1)->where('id', '=', $keyword)->get()[0];
            return view("toko.pesanan.update", ['data'=> $dataedit]);
        }elseif ($action == "delete") {
            $dataedit = DB::table($this->table1)->where('id', '=', $_POST['id'])->delete();
        }
    }

    public function simpan(){
        DB::table($this->table1)->insert([
            'id_akun' => $_POST['id_akun']
            ,'nama_akun' => $_POST['nama_akun']
            ,'perusahaan' => Session::get("toko-user")['nama_perusahaan']
            ,'created_at' => date("Y-m-d H:i:s")
        ]);
    }


}
