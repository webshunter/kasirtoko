@extends('layout.mainaccounting')
@section('activenav', '3')    
@section('head-content-title', 'Data Awal Current Assets')
@section('head-back-nav')
  <li class="breadcrumb-item"><a href="{{ url('accounting/data-awal') }}">Data Awal</a></li>
  <li class="breadcrumb-item"><a href="{{ url('accounting/data-awal/fixed-asset') }}">Fixed Assets</a></li>
  <li class="breadcrumb-item active">Tambah</li>
@endsection
@section("container")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Akun</h3>
            </div>
            <div class="card-body">
              @php
                  // form start
                  MyForm::start('accounting/data-awal/fixed-asset/simpan', 'post');

                  MyForm::set_db('accountingakun');
                  MyForm::set_select([
                    "title" => "Pilih Akun"
                    ,"id" => "myid"
                    ,"class" => "form-control"
                    ,"name" => "id_akun"
                    ,"option" => [
                      "value" => "id"
                      ,"text" => "nama_akun"
                    ]
                    ,"kondisi" => [
                      ['perusahaan', '=', Session::get("accounting-user")['nama_perusahaan']],
                      ['golongan_akun', '=', 'Fixed Assets']
                    ]
                  ]); 
                  MyForm::print_select();

                  MyForm::input([
                    "title" => "Nama Asset"
                    ,"name" => "nama_asset"
                    ,"type" => "text"
                    ,"class" => "form-control"
                    ,"placeholder" => "isikan data id asset"
                  ]);
                  
                  MyForm::input([
                    "title" => "Total Asset"
                    ,"name" => "total"
                    ,"type" => "number"
                    ,"class" => "form-control"
                    ,"placeholder" => "Total Barang"
                  ]);

                  MyForm::set_db('accountingsettingasset');
                  MyForm::set_select([
                    "title" => "Pilih Kategori Asset"
                    ,"id" => "golongan-asset"
                    ,"name" => "id_kategory_asset"
                    ,"class" => "form-control"
                    ,"option" => [
                      "value" => "id"
                      ,"text" => "kelompok_harta"
                    ]
                    ,"kondisi" => [
                      ['perusahaan', '=', Session::get("accounting-user")['nama_perusahaan']]
                    ]
                  ]); 
                  MyForm::print_select();

                  // nominal input
                  MyForm::input([
                    "title" => "Nominal / Item"
                    ,"name" => "nominal"
                    ,"type" => "text"
                    ,"currency" => "Rp "
                    ,"class" => "form-control"
                    ,"placeholder" => "isikan nominal"
                  ]);

                  MyForm::input([
                    "title" => "Tanggal Beli"
                    ,"tag" => "fas fa-calendar-alt"
                    ,"name" => "tanggal_beli"
                    ,"type" => "text"
                    ,"mask" => "9999-99-99"
                    ,"class" => "form-control"
                    ,"placeholder" => "tgl-bln-tahun"
                  ]);

                  MyForm::end([
                    'back-url' => "accounting/data-awal/fixed-asset",
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
    <script>
      
      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
          }
      })

      $('[data-mask]').inputmask()


    </script>
@endsection