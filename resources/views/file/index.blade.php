@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-md-11" style="margin-left: 50px; margin-top: 50px;">
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
      <div class="row">
          <div class="col-md-6">        
             <h4 class="c-grey-900 mT-10 mB-30">Daftar Game Indihome VR</h4>
          </div>
          <div class="col-md-6  text-right">
              <a class="btn btn-primary submit-btn" href="{{ route('file.create') }}">
                  <i class="fa fa-plus"></i>&nbsp;&nbsp; Upload {{ $title }} 
              </a>
          </div>
      </div>  
      <table id="data_game" class="table table-hover table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Price</th>
                <th>Jenis Game</th>
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
              <td>{{$file->tipe_game}}</td>
              <td>
                <a href="{{route('file.download', $file->id)}}">
                  <button type="button" class="btn btn-primary">
                    Download
                  </button>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
</div>
@endsection