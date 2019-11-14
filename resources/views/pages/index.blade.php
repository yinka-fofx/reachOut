@extends('layouts.app')

{{-- @section('title', 'HomePage') --}}


@section('content')

<!--Hero-->
<div class="onTheImage">
        <div class="container">
                <div class="first-jumbo">
                        <h1 class="title text-white">Better Care and Better world.</h1>
                        <p class="lead">You have a good life, others dont</p>

                        <p class="text-light" style="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a class="btn btn-secondary btn-sm mt-4" href="#" role="button">Learn more</a>
                </div>
         </div>
</div>

{{-- Our mission --}}

<div class="main main-raised">

        <div class="container">
                <div class="section text-center">

                  <div class="features">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="info">
                        <img class="" src="/images/about.png" style="width:400px;" alt="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="info">
                          <h2 class="th mt-5" style="font-family: 'McLaren', cursive; color:green" >Our Mission</h4>
                            <hr class="line">
                            <h6 style="font-weight:bold">More people More Impact</h6>
                          <p style="font-size: 15px;">VolunteerMatch is the most effective way to recruit highly qualified volunteers for your nonprofit. We match you with people who are passionate about and committed to your cause, and who can help when and where you need them.              </p>
                         </div>
                      </div>

                    </div>
                  </div>
                </div>


                {{-- Cards --}}
                {{-- @if(count($causes) > 0) --}}

            <h3 class="text-center join">Join a cause</h3>


            <div class="container">
                    <div class="row">
                    @foreach($causes as $cause)
                        <div class="col-sm-12 col-md-4 col-lg-4 mt-4">
                            <div class="card">
                                <img class="card-img-top" style="width:100%" src="/storage/cause_images/{{$cause->cause_image}}">

                                <div class="card-block">
                                <h3>Title:<a style="color:black" href="/causes">{{$cause->title}}</a></h3>
                                {{-- <h4 class="card-title">Posted by:{{$cause->title}}</h4> --}}
                                    <div class="meta"></div>
                                    <hr>
                                    <div class="card-text pb-2" style="border-bottom: solid 1px rgba(102, 100, 100, 0.521);">
                                            Description: {{$cause->description}}
                                    </div>

                                    <div class="card-text pb-2" style="border-bottom: solid 1px rgba(102, 100, 100, 0.521);">
                                            Location: {{$cause->location}}
                                    </div>

                                    <div class="card-text pb-2" style="border-bottom: solid 1px rgba(102, 100, 100, 0.521);">
                                            Due_Date: {{$cause->Due_Date}}
                                    </div>

                                    <div class="card-text pb-2" style="border-bottom: solid 1px rgba(102, 100, 100, 0.521);">
                                            Status: {{$cause->Active == 1 ? "Completed" : "Active"}}
                                    </div>

                                    <div class="card-text pb-2" style="border-bottom: solid 1px rgba(102, 100, 100, 0.521);">
                                            Posted by: {{$cause->creator->name}}
                                    </div>
                                    <div class="row ">

                                            <div class="col-md-6 card-text pb-2" style="border-bottom: solid 1px rgba(102, 100, 100, 0.521);">3 <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                            </div>

                                            <div class="col-md-6 card-text pb-2" style="border-bottom: solid 1px rgba(102, 100, 100, 0.521);"><i class="fa fa-comments-o"></i>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            @endforeach
                    </div>
                </div>

                {{-- Contact us --}}



                <div class="section section-contacts">
                        <div class="row">
                          <div class="col-md-8 ml-auto mr-auto">
                            <h2 class="text-center title join mt-4">Work with us</h2>
                            <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>


                            <form class="contact-form py-5" method="POST" action="/contact">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <h4><label class="bmd-label-floating">Your Name</label></h4>
                                    <input type="name" name="name" class="form-control">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <h4><label class="bmd-label-floating">Your Email</label></h4>
                                    <input type="email" name="email" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                               <h4><label for="exampleMessage" class="bmd-label-floating">Your Message</label></h4>
                                <textarea type="text" class="form-control" name="YourMessage" rows="4" id="exampleMessage"></textarea>
                              </div>
                              <div class="row">
                                <div class="col-md-4 ml-auto mr-auto text-center">
                                  <button class="btn btn-sm btn-raised">
                                    Send Message
                                  </button>
                                </div>
                              </div>
                              @csrf
                            </form>


                          </div>
                        </div>
                      </div>







    </div>


</div>

    <!--Hero-->

     <!---Our mission-->
    {{-- <div class="mission">
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

</div> --}}

    <!---Our mission-->


{{-- <div class="page-header header-filter bg-img" data-parallax="true" style="background-image: url('/images/bg.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Better Care and Better world.</h1>
          <h4>To Controversies to which the State may be chosen every second Year. The Congress, whenever two
            thirds of the Members of the Senate shall, in the several States. And if Vacancies happen by
            Resignation, or otherwise, during the Session of their    <br>
          <a  class="btn red btn-lg" style="background: green;">
            <i class="large material-icons">info</i> About Us
          </a>
        </div>
      </div>
    </div>
  </div> --}}



@include('layouts.footer')
@endsection


