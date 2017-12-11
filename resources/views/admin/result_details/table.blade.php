<table class="table table-responsive" id="resultDetails-table">
    <thead>
        <tr>
            <th>Result Process Id</th>
        <th>Student Id</th>
        <th>Score</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($resultDetails as $resultDetail)
        <tr>
            <td>{!! $resultDetail->result_process_id !!}</td>
            <td>{!! $resultDetail->student_id !!}</td>
            <td>{!! $resultDetail->score !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.resultDetails.destroy', $resultDetail->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.resultDetails.show', [$resultDetail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.resultDetails.edit', [$resultDetail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>