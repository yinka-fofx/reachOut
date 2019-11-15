@extends ('layouts.app')

@section('content')


{{-- <h3>Start a Cause</h3> --}}


<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
               <div class="card-header">Start a Cause </div>
                    <div class="card-body">
                            {!! Form::open(['action' => 'CauseController@store', 'enctype'=>'multipart/form-data'])!!}
                            <div class="form-group">
                                {{Form::label('title', 'Title')}}
                                {{Form::text('title', '', ['class'=>'form-control','placeholder'=>'Title', 'required'])}}
                            <div class="text-danger">{{$errors->first('title')}}</div>
                            </div>

                            {{-- <div class="form-group">
                                {{Form::label('description', 'description')}}
                                {{Form::text('description', '', ['class'=>'form-control','placeholder'=>'description'])}}
                            <div class="text-danger">{{$errors->first('title')}}</div>
                            </div> --}}

                            <div class="form-group">
                                    {{Form::label('description', 'Description')}}
                                    {{Form::textarea('description', '', ['class'=>'form-control','placeholder'=>'Body','required'])}}
                                <div class="text-danger">{{$errors->first('description')}}</div>
                             </div>

                             <div class="form-group">
                                    {{Form::label('location', 'Location')}}
                                    {{Form::text('location', '', ['class'=>'form-control','placeholder'=>'location', 'required'])}}
                                <div class="text-danger">{{$errors->first('location')}}</div>
                             </div>

                             <div class="form-group">
                                {{Form::label('Due_Date', 'Due_Date')}}
                                {{Form::date('Due_Date', '', ['class'=>'form-control','placeholder'=>'Due_Date', 'required'])}}
                                <div class="text-danger">{{$errors->first('Due_Date')}}</div>
                            </div>

                             {{-- <div class="form-group m-0">
                                {{Form::label('Image', 'Image')}}
                                {{Form::file('cause_image')}}


                             </div> --}}

                             <div class="form-group">
                                    {{Form::label('Image', 'Image')}}
                                 <input type="file" class="form-control" name="cause_image" style="border:none; ">
                                </label>
                             </div>



                             {{-- <div class="form-group">
                                    {{Form::label('Featured Image', 'Featured Image')}}
                                    {{Form::text('location', '', ['class'=>'form-control','placeholder'=>'location'])}}
                                <div class="text-danger">{{$errors->first('title')}}</div>
                             </div> --}}
                             {{Form::submit('Submit', ['class'=>' btn btn-sm btn-outline-primary my-btn'])}}
                               {!! Form::close() !!}
                    </div>
            </div>
    </div>
</div>





@endsection
