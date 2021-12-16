@extends('layouts.admin')
@section('admin')
<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Fakultas</h4>
</div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"></h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Tambah Fakultas
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
                                    Fakultas
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Silahkan Masukkan Nama Fakultas</p>
                            <form action="/admin/addfakultas" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Nama</label>
                                            <input id="nama" name="nama" type="text" class="form-control" placeholder="fill name">
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
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)

                        <tr>
                            <td>{{ $d['nama'] }}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="modal" data-target="#editFakultas{{ $d['id'] }}" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    {{-- Modals Edit --}}
                                    <div class="modal fade" id="editFakultas{{ $d['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Edit</span>
                                                        <span class="fw-light">
                                                            Fakultas
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Silahkan Masukkan Nama Fakultas</p>
                                                    <form action="/admin/editfakultas" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="text" id="id" name="id" value="{{ $d['id'] }}" hidden>
                                                                <div class="form-group form-group-default">
                                                                    <label>Nama</label>
                                                                    <input id="nama" name="nama" type="text" class="form-control" value="{{ $d['nama'] }}">
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
                                    {{-- End Modals Edit --}}
                                    <a href="/admin/fakultas/hapus/{{ $d['id'] }}" title="Hapus" class="btn btn-link btn-danger delete-confirm" id="delete-confirm" data-original-title="Hapus">
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
