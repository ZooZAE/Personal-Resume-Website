@extends('layouts.front')

@section('content')
<!-- INTRO -->
<section id="intro">


    <!-- CONTAINER MID -->
    <div class="container-mid">


        <!-- ANIMATION CONTAINER -->
        <div class="animation-container animation-fade-right" data-animation-delay="0">

            <h1>I’m {{ $user->name }} and I program Stuff.</h1>
        </div>
        <!-- /ANIMATION CONTAINER -->
        <!-- ANIMATION CONTAINER -->
        <div class="animation-container animation-fade-right" data-animation-delay="200">
            <a href="#about" class="smooth-scroll">Learn More<div class="circle"><i class="fa fa-angle-down"
                        aria-hidden="true"></i><i class="fa fa-angle-down" aria-hidden="true"></i></div></a>
        </div>
        <!-- /ANIMATION CONTAINER -->

        <div>
            <a href="{{ $user->profile->CV }}" class="pinkBg btns" target="_blank">CV
                <span class="ripple pinkBg"></span>
                <span class="ripple pinkBg"></span>
                <span class="ripple pinkBg"></span>
            </a>
        </div>

    </div>
    <!-- /CONTAINER MID -->

</section>
<!-- /INTRO -->

<!-- ABOUT -->
<section id="about">

    <h3 class="headline scroll-animated">About Me</h3>

    <p class="scroll-animated">{{$user->profile->about}}</p>
    
    <p>Mobile Number: <a href="tel:+961{{ $user->profile->phone }}">+961 {{ $user->profile->phone }}</a></p>
    <p>Email Address: <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>

</section>
<!-- /ABOUT -->

@if ($educations->count() > 0)
<!-- Education -->
<section id="service">


    <h3 class="headline scroll-animated">Education</h3>


    <!-- Education LIST -->
    <ul class="services-list">

        @foreach ($educations as $education)
        <!-- Education ITEM -->
        <li class="service-item scroll-animated">


            <button class="btn btn-primary collapsed" type="button" data-toggle="collapse"
                data-target="#{{ $education->id }}" aria-expanded="false">{{ $education->title }}</button>


            <!-- COLLAPSE CONTENT -->
            <div class="collapse" id="{{ $education->id }}">


                <!-- COLLAPSE CONTENT INNER -->
                <div class="well">

                    <p> {{$education->place_name}}</p>
                    <p> From: {{ date('d, M, Y', strtotime($education->from)) }}&nbsp;&nbsp;&nbsp;&nbsp;To:
                        {{ date('d, M, Y', strtotime($education->to)) }}</p>

                </div>
                <!-- /COLLAPSE CONTENT INNER -->


            </div>
            <!-- /COLLAPSE CONTENT -->


        </li>
        <!-- /Education ITEM -->
        @endforeach
    </ul>
    <!-- /Education LIST -->

</section>
<!-- /Education -->
@else
@endif

@if ($projects->count() > 0)
<!-- Projects -->
<section id="work">


    <h3 class="headline scroll-animated">Latest Projects</h3>


    <!-- SHOWCASE -->
    <div class="showcase">

        @foreach ($projects as $project)
        <!-- ITEM -->
        <div class="item scroll-animated">


            <!-- LIGHTBOX LINK -->
            <a href="#" data-featherlight="#{{ $project->id }}-project">


                <!-- INFO -->
                <div class="info">


                    <!-- CONTAINER MID -->
                    <div class="container-mid">

                        <h5>{{$project->title}}</h5>
                        <p><a href="http://{{$project->url}}">{{$project->url}}</a></p>

                    </div>
                    <!-- /CONTAINER MID -->


                </div>
                <!-- /INFO -->


                <div class="background-image" style="background-image: url({{ $project->image }})">
                </div>


            </a>
            <!-- /LIGHTBOX LINK -->


            <!-- LIGHTBOX -->
            <div id="{{ $project->id }}-project" class="work-lightbox">


                <img class="img-responsive" src="{{ $project->image }}" alt="image">

                <h3>{{ $project->title }}</h3>
                <p class="subline"><a href="http://{{$project->url}}">{{$project->url}}</a></p>

                <p>{{ $project->description }}</p>

                <p>From: {{ date('d, M, Y', strtotime($project->from)) }}&nbsp;&nbsp;&nbsp;&nbsp;To:
                    {{ date('d, M, Y', strtotime($project->to)) }}</p>


            </div>
            <!-- /LIGHTBOX -->


        </div>
        <!-- /ITEM -->


        @endforeach
    </div>
    <!-- /SHOWCASE -->


</section>
<!-- /Projects -->
@else
@endif

@if ($skills->count() > 0)
<!-- Projects -->
<section id="skills">
    <h3 class="headline scroll-animated">Skills</h3>
    <div class="skill-set container-fluid">
          <ul>
              <div class="row">
                  @foreach ($skills as $skill)
                  <div class="col-md-4">
                    <li class="skill-set__item">
                        <div class="skill-set__icon"><img src="{{ $skill->icon }}" width="25" height="25" alt="{{ $skill->skill }}"></div>
                        <div class="skill-set__detail">
                          <div class="skill-set__meta">
                            <div class="skill-set__name">
                              <h4 class="small-title small-title--skill">{{ $skill->skill }}</h4>
                            </div>
                          </div>
                        </div>
                      </li>
                  </div>
                  @endforeach
              </div>
          </ul>
      </div>
</section>
<!-- /Skills -->
@else
@endif

<!-- Certificates-section -->
@if ($certificates->count() > 0)
<section class="Certificate-section section">
    <h3 class="headline scroll-animated">Certificates</h3>
    <div class="container   ">
        <div class="row">
            <div class="col-sm-12">
                <div class="Certificate-wrapper">
                    @foreach ($certificates as $certificate)
                    <div class="Certificate margin-b-50" style="margin-bottom: 50px">
                        <h4 style="text-transform: uppercase"><b>{{ $certificate->title }}</b></h4>
                        <p>{{ $certificate->description }}</p>
                        <h6 class="font-lite-black margin-t-10">From: {{ date('d, M, Y', strtotime($certificate->from)) }}&nbsp;&nbsp;&nbsp;&nbsp;To:
                            {{ date('d, M, Y', strtotime($certificate->to)) }} </h6>
                    </div><!-- education -->
                    @endforeach
                </div><!-- education-wrapper -->
            </div><!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- container -->
</section>
@else
@endif
<!-- Certificates-section -->

@endsection
