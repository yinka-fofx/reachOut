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

                                        <td scope="col"><a href="/causes/{{$cause->id}}/edit" class="btn btn-sm btn-outline-danger float-right ml-5">Edit</a></td>
                                        <td scope="col">
                                                        {!!Form::open(['action' => ['CauseController@destroy', $cause->id],'class' => "float-right"])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::submit('Delete', ['class'=> 'btn btn-sm btn-outline-danger'])}}
                                                        {!!Form::close()!!}
                                        </td>
                                    </tr>

                                @endforeach




                        </tbody>
                    </table>

                                  @else
                                        <p>You have no causes available</p>
                                @endif



                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
