@extends('layouts.dashboard.backend')



@section('content')


<div>
    <h2>Educations</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Education</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#AddModal" class="btn btn-primary"
                                    style="color: white"><i class="fa fa-plus"></i>Add</a>
                            </div>
                        </div><!-- end of row -->
                    </form><!-- end of form -->
                </div><!-- end of col 12 -->

            </div><!-- end of row -->
            <br>
            <div class="row">
                <div class="table-responsive">
                    @if ($educations->count() > 0)
                    <table class="table" id="education_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="35%">Post Title</th>
                                <th width="35%">Place</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($educations as $index=>$education)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    {{ $education->title }}
                                </td>
                                <td>
                                    {{ $education->place_name }}
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#Edit-Modal-{{ $education->id }}"><i class="fa fa-edit mr-0"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#Delete-Modal-{{ $education->id }}"><i class="fa fa-trash mr-0"></i> </button>
                                </td>
                            </tr>
                            <!-- Edit-Modal -->
                            <div class="modal fade" id="Edit-Modal-{{ $education->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit :
                                                {{ $education->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('manage.education.update' , $education->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" value="{{ $education->title }}"
                                                        placeholder="Enter Title" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Place</label>
                                                    <input type="text" name="place_name"
                                                        value="{{ $education->place_name }}"
                                                        placeholder="Enter Place Name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Date From</label>
                                                    <input type="date" name="from" value="{{ $education->from }}"
                                                        placeholder="Date From" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Date To</label>
                                                    <input type="date" name="to" value="{{ $education->to }}"
                                                        placeholder="Date To" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="Delete-Modal-{{ $education->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete : {{ $education->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('manage.education.destroy', $education->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <h3 for="title">Are you sure you want to delete it?</h3>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $educations->appends(request()->query())->links() }}
                    @else
                    <p colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No
                        Education
                        Here</p>
                    @endif
                </div>
            </div>
        </div><!-- end of tile -->
    </div><!-- end of col -->

</div><!-- end of row -->


<!-- Create Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.education.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Enter Title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Place</label>
                        <input type="text" name="place_name" placeholder="Enter Place Name" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="title">Date From</label>
                        <input type="date" name="from" placeholder="Date From" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Date To</label>
                        <input type="date" name="to" placeholder="Date To" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
