@extends('admin.layouts.index')

@section('style')
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')

<form action="{{ route('setting.save') }}" method="post">
@csrf
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Pengaturan</h1>
        <p class="small text-black-50 mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, esse?</p>
        <button class="btn btn-primary btn-sm">Simpan Perubahan</button>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"><a href="#">Pengaturan</a></li>
          <li class="breadcrumb-item"></li>
        </ol>
      </div>
    </div>
  </div>
</div>



<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
          <div class="container">
            @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @elseif (session('failed'))
            <div class="alert alert-danger">
              {{ session('failed') }}
            </div>
            @endif

            <h5># Kompetisi</h5>
            <div class="mb-3">
              <label for="terms_competition">Jadwal Buka Pendaftaran:</label>
                <input type="datetime-local" name="competition_opening_registration" placeholder="Jadwal Buka Pendaftaran..." class="form-control">
            </div>
            <div class="mb-3">
                <label for="terms_competition">Jadwal Tutup Pendaftaran:</label>
                <input type="datetime-local" name="competition_closing_registration" placeholder="Jadwal Buka Pendaftaran..." class="form-control">
            </div>
            <div class="mb-3">
                <label for="terms_competition">Syarat / Ketentuan:</label>
                <div class="waiteditor small text-black-50">Sedang memuat editor...</div>
                <textarea name="terms_competition" id="terms_competition" class="form-control d-none">{{ $settings['terms_competition'] }}</textarea>
            </div>
            
            <h5 class="mt-5"># Talkshow</h5>
            <div class="mb-3">
              <label for="terms_competition">Jadwal Buka Pendaftaran:</label>
                <input type="datetime-local" name="talkshow_opening_registration" placeholder="Jadwal Buka Pendaftaran..." class="form-control">
            </div>
            <div class="mb-3">
                <label for="terms_competition">Jadwal Tutup Pendaftaran:</label>
                <input type="datetime-local" name="talkshow_closing_registration" placeholder="Jadwal Buka Pendaftaran..." class="form-control">
            </div>
            <div class="mb-3">
                <label for="terms_talkshow">Syarat / Ketentuan:</label>
                <div class="waiteditor small text-black-50">Sedang memuat editor...</div>
                <textarea name="terms_talkshow" id="terms_talkshow" class="form-control d-none">{{ $settings['terms_talkshow'] }}</textarea>
            </div>
            
        </div>
      </div>
    </div>
  </div>
</section>

</form>


@endsection

@section('script')

<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
    $(() => {
        document.querySelectorAll('.waiteditor').forEach(e => e.classList.add('d-none'));

        showEditor('#terms_competition', 'Syarat / Ketentuan')
        showEditor('#terms_talkshow', 'Syarat / Ketentuan')
        
        function showEditor(selector, placeholder) {
            document.querySelector(selector).classList.remove('d-none')
            $(selector).summernote({
                tabsize: 2,
                placeholder,
                height: 120,
                toolbar: [
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['para', ['ul', 'ol']],
                ],
                callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('text/html');
                    e.preventDefault();
                    var div = $('<div />');
                    div.append(bufferText);
                    div.find('*').removeAttr('style');
                    setTimeout(function () {
                    document.execCommand('insertHtml', false, div.html());
                    }, 10);
                }
                }
            })
        }
    })
</script>

@endsection