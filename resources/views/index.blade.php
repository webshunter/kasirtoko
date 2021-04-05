@extends('layout.main2')

@section('title', 'CRUD')
@section('active', '3')

@section('container')
    <div class="row mt-3">
    	<div class="col-sm-12 text-center">
        	<h2>Data Kas Keluar</h2>
        </div>
        <div class="col-sm">
    		<a href="{{ url('tambah') }}" class="btn btn-primary">tambah</a>
            <div class="mt-3">
            	{!! html_entity_decode($datatable) !!}
            </div>
        </div>
    </div>
@endsection