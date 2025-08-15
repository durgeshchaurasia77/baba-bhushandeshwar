@extends('admin.layout.app')
@section('title')
Profile
@endsection
@section('content')
<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">
				<div class="row">
					<div class="col-md-12">

						<!-- Page Header -->
						<div class="page-header">
							<div class="row align-items-center">
								<div class="col-8">
									<h4 class="page-title">Settings</h4>
								</div>
								<div class="col-4 text-end">
									<div class="head-icons">
										<a href="{{ route('security') }}" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Collapse" id="collapse-header"><i
												class="ti ti-chevrons-up"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Page Header -->

						<!-- Settings Menu -->
						<div class="card">
							<div class="card-body pb-0 pt-2">
								<ul class="nav nav-tabs nav-tabs-bottom">
									<li class="nav-item me-3">
										<a href="javascript:void(0)" class="nav-link px-0 active">
											<i class="ti ti-settings-cog me-2"></i>General Settings
										</a>
									</li>

								</ul>
							</div>
						</div>
						<!-- /Settings Menu -->

						<div class="row">
							<div class="col-xl-3 col-lg-12 theiaStickySidebar">

								<!-- Settings Sidebar -->
								<div class="card">
									<div class="card-body">
										<div class="settings-sidebar">
											<h4 class="fw-semibold mb-3">General Settings</h4>
											<div class="list-group list-group-flush settings-sidebar">
												<a href="{{ route('admin_profile') }}" class="fw-medium">Profile</a>
												<a href="{{ route('security') }}" class="fw-medium active">Change Password</a>

											</div>
										</div>
									</div>
								</div>
								<!-- /Settings Sidebar -->

							</div>

							<div class="col-xl-9 col-lg-12">

								<!-- Settings Info -->
								<div class="card col-md-12">
									<div class="card-body pb-0">
										<h4 class="fw-semibold mb-3">Password Settings</h4>
										<div class="row">
											<div class=" col-md-12 d-flex">
												<div class="card border shadow-none flex-fill mb-3">
													<div class="card-body d-flex justify-content-between flex-column">
														<div class="mb-3">
															<div
																class="d-flex align-items-center justify-content-between mb-1">
																<h6 class="fw-semibold">Password</h6>
															</div>
														</div>
														<div>
                                                            <form class="formSubmit" action="{{route('admin_update_password')}}" method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="col-md-12">
                                                                        <label class="col-form-label">Current Password <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="password" name="old_password" class="form-control" required >
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label class="col-form-label">New Password <span class="text-danger">*</span></label>
                                                                        <input type="password" name="new_password" class="form-control" required>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label class="col-form-label">Confirm Password <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="password" class="form-control" name="conf_password" required>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="modal-footer">
                                                                    <div class="d-flex align-items-center">
                                                                        <a href="{{route('home')}}" class="btn btn-light me-2">Cancel</a>
                                                                        <button type="submit" class="btn btn-primary loderButton">
                                                                            <span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Save
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
								<!-- /Settings Info -->

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- /Page Wrapper -->

		<!-- Change Password -->
		<div class="modal fade" id="change_password" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Change Password</h5>
						<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
							aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form class="formSubmit" action="{{route('admin_update_password')}}" method="post">
						@csrf
						<div class="modal-body">
							<div class="mb-3">
								<label class="col-form-label">Current Password <span
										class="text-danger">*</span></label>
								<input type="password" name="old_password" class="form-control" required >
							</div>
							<div class="mb-3">
								<label class="col-form-label">New Password <span class="text-danger">*</span></label>
								<input type="password" name="new_password" class="form-control" required>
							</div>
							<div class="mb-0">
								<label class="col-form-label">Confirm Password <span
										class="text-danger">*</span></label>
								<input type="password" class="form-control" name="conf_password" required>
							</div>
						</div>
						<div class="modal-footer">
							<div class="d-flex align-items-center">
								<a href="javascript:void(0)" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
								<button type="submit" class="btn btn-primary loderButton">
									<span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Change Password -->
@endsection
