<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $feedback->id !!}</p>
</div>

<!-- User Field -->
<div class="form-group">
    {!! Form::label('user', 'User:') !!}
    <p>{!! $feedback->user['name'] !!}</p>
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
    <p>{!! var_export($feedback->is_resolved) !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $feedback->created_at !!}</p>
</div>

<!-- Replied User Field -->
<div class="form-group">
    {!! Form::label('replied_user', 'Replied User:') !!}
    <p>{!! $feedback->replyUser['name'] !!}</p>
</div>

<!-- Replied At Field -->
<div class="form-group">
    {!! Form::label('replied_at', 'Replied At:') !!}
    <p>{!! $feedback->replied_at !!}</p>
</div>

