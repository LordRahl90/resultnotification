<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/11/2017
 * Time: 3:44 PM
 */
?>
@extends("layouts.app")
@section('content')
    <section class="content-header">
        <h1>
            Upload Result
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.resultProcessings.upload','files'=>'true']) !!}

                    <div class="form-group col-sm-12">
                        {!! Form::label('session_id', 'Session:') !!}
                        {!! Form::select('session_id',$sessions, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('semester_id', 'Semester:') !!}
                        {!! Form::select('semester_id',$semester, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('course_id', 'Course:') !!}
                        {!! Form::select('course_id',$courses, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('level_id', 'Select Level:') !!}
                        {!! Form::select('level_id',$levels, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('scores', 'scores:') !!}
                        {!! Form::file('scores') !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('admin.resultProcessings.index') !!}" class="btn btn-default">Cancel</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
