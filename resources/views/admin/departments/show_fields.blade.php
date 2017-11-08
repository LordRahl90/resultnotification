<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $department->id !!}</p>
</div>

<!-- School Id Field -->
<div class="form-group">
    {!! Form::label('school_id', 'School Id:') !!}
    <p>{!! $department->school_id !!}</p>
</div>

<!-- Department Field -->
<div class="form-group">
    {!! Form::label('department', 'Department:') !!}
    <p>{!! $department->department !!}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $department->slug !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $department->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $department->updated_at !!}</p>
</div>

