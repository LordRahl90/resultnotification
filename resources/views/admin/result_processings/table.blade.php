<table class="table table-responsive" id="resultProcessings-table">
    <thead>
        <tr>
            <th>Session Id</th>
        <th>Semester Id</th>
        <th>Course Id</th>
        <th>Level Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($resultProcessings as $resultProcessing)
        <tr>
            <td>{!! $resultProcessing->session_id !!}</td>
            <td>{!! $resultProcessing->semester_id !!}</td>
            <td>{!! $resultProcessing->course_id !!}</td>
            <td>{!! $resultProcessing->level_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.resultProcessings.destroy', $resultProcessing->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.resultProcessings.show', [$resultProcessing->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.resultProcessings.edit', [$resultProcessing->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>