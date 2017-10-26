<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $dailyLog->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $dailyLog->user_id !!}</p>
</div>

<!-- Checked In At Field -->
<div class="form-group">
    {!! Form::label('checked_in_at', 'Checked In At:') !!}
    <p>{!! $dailyLog->checked_in_at !!}</p>
</div>

<!-- Checked Out At Field -->
<div class="form-group">
    {!! Form::label('checked_out_at', 'Checked Out At:') !!}
    <p>{!! $dailyLog->checked_out_at !!}</p>
</div>

<!-- Working Hours Field -->
<div class="form-group">
    {!! Form::label('working_hours', 'Working Hours:') !!}
    <p>{!! $dailyLog->working_hours !!}</p>
</div>

<!-- Monthly Log Id Field -->
<div class="form-group">
    {!! Form::label('monthly_log_id', 'Monthly Log Id:') !!}
    <p>{!! $dailyLog->monthly_log_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $dailyLog->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $dailyLog->updated_at !!}</p>
</div>

