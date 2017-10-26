<table class="table table-responsive" id="dailyLogs-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Checked In At</th>
        <th>Checked Out At</th>
        <th>Working Hours</th>
        <th>Monthly Log Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dailyLogs as $dailyLog)
        <tr>
            <td>{!! $dailyLog->user_id !!}</td>
            <td>{!! $dailyLog->checked_in_at !!}</td>
            <td>{!! $dailyLog->checked_out_at !!}</td>
            <td>{!! $dailyLog->working_hours !!}</td>
            <td>{!! $dailyLog->monthly_log_id !!}</td>
            <td>
                {!! Form::open(['route' => ['dailyLogs.destroy', $dailyLog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dailyLogs.show', [$dailyLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dailyLogs.edit', [$dailyLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>