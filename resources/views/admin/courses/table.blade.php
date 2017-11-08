<table class="table table-responsive" id="courses-table">
    <thead>
        <tr>
            <th>Course Code</th>
        <th>Course Name</th>
        <th>Course Unit</th>
        <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr>
            <td>{!! $course->course_code !!}</td>
            <td>{!! $course->course_name !!}</td>
            <td>{!! $course->course_unit !!}</td>
            <td>{!! $course->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.courses.destroy', $course->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.courses.show', [$course->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.courses.edit', [$course->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>