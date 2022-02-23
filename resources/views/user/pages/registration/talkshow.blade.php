@extends('user.layouts.index')

@section('style')
<style>
    .terms .content {
        height: 100px !important;
    }
</style>
@endsection

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
                <div class="talkshow terms col-md-6">
                    <h2>Syarat Dan Ketentuan</h2>
                    <div class="content">
                        {!! $terms !!}
                    </div>
                    <form action="{{ route('registration.talkshow.store') }}" enctype="multipart/form-data" method="post">
                    <div class="form-group d-flex py-3" style="gap: .5rem; align-items: center;">
                        <input type="checkbox" name="terms" @if (old('terms') == 'on') checked @endif id="term"> <label for="term">Menyetujui syarat dan ketentuan.</label>
                    </div>
                </div>
                <hr class="d-md-none">
                <div class="form col-md-6">
                    <h2>Daftar Sekarang</h2>
                        @csrf
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
                            <label for="">Institusi:</label>
                            <input type="text" name="institution" value="{{ old('institution') }}" class="form-control">
                            @error('institution')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Pekerjaan:</label>
                            <input type="text" name="profession" value="{{ old('profession') }}" class="form-control">
                            @error('profession')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Daftar Sebagai Peserta:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0">Offline</option>
                                <option value="1" selected>Online</option>
                            </select>
                            @error('status')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="bs" class="form-label">Bukti Share Ke Grub:</label>
                            <input class="form-control" name="bs" type="file" id="bs">
                            @error('bs')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3" id="form_bp" style="display: none">
                            <label for="bp" class="form-label">Bukti Pembayaran:</label>
                            <input class="form-control" name="bp" type="file" id="bp">
                            @error('bp')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="small mt-3 text-black-50"><sub>*</sub> Note: Kuota pendaftaran sebagai peserta offline bersifat terbatas.</div>
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

    <script>
        setInterval(() => {
            let status = document.querySelector('#status');
            let bp = document.querySelector('#form_bp');
            status.onchange = (e) => {
                if (e.target.value == 0) {
                    bp.style.display = 'block';
                }else {
                    bp.style.display = 'none';
                }
            }
        }, 100);
    </script>