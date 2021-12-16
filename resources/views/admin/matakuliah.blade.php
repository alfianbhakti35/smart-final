@extends('layouts.admin')
@section('admin')
<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Matakuliah</h4>
</div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"></h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Tambah Matakuliah
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Tambah</span>
                                <span class="fw-light">
                                    Matakuliah
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Silahkan Masukkan Matakuliah</p>
                            <form action="/admin/addmatakuliah" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Matakuliah</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Prodi">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Prodi</label>
                                            <select class="form-control" id="prodi_id" name="prodi_id">
                                                <option value="">Pilih Prodi</option>
                                                @foreach ($prodi as $f)

                                                    <option value="{{ $f['id'] }}">{{ $f['nama'] }}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama">Semester</label>
                                            <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Dosen Pengampu</label>
                                            <select class="form-control" id="dosen_id" name="dosen_id">
                                                <option value="">Pilih Dosen</option>
                                                @foreach ($dosen as $d)
                                                    @if ($d['level'] === 'dosen')
                                                        <option value="{{ $d['id'] }}">{{ $d['nama'] }}</option>

                                                    @endif

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

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th style="width: 40%">Prodi</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)

                        <tr>
                            <td>{{ $d['nama'] }}</td>
                            @foreach ($prodi as $p)
                                @if ($p['id'] === $d['prodi_id'])
                                    <td>{{ $p['nama'] }}</td>
                                @endif
                            @endforeach
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="modal" data-target="#editProdi{{ $d['id'] }}" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    {{-- Modals Matakuliah Edit --}}
                                    <div class="modal fade" id="editProdi{{ $d['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Edit</span>
                                                        <span class="fw-light">
                                                            Matakuliah {{ $d['nama'] }}
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Silahkan Masukkan Matakuliah</p>
                                                    <form action="/admin/addmatakuliah" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="nama">Nama Matakuliah</label>
                                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Prodi" value="{{ $d['nama'] }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Prodi</label>
                                                                    <select class="form-control" id="prodi_id" name="prodi_id">
                                                                        <option value="">Pilih Prodi</option>
                                                                        @foreach ($prodi as $f)

                                                                            <option value="{{ $f['id'] }}">{{ $f['nama'] }}</option>

                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="nama">Semester</label>
                                                                    <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester" value="{{ $d['semester'] }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Dosen Pengampu</label>
                                                                    <select class="form-control" id="dosen_id" name="dosen_id">
                                                                        <option value="">Pilih Dosen</option>
                                                                        @foreach ($dosen as $do)
                                                                            @if ($do['level'] === 'dosen')
                                                                                <option {{ ($do['id'] === $d['dosen_id']) ? 'selected' : '' }} value="{{ $do['id'] }}">{{ $do['nama'] }}</option>

                                                                            @endif

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
                                    {{-- END Modals Matakuliah Edit --}}
                                    <a href="/admin/matakuliah/hapus/{{ $d['id'] }}" title="" class="btn btn-link btn-danger delete-confirm" id="delete-confirm" data-original-title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

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
