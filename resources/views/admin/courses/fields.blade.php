<!-- Course Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_code', 'Course Code:') !!}
    {!! Form::text('course_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_name', 'Course Name:') !!}
    {!! Form::text('course_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_unit', 'Course Unit:') !!}
    {!! Form::text('course_unit', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.courses.index') !!}" class="btn btn-default">Cancel</a>
</div>
