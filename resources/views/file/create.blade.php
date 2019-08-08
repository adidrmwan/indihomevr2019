@extends('layouts.master')

@section('content')

    
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-8"></div>
        <div class="masonry-item col-md-8">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">File</h6>
                <div class="mT-30">
                    <form method="POST" class="container" id="needs-validation" action="{{ route('file.store') }}" novalidate>
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
                                <textarea class="form-control" id="deskripsi" placeholder="Deskripsi sertifikat" name="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penyelenggara" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="penyelenggara" placeholder="Harga" name="price" required="">
                            </div>
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