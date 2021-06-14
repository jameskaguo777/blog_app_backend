@extends('layouts.app', [ 'title' => 'Home' ])
@section('content')
    	<!-- /Page Alerts -->
						<div class="hk-row">
							<div class="col-md-4">
								<div class="card card-sm">
									<div class="card-body">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Schools</span>
												<span class="d-block display-6 font-weight-400 text-dark">14</span>
											</div>
											<div>
												<div id="sparkline_4"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-sm">
									<div class="card-body">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Competitions</span>
												<span class="d-block display-6 font-weight-400 text-dark">659</span>
											</div>
											<div>
												<div id="sparkline_5"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-sm">
									<div class="card-body">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Posts</span>
												<span class="d-block display-6 font-weight-400 text-dark">4</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
@endsection