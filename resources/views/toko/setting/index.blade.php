@extends('layout.mainaccounting')
@section('activenav', '4')    
@section('head-content-title', 'Setting')
@section('head-back-nav')
  <li class="breadcrumb-item active">Setting</li>
@endsection
@section("container")

<style>

.btn-manual{
    padding:20px;
    height:auto;
    font-size: 16px;
    min-width:calc((100% / 3) - 20px);
}

.btn-manual i{
    margin-bottom: 10px;
}

@media screen and (max-width:600px){
    .btn-manual{
        min-width:calc(100% - 20px);
    }
}

</style>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu Data Awal</h3>
                </div>
                <div class="card-body">
                    <p>pilih menu di bawah untuk melakukan setting data awal :</p>

                    @php
                        $arr = [
                            "asset" => "Kelompok Harta/Asset",
                        ];
                    @endphp 

                    @foreach ($arr as $key => $value)
                        <a href="{{ url("accounting/setting").'/'.$key }}" class="btn bg-blue btn-manual btn-app">
                            <i style="font-size: 30px;" class="fas fa-edit"></i> {{ $value }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
      </div>
    </section>
@endsection