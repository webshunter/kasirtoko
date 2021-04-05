@extends('layout.main2')


@section('title', 'grap-store - dashboard')
@section('active', '1')
@section('container')

    <div class="jumbotron top-content-head">
        <h1 class="display-4">Grap Store</h1>
        <p>Web Aplicattion Store</p>
        <center>
          <img class="mt-4" style="width: calc(100vw - 50px); max-width: 300px;" src="{!! asset('icon/bg.png') !!}" alt="">
        </center> 
    </div>

    <div class="container-fluid full-page">
        <div class="row">
            <div class="col-sm-12">
                <h1>App Sale</h1>
                <ul class="nav nav-tabs mt-3">
                  <li class="nav-item">
                    <a class="nav-link active">Office</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link">Administrasi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link">Toko</a>
                  </li>
                </ul>
            </div>
            <div class="col-sm-12 mt-4">
                <div class="card" id="content-card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body">
                              <a class="btn btn-success" href="{!! url('toko') !!}">View Demo</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection