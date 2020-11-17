<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    @yield("style")
</head>
<body>
<div id="app">
    <div class="scroll-up-btn">
        <i class="fa fa-angle-up"></i>
    </div>
    @include('layouts.inc.header')
    <main class="container-fluid px-0">
        @yield('content')
    </main>
    <footer>
        <span>Created by <a href="https://www.facebook.com/BloOdl1Ne " target="_blank">fgupioc</a> | <span class="fa fa-copyright"></span> 2020 all rights reserved.</span>
        <div class="typing" style="display: none"></div>
    </footer>
</div>
<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus placeholder="Ingrese su correo">
                            <span class="invalid-feedback" role="alert">
                                <strong class="message-email"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Ingrese su contraseña">
                            <span class="invalid-feedback" role="alert">
                                <strong class="message-password"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <button type="submit" class="btn btn-block btn-primary">Iniciar</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script>
    const baseUrl = document.location.origin + "/";
    const token = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function () {
        const form = $("#modalLogin").find("form");
        form.submit(function (e) {
            const $this = $(this);
            $this.find("input[name='email']").removeClass("is-invalid");
            $this.find("input[name='password']").removeClass("is-invalid");
            $this.find(".message-password").html("");
            $this.find(".message-email").html("");
            e.preventDefault();
            const data = $this.serialize();
            const url = $this.attr("action");
            const method = $this.attr("method");
            $.ajax({
                headers: {'X-CSRF-TOKEN': token},
                url: url,
                type: method,
                data: data,
                dataType: 'JSON',
                beforeSend: function () {
                    $this.find("button").prop("disabled", true);
                    $this.find("button").html('<i class="fa fa-spinner fa-pulse"></i> enviando...');
                },
                success: function (res) {
                    $this.find("button").html("Iniciar");
                    $this.find("button").prop("disabled", false);
                    $("#modalLogin").modal("hide");
                    window.location.href="/";
                },
                error: function (err) {
                    $this.find("button").prop("disabled", false);
                    $this.find("button").html("Iniciar");
                    if (err.responseJSON.errors) {
                        if (err.responseJSON.errors.password) {
                            $this.find("input[name='password']").addClass("is-invalid");
                            $this.find(".message-password").html(err.responseJSON.errors.password[0]);
                        } else if (err.responseJSON.errors.email) {
                            $this.find("input[name='email']").addClass("is-invalid");
                            $this.find(".message-email").html(err.responseJSON.errors.email[0]);
                        }
                    } else {
                        $this.find("input[name='email']").addClass("is-invalid");
                        $this.find(".message-email").html(err.responseJSON.message ?? 'Ocurrio un error.');
                    }


                }
            });
        });
    });
</script>
</body>
</html>
