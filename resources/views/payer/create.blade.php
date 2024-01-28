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
											<a href="/dashboard" class="text-muted text-hover-primary">{{ __('home') }}</a>
										</li>
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-300 w-5px h-2px"></span>
										</li>
										<li class="breadcrumb-item text-dark">{{ __('add_tax_payer') }}</li>
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
								<div class="form d-flex flex-column flex-lg-row">
									 
									<div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">
										<div class="card card-flush py-4">
											<div class="card-header">
												<div class="card-title">
													<h2>{{ __('search_payer') }}</h2>
												</div>
											</div>
											<form id="search_payer">	
												@csrf
											<div class="card-body pt-0">
												<div class="d-flex flex-column gap-10">
													<div class="fv-row">
														<!-- <label class="required form-label">Criteria</label> -->
														<input type="text" name="" class="form-control mb-2 " id="searchInput" oninput="toggleSearchButton()">
														<div class="text-muted fs-7">{{ __('enter_search') }}</div>
													</div>
												</div>
											</div> 
											<div align="center">
												<button type="submit" class="btn btn-success" disabled id="searchButton">
													<span class="indicator-label">{{ __('search') }}</span>
													<span class="indicator-progress">{{ __('wait') }}
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
										  </div>
										</form>
										</div>
									</div>
									<div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
										<div class="card card-flush py-4">
											<div class="card-header">
												<div class="card-title">
													<h2>{{ __('payer_detail') }}</h2>
												</div>
											</div>

											<form action="{{ url('payerstore') }}" method="post" id="register_form">
												 @csrf
											<div>
												<p style="margin-left: 30px; color: red;">{{ __('all_fields_marked') }} (<b style="color: red;">*</b>) {{ __('is_mandatory') }}</p>
											</div>
											@if(session()->has('success'))
													<div class="col-md-6" align="center" style="margin-left:30px">
														<div class="alert alert-success alert-dismissible fade show" role="alert">
  													  		<strong>Success!</strong> {{ session()->get('success') }}
  																<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    														<span aria-hidden="true">&times;</span>
	  														</button>
													  </div>
													</div>
											@endif
												@if ($errors->any())
    												<ul>
        												@foreach ($errors->all() as $error)
		            										<div style="margin-left:30px">
		            											<p style="color: red">{{ $error }}</p>
		            										</div>
        										@endforeach
    												</ul>
											@endif
											<div class="card-body pt-0">
												<div class="d-flex flex-column gap-10">
													<div>
														<div class="row mb-12">
															<div class="col-md-6 fv-row">
																<label class="required fs-6 fw-bold form-label mb-2">{{ __('surname') }} 
																</label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('surname') }} " name="surname" id="surname" oninput="checkMandatoryFields()" />
																	</div>
																</div>
															</div>
															<div class="col-md-6 fv-row">
																<label class="required fs-6 fw-bold form-label mb-2">{{ __('othername') }}  </label>
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('othername') }}" name="othername" id="othername" oninput="checkMandatoryFields()"/>
																</div>
															</div>
														</div>
														<div class="row mb-12">
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold form-label mb-2">{{ __('gender') }} </label>
															<div class="row fv-row">
																<div class="position-relative">
																	<select class="form-control form-control-solid" name="gender" id="gender" oninput="checkMandatoryFields()">
																		<option disabled selected>-{{ __('select') }}-</option>
																		<option value="c000P1X">{{ __('female') }}</option>
																		<option value="c000P2X">{{ __('male') }}</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold form-label mb-2">{{ __('national_id') }}</label>
															<div class="position-relative">
																<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('national_id') }}" name="national_id" id="national_id"/>
															</div>
														</div>
													</div>
													<div class="row mb-10">
														<div class="col-md-6 fv-row">
															<label class="fs-6 fw-bold form-label mb-2">{{ __('email') }} </label>
															<div class="row fv-row">
																<div class="position-relative">
																	<input type="email" class="form-control form-control-solid" maxlength="50" placeholder="{{ __('email') }}" name="email" id="email" />
																</div>
															</div>
														</div>
														<div class="col-md-6 fv-row">
															<label class="fs-6 fw-bold form-label mb-2">{{ __('file_no') }}</label>
															<div class="position-relative">
																<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('file_no') }}" name="file_number" id="file_number" />
															</div>
														</div>
													</div>
													<div class="row mb-10">
														<div class="col-md-6 fv-row">
															<!--begin::Label-->
															<label class="fs-6 fw-bold form-label mb-2">{{ __('voter_id') }} </label>
															<div class="row fv-row">
																<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('voter_id') }}" name="voter_id"  id="voter_id"/>
																</div>
															</div>
														</div>
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold form-label mb-2">{{ __('telephone') }}</label>
															<div class="position-relative">
																<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('telephone') }}" name="telephone_1" id="telephone_1" oninput="checkMandatoryFields()"/>
															</div>
														</div>
													</div>
													<div class="row mb-10">
															<div class="col-md-6 fv-row">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mb-2">{{ __('telephone') }} 2 ({{__('optional')}}) </label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50"  name="telephone_2" id="telephone_2" placeholder="{{ __('telephone') }}" />
																	</div>
																</div>
															</div>
															<div class="col-md-6 fv-row">
																<label class="fs-6 fw-bold form-label mb-2">{{ __('geolocation') }}</label>
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('geolocation') }}" name="geolocation" id="geolocation" />
																</div>
															</div>
														</div>
														<div class="row mb-10">
															<div class="col-md-6 fv-row">
																<label class="fs-6 fw-bold form-label mb-2">{{ __('latitude') }}</label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('latitude') }}" name="latitude" id="latitude" />
																	</div>
																</div>
															</div>
															<div class="col-md-6 fv-row">
																<label class="fs-6 fw-bold form-label mb-2">{{ __('longitude') }}</label>
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('longitude') }}" name="longitude" id="longitude" />
																</div>
															</div>
														</div>
														<div class="row mb-10">
															<div class="col-md-6 fv-row">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mb-2">{{ __('precision') }}</label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('precision') }}" name="precision" id="precision" />
																	</div>
																</div>
															</div>
															<div class="col-md-6 fv-row">
																<label class="fs-6 fw-bold form-label mb-2">{{ __('altitude') }}</label>
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="{{ __('altitude') }}" name="altitude" id="altitude" />
																</div>
															</div>
														</div>
														<div class="d-flex flex-column mb-7 fv-row">
															<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
																<span class="required">{{ __('address') }}</span>
																<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="{{ __('specify_address') }}"></i>
																</label>
																<input type="text" class="form-control form-control-solid" placeholder="{{ __('specify_address') }}" name="address" id="address" oninput="checkMandatoryFields()"/>
													   </div>
													   <div class="row mb-10">
														<div class="col-md-6 fv-row">
															<!--begin::Label-->
															<label class="fs-6 fw-bold form-label mb-2">{{ __('village') }}</label>
															<div class="row fv-row">
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="100" placeholder="{{ __('village') }}" name="village" id="village" />
																</div>
															</div>
														</div>
														<div class="col-md-6 fv-row">
															<label class="fs-6 fw-bold form-label mb-2">{{ __('city') }}</label>
															<div class="position-relative">
																<input type="text" class="form-control form-control-solid" minlength="3" maxlength="100" placeholder="{{ __('city') }}" name="city" id="city" />
															</div>
														</div>
													</div>
													 <div class="d-flex flex-column mb-7 fv-row">
															<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
																<span class="">{{ __('neighborhood') }}</span>
																<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="{{ __('specify_neighbour') }}"></i>
															</label>
															<input type="text" class="form-control form-control-solid" placeholder="{{ __('neighborhood') }}" name="neighborhood" id="neighborhood" />
														</div>
														<div class="row mb-10">
															<div class="col-md-6 fv-row">
																<label class="required fs-6 fw-bold form-label mb-2">{{ __('municipal') }}</label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<select name="business_type" class="form-select form-select-lg form-select-solid" placeholder="{{ __('select') }}..." name="municipal" id="municipal" onchange="checkMandatoryFields()">
																			<option disabled selected>-{{ __('select') }}-</option>
																			<option value="Blita">Blita</option>
																			<!-- <option value="4">Limited Liability</option> -->
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-md-6 fv-row">
																<label class="required fs-6 fw-bold form-label mb-2">{{ __('zone') }}</label>
																<div class="position-relative">
																	<select name="business_type" class="form-select form-select-lg form-select-solid"  placeholder="{{ __('select') }}..." name="zone_name" id="zone_name" onchange="checkMandatoryFields()">
																		<option disabled selected>-{{ __('select') }}-</option>
																		<option value="1">Zone 1</option>
																		<option value="1">Zone 2</option>
																		<option value="2">Zone 3</option>
																		<option value="3">Zone 4</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="row mb-10" hidden>
															<div class="col-md-6 fv-row">
																<label class="required fs-6 fw-bold form-label mb-2">{{ __('user') }}</label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" placeholder="" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="d-flex justify-content-end">
											<button type="reset" class="btn btn-warning  me-5">{{ __('clear') }}</button>
											<!-- <a href="#" id="" class="btn btn-warning  me-5">Clear</a> -->
											<button type="submit" id="register_submit" class="btn btn-success" hidden>
												<span class="indicator-label">{{ __('submit') }} </span>
												<span class="indicator-progress">{{ __('wait') }}...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>

@endsection			
	
<script>
    $(document).ready(function () {
        $('#kt_create_account_form').submit(function (e) {
            e.preventDefault();

            // Serialize the form data
            var formData = $(this).serialize();

            // Make an Ajax request to save the payer
            $.ajax({
                url: "#", // Replace with your actual route
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                // dataType: 'json',
                success: function (data) {
                    // Handle the success response
                    console.log(data); // You can customize this part based on your needs
                    alert('Payer saved successfully');
                    // You may redirect or perform other actions here
                },
                error: function (xhr, status, error) {
                    // Handle the error response
                    console.error(xhr.responseText); // You can customize this part based on your needs
                    alert('Error saving payer');
                }
            });
        });
    });


    function toggleSearchButton() {
        var inputValue = document.getElementById("searchInput").value;
        var searchButton = document.getElementById("searchButton");
        searchButton.disabled = (inputValue.trim() === "");
    }

    function checkMandatoryFields() {
    	var surname = document.getElementById("surname").value;
    	var othername = document.getElementById("othername").value; 
    	var gender = document.getElementById("gender").value; 
    	var telephone_1 = document.getElementById("telephone_1").value;
    	var address = document.getElementById("address").value; 
    	var zone_name = document.getElementById("zone_name").value; 
    	var municipal = document.getElementById("municipal").value; 

    
    	var searchButton = document.getElementById("register_submit");
    
    // You can adjust the condition based on your requirements.
    searchButton.hidden = (surname.trim() === "" || othername.trim() === "" || gender.trim() === "" || telephone_1.trim() === "" || address.trim() === "" || zone_name.trim() === "" || municipal.trim() === "");
}
</script>
<script type="text/javascript">
	$(document).ready(function() {
    $('.search_payer').select2();
});
</script>