@extends('layout.mainaccounting')
@section('activenav', '3')    
@section('head-content-title', 'Data Awal Current Asset')
@section('head-back-nav')
  <li class="breadcrumb-item"><a href="{{ url('accounting/data-awal') }}">Data Awal</a></li>
  <li class="breadcrumb-item active">Fixed Assets</li>
@endsection

@section("container")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a class="btn btn-primary" href="{{ url('accounting/data-awal/fixed-asset/tambah') }}">Tambah Akun</a>
            </div>
            <div class="card-body">
                {!! html_entity_decode($datatable) !!}
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection