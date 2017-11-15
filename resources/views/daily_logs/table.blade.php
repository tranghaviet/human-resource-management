<table class="table table-responsive" id="dailyLogs-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Checked In At</th>
            <th>Checked Out At</th>
            <th>Working Hours</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dailyLogs as $dailyLog)
        <tr>
            <td>{!! $dailyLog->user->name    !!}</td>
            <td>{!! $dailyLog->checked_in_at !!}</td>
            <td>{!! $dailyLog->checked_out_at !!}</td>
            <td>{!! $dailyLog->working_hours !!}</td>
            <td>
                {!! Form::open(['route' => ['dailyLogs.destroy', $dailyLog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
