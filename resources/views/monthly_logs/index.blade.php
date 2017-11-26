@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Monthly Logs</h1>
        @if(Auth::user()->hasRole('admin'))
            <a href="{{ route('monthlyLogs.getSetReward') }}" class="btn btn-primary pull-right">Set Reward</a>
        @endif
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                    @include('monthly_logs.table')
            </div>
        </div>
    </div>
@endsection

