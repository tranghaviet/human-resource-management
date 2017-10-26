<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $feedback->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $feedback->user_id !!}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{!! $feedback->content !!}</p>
</div>

<!-- Reply Field -->
<div class="form-group">
    {!! Form::label('reply', 'Reply:') !!}
    <p>{!! $feedback->reply !!}</p>
</div>

<!-- Is Resolved Field -->
<div class="form-group">
    {!! Form::label('is_resolved', 'Is Resolved:') !!}
    <p>{!! $feedback->is_resolved !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $feedback->created_at !!}</p>
</div>

<!-- Replied User Id Field -->
<div class="form-group">
    {!! Form::label('replied_user_id', 'Replied User Id:') !!}
    <p>{!! $feedback->replied_user_id !!}</p>
</div>

<!-- Replied At Field -->
<div class="form-group">
    {!! Form::label('replied_at', 'Replied At:') !!}
    <p>{!! $feedback->replied_at !!}</p>
</div>

