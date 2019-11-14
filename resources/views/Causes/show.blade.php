@extends ('layouts.app')

@section('content')



{{-- <a href="/causes/{{$cause->id}}/edit" class="btn btn btn-warning">Edit</a> --}}

<a href="/causes" class="btn btn-sm btn-info ml-3"><i class="fas fa-arrow-left"></i></a>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
                    <div class="card-header text-center my-cause">Title:{{$cause->title}}</div>

                <div class="card-body text-center">
                    <div class="row">
                                <div class="col-md-4 col-sm-4">
                                <img style="width:100%" src="/storage/cause_images/{{$cause->cause_image}}">
                                </div>






                        {{-- <img style="width:100%" height="" src="/storage/cause_images/{{$cause->cause_image}}"> --}}


                        <div class="col-md-8 col-sm-8">
                            <div class="card-text" style="font-weight:bold">

                                <strong>Description:</strong>{!!$cause->description!!}

                            </div>
                            <div class="card-text text-center" style="font-weight:bold">

                                Location:{{$cause->location}}

                            </div>

                            <div class="card-text text-center" style="font-weight:bold">
                                    Due Date: {{$cause->Due_Date}}
                            </div>


                            <div class="card-text text-center" style="font-weight:bold">
                                    <small>Written on {{$cause->created_at}} by {{$cause->creator->name}}</small>
                            </div>

                    </div>
                </div>
            </div>
        </div>

                @if(!Auth::guest())
                @if(Auth::user()->id == $cause->user_id)
            <a href="/causes/{{$cause->id}}/edit" class="btn btn-sm btn-info mt-5 text-center">Edit</a>

            {!!Form::open(['action' => ['CauseController@destroy', $cause->id], 'method' => 'POST', 'class' => "float-right"])!!}

                {{Form::hidden('_method', 'DELETE')}}
                {{Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit','class'=> 'btn btn-sm btn-outline-danger mt-5'])}}

    </div>
</div>





                {!!Form::close()!!}
@endif
@endif







{{-- <h1>{{$cause->title}}</h1>


<div>
    {!!$cause->description!!}
</div>
<hr>
<small>Written on {{$cause->created_at}}</small>
<hr> --}}







@endsection
