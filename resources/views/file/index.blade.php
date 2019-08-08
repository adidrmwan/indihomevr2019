@extends('layouts.master')

@section('content')
<h4 class="c-grey-900 mT-10 mB-30">{{ $title }}</h4>
<div class="row">
  <div class="col-md-12">
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
      <div class="mB-20">
        <a href="{{ route('file.create') }}" class="btn cur-p btn-info" style="padding: 10px;">
          <i class="ti-upload"></i>&nbsp;&nbsp;Upload {{ $title }} 
        </a>

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
      </div>
      <table id="dataTable" class="table table-hover table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Price</th>
                <th>Nama file</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_files as $key => $file)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$file->name}}</td>
              <td>{{$file->description}}</td>
              <td>{{$file->price}}</td>
              <td>{{$file->file}}</td>
              <td></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
</div>
@endsection