<table class="table table-responsive" id="levels-table">
    <thead>
        <tr>
            <th>Level</th>
        <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($levels as $level)
        <tr>
            <td>{!! $level->level !!}</td>
            <td>{!! $level->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.levels.destroy', $level->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.levels.show', [$level->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.levels.edit', [$level->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>