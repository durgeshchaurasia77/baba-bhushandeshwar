@extends('admin.layout.app')
@section('title')
User
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
								<div class="col-sm-8">
									<h4 class="page-title">User List</h4>
								</div>
								<div class="col-sm-4 text-sm-end">
									<div class="head-icons">
										<a href="{{ route('user-list')}}" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Collapse" id="collapse-header"><i
												class="ti ti-chevrons-up"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Page Header -->

						<div class="card">
							<div class="card-header">
								<!-- Search -->
								<div class="row align-items-center">
									<div class="col-sm-4">
									</div>
									<div class="col-sm-8">
										<div class="text-sm-end">
                                            <a class="btn btn-info" href="{{ route('user-sample-export') }}" title="Download Sample">
                                                <i class="fa fa-download" aria-hidden="true"></i> Download Sample
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-info" data-bs-target="#importfilemodal" data-bs-toggle="modal" title="Upload File">
                                                <i class="fa-solid fa-file-import" aria-hidden="true"></i> Import
                                            </a>
                                            <a class="btn btn-info" href="{{ route('user-export') }}" title="Export the data">
                                                <i class="fa-solid fa-file-export" aria-hidden="true"></i> Export
                                            </a>
											<a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_category" title="Add user">
                                                <i class="ti ti-square-rounded-plus me-2"></i>Add User
                                            </a>
										</div>
									</div>
								</div>
                                <div class="box-body">
                                    <form class="form-horizontal" action="{{ route('user-list') }}" method="get">
                                       <div class="row p-3">
                                         <!--  @csrf -->
                                          <div class="col-md-4">
                                             <label>Search by name</label>
                                             <input type="text" name="name" class="form-control" placeholder="Enter Name..." value="{{$name ?? ''}}">
                                          </div>
                                          <div class="col-md-4">
                                             <label>Search by email</label>
                                             <input type="text" name="email" class="form-control" placeholder="Enter Email..." value="{{$email ?? ''}}">
                                          </div>
                                          <div class="col-md-4">
                                             <label>Search by phone</label>
                                             <input type="text" name="phone" class="form-control" placeholder="Enter Phone..." value="{{$phone ?? ''}}">
                                          </div>

                                          <div class="col-md-12 text-right">
                                             <div style="margin-top: 24px;">
                                                <a href="{{route('user-list')}}" class="btn btn-light">Clear</a>
                                                <button class="btn btn-main btn-primary">Search</button>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
								<!-- /Search -->
							</div>
							<div class="card-body">
								<!-- Contact Stage List -->
								<div class="table-responsive">
									<table class="table text-nowrap">
										<thead>
											<tr>
												<th scope="col">Sr. No.</th>
												<th scope="col">Name</th>
                                                <th scope="col">Email Id</th>
                                                <th scope="col">Phone No.</th>
                                                <th scope="col">Image</th>
												<th scope="col">Status</th>
												<th scope="col">Action</th>
											</tr>
										</thead>
                                        <tbody>
                                            @foreach($userList as $key=>$user)
                                               <tr>
                                                  <td>{{$key+1}}</td>
                                                <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                    {{ $user->name ?? ''}}
                                                  </td>
                                                  <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                    {{ $user->email ?? ''}}
                                                  </td>
                                                  <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                    {{ $user->phone ?? ''}}
                                                  </td>
                                                  <td>
                                                     <img src="{{asset($user->image ?? '#' )}}" width="50px" height="50px" alt="User Image" loading="lazy" onerror="this.src='{{ asset('notImage.jpg') }}'">
                                                  </td>
                                                  <td>
                                                     @if($user->status == 1)
                                                     <span class="badge bg-success active_btn">Active</span>
                                                     @else
                                                     <span class="badge bg-danger inactive_btn">Inactive</span>
                                                     @endif
                                                  </td>
                                                  <td>
                                                     <div class="form-button-action">
                                                        <button type="button" data-href="{{ route('user-edit',[base64_encode($user->id)]) }}" class="btn btn-secondary edit_model" data-bs-toggle="modal" data-bs-target="#edit_model" title="Edit">
                                                            <i class="feather-edit"></i>
                                                        </button>

                                                        <button  @if($user->status == 1) class="btn btn-danger btn-xs mw-75 ml-2 mr-2" id="activateBtn" @else class="btn btn-success btn-xs mw-75 ml-2 mr-2" id="deactivateBtn" @endif href="{{ route('user-status-update', [$user->id]) }}" title="Status">@if($user->status == 1) <i class="feather-lock"></i> @else <i class="feather-unlock"></i> @endif</button>
                                                        <button id="delete" href="{{ route('user.delete',[$user->id]) }}" class="btn btn-danger btn-xs mr-2 jsgrid-delete-button" type="button" title="Delete"><i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                  </td>
                                               </tr>
                                            @endforeach
                                         </tbody>
									</table>
									<div class="row align-items-center mt-2 mb-2">
										<div class="col-md-6">
											<div class="datatable-length">
												Showing {{$userList->firstItem()}} to {{$userList->lastItem()}} of {{$userList->total()}} entries
											</div>
									    </div>
									    <div class="col-md-6">
									    	<div class="datatable-paginate">
									    		{!! $userList->appends(request()->input())->links('custom') !!}
                                                {{-- {!! $userList->appends(request()->input())->links() !!} --}}
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
		<!-- /Page Wrapper -->

		<!-- Add New Contact Stage -->
		<div class="modal fade" id="add_category" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add New User</h5>
						<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
							aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="{{ route('user-store') }}" method="post" class="formSubmit" enctype="multipart/form-data">
						@csrf
						<div class="modal-body">
							<div class="mb-3">
                                <label class="col-form-label">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name..." onkeypress="return alphaonly(event)">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Email Id<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email..." >
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Phone No.<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone" maxlength="10" id="phone" placeholder="Enter Phone..." onkeypress="return numbersonly(event)">
                            </div>
                            <div class="mb-3">
								<label class="col-form-label">Upload Profile Photo</label>
							   <input type="file" class="form-control" name="image" id="image">
							</div>
						</div>
						<div class="modal-footer">
							<div class="d-flex align-items-center justify-content-end m-0">
								<a href="javascript:void(0)" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
								<button type="submit" class="btn btn-primary loderButton"><span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Create</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add New Contact Stage -->
        {{-- import csv file modal --}}
        <div class="modal fade" id="importfilemodal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Upload Csv File</h5>
						<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
							aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
                    <form action="{{ route('user_bulk_store') }}" class="formSubmit" method="post" enctype="multipart/form-data">
						@csrf
						<div class="modal-body">
							<label for="" class="form-label">File<span
                                class="text-danger">*</span></label>
                        <input type="file" name="file" class="form-control"
                            accept=".csv">
						</div>
						<div class="modal-footer">
							<div class="d-flex align-items-center justify-content-end m-0">
                                <a class="btn btn-success" href="{{ route('user-sample-export') }}">Download
                                    Sample</a>&nbsp;&nbsp;
								<a href="javascript:void(0)" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
								<button type="submit" class="btn btn-primary loderButton"><span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Upload</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
        {{-- end import csv file modal --}}
@endsection
