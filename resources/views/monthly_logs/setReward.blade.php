@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Monthly Log
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    {!! Form::open(['route' => 'monthlyLogs.postSetReward']) !!}
                        <div class="form-group col-sm-3">
                            {!! Form::label('user_id', 'User:') !!}
                            <br />
                            {!! Form::select('user_id', $userOptions, array_get_first_key($userOptions), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            {!! Form::label('year', 'Year:') !!}
                            {!! Form::number('year', date('Y'), ['class' => 'form-control']) !!}
                        </div>
                       <div class="form-group col-sm-3">
                           {!! Form::label('month', 'Month:') !!}
                           <br />
                           {!! Form::select('month', $monthOptions, date('m'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            {!! Form::label('reward', 'Reward:') !!}
                            {!! Form::number('reward', NULL, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('monthlyLogs.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
