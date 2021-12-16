@extends('layouts.admin')
@section('admin')

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Mahasiswa</h4>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/mahasiswa/edit/simpan" method="POST">
                        @csrf
                        <input type="text" class="form-control" id="id" name="id" value="{{ $mhs->id }}" hidden>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $mhs->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="number" class="form-control" id="nim" name="nim" value="{{ $mhs->nim }}">
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <a href="/admin/mahasiswa" class="btn  ml-auto">Batal</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
