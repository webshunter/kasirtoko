<?php

namespace App\Http\Controllers;

use App\gugusDatatable;
use App\createDatatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class stockBarang extends Controller
{
    private $table1 = 'stock_barang';
    
    public function show()
    {
        // table create
        $datatabel = new createDatatable;
        $datatabel->location('toko/stock-barang/data');
        $datatabel->table_name('tableku');
        $datatabel->create_row(['no', 'id barang', 'nama barang','harga barang', 'total barang', 'tanggal beli', 'action']);
        $datatabel->order_set('0,3,4,5,6');
        $show = $datatabel->create();
        return view('toko.stock_barang.index', ['datatable'=> $show]);
    }

    public function stockBarang($action = 'show', $keyword = '')
    {
        if ($action == "show") {
        
            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $datatable = new gugusDatatable;
            $datatable->datatable(
                [
                    "table" => $this->table1,
                    "select" => [
                        '*'
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
                            'id_barang'
                            ,'nama_barang'
                            ,'harga_barang'
                            ,'total_barang'
                            ,'tanggal_beli'
                        ]
                    ],
                    'table-draw' => gugusDatatable::post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => [
                            'id_barang'
                            ,'nama_barang'
                            ,'harga_barang'
                            ,'total_barang'
                            ,'tanggal_beli'
                        ]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_barang', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [
                            "1" => "id_barang",
                            "2" => "nama_barang",
                        ],
                    ],
                ]
            );
            $datatable->table_show();
        }elseif ($action == "update") {
            $dataedit = DB::table($this->table1)->where('id', '=', $keyword)->get()[0];
            return view("toko.stock_barang.update", ['data'=> $dataedit]);
        }elseif ($action == "delete") {
            $dataedit = DB::table($this->table1)->where('id', '=', $_POST['id'])->delete();
        }
    }

    public function simpan(){
        DB::table($this->table1)->insert([
            'id_barang' => $_POST['id_barang']
            ,'nama_barang' => $_POST['nama_barang']
            ,'harga_barang' => $_POST['harga_barang']
            ,'total_barang' => $_POST['total_barang']
            ,'tanggal_beli' => $_POST['tanggal_beli']
            ,'perusahaan' => Session::get("toko-user")['nama_perusahaan']
            ,'created_at' => date("Y-m-d H:i:s")
        ]);
        return redirect('toko/stock-barang');
    }

    public function update()
    {
        DB::table($this->table1)
        ->where('id', '=', $_POST['id'])
        ->update(
            [
                'id_barang' => $_POST['id_barang']
                ,'nama_barang' => $_POST['nama_barang']
                ,'harga_barang' => $_POST['harga_barang']
                ,'total_barang' => $_POST['total_barang']
                ,'tanggal_beli' => $_POST['tanggal_beli']
                , 'perusahaan' => Session::get("toko-user")['nama_perusahaan']
                , 'updated_at' => date("Y-m-d H:i:s")
            ]
        );
        return redirect('toko/stock-barang');
    }
}
