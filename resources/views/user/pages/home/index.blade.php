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
                                    <div class="price">Rp 40.000</div>
                                    <p>Membangun suatu server berdasarkan modul yang diberikan</p>
                                </div>
                            </div>
    
                            <!-- Desain Poster -->
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="icon">
                                        <img src="{{ asset('images/design.png') }}" alt="trophy">
                                    </div>
                                    <h5>Design Poster</h5>
                                    <div class="price">Rp 40.000</div>
                                    <p>Merancang dan mendesain suatu poster yang kreatif berdasarkan tema yang telah di tentukan</p>
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
                                    <p>Menguji kecepatan mengetik menggunakan aplikasi dan kata - kata yang ditentukan</p>
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
                <div class="">
                    <p class="text-capitalize">Mari mengenal dan belajar terkait Linux dan Bahayanya Ransomware bersama para pakar dan ahli di bidangnya.</p>
                    
                    {{-- <p class="text-capitalize">Mari mengenal dan belajar terkait Linux dan Bahayanya Ransomware bersama bapak Ghaly Bayhaqi RM seorang Aktivis Linux Activis & Cyber Security Research dan juga bapak xxxxxxxxx seorang para pakar di bidang xxxxxxxxxx.</p> --}}
                    <a href="#" class="btn-default" onclick="event.preventDefault()">S E G E R A</a>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section id="contact">
        <div class="container">
            
            <div class="row">
                <div class="col-md-6 m-auto">

                    <!-- Header -->
                    <div class="section-header">
                        <div class="section-icon">
                            <img src="{{ asset('images/head.svg') }}" alt="section icon">
                        </div>
                        <h2>Hubungi Kami</h2>
                    </div>
        
                    <!-- Form -->
                    <form action="{{ route('mail.store') }}" method="POST" class="contained-d">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama" name="name">
                            @error('name') <div class="text-danger" style="font-size: 12px">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            @error('email') <div class="text-danger" style="font-size: 12px">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group mt-3">
                            <textarea cols="30" rows="10" class="form-control" placeholder="Konten" name="content"></textarea>
                            @error('content') <div class="text-danger" style="font-size: 12px">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn w-100 btn-default">SEND</button>
                        </div>
                    </form>

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
                <h2>Sponsors</h2>
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
                        <img src="{{ asset('images/sponsors/alkaysan.png') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection