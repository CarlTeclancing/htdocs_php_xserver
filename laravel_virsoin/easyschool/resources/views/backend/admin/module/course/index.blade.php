<x-master-admin site-title="{{ $siteTitle }}" page-title="{{ $pageTitle }}">


    <x-breadcrumb page-title="{{ $pageTitle }}" site-title="{{ $siteTitle }}"
        dashboard-route="{{ route('admin.dashboard') }}" />

    <div class="row">

        <div class="col-12">
            <x-alert-notify />
        </div>

        <div class="col-xl-12 col-xxl-12 d-flex">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <div class="row">
                                <div
                                    class="col-12 col-md-9 d-flex justify-content-center justify-content-md-start align-items-center">
                                    <form action="" method="GET">
                                        <div class="col-12">
                                            <input type="search" class="form-control" title="Press Enter to Search"
                                                placeholder="Search..." name="search" id="search"
                                                value="{{ (request()->query('search') != null) ? request()->query('search') : '' }}">
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="col-12 col-md-3 d-flex justify-content-center justify-content-md-end align-items-center">
                                    
                                </div>
                            </div>
                        </h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:15%">Name</th>
                                    <th style="width:30%;">Description</th>
                                    <th style="width:10%; text-align:center;">Status</th>
                                    <th style="width:20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(isset($courses) && !empty($courses) && count($courses) > 0)

                                @foreach ( $courses as $course )

                                <tr>

                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->description }}</td>
                                    <td style="text-align:center;">
                                        @if($course->status->id == 1)
                                        <span class="badge bg-success">{{ $course->status->name }}</span>
                                        @elseif($course->status->id == 2)
                                        <span class="badge bg-warning">{{ $course->status->name }}</span>
                                        @endif
                                    </td>
                                    <td class="table-action">

                                        <a href="{{ route('admin.course.edit', $course->id) }}"
                                            class="btn btn-primary text-white" title="view course">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor align-middle"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                                        </a>

                                        @if($course->status->id == 2)
                                        <a href="{{ route('admin.course.activate', $course->id) }}"
                                            class="btn btn-success text-white" title="activate">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-toggle-left align-middle"><rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect><circle cx="8" cy="12" r="3"></circle></svg>
                                        </a>
                                        @elseif($course->status->id == 1)
                                        <a href="{{ route('admin.course.deactivate', $course->id) }}"
                                            class="btn btn-warning text-white" title="deactivate">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-toggle-right align-middle"><rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect><circle cx="16" cy="12" r="3"></circle></svg>
                                        </a>
                                        @endif

                                        
                                        @can('super-admin')

                                        <button type="button" class="btn btn-danger deleteButton" title="delete"
                                            data-toggle="modal" data-target="#deleteModal"
                                            resource-id="{{ $course->id }}" resource-name="course">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </button>

                                        <x-modal-delete resource="course" />

                                        @endcan

                                    


                                    </td>
                                </tr>

                                @endforeach

                                @else

                                <tr>
                                    <td colspan="8" class="text-center">No Courses Found</td>
                                </tr>

                                @endif

                            </tbody>




                        </table>
                    </div>

                    <div class="card-footer">
                            {{ $courses->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>



</x-master-admin>