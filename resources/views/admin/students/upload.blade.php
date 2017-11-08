<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/11/2017
 * Time: 12:55 PM
 */

?>
@extends("layouts.app")
@section("content")
    <section class="content-header">
        <h1>
            Upload Student
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.students.upload', 'files'=>'true']) !!}

                    <div class="form-group col-sm-6">
                        {!! Form::label('students', 'Select Student file:') !!}
                        {!! Form::file('students') !!}
                    </div>


                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('admin.students.index') !!}" class="btn btn-default">Cancel</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection