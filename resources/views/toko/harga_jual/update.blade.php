@extends('layout.tokomain')
@section('activenav', '3')    
@section('head-content-title', 'Stock Barang')
@section('head-back-nav')
  <li class="breadcrumb-item active">Stock Barang</li>
  <li class="breadcrumb-item active">Tambah</li>
@endsection
@section("container")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Stock Barang</h3>
            </div>
            <div class="card-body">
               @php

                    // form start
                    MyForm::start('toko/harga-jual/simpan', 'post');
                  
                    MyForm::hidden('id', $data->id);

                     MyForm::set_db('stock_barang');
                      MyForm::set_select([
                        "title" => "Pilih Barang"
                        ,"id" => "id_barang"
                        ,"name" => "id_barang"
                        ,"class" => "form-control"
                        ,"selected" => $data->id_barang
                        ,"option" => [
                          "value" => "id"
                          ,"text" => "nama_barang"
                        ]
                        ,"kondisi" => [
                          ['perusahaan', '=', Session::get("toko-user")['nama_perusahaan']]
                        ]
                      ]); 
                      MyForm::print_select();

                   
                    // nominal input
                    MyForm::input([
                        "title" => "Harga Barang"
                        ,"name" => "harga_per_satuan"
                        ,"type" => "text"
                        ,"currency" => "Rp "
                        ,"class" => "form-control"
                        ,"placeholder" => "isikan total harga barang"
                        ,"value" => $data->harga_per_satuan
                    ]);
                      
                    MyForm::end([
                        'back-url' => "toko/harga-jual",
                        'back-button' => 'btn btn-default',
                        'id-submit' => 'simpanbutton',
                        'submit-button' => 'btn btn-primary'
                    ])
              
              @endphp
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection