@extends('layout.mainaccounting')
@section('activenav', '4')    
@section('head-content-title', 'Setting Asset')
@section('head-back-nav')
  <li class="breadcrumb-item"><a href="{{ url('accounting/setting') }}">Setting</a></li>
  <li class="breadcrumb-item"><a href="{{ url('accounting/setting/asset') }}">Asset</a></li>
  <li class="breadcrumb-item active">Tambah</li>
@endsection
@section("container")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Setting Asset</h3>
            </div>
            <div class="card-body">
                <form action="{{ url("accounting/setting/asset/simpan") }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="type_kelompok">Type Kelompok</label>
                        <select required class="form-control" name="type_kelompok" id="type_kelompok">
                            <option value="">--pilih--</option>
                            <option value="Bukan Gedung">Bukan Gedung</option>
                            <option value="Gedung">Gedung</option>
                        </select>
                        <small style="color:red;" id="keteranganakun"></small>
                    </div>
                    <div class="form-group">
                      <label for="kelompok_harta">Kelompok Harta</label>
                      <input type="text" class="form-control" required autocomplete="off" name="kelompok_harta" placeholder="isikan data">
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" name="masa_manfaat" placeholder="masa manfaat">
                          <div class="input-group-append">
                            <span class="input-group-text">Tahun</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="garis_lurus"  placeholder="metode garis lurus">
                          <div class="input-group-append">
                            <span class="input-group-text">%</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="saldo_menurun" placeholder="metode saldo menurun">
                          <div class="input-group-append">
                            <span class="input-group-text">%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a href="{{ url('accounting/setting/asset') }}" class="btn btn-default">back</a>
                    <button id="buttontambah" type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
          </div>
        </div>
      </div>
@endsection