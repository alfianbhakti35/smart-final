@extends('layouts.admin')
@section('admin')
    {{-- Content --}}
	<div class="panel-header bg-success-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
				</div>
			</div>
		</div>
		</div>
			<div class="page-inner mt--5">
				<div class="row row-card-no-pd mt--2">
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="flaticon-profile text-warning"></i>
										</div>
									</div>
								<div class="col-7 col-stats">
	    						<div class="numbers">
		                			<p class="card-category">Mahasiswa</p>
			    					<h4 class="card-title">{{ $mahasiswa }}</h4>
				    			</div>
					    	</div>
		    			</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row">
							<div class="col-5">
								<div class="icon-big text-center">
									<i class="flaticon-profile-1 text-success"></i>
								</div>
							</div>
			    			<div class="col-7 col-stats">
		    				<div class="numbers">
								<p class="card-category">Dosen</p>
								<h4 class="card-title">{{ $dosen }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-symbol text-danger"></i>
		    				</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Fakultas</p>
								<h4 class="card-title">{{ $fakultas }}</h4>
							</div>
						</div>
					</div>
				</div>
		    </div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-agenda text-primary"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Prodi</p>
								<h4 class="card-title">{{ $prodi }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
@endsection
