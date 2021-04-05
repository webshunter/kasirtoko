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
                <form action="{{ url("accounting/data-awal/current-asset/update") }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="golongan_akun">Pilih Akun</label>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <select required class="form-control" name="id_akun" id="golongan_akun">
                            <option value="">--pilih--</option>
                            <?php HelpMe::formStyle('form-control'); ?>
                            {!! html_entity_decode(HelpMe::SelectOptionFromDB('accountingakun', 'id_akun', 'nama_akun', 'Current Assets',$data->id_akun)) !!}
                        </select>
                        <small style="color:red;" id="keteranganakun"></small>
                    </div>
                    {!! html_entity_decode(HelpMe::FormInputCurrency('Rp ', 'Nominal', 'nominal', 'isikan nominal', $data->nominal)) !!}
                    <a href="{{ url('accounting/data-awal/current-asset') }}" class="btn btn-default">back</a>
                    <button id="buttontambah" type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection