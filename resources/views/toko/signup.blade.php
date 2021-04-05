@extends('layout.tokomainlogin')

@section('container')

	<div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Selamat Datang di Pendaftaran Accounting</h1>
                  </div>
                  <p>isi form berikut untuk daftar di accounting</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form role="form" action="{{ url('toko/pendaftaran/simpan') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                      <input id="login-username" autocomplete="off" type="text" name="user" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="nama-usaha" autocomplete="off" type="text" name="nama_usaha" required data-msg="Please enter your username" class="input-material">
                      <label for="nama-usaha" class="label-material">Nama Usaha</label>
                    </div>
                    <div class="form-group">
                      <input id="password-user" type="password" name="password" required data-msg="Please enter your username" class="input-material">
                      <label for="password-user" class="label-material">Password</label>
                    </div>
                    <div class="form-group">
                      <input id="user-password-verify" type="password" name="password-verify" required data-msg="Please enter your password" class="input-material">
                      <label for="user-password-verify" class="label-material">Password Verify</label>
                      <small id="veryfi-alert" style="color:red;"></small>
                    </div>
                    <button id="submit-form" type="button" class="btn btn-default">Sign Up</button>
                    <script>
                      $("#user-password-verify").on("keyup", function(){
                        let getPass = $("input[name=password]").val();
                        let getPassVerify = $(this).val();
                        if(getPass != getPassVerify){
                          $("#veryfi-alert").text("not match");
                          $("#submit-form").attr("type", "button");
                        }else{
                          $("#veryfi-alert").text("");
                          $("#submit-form").attr("type", "submit");
                          $("#submit-form").removeClass("btn-default");
                          $("#submit-form").addClass("btn-success");
                        }
                      })
                    </script>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                    </form>
                    <small>Do have an account? </small><a href="{{ url('accounting/loginmenu') }}" class="signup">Login</a>
                  </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com/p/admin-template" class="external">Bootstrapious</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>

@endsection