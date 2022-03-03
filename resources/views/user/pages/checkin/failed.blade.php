@extends('user.layouts.index')

@section('content')

    <div class="bg-light py-5">
        <div class="container py-5">
            <div class="row py-3">
                <div class="col-md-5 m-auto">
                    <div class="bg-white rounded p-5 shadow">
                        <h2>Presensi Talkshow</h2>
                        <div class="alert alert-danger">
                            <p class="small">{{ $message }}. Untuk informasi lebih lanjut anda dapat mengunjungi sosial media kami atau dapat menghubungi kontak person berikut:</p>
                            <ul class="small">
                                <li>Ayatullah R. K. : 0822-7780-0517</li>
                                <li>Jihan Dwi Sarah : 0823-6070-2396</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection