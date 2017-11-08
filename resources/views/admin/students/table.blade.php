<table class="table table-responsive" id="students-table">
    <thead>
        <tr>
            <th>Matric No</th>
        <th>Surname</th>
        <th>Other Names</th>
        <th>Email</th>
        <th>Phone</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{!! $student->matric_no !!}</td>
            <td>{!! $student->surname !!}</td>
            <td>{!! $student->other_names !!}</td>
            <td>{!! $student->email !!}</td>
            <td>{!! $student->phone !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.students.destroy', $student->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.students.show', [$student->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.students.edit', [$student->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>