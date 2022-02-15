@extends('user.layouts.index')

@section('content')

    <!-- Form Registration -->
    <div id="registration">

        <div class="contained">
            <div class="row">
                <div class="col-md-5 m-auto bg-white p-5">
                    <div class="alert alert-success">
                        Terima kasih <b class="text-capitalize">{{ $attendee->name }}</b> telah mendaftarkan diri anda pada kompetisi ini. Anda akan menerima email ke <b>{{ $attendee->email }}</b> setelah pengecekan selesai.
                    </div>
                    <div class="small">Note: Pengecekan akan berlangsung paling telat 24 jam, jika anda tidak menerima email anda dapat melaporkan ke kontak yang tertera dibawah ini:</div>
                    <div class="small">- Ayatullah R. K. : 0822-7780-0517</div>
                    <div class="small">- Jihan Dwi Sarah : 0823-6070-2396</div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    updateTotal();
</script>
@endsection