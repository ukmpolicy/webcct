@extends('user.layouts.index')

@section('content')

    <!-- Header -->
    <header id="header" style="background-image: url({{ asset('images/278042.png') }});">
        <div class="container">
            <h1>Cyber Competition And Talkshow</h1>
            <p class="container-d">Mengembangkan Potensi Local Dalam Menghadapi Era Digital Bersama Linux</p>
        </div>
    </header>

    <!-- About -->
    <section id="about">
        <div class="container">

            <!-- Header -->
            <div class="section-header">
                <div class="section-icon">
                    <img src="{{ asset('images/head.svg') }}" alt="section icon">
                </div>
                <h2>About</h2>
            </div>

            <div class="row mt-5 container-d">

                <!-- About -->
                <div class="col-md-6">
                    <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus magnam minus dicta esse reiciendis saepe tempora temporibus quod, veniam voluptate quisquam, ducimus harum quia dolores voluptates architecto! Blanditiis, exercitationem voluptatibus?</p>
                </div>

                <!-- Rundown -->
                <div class="col-md-6">
                    <div class="events row">
                        <div class="col-md-6">

                            <!-- Typing Speed -->
                            <div class="event">
                                <div class="name"><i class="far fa-circle small fa-fw"></i> Typing Speed</div>
                                <div class="date">
                                    <i class="far fa-calendar-alt fa-fw"></i> <span>04 March 2022</span> 
                                    <i class="far fa-clock fa-fw"></i> <span>09.00 - 12.00</span>
                                </div>
                            </div>

                            <!-- Design Poster -->
                            <div class="event">
                                <div class="name"><i class="far fa-circle small fa-fw"></i> Design Poster</div>
                                <div class="date">
                                    <i class="far fa-calendar-alt fa-fw"></i> <span>05 March 2022</span> 
                                    <i class="far fa-clock fa-fw"></i> <span>09.00 - 12.00</span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <!-- Linux Server -->
                            <div class="event">
                                <div class="name"><i class="far fa-circle small fa-fw"></i> Linux Server</div>
                                <div class="date">
                                    <i class="far fa-calendar-alt fa-fw"></i> <span>04 March 2022</span> 
                                    <i class="far fa-clock fa-fw"></i> <span>14.00 - 17.00</span>
                                </div>
                            </div>

                            <!-- Talkshow -->
                            <div class="event">
                                <div class="name"><i class="far fa-circle small fa-fw"></i> Talkshow</div>
                                <div class="date">
                                    <i class="far fa-calendar-alt fa-fw"></i> <span>06 March 2022</span> 
                                    <i class="far fa-clock fa-fw"></i> <span>09.00 - 12.00</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <!-- Competition -->
    <section id="competition">
        <div class="container">
            <div class="container-d">
                
                <!-- Header -->
                <div class="section-header">
                    <div class="section-icon">
                        <img src="{{ asset('images/head.svg') }}" alt="section icon">
                    </div>
                    <h2>Competition</h2>
                </div>
    
                <div class="row">
                    <!-- About -->
                    <div class="col-md-4 pt-1 pb-3">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat ipsa illum adipisci ea vitae, ratione minus impedit repudiandae quae ipsum nam quos laboriosam fuga doloremque numquam earum reiciendis. Consectetur, provident!</p>
                        <a href="{{ route('registration.competition') }}" class="btn-default">Register Now</a>
                    </div>
    
                    <!-- Competitions -->
                    <div class="col-md-8">
                        <div class="row">
    
                            <!-- Linux Server -->
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="icon">
                                        <img src="{{ asset('images/server.png') }}" alt="trophy">
                                    </div>
                                    <h5>Linux Server</h5>
                                    <div class="price">Rp 30.000</div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum, explicabo!</p>
                                </div>
                            </div>
    
                            <!-- Desain Poster -->
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="icon">
                                        <img src="{{ asset('images/design.png') }}" alt="trophy">
                                    </div>
                                    <h5>Desain Poster</h5>
                                    <div class="price">Rp 30.000</div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum, explicabo!</p>
                                </div>
                            </div>
    
                            <!-- Typing Speed -->
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="icon">
                                        <img src="{{ asset('images/typing.png') }}" alt="trophy">
                                    </div>
                                    <h5>Typing Speed</h5>
                                    <div class="price">Rp 30.000</div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum, explicabo!</p>
                                </div>
                            </div>
    
                        </div>
                    </div>
    
                </div>

            </div>
        </div>
    </section>

    <!-- Talkshow -->
    <section id="talkshow">
        <div class="inner-bg">
            <div class="container">

                <!-- Header -->
                <div class="section-header">
                    <div class="section-icon">
                        <img src="{{ asset('images/head.svg') }}" alt="section icon">
                    </div>
                    <h2>Talkshow</h2>
                </div>
                
                <!-- Promot Talkshow -->
                <div class="containter-d">
                    <p class="text-capitalize">Lorem ipsum dolor sit amet consectetur adipisicing elit Saepe soluta repellendus nemo voluptatibus commodi facilis</p>
                    <a href="" class="btn-default">Register Now</a>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section id="contact">
        <div class="container">
            
            <!-- Header -->
            <div class="section-header">
                <div class="section-icon">
                    <img src="{{ asset('images/head.svg') }}" alt="section icon">
                </div>
                <h2>Contact</h2>
            </div>

            <!-- Form -->
            <form action="" class="contained-d">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group mt-3">
                    <textarea cols="30" rows="10" class="form-control" placeholder="Content"></textarea>
                </div>
                <div class="form-group mt-3">
                    <button class="btn w-100 btn-default">SEND</button>
                </div>
            </form>

        </div>
    </section>

    <!-- Sponsor -->
    <section id="sponsor">
        <div class="container">

            <!-- Header -->
            <div class="section-header">
                <div class="section-icon">
                    <img src="{{ asset('images/head.svg') }}" alt="section icon">
                </div>
                <h2>Sponsors</h2>
            </div>

            <!-- Sponsors -->
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('images/logo_policy.png') }}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('images/logo_policy.png') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection