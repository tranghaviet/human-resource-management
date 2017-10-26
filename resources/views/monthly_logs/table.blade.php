<table class="table table-responsive" id="monthlyLogs-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Month Year</th>
        <th>Overtime Hours</th>
        <th>Days Off</th>
        <th>Total Base Salary</th>
        <th>Over Salary</th>
        <th>Reward</th>
        <th>Total Salary</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($monthlyLogs as $monthlyLog)
        <tr>
            <td>{!! $monthlyLog->user_id !!}</td>
            <td>{!! $monthlyLog->month_year !!}</td>
            <td>{!! $monthlyLog->overtime_hours !!}</td>
            <td>{!! $monthlyLog->days_off !!}</td>
            <td>{!! $monthlyLog->total_base_salary !!}</td>
            <td>{!! $monthlyLog->over_salary !!}</td>
            <td>{!! $monthlyLog->reward !!}</td>
            <td>{!! $monthlyLog->total_salary !!}</td>
            <td>
                {!! Form::open(['route' => ['monthlyLogs.destroy', $monthlyLog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('monthlyLogs.show', [$monthlyLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('monthlyLogs.edit', [$monthlyLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>