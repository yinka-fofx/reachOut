@extends ('layouts.app')

@section('content')

@if(session('success'))

<div class="alert alert-success my-3">
    {{session('success')}}
</div>
@endif

{{-- <h3 class="text-center">Causes</h3>


    <div class="container">
        <div class="jumbotron">
        <h3><a href="/causes/{{$cause->id}}">{{$cause->title}}</a></h3>
        <small>Written on {{$cause->created_at}}</small>
        </div>
    </div> --}}


        @if(count($causes) > 0)
        @foreach($causes as $cause)
    <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card mt-4">
                        <div class="card-header text-center my-cause">Causes</div>

                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/cause_images/{{$cause->cause_image}}">
                            </div>

                            <div class="col-md-8 col-sm-8">

                                    <h3><a href="/causes/{{$cause->id}}" style="font-weight:bold; color:grey">{{$cause->title}}</a> </h3>
                                    <div class="card-text" style="font-weight:bold">
                                            Location: {{$cause->location}}
                                     </div>
                                     <div class="card-text "style="font-weight:bold">
                                            Due Date: {{$cause->Due_Date}}
                                     </div>
                                     <div class="card-text" style="font-weight:bold">
                                            Status: {{$cause->Active == 1 ? "Completed" : "Active"}}
                                     </div>

                                     <div class="card-text" style="font-weight:bold">
                                            <small>Posted {{$cause->created_at->diffForHumans()}} by {{$cause->creator->name}}</small>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6 mt-2">
                                            <like-component :cause="{{ json_encode($cause) }}"></like-component>
                                        </div>

                                        <div class="col-md-6 mb-5">
                                            <follow-component :cause="{{ json_encode($cause) }}"></follow-component>

                                        </div>


                                    </div>





                            </div>
                        </div>



                    </div>

                    </div>

            </div>

    </div>
    @endforeach

        <div class="container d-flex justify-content-center mt-5" style="color:black">
            {{$causes->links()}}
        </div>
    @else
        <div class="card">
            <div class="container card-text">
            <p>No Post found</p>
            </div>
        </div>

    @endif
    @endsection
