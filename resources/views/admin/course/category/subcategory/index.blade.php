@extends('admin.layouts.master')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sub category of {{$course_category->name}}</h3>
                    <div class="card-actions">
{{--                        --}}
                        <a href="{{route('admin.sub_course_category.create',$course_category->id)}}" class="btn btn-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Add new
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <button class="table-sort" data-sort="sort-name">Icon</button>
                                </th>
                                <th>
                                    <button class="table-sort" data-sort="sort-name">Name</button>
                                </th>
                                <th>
                                    <button class="table-sort" data-sort="sort-city">Slug</button>
                                </th>
                                <th>
                                    <button class="table-sort" data-sort="sort-score">Trending</button>
                                </th>
                                <th>
                                    <button class="table-sort" data-sort="sort-score">Status</button>
                                </th>
                                <th>
                                    <button class="table-sort" data-sort="sort-score">Action</button>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="table-tbody">

                                @forelse($course_subcategory As $subCategory)

                                    <tr>
                                        <td>
                                            <div class="icon-container">
                                                <i class="{{$subCategory->icon}}"></i>
                                            </div>
                                        </td>
                                        <td>{{$subCategory->name}}</td>
                                        <td>{{$subCategory->slug}}</td>
                                        @if(!$subCategory->show_at_trending)
                                            <td><span class="badge bg-red text-red-fg">No</span></td>
                                        @else
                                            <td><span class="badge bg-green text-green-fg">Yes</span></td>
                                        @endif

                                        @if(!$subCategory->status)
                                            <td><span class="badge bg-red text-red-fg">No</span></td>
                                        @else
                                            <td><span class="badge bg-green text-green-fg">Yes</span></td>
                                        @endif
                                        <td>
                                            <a href="{{route('admin.course-category.edit',$subCategory)}}">Edit</a>
                                            <form action="{{ route('admin.course-category.destroy',$subCategory)}}"
                                                  method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?');">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="currentColor"
                                                         class="icon icon-tabler icons-tabler-filled icon-tabler-trash-x">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path
                                                            d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16zm-9.489 5.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z"/>
                                                        <path
                                                            d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z"/>
                                                    </svg>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center">No Data Available</td>
                                    </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
