@extends('layouts.app')

@section('content')


    <div class="wrapper">
        <div class="opacity">
            <div class="container-fluid row justify-content-center">
                    <div class="card-header text-white">Welcome {{(Auth::user()->name)}}</div>

                <div class="col-md-8 mt-5">
                    <div class="card text-white bordered dashboard">

                    {{-- <div class="card-header">You have {{$cause->count()}}</div> --}}

                <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h3 style="text-weight:large">Your Causes</h3>
                            <hr style="border:2px">


                            @if(count($causes) > 0)

                            {{-- {{ Auth::user()->causes }} --}}
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Causes created</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Causes Followed</a>
                                </li>
                          </ul>

                          <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-white">Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($causes as $cause)

                                                <tr>
                                                    <td class="text-white">{{$cause->title}}</td>
                                                    {{-- <td><a href="/causes/{{$cause->id}}/edit" class="btn btn-sm btn-warning mt-5 text-center">Edit</a></td> --}}
                                                    <td><a href="/causes/{{$cause->id}}/edit" class="btn btn-sm btn-outline-danger float-right ml-5">Edit</a></td>
                                                    <td scope="col">
                                                              {!!Form::open(['action' => ['CauseController@destroy', $cause->id],'class' => "float-right"])!!}
                                                              {{Form::hidden('_method', 'DELETE')}}
                                                              {{Form::button('<i class="fa fa-trash"></i>', ['type'=>'submit','class'=> 'btn btn-sm btn-outline-danger',])}}
                                                              {!!Form::close()!!}


                                                    </td>
                                                </tr>

                                            @endforeach

                                    </tbody>
                                </table>
            </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                  <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-white">Title</th>
                                            <th class="text-white">Location</th>
                                            <th class="text-white">Status</th>
                                            {{-- <th class="text-white">Title</th> --}}


                                        </tr>
                                    </thead>
                                    <tbody>
                                            {{ Auth::user()->$causes }}
                                            @foreach (Auth::user()->causes as $cause)

                                                <tr>
                                                    <td class="text-white">{{ $cause->title }}</td>
                                                    <td class="text-white">{{ $cause->location }}</td>
                                                    <td class="text-white">{{$cause->Active == 1 ? "Active" : "Completed"}}</td>



                                                    {{-- <td class="text-white">{{ Auth::user()->causes[0]->location }}</td> --}}

                                                    {{-- <td class="text-white">{{ Auth::user()->causes[0]->Active }}</td> --}}



                                                    {{-- <td scope="col"><a href="/causes/{{$cause->id}}/edit" class="btn btn-sm btn-outline-danger float-right ml-5">Edit</a></td> --}}
                                                    <td scope="col">
                                                                    {{-- {!!Form::open(['action' => ['CauseController@destroy', $cause->id],'class' => "float-right"])!!}
                                                                    {{Form::hidden('_method', 'DELETE')}}
                                                                    {{Form::submit('Delete', ['class'=> 'btn btn-sm btn-outline-danger'])}} --}}
                                                                    {!!Form::close()!!}
                                                    </td>
                                                </tr>

                                            @endforeach




                                    </tbody>
                                </table>
            </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                              </div>

                                  @else
                                        <p>You have no causes available</p>
                                @endif



                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
