<table class="table table-responsive" id="departments-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Manager</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($departments as $department)
        <tr>
            <td>{!! $department->id !!}</td>
            <td>{!! $department->name !!}</td>
            <td>{!! is_null($department->manager_id) ? null : $department->manager['name'] !!}</td>
            <td>
                {!! Form::open(['route' => ['departments.destroy', $department->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('departments.edit', [$department->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
