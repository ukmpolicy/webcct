@extends('user.layouts.index')

@section('content')

    <!-- Header -->
    <header id="header" style="background-image: url({{ asset('images/278042.png') }});">
        <div class="container">
            <h1>Cyber Competition And Talkshow</h1>
            <p class="container-d">Mengembangkan Potensi Masyarakat Dalam Menghadapi Era Digital Bersama Linux</p>
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
                <h2>Tentang</h2>
            </div>

            <div class="row mt-5 container-d">

                <!-- About -->
                <div class="col-md-6">
                    <p class="">Cyber Competition And Talkshow adalah suatu acara besar yang diadakan oleh Unit Kegiatan Mahasiswa Polytechnic Linux Community. Acara ini bermaksud untuk memasyarakat linux melalui ajang perlombaan dan talkshow.</p>
                </div>

                <!-- Rundown -->
                <div class="col-md-6">
                    <div class="events row">
                        <div class="col-md-6">

                            <!-- Typing Speed -->
                            <div class="event">
                                <div class="name"><i class="far fa-circle small fa-fw"></i> Typing Speed</div>
                                <div class="date">
                                    <i class="far fa-calendar-alt fa-fw"></i> <span>04 Maret 2022</span> 
                                    <i class="far fa-clock fa-fw"></i> <span>15.00 - 17.00</span>
                                </div>
                            </div>

                            <!-- Design Poster -->
                            <div class="event">
                                <div class="name"><i class="far fa-circle small fa-fw"></i> Design Poster</div>
                                <div class="date">
                                    <i class="far fa-calendar-alt fa-fw"></i> <span>05 Maret 2022</span> 
                                    <i class="far fa-clock fa-fw"></i> <span>09.00 - 12.00</span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <!-- Linux Server -->
                            <div class="event">
                                <div class="name"><i class="far fa-circle small fa-fw"></i> Linux Server</div>
                                <div class="date">
                                    <i class="far fa-calendar-alt fa-fw"></i> <span>05 Maret 2022</span> 
                                    <i class="far fa-clock fa-fw"></i> <span>14.00 - 17.00</span>
                                </div>
                            </div>

                            <!-- Talkshow -->
                            <div class="event">
                                <div class="name"><i class="far fa-circle small fa-fw"></i> Talkshow</div>
                                <div class="date">
                                    <i class="far fa-calendar-alt fa-fw"></i> <span>06 Maret 2022</span> 
                                    <i class="far fa-clock fa-fw"></i> <span>08.00 - 12.00</span>
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
                        <p>Saatnya anda menunjukan kompetensi yang anda miliki melalui ajang perlombaan yang sangat luar biasa. Dirancang oleh para ahli pada bidangnya dengan harga pendaftaran yang terjangkau. Anda juga dapat mengikuti acara Talkshow secara langsung.</p>
                        <h4 class="mb-3">Rp 25.000</h4>
                        <a href="{{ route('registration.competition') }}" class="btn-default">DAFTARKAN SEKARANG</a>
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
                                    <p class="mt-2">Membangun suatu server berdasarkan modul yang diberikan</p>
                                </div>
                            </div>
    
                            <!-- Desain Poster -->
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="icon">
                                        <img src="{{ asset('images/design.png') }}" alt="trophy">
                                    </div>
                                    <h5>Design Poster</h5>
                                    <p class="mt-2">Merancang dan mendesain suatu poster yang kreatif berdasarkan tema yang telah di tentukan</p>
                                </div>
                            </div>
    
                            <!-- Typing Speed -->
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="icon">
                                        <img src="{{ asset('images/typing.png') }}" alt="trophy">
                                    </div>
                                    <h5>Typing Speed</h5>
                                    <p class="mt-2">Menguji kecepatan mengetik menggunakan aplikasi dan kata - kata yang ditentukan</p>
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

                {{-- <div class="speaker">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="avatar">
                                <img src="{{ asset('images/speaker/utian.jpeg') }}" style="left: 0px;top:0;" alt="Utian Ayuba">
                            </div>
                            <div class="name">Utian Ayuba</div>
                            <div class="labels">
                                <div>Former Developer Linux Blankon OS</div>
                                <div>Coordinator Cloud Computing</div>
                                <div>CEO PT. Boer Technology</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="avatar text-center">
                                <img src="{{ asset('images/speaker/zaki.jpeg') }}" style="left: 0;top:0;" alt="Zaki Akhyar">
                            </div>
                            <div class="name">Utian Ayuba</div>
                            <div class="labels">
                                <div>Former Developer Linux Blankon OS</div>
                                <div>Coordinator Cloud Computing</div>
                                <div>CEO PT. Boer Technology</div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                
                <!-- Promot Talkshow -->        
                <div class="text">
                    <p class="text-capitalize">Mari mengenal dan belajar lebih jauh dengan Cloud Computing dan pemanfaatannya dalam membangun Startup Unicorn, bersama Bapak Utian Ayuba (Mantan Pengembangan Blackon OS, Coordinator Asosiasi Cloud Computing dan Pendiri PT. Boer Technology) dan Bapak Zaki Akhyar (System Administator) yang berperan sebagai moderator.</p>
                    <a href="{{ route('registration.talkshow') }}" class="btn-default" >DAFTAR SEKARANG</a>
                </div>

            </div>
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
                <h2>Sponsored By</h2>
            </div>

            <!-- Sponsors -->
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('images/sponsors/long_story.png') }}" alt="Long Story">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('images/sponsors/esalfia.png') }}" alt="Esalfia">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('images/sponsors/auliya_computer.png') }}" alt="Aulia Komputer">
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection