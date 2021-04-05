@extends('layout.tokomain')
@section('activenav', '2')    
@section('head-content-title', 'Stock Barang')
@section('head-back-nav')
  <li class="breadcrumb-item active">Stock Barang</li>
@endsection
@section("container")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a class="btn btn-primary" href="{{ url('toko/stock-barang/tambah') }}">Tambah Akun</a>
            </div>
            <div class="card-body">
                {!! html_entity_decode($datatable) !!}
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection