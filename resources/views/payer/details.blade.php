@extends('layouts.main')

@section('main-content')

					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="toolbar" id="kt_toolbar">
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __('tax_payer') }}</h1>
									<span class="h-20px border-gray-300 border-start mx-4"></span>
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<li class="breadcrumb-item text-muted">
											<a href="{{ url('/dashboard') }}" class="text-muted text-hover-primary">{{ __('home') }}</a>
										</li>
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-300 w-5px h-2px"></span>
										</li>
										<li class="breadcrumb-item text-dark">{{ __('payer') }}</li>
									</ul>
								</div>
								<div class="d-flex align-items-center gap-2 gap-lg-3">
									<div class="m-0">
									</div>
								</div>
							</div>
						</div>
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<div id="kt_content_container" class="container-xxl">
								<div class="d-flex flex-column flex-lg-row">
									<div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
										<div class="card mb-5 mb-xl-8">
											<div class="card-body">
												<div class="d-flex flex-center flex-column py-5">
													<div class="symbol symbol-100px symbol-circle mb-7">
														<img src="{{ asset('media/avatars/blank.png') }}" alt="image" />
													</div>
													<label class="fs-3 text-gray-800 text-hover-success fw-bolder mb-3">{{ $payerdetails->Fullname }}</label>	
													<div class="mb-9">
													   @if($payerdetails->Status === 'ACTIVE')
														  <div class="badge badge-lg badge-light-success d-inline">{{ __('active') }}</div>
            											@elseif ($payerdetails->Status === 'INACTIVE')
                										  <div class="badge badge-lg badge-light-danger d-inline">{{ __('inactive') }}</div>
														@endif
												  </div>
												</div>
												<div class="d-flex flex-stack fs-4 py-3">
													<div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">{{__('details')}}
													<span class="ms-2 rotate-180">
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
															</svg>
														</span>
													</span></div>
													<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit Payer details">
														<a href="/payer/update" class="btn btn-sm btn-light-success">{{ __('edit') }}</a>
													</span>
												</div>
												<div class="separator"></div>
												<div id="kt_user_view_details" class="collapse show">
													<div class="pb-5 fs-6">
														<div class="fw-bolder mt-5">Telephone</div>
														<div class="text-gray-600">
															@if ($payerdetails->Telephone1)
                												{{ $payerdetails->Telephone1 }}
            												@else
                												-
															@endif
														</div>
														<div class="fw-bolder mt-5">Email</div>
														<div class="text-gray-600">
															@if ($payerdetails->Email)
                												{{ $payerdetails->Email }}
            												@else
                												-
															@endif</div>
														<div class="fw-bolder mt-5">Gender</div>
														<div class="text-gray-600">
															@if ($payerdetails->GenderName)
                												{{ $payerdetails->GenderName }}
            												@else
                												-
															@endif
														</div>
														<div class="fw-bolder mt-5">Village</div>
														<div class="text-gray-600">
															@if ($payerdetails->Village)
                												{{ $payerdetails->Village }}
            												@else
                												-
															@endif
														</div>
														<div class="fw-bolder mt-5">City</div>
														<div class="text-gray-600">
															@if ($payerdetails->City)
                												{{ $payerdetails->City }}
            												@else
                												-
															@endif
														</div>
 														<div class="fw-bolder mt-5">Neighborhood</div>
														<div class="text-gray-600">
															@if ($payerdetails->Neighborhood)
                												{{ $payerdetails->Neighborhood }}
            												@else
                												-
															@endif
															</div>
														<div class="fw-bolder mt-5">Address</div>
														<div class="text-gray-600">
																@if ($payerdetails->Address)
                												{{ $payerdetails->Address }}
            												@else
                												-
															@endif

														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card mb-5 mb-xl-8">
											<div class="card-header border-0">
												<div class="card-title">
													<h3 class="fw-bolder m-0">Geolocation</h3>
												</div>
											</div>
											<div class="card-body pt-2">
												<div class="fw-bolder mt-5">Longitude</div>
														<div class="text-gray-600">
															@if ($payerdetails->Longitude)
                												{{ $payerdetails->Longitude }}
            												@else
                												-
															@endif
														</div>
														<div class="fw-bolder mt-5">Latitude</div>
														<div class="text-gray-600">
															@if ($payerdetails->Latitude)
                												{{ $payerdetails->Latitude }}
            												@else
                												-
															@endif
														</div>
														<div class="fw-bolder mt-5">Altitude</div>
														<div class="text-gray-600">
															@if ($payerdetails->Altitude)
                												{{ $payerdetails->Altitude }}
            												@else
                												-
															@endif
														</div>
														<div class="fw-bolder mt-5">Village</div>
														<div class="text-gray-600">
															@if ($payerdetails->Village)
                												{{ $payerdetails->Village }}
            												@else
                												-
															@endif
														</div>
														<div class="fw-bolder mt-5">Geolocation</div>
														<div class="text-gray-600">
															@if ($payerdetails->Geolocation)
                												{{ $payerdetails->Geolocation }}
            												@else
                												-
															@endif
														</div>
												<div class="py-2">
													<div class="d-flex flex-stack">
														<!-- <input type="text" name="longitude" value="{{ $payerdetails->Longitude }}">
														<input type="text" name="latitude" value="{{ $payerdetails->Latitude }}">
														<input type="text" name="fullname" value="{{ $payerdetails->Fullname }}"> -->
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="flex-lg-row-fluid ms-lg-15">
										<!--begin:::Tabs-->
										<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab">Overview</a>
											</li>
											
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_overview_events_and_logs_tab">Events &amp; Logs</a>
											</li>
											<li class="nav-item" disabled>
												<a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security">Notification</a>
											</li>
											<li class="nav-item ms-auto">
												<a href="#" class="btn btn-success ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
												<span class="svg-icon svg-icon-2 me-0">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
													</svg>
												</span>
												</a>
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6" data-kt-menu="true">
													<div class="menu-item px-5">
														<a href="#" class="menu-link px-5">Create invoice</a>
													</div>
													<div class="menu-item px-5">
														<a href="#" class="menu-link flex-stack px-5">Create payments
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
													</div>
													<div class="menu-item px-5 my-1">
														<a href="#" class="menu-link px-5">Account Settings</a>
													</div>
												</div>
											</li>
										</ul>
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
												<div class="card card-flush mb-6 mb-xl-9">
													<div class="card-header mt-6">
														<div class="card-title flex-column">
															<h2 class="mb-1">Payer Taxables</h2>
														</div>
													</div>
													 <div class="card-body p-9 pt-4">
														<div class="tab-content">
															<div id="kt_schedule_day_1" class="tab-pane fade show active">
															    @if(isset($payer_taxable_items) && $payer_taxable_items->count() > 0)
															        @foreach($payer_taxable_items as $pti)
															            <div class="d-flex flex-stack position-relative mt-6">
															                <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0"></div>
															                <div class="fw-bold ms-5">
															                    <a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">{{ $pti->ActivityName }}</a>
															                    <div class="fs-7 mb-1"><small>Added On <b>{{ $pti->AddedDate }}</b></small></div>
															                </div>
															                <a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View Details</a>
															            </div>
															        @endforeach
															    @else
															        <div class="d-flex flex-stack position-relative mt-6">
															            No Data Available
															        </div>
															    @endif
															</div>

														</div>
													</div> 
												</div>
												<div class="card card-flush mb-6 mb-xl-9">
													<div class="card-header mt-6">
														<div class="card-title flex-column">
															<h2 class="mb-1">Payer's Location</h2>
														</div>
													</div>
													    @if($payerdetails->Longitude && $payerdetails->Latitude)
														<div class="card-body">
														    <div id="single_payer" class="w-100 rounded" style="height:400px"></div>
														</div>
														@else
														<div class="card-body">
														    <div class="w-100 rounded" style="height:400px">No Data Available for Payer</div>
														</div>
														@endif
												</div>
											</div>
											<div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
												<div class="card pt-4 mb-6 mb-xl-9">
													<div class="card-header border-0">
														<div class="card-title flex-column">
															<h2>Email Notifications</h2>
															<div class="fs-6 fw-bold text-muted">Choose what messages you’d like to receive for each of your accounts.</div>
														</div>
													</div>
													<div class="card-body">
														<form class="form" id="kt_users_email_notification_form">
															<div class="d-flex">
																<div class="form-check form-check-custom form-check-solid">
																	<input class="form-check-input me-3" name="email_notification_0" type="checkbox" value="0" id="kt_modal_update_email_notification_0" checked='checked' />
																	<label class="form-check-label" for="kt_modal_update_email_notification_0">
																		<div class="fw-bolder">Successful Payments</div>
																		<div class="text-gray-600">Receive a notification for every successful payment.</div>
																	</label>
																</div>
															</div>
															<div class='separator separator-dashed my-5'></div>
															<div class="d-flex">
																<div class="form-check form-check-custom form-check-solid">
																	<input class="form-check-input me-3" name="email_notification_5" type="checkbox" value="5" id="kt_modal_update_email_notification_5" />
																	<label class="form-check-label" for="kt_modal_update_email_notification_5">
																		<div class="fw-bolder">Successful Invoices</div>
																		<div class="text-gray-600">Receive a notification for every invoice approved.</div>
																	</label>
																</div>
															</div>
															<div class='separator separator-dashed my-5'></div>
															<div class="d-flex">
																<div class="form-check form-check-custom form-check-solid">
																	<input class="form-check-input me-3" name="email_notification_6" type="checkbox" value="6" id="kt_modal_update_email_notification_6" />
																	<label class="form-check-label" for="kt_modal_update_email_notification_6">
																		<div class="fw-bolder">Invoice Mispayments</div>
																		<div class="text-gray-600">Receive a notification if a customer sends an incorrect amount to pay their invoice.</div>
																	</label>
																</div>
															</div>
															<div class='separator separator-dashed my-5'></div>
															<div class="d-flex">
																<div class="form-check form-check-custom form-check-solid">
																	<input class="form-check-input me-3" name="email_notification_7" type="checkbox" value="7" id="kt_modal_update_email_notification_7" />
																	<label class="form-check-label" for="kt_modal_update_email_notification_7">
																		<div class="fw-bolder">Delayed payments</div>
																		<div class="text-gray-600">Receive notifications for delayed payments</div>
																	</label>
																</div>
															</div>
															<div class="d-flex justify-content-end align-items-center mt-12">
																<button type="button" class="btn btn-success" id="kt_users_email_notification_submit">
																	<span class="indicator-label">Save</span>
																	<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
												<div class="card pt-4 mb-6 mb-xl-9">
													<div class="card-header border-0">
														<div class="card-title">
															<h2>Events and Logs</h2>
														</div>
													</div>
													<div class="card-body py-0">
														<table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-5" id="kt_table_customers_events">
															<tbody>
																<tr>
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#KIO-45656</a> has been created on <p>05 May 2022, 9:23 pm</p>
																	</td>
																	
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<script type="text/javascript">
    var single_map = L.map('single_payer').setView([8.2, 1.1], 10);
         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(single_map);

    var latitude = {{ $payerdetails->Latitude }};
    var longitude = {{ $payerdetails->Longitude }};
    var fullname = "{{ $payerdetails->Fullname }}";

    // Assuming data is an array of taxpayers with properties latitude, longitude, and fullname
    var data = [
        // Example data, replace with your actual data
        { latitude, longitude, fullname},
        // ...
    ];

    data.forEach(tax_payer => {
        L.marker([latitude, longitude]).addTo(single_map)
            .bindPopup(fullname);
    });
</script>
@endsection			

	