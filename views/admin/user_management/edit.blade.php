<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit User</h5>
				<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
				aria-label="Close">
				<i class="ti ti-x"></i>
			</button>
		</div>
		<form action="{{ route('user-update') }}" method="post" id="" class="formSubmit" enctype="multipart/form-data">
    		@csrf
    		<input type="hidden" name="id" value="{{ $userData->id }}">
			<div class="modal-body">
				<div class="modal-body">
					<div class="mb-3">
						<label class="col-form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name..." value="{{$userData->name ?? ''}}" onkeypress="return alphaonly(event)">
					</div>
                    <div class="mb-3">
						<label class="col-form-label">Email Id<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email..." value="{{$userData->email ?? ''}}">
					</div>
                    <div class="mb-3">
						<label class="col-form-label">Phone No.<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" maxlength="10"  name="phone" id="phone" placeholder="Enter Phone..." value="{{$userData->phone ?? ''}}" onkeypress="return numbersonly(event)">
					</div>
                    <div class="mb-3">
						<label>Upload Images</label>
                        <input type="file" class="form-control" name="image" id="image"  accept="image/*" onchange="return validate_fileupload(event)" accept=".png,.jpg,.jpeg,.webp" >
                        @if ($userData->image != '')
                        <img src="{{asset($userData->image)}}"  width="150px" height="150px" style="padding:11px">
                        @endif
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<div class="d-flex align-items-center justify-content-end m-0">
					<a href="javascript:void(0)" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>

					<button type="submit" class="btn btn-primary loderButton"><span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Save Changes</button>
				</div>
			</div>
		</form>
	</div>
</div>
