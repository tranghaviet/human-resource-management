@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Monthly Log
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($monthlyLog, ['route' => ['monthlyLogs.update', $monthlyLog->id], 'method' => 'patch']) !!}

                        @include('monthly_logs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection