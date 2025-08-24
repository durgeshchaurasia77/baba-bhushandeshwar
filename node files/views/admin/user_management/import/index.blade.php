@extends('admin.layout.app')
<title>Rejected User Data</title>
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="mdl-stepper-title">
                    <h3>User Rejected List</th>
                        <a type="button" class="btn btn-secondary" style="float:right;" href="{{ route('user-list') }}"
                            title="Back To Upload">
                            Back To Upload
                        </a>
                </div><br>
                <table id="multi-filter-select" class="table">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No.</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sr = 1;
                            // dd($allAbortData);
                        @endphp

                        @foreach ($allAbortData as $user)
                            <tr>
                                <td>{{ $sr++ }}</td>
                                <td>{{ $user[1] ?? '' }}</td>
                                <td>{{ $user[2] ?? '' }}</td>
                                <td>{{ $user[3] ?? '' }}</td>
                                <td>{{ $user['4'] ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
