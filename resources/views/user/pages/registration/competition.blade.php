@extends('user.layouts.index')

@section('content')

    <!-- Form Registration -->
    <div id="registration">
        @if ($expired)
        <div class="contained">
            <div class="row">
                <div class="col-md-5 m-auto bg-white p-5">
                    <div class="alert alert-danger">
                        Maaf untuk saat ini pendaftaran di tutup.
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (!$expired)
        <div class="container container-d">
            <div class="row">
                <div class="terms col-md-6">
                    <h2>Syarat Dan Ketentuan</h2>
                    <div class="content">
                        <!-- @include('user.pages.registration.terms.competition') -->
                        {!! $terms !!}
                    </div>
                    {{-- {{ old('terms') }} --}}
                    <form action="{{ route('registration.competition.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                    <div class="form-group d-flex py-3" style="gap: .5rem; align-items: center;">
                        <input type="checkbox" id="term" name="terms" @if (old('terms') == 'on') checked @endif> <label for="term">Menyetujui syarat dan ketentuan.</label>
                    </div>
                </div>
                <hr class="d-md-none">
                <div class="form col-md-6">
                    <h2>Daftar Sekarang</h2>
                        <div class="form-group mt-3">
                            <label for="">Nama Lengkap:</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            @error('name')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Email:</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                            @error('email')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Nomor Whatsapp:</label>
                            <input type="number" name="phone" value="{{ old('phone') }}" class="form-control">
                            @error('phone')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Provinsi:</label>
                            <input type="text" name="region" value="{{ old('region') }}" class="form-control">
                            @error('region')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Kota:</label>
                            <input type="text" name="city" value="{{ old('city') }}" class="form-control">
                            @error('city')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Alamat:</label>
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                            @error('address')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Tanggal Lahir:</label>
                            <input type="date" name="birthdate" value="{{ old('birthdate') }}" class="form-control">
                            @error('birthdate')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Asal Kampus / Sekolah:</label>
                            <input type="text" name="education" value="{{ old('education') }}" class="form-control">
                            @error('education')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="identity" class="form-label">KTM / Surat Aktif:</label>
                            <input class="form-control" name="identity" type="file" id="identity">
                            @error('identity')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="events" id="form_choice_competition">
                            Perlombaan:
                            <div class="row">
                                @foreach ($events as $i => $e)
                                <div class="col-4">
                                    <input type="checkbox" name="events[]" value="{{ $i }}" id="e{{ $i }}" class="d-none">
                                    <div class="event" onclick="choiceCompetition(this,'#e{{ $i }}')" data-price="{{ $e['price'] }}">
                                        <div class="name text-capitalize">{{ $e['name'] }}</div>
                                        <div class="price">Rp {{ number_format($e['price']) }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @error('events')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 d-flex" style="justify-content: space-between;font-size: 21px;">
                            <div>Total:</div>
                            <div>Rp <span id="total">0</span></div>
                        </div>
                        <div class="mt-3">
                            <label for="bp" class="form-label">Bukti Pembayaran:</label>
                            <input class="form-control" name="bp" type="file" id="bp">
                            @error('bp')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="small mt-3 text-black-50"><sub>*</sub> Note: Secara otomatis anda akan terdaftar pada acara talkshow.</div>
                        <div class="form-group mt-3">
                            <button class="btn w-100 btn-default">DAFTAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>

@endsection

@section('js')
<script>
    updateTotal();
</script>
@endsection