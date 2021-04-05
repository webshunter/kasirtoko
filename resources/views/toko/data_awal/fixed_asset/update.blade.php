@extends('layout.mainaccounting')
@section('activenav', '3')    
@section('head-content-title', 'Data Awal Current Assets')
@section('head-back-nav')
  <li class="breadcrumb-item"><a href="{{ url('accounting/data-awal') }}">Data Awal</a></li>
  <li class="breadcrumb-item active">Current Assets</li>
@endsection
@section("container")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Data Awal</h3>
            </div>
            <div class="card-body">
              @php
                  // form start
                  MyForm::start('accounting/data-awal/fixed-asset/update', 'post');

                  MyForm::hidden('id', $data->id);

                  MyForm::set_db('accountingakun');
                  MyForm::set_select([
                    "title" => "Pilih Akun"
                    ,"id" => "myid"
                    ,"class" => "form-control"
                    ,"selected" => $data->id_akun
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
                    ,"value" => $data->nama_asset
                  ]);

                  MyForm::input([
                    "title" => "Total Barang"
                    ,"name" => "total"
                    ,"type" => "number"
                    ,"class" => "form-control"
                    ,"placeholder" => "Total Barang"
                    ,"value" => $data->total
                  ]);

                  MyForm::set_db('accountingsettingasset');
                  MyForm::set_select([
                    "title" => "Pilih Kategori Asset"
                    ,"id" => "golongan-asset"
                    ,"name" => "id_kategory_asset"
                    ,"class" => "form-control"
                    ,"selected" => $data->id_kategory_asset
                    ,"key" => "id"
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
                    ,"value" => $data->nominal
                  ]);

                  MyForm::input([
                    "title" => "Tanggal Beli"
                    ,"tag" => "fas fa-calendar-alt"
                    ,"name" => "tanggal_beli"
                    ,"type" => "text"
                    ,"mask" => "9999-99-99"
                    ,"class" => "form-control"
                    ,"placeholder" => "tgl-bln-tahun"
                    ,"value" => $data->tanggal_beli
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
@endsection