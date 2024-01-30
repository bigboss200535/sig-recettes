@extends('layouts.main')

@section('main-content')

					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __('location') }}</h1>
									<span class="h-20px border-gray-300 border-start mx-4"></span>
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<li class="breadcrumb-item text-muted">
											<a href="{{ url('/dashboard') }}" class="text-muted text-hover-primary">{{ __('home') }}</a>
										</li>
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-300 w-5px h-2px"></span>
										</li>
										<li class="breadcrumb-item text-dark">{{ __('invoice') }}</li>
									</ul>
								</div>
								<div class="d-flex align-items-center gap-2 gap-lg-3">
									<div class="m-0">
									</div>
								</div>
							</div>
						</div>
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<div class="card">
									<div class="card-header border-0 pt-6">
										<div class="card-title">
										</div>
										<div class="card-toolbar">
											<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
												<div class="w-150px me-3">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
														<option selected disabled>-Select Municipal-</option>
														<option value="all" selected>BLITTA</option>
													</select>
												</div>
												<div class="w-150px me-3">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
														<option disabled>-Select Zone-</option>
														<option value="all" selected>ZONE 1</option>
													</select>
												</div>
												<div class="w-150px me-3">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
														<option selected disabled>-Data Set-</option>
														<!-- <option value="all">All</option> -->
														<option value="active">PAYERS</option>
														<option value="locked">COLLECTORS</option>
													</select>
												</div>
												<div class="w-150px me-3">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
														<option selected disabled>Number</option>
														<option value="5">5</option>
														<option value="10">10</option>
														<option value="15">15</option>
													</select>
												</div>
												<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Submit</button>
											</div>
											<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
												<div class="fw-bolder me-5">
												<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
												<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div id="location_map" class="w-100 rounded" style="height:450px"></div>
									</div>
								</div>
							</div>
						</div>
                   </div>
		@endsection					