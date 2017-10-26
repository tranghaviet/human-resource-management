<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Checked In At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checked_in_at', 'Checked In At:') !!}
    {!! Form::date('checked_in_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Checked Out At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checked_out_at', 'Checked Out At:') !!}
    {!! Form::date('checked_out_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Working Hours Field -->
<div class="form-group col-sm-6">
    {!! Form::label('working_hours', 'Working Hours:') !!}
    {!! Form::number('working_hours', null, ['class' => 'form-control']) !!}
</div>

<!-- Monthly Log Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monthly_log_id', 'Monthly Log Id:') !!}
    {!! Form::number('monthly_log_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dailyLogs.index') !!}" class="btn btn-default">Cancel</a>
</div>
