<table class="table table-responsive" id="monthlyLogs-table">
    <thead>
        <tr>
            <th>User</th>
            <th>Time</th>
            <th>Overtime Hours</th>
            <th>Days Off</th>
            <th>Total Base Salary</th>
            <th>Over Salary</th>
            <th>Reward</th>
            <th>Total Salary</th>
            @if(Auth::user()->hasRole('admin'))
                <th colspan="3">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
    @foreach($monthlyLogs as $monthlyLog)
        <tr>
            <td>{!! $monthlyLog->user['name'] !!}</td>
            <td>{!! $monthlyLog->date->format('Y F') !!}</td>
            <td>{!! $monthlyLog->overtime_hours !!}</td>
            <td>{!! $monthlyLog->days_off !!}</td>
            <td>{!! $monthlyLog->total_base_salary !!}</td>
            <td>{!! $monthlyLog->over_salary !!}</td>
            <td>{!! $monthlyLog->reward !!}</td>
            <td>{!! $monthlyLog->total_salary !!}</td>
            @if(Auth::user()->hasRole('admin'))
                <td>
                    {!! Form::open(['route' => ['monthlyLogs.destroy', $monthlyLog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('monthlyLogs.show', [$monthlyLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('monthlyLogs.edit', [$monthlyLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
