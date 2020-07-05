@extends('layouts.dashboard.backend')



@section('content')


<div>
    <h2>Skills</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Skill</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#Add-Modal" class="btn btn-primary" style="color: white" class="btn btn-primary"><i
                                        class="fa fa-plus"></i>
                                    Add</a>
                            </div>
                        </div><!-- end of row -->
                    </form><!-- end of form -->
                </div><!-- end of col 12 -->

            </div><!-- end of row -->
            <br>
            <div class="row">
                <div class="col-md-12">
                    @if ($skills->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Skill Title</th>
                                <th>icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($skills as $index=>$skill)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    {{ $skill->skill }}
                                </td>
                                <td>
                                    <img src="../{{ $skill->icon }}" width="30" height="30" alt="{{ $skill->skill }}">
                                </td>
                                <td>
                                    <a data-toggle="modal"
                                        data-target="#Edit-Modal-{{ $skill->id }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit mr-0"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#Delete-Modal-{{ $skill->id }}"><i
                                                class="fa fa-trash mr-0"></i> </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $skills->appends(request()->query())->links() }}

                    @else
                    <p colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No Skills
                        Here</p>
                    @endif
                </div>
            </div>

        </div><!-- end of tile -->
    </div><!-- end of col -->
</div><!-- end of row -->

<!-- Create Modal -->
<div class="modal fade" id="Add-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.skill.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">

                <div class="form-group">
                    <label for="skill">Skill</label>
                    <input type="text" name="skill" placeholder="Enter Skill name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="file" name="icon" class="form-control" required>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($skills as $skill)
    <!-- Update Modal -->
<div class="modal fade" id="Edit-Modal-{{ $skill->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.skill.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-body">

                <div class="form-group">
                    <label for="skill">Skill</label>
                    <input type="text" name="skill" value="{{ $skill->skill }}" placeholder="Enter Skill name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="file" name="icon" class="form-control">
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="Delete-Modal-{{ $skill->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete : {{ $skill->skill }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.skill.destroy', $skill->id) }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('delete')
                <div class="modal-body">
                    <div class="form-group">
                        <h3 for="title">Are you sure you want to delete "{{ $skill->skill }}"?</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<style>
    .btn-circle.btn-sm { 
            border-radius: 15px; 
        } 
</style>
@stop
