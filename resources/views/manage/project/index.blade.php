@extends('layouts.dashboard.backend')



@section('content')


<div>
    <h2>Projects</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Project</li>
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
                    @if ($projects->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $index=>$project)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    <img style="width: 90px;height: 50px;" src="../{{ $project->image}}"
                                        alt="{{$project->title}}">
                                </td>
                                <td>
                                    {{ $project->title }}
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#Edit-Modal-{{ $project->id }}"><i class="fa fa-edit mr-0"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal"
                                        data-target="#Delete-Modal-{{ $project->id }}"><i
                                            class="fa fa-trash mr-0"></i> </button>
                                </td>
                            </tr>
                            <!-- Edit-Modal -->
                            <div class="modal fade" id="Edit-Modal-{{ $project->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit :
                                                {{ $project->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('manage.project.update' , $project->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            {{ csrf_field() }}
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" value="{{ $project->title }}"
                                                        placeholder="Enter title" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" class="form-control"
                                                        accept="image/*">
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10"
                                                        placeholder="Enter description" class="form-control"
                                                        required>{{ $project->description }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="title">Date From</label>
                                                    <input type="date" name="from" value="{{ $project->from }}"
                                                        placeholder="Date From" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Date To</label>
                                                    <input type="date" name="to" value="{{ $project->to }}"
                                                        placeholder="Date To" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="url">URL</label>
                                                    <input type="text" name="url" value="{{ $project->url }}"
                                                        placeholder="Enter url" class="form-control">
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
                            <div class="modal fade" id="Delete-Modal-{{ $project->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to
                                                delete "{{ $project->title }}"</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('manage.project.destroy', $project->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            @method('delete')
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
                    {{ $projects->appends(request()->query())->links() }}
                    @else
                    <p colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No
                        Projects
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
            <form action="{{ route('manage.project.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Enter title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="50" rows="20"
                            placeholder="Enter description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="title">Date From</label>
                        <input type="date" name="from" placeholder="Date From" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="title">Date To</label>
                        <input type="date" name="to" placeholder="Date To" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" placeholder="Enter url" class="form-control">
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
