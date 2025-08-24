@extends('admin.layout.app')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit {{$cms->name ?? ''}}</div>
                        </div>
                        <form action="{{ route('update-cms') }}" method="post" class="formSubmit"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $cms->id ?? ''}}">
                            <div class="card-body element-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inlineinput">Title<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" id="inlineinput"
                                                placeholder="Enter Title" value="{{ $cms->name ?? '' }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Details<span style="color:red;">*</span></label>
                                            <textarea class="summernote" name="details" class="form-control" spellcheck="false" required>{{ $cms->details ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action element-2 text-center">
                                <a href="{{ route('cms') }}" class="btn btn-light mr-2">Cancel</a>
                                <button type="submit" name="Submit" id="loderButton"
                                    class="btn btn-primary px-5 rounded-0 loderButton">
                                      <span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>
                                      Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- @dd($cms); --}}
        </div>
    </div>
@endsection
