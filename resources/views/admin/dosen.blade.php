@extends('layouts.admin')
@section('admin')
<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Dosen</h4>
</div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"></h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Tambah Dosen
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
                                    Dosen
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Silahkan Masukkan Data Dosen</p>
                            <form action="/admin/adddosen" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama">NIDN</label>
                                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIDN">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Prodi</label>
                                            <select class="form-control" id="prodi_id" name="prodi_id">
                                                <option value=""><i>Pilih Prodi</i></option>
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

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 50%">Nama</th>
                            <th>Username</th>
                            <th >NIDN</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>NIDN</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)
                            @if ($d['level'] === 'dosen')
                            <tr>
                                <td>{{ $d['nama'] }}</td>
                                <td>{{ $d['username'] }}</td>
                                <td>{{ $d['nim'] }}</td>
                                <td>
                                    <div class="form-button-action">
                                        <a href="/admin/dosen/reset/{{ $d['id'] }}" title="Reset Password" class="btn btn-link btn-warning reset-confirm" data-original-title="Edit Task">
                                            <i class="fa fa-redo-alt"></i>
                                        </a>
                                        {{-- <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button> --}}
                                        <a href="/admin/user/hapus/{{ $d['id'] }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger delete-confirm" id="delete-confirm" data-original-title="Hapus">
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
