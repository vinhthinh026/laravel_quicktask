@extends('layouts.app')
@section('content')
    <div class="panel-body">
        {!! Form::open(['method' => 'POST', 'url' => '']) !!}
            <div class="form-group">
               {!! Form::label('tasks', trans('lable.Tasks') , ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                   {!! Form::text('username') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {!! Form::submit( trans('lable.Add_Tasks'), ['class'=>'btn btn-default']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
