<?php

namespace App\Http\Controllers;

use App\gugusDatatable;
use App\createDatatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class hargaJual extends Controller
{
    private $table1 = 'harga_jual';
    
    public function show()
    {
        // table create
        $datatabel = new createDatatable;
        $datatabel->location('toko/harga-jual/data');
        $datatabel->table_name('tableku');
        $datatabel->create_row(['no', 'id barang', 'nama_barang', 'total barang', 'harga per satuan', 'action']);
        $datatabel->order_set('0, 3,4,5');
        $show = $datatabel->create();
        return view('toko.harga_jual.index', ['datatable'=> $show]);
    }

    public function hargaJual($action = 'show', $keyword = '')
    {
        if ($action == "show") {
        
            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $datatable = new gugusDatatable;
            $datatable->datatable(
                [
                    "table" => $this->table1,
                    "select" => [
                        'stock_barang' => ['id_barang','nama_barang', 'total_barang'],
                        $this->table1 => ['id','harga_per_satuan']
                    ],
                    'leftJoin' => [
                    	'stock_barang' => [$this->table1.'.id_barang', '=', 'stock_barang.id']
                    ],
                    'where' => [
                        [$this->table1.'.perusahaan', '=', Session::get("toko-user")['nama_perusahaan']],
                    ],
                    'limit' => [
                        'start' => gugusDatatable::post('start'),
                        'end' => gugusDatatable::post('length')
                    ],
                    'search' => [
                        'value' => gugusDatatable::search(),
                        'row' => [
                            'stock_barang.id_barang'
                            ,'stock_barang.nama_barang'
                        ]
                    ],
                    'table-draw' => gugusDatatable::post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => [
                            'id_barang'
                            ,'nama_barang'
                            ,'total_barang'
                            ,'harga_per_satuan'
                        ]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => [$this->table1.'.id_barang', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [
                            "1" => "stock_barang.id_barang",
                            "2" => "stock_barang.nama_barang",
                        ],
                    ],
                ]
            );
            $datatable->table_show();
        }elseif ($action == "update") {
            $dataedit = DB::table($this->table1)->where('id', '=', $keyword)->get()[0];
            return view("toko.harga_jual.update", ['data'=> $dataedit]);
        }elseif ($action == "delete") {
            $dataedit = DB::table($this->table1)->where('id', '=', $_POST['id'])->delete();
        }
    }

    public function simpan(){
        DB::table($this->table1)->insert([
            'id_barang' => $_POST['id_barang']
            ,'harga_per_satuan' => $_POST['harga_per_satuan']
            ,'perusahaan' => Session::get("toko-user")['nama_perusahaan']
            ,'created_at' => date("Y-m-d H:i:s")
        ]);
        return redirect('toko/harga-jual');
    }

    public function cek(){
        $getId = $_POST['id'];

        $cekDataAdaTidak = DB::select("SELECT * FROM ".$this->table1." WHERE id_barang = '".$getId."'");
        if (count($cekDataAdaTidak) > 0) {
            echo 'ada';
        }else {
            echo 'tidak';
        }

    }

    public function update()
    {
        DB::table($this->table1)
        ->where('id', '=', $_POST['id'])
        ->update(
            [
                'id_barang' => $_POST['id_barang']
            	,'harga_per_satuan' => $_POST['harga_per_satuan']
                , 'perusahaan' => Session::get("toko-user")['nama_perusahaan']
                , 'updated_at' => date("Y-m-d H:i:s")
            ]
        );
        return redirect('toko/harga-jual');
    }
}
