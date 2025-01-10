@extends('admin.layouts.master')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th><button class="table-sort" data-sort="sort-name">Name</button></th>
                                <th><button class="table-sort" data-sort="sort-city">Email</button></th>
                                <th><button class="table-sort" data-sort="sort-type">Document</button></th>
                                <th><button class="table-sort" data-sort="sort-type">Status</button></th>
                                <th><button class="table-sort" data-sort="sort-score">Action</button></th>
                            </tr>
                            </thead>
                            <tbody class="table-tbody">
                            @foreach($users as $user)
                                <tr>
                                    <td class="sort-name">{{$user->name}}</td>
                                    <td class="sort-name">{{$user->email}}</td>
                                    <td class="sort-type"><a href="{{route('admin.instructorRequestDownload',$user)}}">Download</a></td>
                                    <td class="sort-name">{{$user->approve_status}}</td>
                                    <td class="sort-score">
                                        <form class="status" method="POST" action="{{ route('admin.instructorRequestStore', $user) }}">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()">
                                                <option @selected($user->approve_status === 'pending') value="pending">Pending</option>
                                                <option @selected($user->approve_status === 'approved') value="approved">Approved</option>
                                                <option @selected($user->approve_status === 'rejected') value="rejected">Rejected</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
