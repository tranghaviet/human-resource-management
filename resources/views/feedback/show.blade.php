@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Feedback
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('feedback.show_fields')
                    <a href="{!! route('feedback.index') !!}" class="btn btn-default">Back</a>
                    <a href="{!! route('feedback.edit', ['id' => $feedback->id]) !!}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
