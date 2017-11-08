<!-- School Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('school_id', 'School Id:') !!}
    {!! Form::select('school_id',$schools, null, ['class' => 'form-control']) !!}
</div>

<!-- Department Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department', 'Department:') !!}
    {!! Form::text('department', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.departments.index') !!}" class="btn btn-default">Cancel</a>
</div>
