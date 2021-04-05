@extends('layout.tokomain')
@section('activenav', '4')    
@section('head-content-title', 'Pesanan')
@section('head-back-nav')
  <li class="breadcrumb-item active">Pesanan</li>
@endsection
@section("container")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a class="btn btn-primary" href="{{ url('toko/pesanan/tambah') }}">Tambah Akun</a>
            </div>
            <div class="card-body">
                {!! html_entity_decode($datatable) !!}
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection