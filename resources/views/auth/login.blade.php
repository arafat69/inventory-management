<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('public')}}/images/favicon_1.ico">

        <title>Inventory Management System</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
        <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/app.css') }}">

    </head>
    <body>
<style>
    .bg-overlay{
        height: 120px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-position: center;
        background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url({{ asset('public/assets/images/background/bg.jpg') }});
    }
</style>
<div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-5 mt-5 m-auto">
            <div class="card mt-3">
                <div class="panel-heading bg-img">
                    <div class="bg-overlay">
                    <h3 class="text-center m-t-10 text-white"><strong>Inventory</strong> </h3>
                </div>
                </div>


                <div class="card-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control form-control-lg " type="email" name="email" value="{{ old('email') }}"  placeholder="Email" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control form-control-lg" type="password" placeholder="Password" name="password" required autocomplete="current-password">
                             @error('password')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember me
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                </form>
                </div>

            </div>
        </div>
    </div>
</div>

	</body>
</html>
