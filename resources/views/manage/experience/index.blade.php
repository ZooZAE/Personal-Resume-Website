@extends('layouts.dashboard.backend')



@section('content')


<div>
    <h2>Experience</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Experience</li>
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
                    @if ($experiences->count() > 0)
                    <table class="table" id="education_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="25%">Title</th>
                                <th width="25%">Place</th>
                                <th width="25%">Date</th>
                                <th width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experiences as $index=>$experience)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    {{ $experience->title }}
                                </td>
                                <td>
                                    {{ $experience->place_name }}
                                </td>
                                <td>
                                    {{ $experience->from }} / {{ $experience->to }}
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#Edit-Modal-{{ $experience->id }}"><i class="fa fa-edit mr-0"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal"
                                        data-target="#Delete-Modal-{{ $experience->id }}"><i
                                            class="fa fa-trash mr-0"></i> </button>
                                </td>
                            </tr>
                            <!-- Edit-Modal -->
                            <div class="modal fade" id="Edit-Modal-{{ $experience->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit :
                                                {{ $experience->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('manage.experience.update' , $experience->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" value="{{ $experience->title }}"
                                                        placeholder="Enter Title" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="place_name">Place Name</label>
                                                    <input type="text" name="place_name"
                                                        value="{{ $experience->place_name }}"
                                                        placeholder="Enter place name" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="from">Date From</label>
                                                    <input type="date" name="from" value="{{ $experience->from }}"
                                                        placeholder="Date From" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="to">Date To</label>
                                                    <input type="date" name="to" value="{{ $experience->to }}"
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
                            <div class="modal fade" id="Delete-Modal-{{ $experience->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Delete :
                                                {{ $experience->title }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('manage.experience.destroy', $experience->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <h3 for="title">Are you sure you want to delete
                                                        "{{ $experience->title }}"?</h3>
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
                    {{ $experiences->appends(request()->query())->links() }}
                    @else
                    <p colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No
                        Experience
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
            <form action="{{ route('manage.experience.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Enter Title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="place_name">Place Name</label>
                        <input type="text" name="place_name"
                            placeholder="Enter place name" class="form-control">
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
