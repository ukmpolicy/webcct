@extends('admin.layouts.index')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Peserta Talkshow</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Peserta</li>
          <li class="breadcrumb-item active">Talkshow</li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </div>
    </div>
  </div>
</div>


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
                  <th>Status</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registrations->forPage($page, $perPage) as $registration)

                @php
                    $attachments = DB::table('tr_attachments')->where('tr_id', $registration->id)->get();
                    $data = json_decode($registration->data, true);
                @endphp
                  
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $registration->name }}</td>
                  <td>{{ $registration->email }}</td>
                  <td>{{ $registration->phone }}</td>
                  <td>{{ $status[$registration->status] }}</td>
                  <td>
                    <button class="btn w-100 btn-primary" data-toggle="modal" data-target="#detail{{ $registration->id }}"><i class="fa fa-eye"></i></button>
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
        
      </div>
      
    </div>
    
  </div>

</section>

@endsection

  