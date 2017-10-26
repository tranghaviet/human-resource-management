<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

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
        {!! Form::checkbox('is_resolved', '1', null) !!} 1
    </label>
</div>

<!-- Replied User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('replied_user_id', 'Replied User Id:') !!}
    {!! Form::number('replied_user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Replied At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('replied_at', 'Replied At:') !!}
    {!! Form::date('replied_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('feedback.index') !!}" class="btn btn-default">Cancel</a>
</div>
