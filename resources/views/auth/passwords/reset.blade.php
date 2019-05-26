@extends('layouts.cabecalho')

@section('conteudo')
<div class="container" style="
     padding-top: 30px;
     ">

    <div class="col-lg-4"style="margin: 0 auto !important; display: block !important; ">

        <!-- Heading -->
        <h3 class="text-center ">
            <b> Redefinição de senha</b>
        </h3>

        <!-- Subheading -->
        <p class="text-muted text-center mb-5">
            Digite seu email e sua nova senha.
        </p>

        <!-- Form -->
        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <!-- Email address -->
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <!-- Label -->
                <label>Endereço de email</label>
                <!-- Input -->
                <input type="email" class="form-control" placeholder="Email" name="email">
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <!-- Nova Senha -->
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <!-- Label -->
                <label>Nova senha</label>
                <!-- Input -->
                <input type="password" class="form-control" placeholder="Senha" name="password">
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <!-- Confirmar Nova Senha -->
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <!-- Label -->
                <label>Confirmação de senha</label>
                <!-- Input -->
                <input type="password" class="form-control" placeholder="Confirmação de senha" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
            <!-- Submit -->
            <div class="text-center">
                <button class="btnmodal" type="submit">
                    Resetar Senha
                </button>
            </div>

            <!-- Link -->
            <br>
            <div class="text-center">
                <small class="text-muted text-center">
                    Lembra da sua senha? <a href="https://www.annajessica.com.br">Login</a>.
                </small>
            </div>

        </form>

    </div>
</div>
@endsection
