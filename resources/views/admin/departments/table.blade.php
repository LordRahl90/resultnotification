<table class="table table-responsive" id="departments-table">
    <thead>
        <tr>
            <th>School Id</th>
        <th>Department</th>
        <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($departments as $department)
        <tr>
            <td>{!! $department->school_id !!}</td>
            <td>{!! $department->department !!}</td>
            <td>{!! $department->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.departments.destroy', $department->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.departments.show', [$department->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.departments.edit', [$department->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>