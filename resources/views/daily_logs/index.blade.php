@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Daily Logs</h1>

        {!! Form::open(['route' => 'dailyLogs.checkIn', 'class'=> 'pull-right']) !!}
            {!! Form::submit('Check in', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

        {!! Form::open(['route' => 'dailyLogs.checkOut', 'class'=> 'pull-right']) !!}
            {!! Form::submit('Check Out', ['class' => 'btn btn-primary', 'style'=> 'margin-right: 20px;']) !!}
        {!! Form::close() !!}
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                    @include('daily_logs.table')
            </div>
        </div>
    </div>
@endsection

