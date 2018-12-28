<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{ Html::script(asset('js/app.js')) }}

    <!-- Styles -->
    {{ Html::style(asset('css/app.css')) }}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {!! Form::open(['method' => 'POST', 'route'=>['switchLang'], ]) !!}
                        {!! Form::select
                            (
                                 'locale',
                                 ['en' => trans('lable.lang.en'), 'vi' => trans('lable.lang.vi')],
                                  Lang::locale()==='vi' ? 'vi' : 'en' ,
                                 ['onchange'=>'this.form.submit()']
                             )
                         !!}
                    {!! Form::close() !!}


                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::check())
                                     @lang('lable.Hello') {{ Auth::user()->username  }}
                                @else
                                     @lang('lable.Hello')
                                @endif

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('auth.logout')}}" >
                                    @lang('lable.logout')
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
