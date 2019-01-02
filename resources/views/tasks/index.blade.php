@extends('layouts.app')
@section('content')

    @if (Session::has('msg'))
        <div>
            <strong  >{{ Session::get('msg') }}</strong>
        </div>
    @endif

    <div class="panel-body">
        {!! Form::open(['method' => 'POST', 'route'=>['tasks.add'] ]) !!}
            <div class="form-group">
               {!! Form::label('tasks', trans('lable.Tasks') , ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                   {!! Form::text('tasks') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {!! Form::submit( trans('lable.Add_Tasks'), ['class'=>'btn btn-default']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    <ul class="list-group">
        @foreach($objItems as $objItem)
            <li class="list-group-item disabled">
                {!! $objItem->name !!}
                <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa')" href="{{route('tasks.delete', ['id'=>$objItem->id])}}">@lang('lable.Delete')</a>
            </li>
        @endforeach
    </ul>
@endsection
