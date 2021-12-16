@extends('layouts.admin')
@section('admin')

<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Mahasiswa</h4>
</div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"></h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-upload"></i>
                    Import Mahasiswa
                </button>
                <a class="btn btn-primary btn-round ml-1" href="/admin/formatinfortmahasiswa">
                    <i class="fa fa-download"></i>
                    Format Import
                </a>
                <button class="btn btn-primary btn-round ml-1" data-toggle="modal" data-target="#addMahasiswaModal">
                    <i class="fa fa-plus"></i>
                    Tambah Mahasiswa
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="addMahasiswaModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Tambah</span>
                                <span class="fw-light">
                                    Mahasiswa
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Silahkan Masukkan Data Mahasiswa</p>
                            <form action="/admin/addmahasiswa" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Mahasiswa</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa">
                                        </div>
                                        <div class="form-group">
                                            <label for="nim">Nim Mahasiswa</label>
                                            <input type="text" class="form-control" id="nim" name="nim" placeholder="Nim Mahasiswa">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">PRODI</label>
                                            <select class="form-control" id="prodi_id" name="prodi_id">
                                                <option value="">Pilih Matakuliah</option>
                                                @foreach ($prodi as $p)

                                                    <option value="{{ $p['id'] }}">{{ $p['nama'] }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Modal Tambah Mahasiswa --}}
            <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Import</span>
                                <span class="fw-light">
                                    Mahasiswa
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Import Mahasiswa</p>
                            <form action="/admin/importmahasiswa" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="file">File Excel Mahasiswa</label>
                                    <input type="file" class="form-control-file" id="file" name="file">
                                </div>

                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" class="btn btn-primary">Import</button>
                        </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 50%">Nama</th>
                            <th>Nim</th>
                            <th>Prodi</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)
                        @if ($d['level'] === 'mahasiswa')
                        <tr>
                            <td>{{ $d['nama'] }}</td>
                            <td>{{ $d['nim'] }}</td>

                            <td>
                                @foreach ($prodi as $p)
                                    @if ($d['prodi_id']  === $p['id'] )
                                        {{ $p['nama'] }}
                                    @else
                                        -
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <div class="form-button-action">
                                    <a href="/admin/user/reset/{{ $d['id'] }}" title="Reset Password" class="btn btn-link btn-warning reset-confirm" data-original-title="Edit Task">
                                        <i class="fa fa-redo-alt"></i>
                                    </a>
                                    <a href="/admin/mahasiswa/edit/{{ $d['id'] }}" title="Edit" class="btn btn-link btn-primary" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="/admin/user/hapus/{{ $d['id'] }}" title="Hapus" class="btn btn-link btn-danger delete-confirm" id="delete-confirm" data-original-title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>


@endsection
