<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Month Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('month_year', 'Month Year:') !!}
    {!! Form::date('month_year', null, ['class' => 'form-control']) !!}
</div>

<!-- Overtime Hours Field -->
<div class="form-group col-sm-6">
    {!! Form::label('overtime_hours', 'Overtime Hours:') !!}
    {!! Form::number('overtime_hours', null, ['class' => 'form-control']) !!}
</div>

<!-- Days Off Field -->
<div class="form-group col-sm-6">
    {!! Form::label('days_off', 'Days Off:') !!}
    {!! Form::number('days_off', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Base Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_base_salary', 'Total Base Salary:') !!}
    {!! Form::number('total_base_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Over Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('over_salary', 'Over Salary:') !!}
    {!! Form::number('over_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Reward Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reward', 'Reward:') !!}
    {!! Form::number('reward', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_salary', 'Total Salary:') !!}
    {!! Form::number('total_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('monthlyLogs.index') !!}" class="btn btn-default">Cancel</a>
</div>
