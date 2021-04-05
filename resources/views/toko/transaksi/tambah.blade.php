@extends('layout.tokomain')
@section('activenav', '5')    
@section('head-content-title', 'Pesanan')
@section('head-back-nav')
  <li class="breadcrumb-item active"><a href="{{url('toko/pesanan')}}">Pesanan</a></li>
  <li class="breadcrumb-item active">Data Pesanan</li>
@endsection
@section("container")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form id="tablesaya">
                  @php

                    MyForm::hidden("id_transaksi", $id_transaksi);

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
                      ]
                    ]); 
                    MyForm::print_select();

                    MyForm::input([
                      "title"=> "Banyak Pesanan"
                      ,"name"=> "banyak_barang"
                      ,"type"=> "number"
                      ,"autocomplete" => "off"
                      ,"class"=> "form-control"
                      ,"placeholder"=> "isikan banyak pesanan"
                    ]);

                  @endphp
                  <button type="sumbit" class="btn btn-primary">Simpan</button>
                </form>

                <script>

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        }
                    })

                    //Program a custom submit function for the form
                    $("form#tablesaya").submit(function(event){
                     
                     //disable the default form submission
                     event.preventDefault();

                     //grab all form data  
                     var formData = new FormData($(this)[0]);

                     $.ajax({
                       url: '{{url("toko/transaksi/simpan_data")}}',
                       type: 'POST',
                       data: formData,
                       async: false,
                       cache: false,
                       contentType: false,
                       processData: false,
                       success: function (returndata) {
                         $("select[name=id_barang] option:nth-child(1)").prop('selected', 'selected');
                         $("input[name=banyak_barang]").val('');
                         tableku.ajax.reload();
                       }
                     });

                     return false;
                    });
                </script>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
                {!! html_entity_decode($datatable) !!}
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection