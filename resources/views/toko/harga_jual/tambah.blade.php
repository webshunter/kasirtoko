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
                  
                     MyForm::set_db('stock_barang');
                      MyForm::set_select([
                        "title" => "Pilih Barang"
                        ,"id" => "id_barang"
                        ,"name" => "id_barang"
                        ,"class" => "form-control"
                        ,"option" => [
                          "value" => "id"
                          ,"text" => "nama_barang"
                        ]
                        ,"kondisi" => [
                          ['perusahaan', '=', Session::get("toko-user")['nama_perusahaan']]
                        ],
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
                    ]);
                      
                    MyForm::end([
                        'back-url' => "toko/harga-jual",
                        'back-button' => 'btn btn-default',
                        'id-submit' => 'simpanbutton',
                        'submit-button' => 'btn btn-primary'
                    ])
              
              @endphp

              <script>
                  
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                      }
                  })
                  
                  $("<small id='id_barang_info' style='display:block; padding:5px; color:red;'></small>").insertAfter("#id_barang");

                  $("#id_barang").on("change", function(){

                    $.ajax({
                      url: '{{url("toko/harga-jual/cek")}}',
                      type: 'POST',
                      dataType: 'text',
                      data: {id: $(this).val()},
                    })
                    .done(function(response) {
                      if (response == 'ada') {
                        $("#id_barang_info").text("maaf data sudah ada");
                        $("#simpanbutton").removeClass('btn-primary').addClass('btn-default').attr('type', 'button');
                      }else{
                        $("#id_barang_info").text("");
                        $("#simpanbutton").removeClass('btn-default').addClass('btn-primary').attr('type', 'submit');
                      }
                    });

                  })                  


              </script>

            </div>
          </div>
        </div>
      </div>
    </section>
@endsection