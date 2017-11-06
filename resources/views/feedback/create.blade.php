@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Feedback
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'feedback.store']) !!}
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('content', 'Content:') !!}
                            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('feedback.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
