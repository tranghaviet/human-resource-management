<li class="{{ Request::is('departments*') ? 'active' : '' }}">
    <a href="{!! route('departments.index') !!}"><i class="fa fa-edit"></i><span>Departments</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('monthlyLogs*') ? 'active' : '' }}">
    <a href="{!! route('monthlyLogs.index') !!}"><i class="fa fa-edit"></i><span>Monthly Logs</span></a>
</li>

<li class="{{ Request::is('dailyLogs*') ? 'active' : '' }}">
    <a href="{!! route('dailyLogs.index') !!}"><i class="fa fa-edit"></i><span>Daily Logs</span></a>
</li>

