@extends('user.layouts.index')

@section('content')

    <div class="bg-light py-5">
        <div class="container py-5">
            <div class="row py-3">
                <div class="col-md-5 m-auto">
                    <div class="bg-white rounded p-5 shadow">
                        <h2>Presensi Talkshow</h2>
                        @if (!$open)
                        <div class="alert alert-danger">
                            <p class="small">Untuk saat ini presensi sedang tutup. Untuk informasi lebih lanjut anda dapat mengunjungi sosial media kami atau dapat menghubungi kontak person berikut:</p>
                            <ul class="small">
                                <li>Ayatullah R. K. : 0822-7780-0517</li>
                                <li>Jihan Dwi Sarah : 0823-6070-2396</li>
                            </ul>
                        </div>
                        @else
                        <form action="{{ route('checkin.check') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" placeholder="email..." class="form-control">
                                @error('email') <div class="small text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="sn">Serial Number:</label>
                                <input type="number" name="serial_number" id="sn" placeholder="serial number..." class="form-control">
                                @error('serial_number') <div class="small text-danger">{{ $message }}</div> @enderror
                            </div>
                            <button class="btn btn-primary w-100">Check In</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection