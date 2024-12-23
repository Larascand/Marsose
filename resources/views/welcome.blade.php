@extends('layouts.template')

@section('content')

{{-- <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
	<!--begin::Content wrapper-->
	<div class="d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
            @include('layouts.breadcrumb')
		<!--end::Toolbar-->
		<!--begin::Content-->
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<!--begin::Content container-->
			<div id="kt_app_content_container" class="app-container container-fluid">
				<!--begin::Card-->
				<div class="card">
					<!--begin::Card header-->
					<div class="card-header border-0 pt-6">
						<!--begin::Card title-->
						<div class="card-title">
							<!--begin::Search-->
							<div class="d-flex align-items-center position-relative my-1">
								<i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
								<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search user" />
							</div>
							<!--end::Search-->
						</div>
						<!--begin::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::Toolbar-->
							<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
								<!--begin::Filter-->
								<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
								<i class="ki-outline ki-filter fs-2"></i>Filter</button>
								<!--begin::Menu 1-->
								<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
									<!--begin::Header-->
									<div class="px-7 py-5">
										<div class="fs-5 text-dark fw-bold">Filter Options</div>
									</div>
									<!--end::Header-->
									<!--begin::Separator-->
									<div class="separator border-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Content-->
									<div class="px-7 py-5" data-kt-user-table-filter="form">
										<!--begin::Input group-->
										<div class="mb-10">
											<label class="form-label fs-6 fw-semibold">Role:</label>
											<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
												<option></option>
												<option value="Administrator">Administrator</option>
												<option value="Analyst">Analyst</option>
												<option value="Developer">Developer</option>
												<option value="Support">Support</option>
												<option value="Trial">Trial</option>
											</select>
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="mb-10">
											<label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
											<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
												<option></option>
												<option value="Enabled">Enabled</option>
											</select>
										</div>
										<!--end::Input group-->
										<!--begin::Actions-->
										<div class="d-flex justify-content-end">
											<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
											<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
										</div>
										<!--end::Actions-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Menu 1-->
								<!--end::Filter-->
								<!--begin::Export-->
								<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
								<i class="ki-outline ki-exit-up fs-2"></i>Export</button>
								<!--end::Export-->
								<!--begin::Add user-->
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
								<i class="ki-outline ki-plus fs-2"></i>Add User</button>
								<!--end::Add user-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Group actions-->
							<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
								<div class="fw-bold me-5">
								<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
								<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
							</div>
							<!--end::Group actions-->
							<!--begin::Modal - Adjust Balance-->
							<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog modal-dialog-centered mw-650px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Modal header-->
										<div class="modal-header">
											<!--begin::Modal title-->
											<h2 class="fw-bold">Export Users</h2>
											<!--end::Modal title-->
											<!--begin::Close-->
											<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
												<i class="ki-outline ki-cross fs-1"></i>
											</div>
											<!--end::Close-->
										</div>
										<!--end::Modal header-->
										<!--begin::Modal body-->
										<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
											<!--begin::Form-->
											<form id="kt_modal_export_users_form" class="form" action="#">
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bold">
														<option></option>
														<option value="Administrator">Administrator</option>
														<option value="Analyst">Analyst</option>
														<option value="Developer">Developer</option>
														<option value="Support">Support</option>
														<option value="Trial">Trial</option>
													</select>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
														<option></option>
														<option value="excel">Excel</option>
														<option value="pdf">PDF</option>
														<option value="cvs">CVS</option>
														<option value="zip">ZIP</option>
													</select>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Actions-->
												<div class="text-center">
													<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
													<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
														<span class="indicator-label">Submit</span>
														<span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Modal body-->
									</div>
									<!--end::Modal content-->
								</div>
								<!--end::Modal dialog-->
							</div>
							<!--end::Modal - New Card-->
							<!--begin::Modal - Add task-->
							<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog modal-dialog-centered mw-650px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Modal header-->
										<div class="modal-header" id="kt_modal_add_user_header">
											<!--begin::Modal title-->
											<h2 class="fw-bold">Add User</h2>
											<!--end::Modal title-->
											<!--begin::Close-->
											<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
												<i class="ki-outline ki-cross fs-1"></i>
											</div>
											<!--end::Close-->
										</div>
										<!--end::Modal header-->
										<!--begin::Modal body-->
										<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
											<!--begin::Form-->
											<form id="kt_modal_add_user_form" class="form" action="#">
												<!--begin::Scroll-->
												<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
														<!--end::Label-->
														<!--begin::Image placeholder-->
														<style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
														<!--end::Image placeholder-->
														<!--begin::Image input-->
														<div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
															<!--begin::Preview existing avatar-->
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-6.jpg);"></div>
															<!--end::Preview existing avatar-->
															<!--begin::Label-->
															<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																<i class="ki-outline ki-pencil fs-7"></i>
																<!--begin::Inputs-->
																<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																<input type="hidden" name="avatar_remove" />
																<!--end::Inputs-->
															</label>
															<!--end::Label-->
															<!--begin::Cancel-->
															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																<i class="ki-outline ki-cross fs-2"></i>
															</span>
															<!--end::Cancel-->
															<!--begin::Remove-->
															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																<i class="ki-outline ki-cross fs-2"></i>
															</span>
															<!--end::Remove-->
														</div>
														<!--end::Image input-->
														<!--begin::Hint-->
														<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
														<!--end::Hint-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fw-semibold fs-6 mb-2">Full Name</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="Emma Smith" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fw-semibold fs-6 mb-2">Email</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="email" name="user_email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="smith@kpmg.com" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="mb-7">
														<!--begin::Label-->
														<label class="required fw-semibold fs-6 mb-5">Role</label>
														<!--end::Label-->
														<!--begin::Roles-->
														<!--begin::Input row-->
														<div class="d-flex fv-row">
															<!--begin::Radio-->
															<div class="form-check form-check-custom form-check-solid">
																<!--begin::Input-->
																<input class="form-check-input me-3" name="user_role" type="radio" value="0" id="kt_modal_update_role_option_0" checked='checked' />
																<!--end::Input-->
																<!--begin::Label-->
																<label class="form-check-label" for="kt_modal_update_role_option_0">
																	<div class="fw-bold text-gray-800">Administrator</div>
																	<div class="text-gray-600">Best for business owners and company administrators</div>
																</label>
																<!--end::Label-->
															</div>
															<!--end::Radio-->
														</div>
														<!--end::Input row-->
														<div class='separator separator-dashed my-5'></div>
														<!--begin::Input row-->
														<div class="d-flex fv-row">
															<!--begin::Radio-->
															<div class="form-check form-check-custom form-check-solid">
																<!--begin::Input-->
																<input class="form-check-input me-3" name="user_role" type="radio" value="1" id="kt_modal_update_role_option_1" />
																<!--end::Input-->
																<!--begin::Label-->
																<label class="form-check-label" for="kt_modal_update_role_option_1">
																	<div class="fw-bold text-gray-800">Developer</div>
																	<div class="text-gray-600">Best for developers or people primarily using the API</div>
																</label>
																<!--end::Label-->
															</div>
															<!--end::Radio-->
														</div>
														<!--end::Input row-->
														<div class='separator separator-dashed my-5'></div>
														<!--begin::Input row-->
														<div class="d-flex fv-row">
															<!--begin::Radio-->
															<div class="form-check form-check-custom form-check-solid">
																<!--begin::Input-->
																<input class="form-check-input me-3" name="user_role" type="radio" value="2" id="kt_modal_update_role_option_2" />
																<!--end::Input-->
																<!--begin::Label-->
																<label class="form-check-label" for="kt_modal_update_role_option_2">
																	<div class="fw-bold text-gray-800">Analyst</div>
																	<div class="text-gray-600">Best for people who need full access to analytics data, but don't need to update business settings</div>
																</label>
																<!--end::Label-->
															</div>
															<!--end::Radio-->
														</div>
														<!--end::Input row-->
														<div class='separator separator-dashed my-5'></div>
														<!--begin::Input row-->
														<div class="d-flex fv-row">
															<!--begin::Radio-->
															<div class="form-check form-check-custom form-check-solid">
																<!--begin::Input-->
																<input class="form-check-input me-3" name="user_role" type="radio" value="3" id="kt_modal_update_role_option_3" />
																<!--end::Input-->
																<!--begin::Label-->
																<label class="form-check-label" for="kt_modal_update_role_option_3">
																	<div class="fw-bold text-gray-800">Support</div>
																	<div class="text-gray-600">Best for employees who regularly refund payments and respond to disputes</div>
																</label>
																<!--end::Label-->
															</div>
															<!--end::Radio-->
														</div>
														<!--end::Input row-->
														<div class='separator separator-dashed my-5'></div>
														<!--begin::Input row-->
														<div class="d-flex fv-row">
															<!--begin::Radio-->
															<div class="form-check form-check-custom form-check-solid">
																<!--begin::Input-->
																<input class="form-check-input me-3" name="user_role" type="radio" value="4" id="kt_modal_update_role_option_4" />
																<!--end::Input-->
																<!--begin::Label-->
																<label class="form-check-label" for="kt_modal_update_role_option_4">
																	<div class="fw-bold text-gray-800">Trial</div>
																	<div class="text-gray-600">Best for people who need to preview content data, but don't need to make any updates</div>
																</label>
																<!--end::Label-->
															</div>
															<!--end::Radio-->
														</div>
														<!--end::Input row-->
														<!--end::Roles-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Scroll-->
												<!--begin::Actions-->
												<div class="text-center pt-15">
													<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
													<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
														<span class="indicator-label">Submit</span>
														<span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Modal body-->
									</div>
									<!--end::Modal content-->
								</div>
								<!--end::Modal dialog-->
							</div>
							<!--end::Modal - Add task-->
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body py-4">
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
							<thead>
								<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
									<th class="w-10px pe-2">
										<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
											<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
										</div>
									</th>
									<th class="min-w-125px">User</th>
									<th class="min-w-125px">Role</th>
									<th class="min-w-125px">Last login</th>
									<th class="min-w-125px">Two-step</th>
									<th class="min-w-125px">Joined Date</th>
									<th class="text-end min-w-100px">Actions</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold">
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-6.jpg" alt="Emma Smith" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Emma Smith</a>
											<span>smith@kpmg.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Administrator</td>
									<td>
										<div class="badge badge-light fw-bold">Yesterday</div>
									</td>
									<td></td>
									<td>19 Aug 2023, 10:30 am</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label fs-3 bg-light-danger text-danger">M</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Melody Macy</a>
											<span>melody@altbox.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Analyst</td>
									<td>
										<div class="badge badge-light fw-bold">20 mins ago</div>
									</td>
									<td>
										<div class="badge badge-light-success fw-bold">Enabled</div>
									</td>
									<td>15 Apr 2023, 6:05 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-1.jpg" alt="Max Smith" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Max Smith</a>
											<span>max@kt.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Developer</td>
									<td>
										<div class="badge badge-light fw-bold">3 days ago</div>
									</td>
									<td></td>
									<td>24 Jun 2023, 8:43 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-5.jpg" alt="Sean Bean" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Sean Bean</a>
											<span>sean@dellito.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Support</td>
									<td>
										<div class="badge badge-light fw-bold">5 hours ago</div>
									</td>
									<td>
										<div class="badge badge-light-success fw-bold">Enabled</div>
									</td>
									<td>22 Sep 2023, 5:20 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-25.jpg" alt="Brian Cox" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Brian Cox</a>
											<span>brian@exchange.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Developer</td>
									<td>
										<div class="badge badge-light fw-bold">2 days ago</div>
									</td>
									<td>
										<div class="badge badge-light-success fw-bold">Enabled</div>
									</td>
									<td>25 Jul 2023, 5:20 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label fs-3 bg-light-warning text-warning">C</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Mikaela Collins</a>
											<span>mik@pex.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Administrator</td>
									<td>
										<div class="badge badge-light fw-bold">5 days ago</div>
									</td>
									<td></td>
									<td>24 Jun 2023, 11:05 am</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-9.jpg" alt="Francis Mitcham" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Francis Mitcham</a>
											<span>f.mit@kpmg.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Trial</td>
									<td>
										<div class="badge badge-light fw-bold">3 weeks ago</div>
									</td>
									<td></td>
									<td>21 Feb 2023, 5:20 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label fs-3 bg-light-danger text-danger">O</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Olivia Wild</a>
											<span>olivia@corpmail.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Administrator</td>
									<td>
										<div class="badge badge-light fw-bold">Yesterday</div>
									</td>
									<td></td>
									<td>20 Jun 2023, 10:30 am</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label fs-3 bg-light-primary text-primary">N</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Neil Owen</a>
											<span>owen.neil@gmail.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Analyst</td>
									<td>
										<div class="badge badge-light fw-bold">20 mins ago</div>
									</td>
									<td>
										<div class="badge badge-light-success fw-bold">Enabled</div>
									</td>
									<td>19 Aug 2023, 11:05 am</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-23.jpg" alt="Dan Wilson" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Dan Wilson</a>
											<span>dam@consilting.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Developer</td>
									<td>
										<div class="badge badge-light fw-bold">3 days ago</div>
									</td>
									<td></td>
									<td>15 Apr 2023, 8:43 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label fs-3 bg-light-danger text-danger">E</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Emma Bold</a>
											<span>emma@intenso.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Support</td>
									<td>
										<div class="badge badge-light fw-bold">5 hours ago</div>
									</td>
									<td>
										<div class="badge badge-light-success fw-bold">Enabled</div>
									</td>
									<td>25 Jul 2023, 6:05 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Ana Crown</a>
											<span>ana.cf@limtel.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Developer</td>
									<td>
										<div class="badge badge-light fw-bold">2 days ago</div>
									</td>
									<td>
										<div class="badge badge-light-success fw-bold">Enabled</div>
									</td>
									<td>15 Apr 2023, 10:30 am</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label fs-3 bg-light-info text-info">A</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Robert Doe</a>
											<span>robert@benko.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Administrator</td>
									<td>
										<div class="badge badge-light fw-bold">5 days ago</div>
									</td>
									<td></td>
									<td>21 Feb 2023, 5:20 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-13.jpg" alt="John Miller" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">John Miller</a>
											<span>miller@mapple.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Trial</td>
									<td>
										<div class="badge badge-light fw-bold">3 weeks ago</div>
									</td>
									<td></td>
									<td>21 Feb 2023, 9:23 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label fs-3 bg-light-success text-success">L</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Lucy Kunic</a>
											<span>lucy.m@fentech.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Administrator</td>
									<td>
										<div class="badge badge-light fw-bold">Yesterday</div>
									</td>
									<td></td>
									<td>05 May 2023, 9:23 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label fs-3 bg-light-danger text-danger">M</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Melody Macy</a>
											<span>melody@altbox.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Analyst</td>
									<td>
										<div class="badge badge-light fw-bold">20 mins ago</div>
									</td>
									<td>
										<div class="badge badge-light-success fw-bold">Enabled</div>
									</td>
									<td>05 May 2023, 10:30 am</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-1.jpg" alt="Max Smith" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Max Smith</a>
											<span>max@kt.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Developer</td>
									<td>
										<div class="badge badge-light fw-bold">3 days ago</div>
									</td>
									<td></td>
									<td>20 Dec 2023, 5:20 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-5.jpg" alt="Sean Bean" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Sean Bean</a>
											<span>sean@dellito.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Support</td>
									<td>
										<div class="badge badge-light fw-bold">5 hours ago</div>
									</td>
									<td>
										<div class="badge badge-light-success fw-bold">Enabled</div>
									</td>
									<td>05 May 2023, 8:43 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-25.jpg" alt="Brian Cox" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Brian Cox</a>
											<span>brian@exchange.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Developer</td>
									<td>
										<div class="badge badge-light fw-bold">2 days ago</div>
									</td>
									<td>
										<div class="badge badge-light-success fw-bold">Enabled</div>
									</td>
									<td>05 May 2023, 10:10 pm</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label fs-3 bg-light-warning text-warning">C</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Mikaela Collins</a>
											<span>mik@pex.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Administrator</td>
									<td>
										<div class="badge badge-light fw-bold">5 days ago</div>
									</td>
									<td></td>
									<td>20 Jun 2023, 10:30 am</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div>
									</td>
									<td class="d-flex align-items-center">
										<!--begin:: Avatar -->
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="../../demo39/dist/apps/user-management/users/view.html">
												<div class="symbol-label">
													<img src="assets/media/avatars/300-9.jpg" alt="Francis Mitcham" class="w-100" />
												</div>
											</a>
										</div>
										<!--end::Avatar-->
										<!--begin::User details-->
										<div class="d-flex flex-column">
											<a href="../../demo39/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Francis Mitcham</a>
											<span>f.mit@kpmg.com</span>
										</div>
										<!--begin::User details-->
									</td>
									<td>Trial</td>
									<td>
										<div class="badge badge-light fw-bold">3 weeks ago</div>
									</td>
									<td></td>
									<td>19 Aug 2023, 10:30 am</td>
									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
										<i class="ki-outline ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="../../demo39/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
								</tr>
							</tbody>
						</table>
						<!--end::Table-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Content container-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Content wrapper-->
</div> --}}
<div id="kt_app_content_container" class="container-fluid app-container">
    <div class="px-4 px-sm-6 px-lg-8 py-8">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
			<!--begin::Welcome Banner-->
            <div id="welcome-banner" class="position-relative bg-indigo p-4 p-sm-4 rounded-sm overflow-hidden mb-10">
                <div class="position-relative bg-indigo-300 p-4 rounded mb-4">
                    <!-- Background illustration -->
                    <div class="position-absolute end-0 top-0 me-4 d-none d-xl-block" style="opacity: 0.5;">
                        <svg width="319" height="198">
                            <defs>
                                <path id="welcome-a" d="M64 0l64 128-64-20-64 20z" />
                                <path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z" />
                                <path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z" />
                                <linearGradient id="welcome-b" x1="50%" y1="0%" x2="50%" y2="100%">
                                    <stop offset="0%" style="stop-color: #A5B4FC;" />
                                    <stop offset="100%" style="stop-color: #818CF8;" />
                                </linearGradient>
                                <linearGradient id="welcome-c" x1="50%" y1="24.537%" x2="50%" y2="100%">
                                    <stop offset="0%" style="stop-color: #4338CA;" />
                                    <stop offset="100%" style="stop-color: #6366F1; stop-opacity: 0;" />
                                </linearGradient>
                            </defs>
                            <g fill="none">
                                <g transform="rotate(64 36.592 105.604)">
                                    <mask id="welcome-d" fill="#fff">
                                        <use href="#welcome-a" />
                                    </mask>
                                    <use fill="url(#welcome-b)" href="#welcome-a" />
                                    <path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z" />
                                </g>
                                <g transform="rotate(-51 91.324 -105.372)">
                                    <mask id="welcome-f" fill="#fff">
                                        <use href="#welcome-e" />
                                    </mask>
                                    <use fill="url(#welcome-b)" href="#welcome-e" />
                                    <path fill="url(#welcome-c)" mask="url(#welcome-f)" d="M40.333-15.147h50v95h-50z" />
                                </g>
                                <g transform="rotate(44 61.546 392.623)">
                                    <mask id="welcome-h" fill="#fff">
                                        <use href="#welcome-g" />
                                    </mask>
                                    <use fill="url(#welcome-b)" href="#welcome-g" />
                                    <path fill="url(#welcome-c)" mask="url(#welcome-h)" d="M40.333-15.147h50v95h-50z" />
                                </g>
                            </g>
                        </svg>
                    </div>

                    <!-- Content -->
                    <div class="position-relative">
                        <h1 id="banner-font-h" class="d-flex align-items-center text-dark mb-5">Selamat Datang, 
                            {{-- {{ Auth::user()->name }} --}}
                        </h1>
                        <p id="banner-font-p" class="text-indigo-200">Berikut Laporan Untuk Hari Ini :</p>
                    </div>
                </div>
            </div>
			<!--end::Welcome Banner-->

			<!--begin::Row-->
			<div class="row">
				<!-- Kolom pertama -->
				<div class="col-12 col-sm-4 col-xl-4 mb-4 d-flex flex-column">
					<div class="card h-100 shadow-sm border-gradient-red">
						<div class="card-body">
							<header class="d-flex justify-content-between align-items-start mb-2">
								<!-- Icon -->
								<img alt="Icon" src="assets/media/icons/icon-02.svg" width="32" height="32" />
								<!-- Menu button -->
								<div class="dropdown">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<li><a class="dropdown-item" href="#0">Option 1</a></li>
										<li><a class="dropdown-item" href="#0">Option 2</a></li>
										<li><a class="dropdown-item text-danger" href="#0">Remove</a></li>
									</ul>
								</div>
							</header>
							<h2 class="d-flex align-items-center text-dark mb-5">Total Laporan</h2>
							<div class="text-muted text-uppercase mb-1">Sales</div>
							<div class="d-flex align-items-start">
								<div class="fs-3 fw-bold text-slate-800 dark:text-slate-100 me-2">
									{{-- ${{ number_format($dataFeed->sumDataSet(2, 1), 0) }} --}}
								</div>
								<div class="badge bg-amber-500">-14%</div>
							</div>
						</div>
					</div>
				</div>
			
				<!-- Kolom kedua -->
				<div class="col-12 col-sm-4 col-xl-4 mb-4 d-flex flex-column">
					<div class="card h-100 shadow-sm border-gradient-red">
						<div class="card-body">
							<header class="d-flex justify-content-between align-items-start mb-2">
								<!-- Icon -->
								<img alt="Icon" src="assets/media/icons/icon-02.svg" width="32" height="32" />
								<!-- Menu button -->
								<div class="dropdown">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<li><a class="dropdown-item" href="#0">Option 1</a></li>
										<li><a class="dropdown-item" href="#0">Option 2</a></li>
										<li><a class="dropdown-item text-danger" href="#0">Remove</a></li>
									</ul>
								</div>
							</header>
							<h2 class="d-flex align-items-center text-dark mb-5">Total Laporan</h2>
							<div class="text-muted text-uppercase mb-1">Sales</div>
							<div class="d-flex align-items-start">
								<div class="fs-3 fw-bold text-slate-800 dark:text-slate-100 me-2">
									{{-- ${{ number_format($dataFeed->sumDataSet(2, 1), 0) }} --}}
								</div>
								<div class="badge bg-amber-500">-14%</div>
							</div>
						</div>
					</div>
				</div>
			
				<!-- Kolom ketiga -->
				<div class="col-12 col-sm-4 col-xl-4 mb-4 d-flex flex-column">
					<div class="card h-100 shadow-sm border-gradient-red">
						<div class="card-body">
							<header class="d-flex justify-content-between align-items-start mb-2">
								<!-- Icon -->
								<img alt="Icon" src="assets/media/icons/icon-02.svg" width="32" height="32" />
								<!-- Menu button -->
								<div class="dropdown">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<li><a class="dropdown-item" href="#0">Option 1</a></li>
										<li><a class="dropdown-item" href="#0">Option 2</li>
										<li><a class="dropdown-item text-danger" href="#0">Remove</a></li>
									</ul>
								</div>
							</header>
							<h2 class="d-flex align-items-center text-dark mb-5">Total Laporan</h2>
							<div class="text-muted text-uppercase mb-1">Sales</div>
							<div class="d-flex align-items-start">
								<div class="fs-3 fw-bold text-slate-800 dark:text-slate-100 me-2">
									{{-- ${{ number_format($dataFeed->sumDataSet(2, 1), 0) }} --}}
								</div>
								<div class="badge bg-amber-500">-14%</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end::Row-->
        </div>
    </div>
</div>


@endsection
