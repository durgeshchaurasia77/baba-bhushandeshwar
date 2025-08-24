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
                  <div class="col-sm-4">
                     <h4 class="page-title">Settings</h4>
                  </div>
                  <div class="col-sm-8 text-sm-end">
                     <div class="head-icons">
                        <a href="{{ route('admin_profile') }}" data-bs-toggle="tooltip" data-bs-placement="top"
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
                              <a href="{{ route('admin_profile') }}" class="fw-medium active">Profile</a>
                              <a href="{{ route('security') }}" class="fw-medium">Change Password</a>

                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /Settings Sidebar -->
               </div>
               <div class="col-xl-9 col-lg-12">
                  <!-- Settings Info -->
                  <div class="card">
                     <div class="card-body">
                        <h4 class="fw-semibold mb-3">Profile Settings</h4>
                         <form class="formSubmit" action="{{route('admin_update_profile')}}"  method="post" enctype="multipart/form-data">
                  	      @csrf
                           <div class="border-bottom mb-3 pb-3">
                              <h5 class="fw-semibold mb-1">Admin Information</h5>
                              <p>Update the Information Below</p>
                           </div>
                           <div class="mb-3">
                              <div class="profile-upload">
                                 <div class="profile-upload-img">
                                    {{-- <span> --}}
                                        <span class="user-letter">
                                            <img src="{{asset($user->profile_image)}}" alt="Profile" height="50px" width="50" style="border-radius: 50%" loading="lazy" onerror="this.src='{{ asset('assets/img/profiles/avatar-20.jpg') }}'">
                                        </span>
                                    {{-- </span> --}}
                                    <img id="ImgPreview" src="{{asset($user->profile_image)}}"
                                       alt="img" class="preview1" loading="lazy" onerror="this.src='{{ asset('assets/img/profiles/avatar-02.jpg') }}'">
                                    <button type="button" id="removeImage1" class="profile-remove">
                                    <i class="feather-x"></i>
                                    </button>
                                 </div>
                                 <div class="profile-upload-content">
                                    <label class="profile-upload-btn">
                                    <i class="ti ti-file-broken"></i> Upload File
                                    <input type="file" id="imag" name="profile_image" class="input-img" accept=".png,.jpg,.jpeg,.gif,.svg" onchange="previewImage(event)">
                                    </label>
                                    <p>JPG or PNG. Max size of 800K</p>
                                 </div>
                              </div>
                           </div>
                           <div class="border-bottom mb-3">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label">
                                       Full Name <span class="text-danger">*</span>
                                       </label>
                                       <input type="text" name="name"  class="form-control" value="{{$user->name}}" onkeypress="return alphaonly(event)" required>
                                    </div>
                                 </div>


                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label">
                                       Mobile Number <span class="text-danger">*</span>
                                       </label>
                                       <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}" minlength="10" maxlength="10" onkeypress="return numbersonly(event)" required>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label">
                                       Email <span class="text-danger">*</span>
                                       </label>
                                       <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                                    </div>
                                 </div>
                              </div>
                           </div>


                           <div style="text-align: end;">

                              <button type="submit" class="btn btn-primary loderButton">
									<span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Update Profile</button>
                           </div>
                        </form>
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
@endsection
