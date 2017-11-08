<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $course->id !!}</p>
</div>

<!-- Course Code Field -->
<div class="form-group">
    {!! Form::label('course_code', 'Course Code:') !!}
    <p>{!! $course->course_code !!}</p>
</div>

<!-- Course Name Field -->
<div class="form-group">
    {!! Form::label('course_name', 'Course Name:') !!}
    <p>{!! $course->course_name !!}</p>
</div>

<!-- Course Unit Field -->
<div class="form-group">
    {!! Form::label('course_unit', 'Course Unit:') !!}
    <p>{!! $course->course_unit !!}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $course->slug !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $course->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $course->updated_at !!}</p>
</div>

