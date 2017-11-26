<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Manager Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manager_id', 'Manager:') !!}
    {!! Form::select('manager_id', $managerOptions, array_get_first_key($managerOptions), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('departments.index') !!}" class="btn btn-default">Cancel</a>
</div>
