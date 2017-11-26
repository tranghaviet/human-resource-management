<!doctype html>
<html>
    <head>
        <title>Human Resource Management</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="content">
            <div class="text-center">
                <h1>Human Resource Management</h1>
                @if (Auth::check())
                    <a href="{{ route('dailyLogs.index') }}">Dashboard</a>
                @else
                    <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
                @endif
            </div>
        </div>
    </body>
</html>
