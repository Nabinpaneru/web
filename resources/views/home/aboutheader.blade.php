@extends('frontend.main_master')
@section('main')
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">About me</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About Me</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    <li><img src="{{asset('frontend/img/icons/breadcrumb_icon01.png')}}" alt=""></li>
                    <li><img src="{{asset('frontend/img/icons/breadcrumb_icon02.png')}}" alt=""></li>
                    <li><img src="{{asset('frontend/img/icons/breadcrumb_icon03.png')}}" alt=""></li>
                    <li><img src="{{asset('frontend/img/icons/breadcrumb_icon04.png')}}" alt=""></li>
                    <li><img src="{{asset('frontend/img/icons/breadcrumb_icon05.png')}}" alt=""></li>
                    <li><img src="{{asset('frontend/img/icons/breadcrumb_icon06.png')}}" alt=""></li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- about-area -->
        <section class="about about__style__two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about__image">
                            <img src={{asset('aboutpageimg/'.$aboutpage->about_image)}} alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <div class="section__title">
                                <span class="sub-title">01 - About me</span>
                                <h2 class="title">{{ $aboutpage->tittle }}</h2>
                            </div>
                            <div class="about__exp">
                                <div class="about__exp__icon">
                                    <img src="assets/img/icons/about_icon.png" alt="">
                                </div>
                                <div class="about__exp__content">
                                    <p><span>{{ $aboutpage->short_tittle }}</p>
                                </div>
                            </div>
                            <p class="desc">{{ $aboutpage->short_description }}</p>
                            <a href="about.html" class="btn">Download my resume</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="about__info__wrap">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="about-tab" data-bs-toggle="tab"
                                        data-bs-target="#about" type="button" role="tab" aria-controls="about"
                                        aria-selected="true">About</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills"
                                        type="button" role="tab" aria-controls="skills"
                                        aria-selected="false">Skills</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="awards-tab" data-bs-toggle="tab" data-bs-target="#awards"
                                        type="button" role="tab" aria-controls="awards"
                                        aria-selected="false">awards</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="education-tab" data-bs-toggle="tab"
                                        data-bs-target="#education" type="button" role="tab" aria-controls="education"
                                        aria-selected="false">education</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="about" role="tabpanel"
                                    aria-labelledby="about-tab">
                                    <p class="desc">{{ $aboutpage->long_description}}</p>
                                    <ul class="about__exp__list">
                                      
                                        
                                       
                                    </ul>
                                </div>
                               
                                </div>
                               
                                
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- services-area -->
        
        <!-- services-area-end -->

        <!-- testimonial-area -->
       
        <!-- testimonial-area-end -->

        <!-- blog-area -->
       
        <!-- blog-area-end -->

        <!-- contact-area -->
        
        <!-- contact-area-end -->

    </main>
@endsection
