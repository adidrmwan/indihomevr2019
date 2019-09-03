@extends('layouts.master')

@section('content')

    
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-8"></div>
        <div class="masonry-item col-md-8">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900"></h6>
                <div class="mT-30">
                    <form method="POST" class="container" enctype="multipart/form-data" id="needs-validation" action="{{ route('file.store') }}" novalidate>
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="judul" placeholder="Nama file" name="name" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="deskripsi" placeholder="Deskripsi Game" name="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="harga" placeholder="Harga" name="price" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="package" class="col-sm-2 col-form-label">Package Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="package" placeholder="Package Name" name="application_id" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipe_game" class="col-sm-2 col-form-label">Jenis Game</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="tipe_game" name="tipe_game" required="">
                                    @foreach ($allTipe as $allTipe)
                                        <option value="{{$allTipe->nama}}">{{$allTipe->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="upload_banner">Upload gambar banner</label>
                            <input type="file" class="form-control-file" id="upload_banner" name="banner_img" required="">
                        </div>
                        <div class="form-group">
                            <label for="upload_logo">Upload gambar Logo</label>
                            <input type="file" class="form-control-file" id="upload_logo" name="logo_img" required="">
                        </div>
                        <div class="form-group">
                            <label for="uploaded_file">Upload file game</label>
                            <input type="file" class="form-control-file" id="uploaded_file" name="file" required="">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit form</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            'use strict';
                            window.addEventListener('load', function () {
                                var form = document.getElementById('needs-validation');
                                form.addEventListener('submit', function (event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            }, false);
                        })();
                    </script>
                </div>
            </div>
        </div>
</div>

@endsection