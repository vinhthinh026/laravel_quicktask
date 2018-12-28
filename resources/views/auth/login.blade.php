@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('lable.login')</div>

                <div class="card-body">
                    {!! Form::open(['method'=> 'POST', 'route'=> ['tasks.add'] ]) !!}

                        <div class="form-group row">
                            {!! Form::label( 'username', trans('lable.username'), ['class'=>'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::text( 'username', old('username'), ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label( 'password', trans('lable.password'), ['class'=>'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::text( 'password', old('password'), ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit( trans('lable.login'), ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
