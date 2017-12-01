<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', empty(compact('user')) ? null : $user->email, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-3">
    {!! Form::label('gender', 'Gender:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('gender', false) !!}
        {!! Form::checkbox('gender', '1', null) !!} Male
    </label>
</div>

<!-- Admin Field -->
<div class="form-group col-sm-3">
    {!! Form::label('is_admin', 'Is Admin:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_admin', false) !!}
        {!! Form::checkbox('is_admin', '1', null) !!} Male
    </label>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

@if(Auth::user()->hasRole('admin'))
    <!-- Base Salary Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('base_salary', 'Base Salary:') !!}
        {!! Form::number('base_salary', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Department Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('department', 'Department:') !!}
        {!! Form::select('department_id', $departmentOptions, array_get_first_key($departmentOptions), ['class' => 'form-control']) !!}
    </div>
@endif
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
