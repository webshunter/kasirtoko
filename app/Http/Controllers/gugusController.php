<?php

namespace App\Http\Controllers;

// panggil model
use App\datatable;
use App\createDatatable;

use PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gugusController extends Controller
{
   private $table1 = 'data';
      
   public function show()
   {
      // table create
      $datatabel = new createDatatable;
      $datatabel->location('halo');
      $datatabel->table_name('tableku');
      $datatabel->create_row(['no', 'nama depan', 'nama belakang', '#']);
      $show = $datatabel->create();
      return view('index', ['datatable'=> $show]);
   }
    
    public function halo($action = 'show', $keyword = '')
    {
        // default order for get order from datatable 
        if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;
        $data = new datatable;
        $data->action($action);
        $data->set_table($this->table1);
        if($action == 'show'){
            $data->set_draw($_POST['draw']);
            $data->set_search($_POST['search']['value'], ['data1', 'data2']);
            $data->set_order_data(['id', 'data1', 'data2'], $setorder);
            $data->set_limit($_POST['start'], $_POST['length']);
            $data->set_table_show('id', ['data1', 'data2']);
        }elseif($action == 'delete'){
            $query_del = $data->set_delete_query()->where('id', '=', $_POST['id']);
            $data->delete_data($query_del);
        }elseif($action == 'update'){
            $data->get_key_update('id' ,$keyword);
            return view('update', ['data'=> $data->get_data_update()]);
        }
        $data->release();
    }


    public function simpan(){
        DB::table($this->table1)->insert([
            ['data1' => $_POST['data1'], 'data2' => $_POST['data2']]
        ]);
        return redirect('pengeluaran');
    }

    public function update()
    {
        DB::table($this->table1)
        ->where('id', '=', $_POST['id'])
        ->update(
            [
                        'data1' => $_POST['data1'], 
                        'data2' => $_POST['data2']
            ]
        );
        return redirect('pengeluaran');
    }


    public function testPdf(){
      $pdf = PDF::loadview('pdf.pegawai_pdf',['pegawai'=>"kosong"])->setPaper('a4', 'landscape');
      return $pdf->download('laporan-pegawai.pdf');
    }




}
