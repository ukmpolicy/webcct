@extends('admin.layouts.index')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Peserta Kompetisi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Peserta</li>
          <li class="breadcrumb-item active">Kompetisi</li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  
  <div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @elseif (session('failed'))
    <div class="alert alert-danger">
      {{ session('failed') }}
    </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            
            <div class="d-lg-flex" style="justify-content: space-between">
              <div class="d-flex">
                <form action="" method="get" id="status">
                  <input type="hidden" name="search" value="{{ Request::get('search') }}">
                  <input type="hidden" name="page" value="{{ Request::get('page') }}">
                  <select class="custom-select mb-2" name="status" onchange="document.querySelector('#status').submit()" style="width: fit-content">

                    <option value="" @if (Request::get('status')) selected @endif>Semua</option>

                    @foreach ($status as $k => $v)
                    <option value="{{ strtolower($v) }}" @if (Request::get('status') === strtolower($v)) selected @endif>{{ $v }}</option>
                    @endforeach

                  </select>
                </form>
              </div>
              <form class="d-flex" method="GET" action="">
                <input type="hidden" name="status" value="{{ Request::get('status') }}">
                <input type="text" value="{{ Request::get('search') }}" name="search" class="form-control" style="width: 300px" placeholder="Cari">
                <div>
                  <button class="btn ml-2 btn-primary"><i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Detail</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registrations->forPage($page, $perPage) as $registration)

                @php
                    $es = DB::table('event_registrations')->where('event_registrations.registration_id', $registration->id)->select('events.name')->join('events', 'events.id', '=', 'event_registrations.event_id')->get();
                    $events = '';
                    foreach ($es as $event) {
                      $events .= $event->name.', ';
                    }
                    $events = substr($events, 0, -2);
                @endphp
                  
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $registration->name }}</td>
                  <td>{{ $registration->email }}</td>
                  <td>{{ $registration->email }}</td>
                  <td>{{ $registration->phone }}</td>
                  <td>
                    <button class="btn w-100 btn-primary" data-toggle="modal" data-target="#detail{{ $registration->id }}"><i class="fa fa-eye"></i></button>
                  </td>
                  <td>
                    <form action="{{ route('registration.status', ['id' => $registration->id]) }}" method="post" id="status{{ $registration->id }}">
                      @csrf
                      <select class="custom-select w-100" name="status" onchange="document.querySelector('#status{{ $registration->id }}').submit()" style="width: fit-content">
    
                        @foreach ($status as $k => $v)
                        <option value="{{ $k }}" @if ($registration->status === $k) selected @endif>{{ $v }}</option>
                        @endforeach
    
                      </select>
                    </form>

                    <div class="modal fade" id="detail{{ $registration->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Detail Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <table class="w-100">
                              <tr>
                                <td>Nama</td> <td>: {{ $registration->name }}</td>
                              </tr>
                              <tr>
                                <td>Email</td> <td>: {{ $registration->email }}</td>
                              </tr>
                              <tr>
                                <td>Nomor Whatsapp</td> <td>: {{ $registration->phone }}</td>
                              </tr>
                              <tr>
                                <td>Alamat</td> <td>: {{ $registration->address.', '.$registration->city.', '.$registration->region }}</td>
                              </tr>
                              <tr>
                                <td>Tanggal Lahir</td> <td>: {{ date('d-m-Y', strtotime($registration->birthdate)) }} ({{ (int)date("Y", time() - strtotime($registration->birthdate)) - 1970 }}) </td>
                              </tr>
                              <tr>
                                <td>Pendidikan</td> <td>: {{ $registration->education }}) </td>
                              </tr>
                              <tr>
                                <td>Kompetisi</td> <td>:  {{ $events }}</td>
                              </tr>
                              <tr>
                                <td>Status</td> <td>: {{ $status[$registration->status] }}</td>
                              </tr>
                            </table>
                            @if ($registration->identity)
                            <div class="mt-2">Identitas</div>
                            <img class="w-100" src="{{ asset('uploads/identity/'.$registration->identity) }}" alt="{{ $registration->name }}">
                            @endif

                            @if ($registration->bs_filename)
                            <div class="mt-2">Bukti Berbagi</div>
                            <img class="w-100" src="{{ asset('uploads/bs/'.$registration->bs_filename) }}" alt="{{ $registration->name }}">
                            @endif

                            @if ($registration->bp_filename)
                            <div class="mt-2">Bukti Pembayaran</div>
                            <img class="w-100" src="{{ asset('uploads/bp/'.$registration->bp_filename) }}" alt="{{ $registration->name }}">
                            @endif
                          </div>
                        </div>
                      </div>
        
                    </div>
                  </td>
                </tr>

                
                
                @endforeach

                @if ($registrations->forPage($page, $perPage)->isEmpty())
                <tr>
                  <td colspan="6" class="text-center small text-black-50">Data Kosong</td>
                </tr>
                @endif
              </tbody>
            </table>

            @if ($registrations->count() > $perPage)
              <form action="" method="get">

                <input type="hidden" name="status" value="{{ Request::get('status') }}">
                <input type="hidden" name="search" value="{{ Request::get('search') }}">
                @include('admin.components.pagination')
              </form>
            @endif
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>

</section>

@endsection

  