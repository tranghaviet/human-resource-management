@if(\Auth::user()->id == $feedback->user_id)
    <!-- Content Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
@else
    <!-- Reply Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('reply', 'Reply:') !!}
        {!! Form::textarea('reply', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Is Resolved Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('is_resolved', 'Is Resolved:') !!}
        <label class="checkbox-inline">
            {!! Form::hidden('is_resolved', false) !!}
            {!! Form::checkbox('is_resolved', '1', null) !!} True
        </label>
    </div>

    @if(! empty($feedback['replied_at']))
        <!-- Replied At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('replied_at', 'Replied At:') !!}
            {{ $feedback['replied_at'] }}
        </div>
    @endif
@endif

    <!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('feedback.index') !!}" class="btn btn-default">Cancel</a>
</div>
