@extends('layouts.admin')
@section('admin')
<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Materi</h4>
</div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"></h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Tambah Materi
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
                                    Materi
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Silahkan Masukkan Materi</p>
                            <form action="/admin/addmateri" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nama">Judul Materi</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Judul Materi">
                                        </div>
                                        <div class="form-group">
                                            <label for="materi_tunanetra">Materi Tunanetra</label>
                                            <input type="file" class="form-control-file" id="materi_tunanetra" name="materi_tunanetra">
                                        </div>
                                        <div class="form-group">
                                            <label for="materi_tunarungu">Materi Tunarungu</label>
                                            <input type="file" class="form-control-file" id="materi_tunarungu" name="materi_tunarungu">
                                        </div>
                                        <div class="form-group">
                                            <label for="materi_slow_lerning">Materi Slowlerning</label>
                                            <input type="text" class="form-control" id="materi_slow_lerning" name="materi_slow_lerning" placeholder="Url Vidio">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Matakuliah</label>
                                            <select class="form-control" id="fakultas" name="fakultas">
                                                <option value="">Pilih Matakuliah</option>
                                                @foreach ($matakuliah as $m)

                                                    <option value="{{ $m['nama'] }}">{{ $m['nama'] }}</option>

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
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th style="width: 40%">Matakuliah</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Matakuliah</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)

                        <tr>
                            <td>{{ $d['nama'] }}</td>
                            <td>{{ $d['matakuliah'] }}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                                        <i class="fa fa-times"></i>
                                    </button>
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
