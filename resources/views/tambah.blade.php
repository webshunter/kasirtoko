@extends('layout.main2')

@section('title', 'tambah data')
@section('active', '3')

@section('container')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Data</h5>
            <hr>
            <form role="form" action="{{ url('simpandata') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label for="data1">data1</label>
                    <input type="text" class="form-control" autocomplete="off" required name="data1" placeholder="inputkan data 1">
                </div>
                <div class="form-group">
                    <label for="data2">data2</label>
                    <input type="text" class="form-control"  autocomplete="off" required name="data2" placeholder="inputkan data 2">
                </div>
                <div>
                    <button type="submit" class="btn btn-succcess">simpan</button>
                    <a href="{{ url('pengeluaran') }}" type="submit" class="btn btn-default">back</a>
                </div>                        
            </form>
        </div>
    </div>
@endsection