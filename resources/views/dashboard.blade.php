@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            <h3>Your Causes</h3>


                        @if(count($causes) > 0)
                            <table class="table table-striped">
                                    <thead>
                                      <tr>

                                        <th scope="col">Title</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                      </tr>
                                </thead>
                                <tbody>
                                      @foreach ($causes as $cause)

                                      <tr>
                                      <td scope="col">{{$cause->title}}</td>
                                      <td scope="col"><a href="/causes/{{$cause->id}}/edit" class="btn btn-outline-danger float-right ml-5">Edit</a></td>
                                                <td scope="col">
                                                        {!!Form::open(['action' => ['CauseController@destroy', $cause->id], 'method' => 'POST', 'class' => "float-right"])!!}

                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}

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
