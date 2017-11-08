<table class="table table-responsive" id="schoolSessions-table">
    <thead>
        <tr>
            <th>Session Name</th>
        <th>Active</th>
        <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($schoolSessions as $schoolSession)
        <tr>
            <td>{!! $schoolSession->session_name !!}</td>
            <td>{!! $schoolSession->active !!}</td>
            <td>{!! $schoolSession->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.schoolSessions.destroy', $schoolSession->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.schoolSessions.show', [$schoolSession->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.schoolSessions.edit', [$schoolSession->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>