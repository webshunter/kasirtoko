@extends('layout.tokomain')
@section('activenav', '4')    
@section('head-content-title', 'Pesanan')
@section('head-back-nav')
  <li class="breadcrumb-item active"><a href="{{url('toko/pesanan')}}">Pesanan</a></li>
  <li class="breadcrumb-item active">Update</li>
@endsection
@section("container")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Pesanan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    @php

                      MyForm::start('toko/pesanan/update', 'post');
                      
                      MyForm::hidden("id", $data->id);
                      
                      MyForm::set_db('pesanan');
                      MyForm::input([
                          "title" => "ID Pesanan"
                          ,"name" => "id_pesanan"
                          ,"type" => "text"
                          ,"class" => "form-control"
                          ,"placeholder" => "isikan total harga barang"
                          ,"value" => $data->id_pesanan
                          ,"auto-id" => [
                              "row" => "id_pesanan" 
                              ,"format" => "0000000"
                            ]
                          ,"kondisi" => [
                              ['perusahaan', '=', Session::get("toko-user")['nama_perusahaan']]
                          ]
                          ,"info" => "id pesanan terisi otomatis"
                      ]);


                      MyForm::input([
                        "title"=> "Nama Pemesan"
                        ,"name"=> "nama_pemesan"
                        ,"type"=> "text"
                        ,"class"=> "form-control"
                        ,"placeholder"=> "Isikan nama pemesan"
                        ,'value' => $data->nama_pemesan
                      ]);

                      MyForm::input([
                        "title"=> "Alamat Pemesan"
                        ,"name"=> "alamat_pemesan"
                        ,"type"=> "text"
                        ,"class"=> "form-control"
                        ,"placeholder"=> "Isikan alamat Pemesan"
                        ,'value' => $data->alamat_pemesan
                      ]);

                      MyForm::input([
                        "title"=> "Tanggal Diambil"
                        ,"name"=> "tanggal_diambil"
                        ,"type"=> "text"
                        ,"class"=> "form-control"
                        ,"mask" => "9999-99-99"
                        ,"placeholder"=> "tahun-bulan-tanggal"
                        ,'value' => $data->tanggal_diambil
                      ]);

                    @endphp
                  </div>
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-success">Data Pesanan <i class="fas fa-lg fa-angle-right"></i></button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection