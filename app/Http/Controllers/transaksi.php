<?php

namespace App\Http\Controllers;

use App\gugusDatatable;
use App\createDatatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class transaksi extends Controller
{
	private $table1 = 'transaksi';
    
    public function show()
    {
        // table create
        $datatabel = new createDatatable;
        $datatabel->location('toko/transaksi/data');
        $datatabel->table_name('tableku');
        $datatabel->create_row(['no', 'id transaksi', 'tanggal transaksi', 'action']);
        $datatabel->order_set('0,2,3');
        $show = $datatabel->create();
        return view('toko.transaksi.index', ['datatable'=> $show]);
    }

    public function transaksi($action = 'show', $keyword = '')
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
                        ['perusahaan', '=', Session::get("toko-user")['nama_perusahaan']],
                    ],
                    'limit' => [
                        'start' => gugusDatatable::post('start'),
                        'end' => gugusDatatable::post('length')
                    ],
                    'search' => [
                        'value' => gugusDatatable::search(),
                        'row' => [
                            'id_transaksi'
                        ]
                    ],
                    'table-draw' => gugusDatatable::post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => [
                            'id_transaksi'
                            ,'created_at'
                        ]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_transaksi', 'DESC'],
                        'order-data' => $setorder,
                        'order-option' => [
                            "1" => "id_transaksi",
                        ],
                    ],
                ]
            );
            $datatable->table_show();
        }elseif ($action == "update") {
            $dataedit = DB::table($this->table1)->where('id', '=', $keyword)->get()[0];
            DB::table($this->table1)->
            where('id', '=', $keyword)
        	->update([
	            'id_transaksi' => $dataedit->id_transaksi
	            ,'perusahaan' => Session::get("toko-user")['nama_perusahaan']
	            ,'updated_at' => date("Y-m-d H:i:s")
	        ]);
	    	Session::put("id-transaksi", $dataedit->id_transaksi);
	        return redirect('toko/transaksi/tambah_data');
        }elseif ($action == "delete") {
            $dataedit = DB::table($this->table1)->where('id', '=', $_POST['id'])->delete();
        }
    }


    public function tambah(){

    	$format = "00000000";
    	$getMaxData = DB::select("SELECT MAX(id_transaksi) as id_transaksi FROM ".$this->table1." WHERE perusahaan = '".Session::get("toko-user")['nama_perusahaan']."' ")[0]->id_transaksi;
    	$getMaxData += 1;
    	$lenFormat = strlen($format);
    	$lenMaxData = strlen($getMaxData);
    	$lenData = $lenFormat - $lenMaxData;
    	$makeId = "";
    	for($i=0; $i < $lenData; $i++){
    		$makeId .= '0';
    	}
    	$makeId .= $getMaxData;
    	echo $makeId;

    	DB::table($this->table1)->insert([
            'id_transaksi' => $makeId
            ,'perusahaan' => Session::get("toko-user")['nama_perusahaan']
            ,'created_at' => date("Y-m-d H:i:s")
        ]);
    	Session::put("id-transaksi", $makeId);
        return redirect('toko/transaksi/tambah_data');
    }

    public function tambah_data(){
    	$datatabel = new createDatatable;
        $datatabel->location('toko/transaksi/tambah_data/show_data');
        $datatabel->table_name('tableku');
        $datatabel->create_row([ 'no','nama barang', 'harga barang', 'tottal barang', 'harga total','action']);
        $datatabel->order_set('0,3,4,5');
        $show = $datatabel->create();

        return view('toko.transaksi.tambah', ['datatable'=> $show, 'id_transaksi' => Session::get('id-transaksi')]);
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


// ------------------------------------------------------------------------------//

    private $table2 = "data_transaksi";

    public function show_data($action = 'show', $keyword = ''){
        if ($action == "show") {
        
            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $datatable = new gugusDatatable;
            $datatable->datatable(
                [
                    "table" => $this->table2,
                    "select" => [
                        $this->table2 => ['id','id_transaksi', 'banyak_barang']
                        ,'stock_barang' => ['nama_barang']
                        , "harga_jual" => ['harga_per_satuan as harga']
                    ],
                    'where' => [
                        [$this->table2.'.perusahaan', '=', Session::get("toko-user")['nama_perusahaan']],
                        [$this->table2.'.id_transaksi', '=', Session::get("id-transaksi")],
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
                            'id_transaksi'
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
                            "1" => "id_transaksi",
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
            'id_transaksi' => $_POST['id_transaksi']
            ,'id_barang' => $_POST['id_barang']
            ,'banyak_barang' => $_POST['banyak_barang']
            ,'perusahaan' => Session::get("toko-user")['nama_perusahaan']
            ,'created_at' => date("Y-m-d H:i:s")
        ]);
    }

}
