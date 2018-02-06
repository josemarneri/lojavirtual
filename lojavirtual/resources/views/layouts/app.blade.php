<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Loja virtual</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/mine.css" rel="stylesheet">
    <link href="/css/menus.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script language="JavaScript" src="{{url('js/neri.js')}}"></script>
    <script language="JavaScript" src="{{url('js/jquery.js')}}"></script>
    <script language="JavaScript" src="{{url('js/jquery-ui.js')}}"></script>
    <style type="text/css">
        #draggable { width: 100px; height: 70px; background: silver; }
      </style>
      <script>
      $(document).ready(function() {
        $("#draggable").draggable();
        alert('1');
        $(".nha").draggable();
            alert('2');
        $("#nha").draggable();
         alert('3'); 
      });
      
      </script>
      
      
</head>
 
<body>
    <div id="master">
        
        <div id="header-bar">
            <div class="logoBar">
                
            </div>
            @if (Route::has('login'))
                <div class="loginBar">
                    <ul>
            <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="#" onclick="OpenPopup('login')">Entrar</a></li>
                        <div class="pop" id="login">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-2">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="min-height: 30px">
                                                <div style="float: left;">Login</div>
                                                <div style="float: right;"><a href="#" onclick="ClosePopup('login')">Fechar</a></div>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                        <div class="col-md-6">
                                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password" class="col-md-4 control-label">Password</label>

                                                        <div class="col-md-6">
                                                            <input id="password" type="password" class="form-control" name="password" required>

                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-6 col-md-offset-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-8 col-md-offset-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Login
                                                            </button>

                                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                Forgot Your Password?
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <li >
                            <a href="#" >{{ Auth::user()->login }} </a>

                            <ul >
                                <li><a  href="{{url("/painel/usuarios/alterarsenha/".Auth::user()->id) }}"> Alterar Senha
                                    </a>
                                </li>
                                <li><a  href="{{url("/painel/funcionarios/alterardadospessoais/".Auth::user()->id) }}"> Alterar dados pessoais
                                    </a>
                                </li>

                                <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Sair</a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                    <a class="col-md-4" href="#" onclick="OpenPopup('conteudo')">Cadastre-se</a>
                </div>
            @endif
        </div>
        <div id="nave-bar">
            
        </div>
        <div id="body-space">
            <div id="left-menu">
                <ul id="vertical">
                    <li> Computadores completos
                        <ul>
                            <li> item 1 ----------</li>
                            <li> item 1</li>
                            <li> item 1</li>
                            <li> item 1</li>
                            <li> item 1</li>
                        </ul>
                    </li>
                    <li> item 1</li>
                    <li> item 1</li>
                    <li> item 1</li>
                    <li> item 1</li>
                    <li> item 1</li>
                </ul>
            </div>
            <div id="contain-space">
                
                <div class="pop" id="conteudo">
                    @yield('content')
                </div>
            </div>
            
        </div>       
        
    </div>
    <div id="footer-space">
            
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
