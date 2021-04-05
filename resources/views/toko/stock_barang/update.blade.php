@extends('layout.tokomain')
@section('activenav', '2')    
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
                    MyForm::start('toko/stock-barang/update', 'post');
                  
                    Myform::hidden("id", $data->id);

                    // form start
                    MyForm::start('toko/stock-barang/simpan', 'post');
                  
                    MyForm::set_db('stock_barang');
                      MyForm::input([
                          "title" => "ID Barang"
                          ,"name" => "id_barang"
                          ,"type" => "text"
                          ,"class" => "form-control"
                          ,"placeholder" => "isikan total harga barang"
                          ,"value" => $data->id_barang 
                          ,"auto-id" => [
                              "row" => "id_barang" 
                              ,"format" => "00000000"
                            ]
                          ,"info" => "id pesanan tersi otomatis"
                      ]);

                    MyForm::input([
                        "title" => "Nama Barang"
                        ,"name" => "nama_barang"
                        ,"type" => "text"
                        ,"class" => "form-control"
                        ,"placeholder" => "isikan nama barang"
                        ,"value" => $data->nama_barang
                    ]);
                   
                    MyForm::input([
                        "title" => "Total Barang"
                        ,"name" => "total_barang"
                        ,"type" => "number"
                        ,"class" => "form-control"
                        ,"placeholder" => "Total Barang"
                        ,"value" => $data->total_barang
                    ]);

                    // nominal input
                    MyForm::input([
                        "title" => "Harga Barang"
                        ,"name" => "harga_barang"
                        ,"type" => "text"
                        ,"currency" => "Rp "
                        ,"class" => "form-control"
                        ,"placeholder" => "isikan total harga barang"
                        ,"value" => $data->harga_barang
                    ]);
                      

                    MyForm::input([
                        "title" => "Tanggal Beli"
                        ,"name" => "tanggal_beli"
                        ,"type" => "text"
                        ,"mask" => "9999-99-99"
                        ,"class" => "form-control"
                        ,"placeholder" => "isikan id barang"
                        ,"value" => $data->tanggal_beli
                    ]);
                
                    MyForm::end([
                        'back-url' => "toko/stock-barang",
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