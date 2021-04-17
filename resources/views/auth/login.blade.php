<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin</title>
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-social/bootstrap-social.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='' />
  <link rel="stylesheet" href="{{asset('assets/bundles/izitoast/css/iziToast.min.css')}}">
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Admin Login</h4>
              </div>
              <div class="card-body">
                <form id="form_login" name="form_login">
                    @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="button" id="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                      </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{asset('assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
<script>
    @if(Session::has('success'))
        iziToast.success({
        title: '{{ session('success') }}',
        position: 'topRight'
    });
    @endif
    @if(Session::has('error'))
        iziToast.error({
        title: '{{ session('error') }}',
        position: 'topRight'
    });
    @endif
</script>
<script>
    $('#login').click(function() {
        var data = $("#form_login").serialize(); //include csrf token
        // $.ajaxSetup({
        //     headers:{
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $.ajax({
            type: 'POST',
            url: '{{ route('login.check') }}',
            data: data,
            success: function(response)
            {
                console.log(response);
                if(response[0] === 1){
                    iziToast.success({
                        title: 'Welcome Back!',
                        position: 'topRight'
                    });
                    setTimeout(function () {
                        window.location.replace('{{ route('dashboard')}}');
                    }, 1200);

                }
                else if(response[0] === 2)
                {
                    window.location.replace('{{ route('employee-dashboard')}}');
                }
                else{
                    window.location.replace('/');
                }
            }
        });
    });
</script>
</body>
</html>
