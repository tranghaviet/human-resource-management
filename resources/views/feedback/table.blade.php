<table class="table table-responsive" id="feedback-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Content</th>
        <th>Reply</th>
        <th>Is Resolved</th>
        <th>Replied User Id</th>
        <th>Replied At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($feedback as $feedback)
        <tr>
            <td>{!! $feedback->user_id !!}</td>
            <td>{!! $feedback->content !!}</td>
            <td>{!! $feedback->reply !!}</td>
            <td>{!! $feedback->is_resolved !!}</td>
            <td>{!! $feedback->replied_user_id !!}</td>
            <td>{!! $feedback->replied_at !!}</td>
            <td>
                {!! Form::open(['route' => ['feedback.destroy', $feedback->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('feedback.show', [$feedback->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('feedback.edit', [$feedback->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>