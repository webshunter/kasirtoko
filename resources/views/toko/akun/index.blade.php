@extends('layout.tokomain')
@section('activenav', '0')    
@section('head-content-title', 'Pesanan')
@section('head-back-nav')
  <li class="breadcrumb-item active">Akun</li>
@endsection
@section("container")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  Tambah Akun
              </button>
            </div>
            <div class="card-body">
                {!! html_entity_decode($datatable) !!}
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Default Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="tambahAkun">
            
          <div class="modal-body">

            @php
              
              MyForm::set_db('akun');
              MyForm::input([
                  "title" => "ID Akun"
                  ,"name" => "id_akun"
                  ,"type" => "text"
                  ,"class" => "form-control"
                  ,"placeholder" => "Isikan id akun"
                  ,"value" => "" 
                  ,"auto-id" => [
                      "row" => "id_akun" 
                      ,"format" => "00000000"
                    ]
                  ,"kondisi" => [
                      ['perusahaan', '=', Session::get("toko-user")['nama_perusahaan']]
                  ]
                  ,"info" => "id akun tersi otomatis"
              ]);

              MyForm::input([
                  "title" => "Nama Akun"
                  ,"name" => "nama_akun"
                  ,"type" => "text"
                  ,"class" => "form-control"
                  ,"placeholder" => "isikan nama akun"
              ]);

            @endphp

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            }
        })

        //Program a custom submit function for the form
        $("form#tambahAkun").submit(function(event){
         
         //disable the default form submission
         event.preventDefault();

         //grab all form data  
         var formData = new FormData($(this)[0]);

         $.ajax({
           url: '{{url("toko/akun/simpan")}}',
           type: 'POST',
           data: formData,
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function (returndata) {
             $("select[name=id_akun] option:nth-child(1)").prop('selected', 'selected');
             $("input[name=nama_akun]").val('');
             $("#modal-default").modal('toggle')
             tableku.ajax.reload();
           }
         });

         return false;
        });
    </script>

@endsection