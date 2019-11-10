@extends('layouts.app')

{{-- @section('title', 'HomePage') --}}


@section('content')



<!--Hero-->
<div class="onTheImage">
    <div class="container">
            <div class="first-jumbo">
                    <h2 class="display-4 mb-1 text-light">Better care Better World</h2>
                    <p class="lead">You have a good life, others dont</p>

                    <p class="text-light" style="font-size:20px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a class="btn btn-secondary btn-lg mt-4" href="#" role="button">Learn more</a>
            </div>
    </div>

</div>
<!--Hero-->

 <!---Our mission-->
<div class="mission">
        <h6 class=" text-center display-4 m-0 p-0 mt-3" style="font-family: 'McLaren', cursive;">Our Mission</h6>
        <hr class="bbn" style="width: 150px," >


<div class="row mt-3 px-4">
      <div class="col-md-6 col-sm-12">
          <img src='images/roman-synkevych-5wJ2GiYSifA-unsplash.jpg' alt="" width="100%" height="auto">
      </div>

      <div class="col-md-6 col-sm-12 mission px-5">
              <h1>More people More Impact</h1>
              <p class="text-lg">
                  VolunteerMatch is the most effective way to recruit highly qualified volunteers for your nonprofit. We match you with people who are passionate about and committed to your cause, and who can help when and where you need them.
              </p>
              <p class="text-lg">
                  And because volunteers are often donors as well, we make it easy for them to contribute their time.
              </p>
      </div>


</div>

<!---Our mission-->




@endsection
