@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Result Processing
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($resultProcessing, ['route' => ['admin.resultProcessings.update', $resultProcessing->id], 'method' => 'patch']) !!}

                        @include('admin.result_processings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection