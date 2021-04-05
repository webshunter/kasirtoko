<?php

namespace App\Http\Controllers;

use App\gugusDatatable;
use App\createDatatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pesanan extends Controller
{
    private $table1 = 'pesanan';
    
    public function show()
    {
        // table create
        $datatabel = new createDatatable;
        $datatabel->location('toko/pesanan/data');
        $datatabel->table_name('tableku');
        $datatabel->create_row([ 'no','id pesanan', 'nama pemesan', 'alamat', 'tanggal diambil','action']);
        $datatabel->order_set('0,3,4,5');
        $show = $datatabel->create();
        return view('toko.pesanan.index', ['datatable'=> $show]);
    }

    public function pesanan($action = 'show', $keyword = '')
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
                            'id_pesanan'
                            ,'nama_pemesan'
                            ,'tanggal_diambil'
                        ]
                    ],
                    'table-draw' => gugusDatatable::post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => [
                            'id_pesanan'
                            ,'nama_pemesan'
                            ,'alamat_pemesan'
                            ,'tanggal_diambil'
                        ]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['tanggal_diambil', 'DESC'],
                        'order-data' => $setorder,
                        'order-option' => [
                            "1" => "id_pesanan",
                            "2" => "nama_pemesan",
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
            'id_pesanan' => $_POST['id_pesanan']
            ,'nama_pemesan' => $_POST['nama_pemesan']
            ,'alamat_pemesan' => $_POST['alamat_pemesan']
            ,'tanggal_diambil' => $_POST['tanggal_diambil']
            ,'perusahaan' => Session::get("toko-user")['nama_perusahaan']
            ,'created_at' => date("Y-m-d H:i:s")
        ]);
        return redirect('toko/pesanan/tambah_data/'.$_POST['id_pesanan']);
    }

     public function update()
    {
        DB::table($this->table1)
        ->where('id', '=', $_POST['id'])
        ->update(
            [
                'id_pesanan' => $_POST['id_pesanan']
                ,'nama_pemesan' => $_POST['nama_pemesan']
                ,'alamat_pemesan' => $_POST['alamat_pemesan']
                ,'tanggal_diambil' => $_POST['tanggal_diambil']
                , 'perusahaan' => Session::get("toko-user")['nama_perusahaan']
                , 'updated_at' => date("Y-m-d H:i:s")
            ]
        );
        return redirect('toko/pesanan/tambah_data/'.$_POST['id_pesanan']);
    }


    private $table2 = "data_pesanan";

    public function tambah_data($id_pesanan){

        Session::put("id-pesanan", $id_pesanan);

        $datatabel = new createDatatable;
        $datatabel->location('toko/pesanan/tambah_data/show_data');
        $datatabel->table_name('tableku');
        $datatabel->create_row([ 'no','nama barang', 'harga barang', 'tottal barang', 'harga total','action']);
        $datatabel->order_set('0,3,4,5');
        $show = $datatabel->create();
        return view('toko.pesanan.tambah_pesanan', ['datatable'=> $show, 'id_pesanan' => $id_pesanan]);
    }

    public function show_data($action = 'show', $keyword = ''){
        if ($action == "show") {
        
            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $datatable = new gugusDatatable;
            $datatable->datatable(
                [
                    "table" => $this->table2,
                    "select" => [
                        $this->table2 => ['id','id_pesanan', 'banyak_barang']
                        ,'stock_barang' => ['nama_barang']
                        , "harga_jual" => ['harga_per_satuan as harga']
                    ],
                    'where' => [
                        [$this->table2.'.perusahaan', '=', Session::get("toko-user")['nama_perusahaan']],
                        [$this->table2.'.id_pesanan', '=', Session::get("id-pesanan")],
                    ]
                    ,'leftJoin' => [
                        "stock_barang" => [$this->table2.'.id_barang', '=', 'stock_barang.id'],
                        "harga_jual" => [$this->table2.'.id_barang', '=', 'harga_jual.id_barang'],
                    ]
                    ,'limit' => [
                        'start' => gugusDatatable::post('start'),
                        'end' => gugusDatatable::post('length')
                    ],
                    'search' => [
                        'value' => gugusDatatable::search(),
                        'row' => [
                            'id_pesanan'
                        ]
                    ],
                    'table-draw' => gugusDatatable::post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => [
                            'nama_barang'
                            ,'harga'
                            ,'banyak_barang'
                            ,'harga * banyak_barang'
                        ]
                    ],
                    "action" => "delete-only",
                    'order' => [
                        'order-default' => [$this->table2.'.id', 'DESC'],
                        'order-data' => $setorder,
                        'order-option' => [
                            "1" => "id_pesanan",
                        ],
                    ],
                ]
            );
            $datatable->table_show();
        }elseif ($action == "delete") {
            $dataedit = DB::table($this->table2)->where('id', '=', $_POST['id'])->delete();
        }
    }

    public function simpan_data(){
        $simpan = DB::table($this->table2)->insert([
            'id_pesanan' => $_POST['id_pesanan']
            ,'id_barang' => $_POST['id_barang']
            ,'banyak_barang' => $_POST['banyak_barang']
            ,'perusahaan' => Session::get("toko-user")['nama_perusahaan']
            ,'created_at' => date("Y-m-d H:i:s")
        ]);
    }

}
