@extends('layouts.dashboard.backend')



@section('content')


<div>
    <h2>Certificates</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Certificate</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#Add-Modal" class="btn btn-primary" style="color: white"><i
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
                    @if ($certificates->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Post Title</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($certificates as $index=>$certificate)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    {{ $certificate->title }}
                                </td>
                                <td>
                                    {{ $certificate->from }}
                                </td>
                                <td>
                                    {{ $certificate->to }}
                                </td>
                                <td>
                                    <a data-toggle="modal"
                                        data-target="#Edit-Modal-{{ $certificate->id }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit mr-0"></i>

                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#Delete-Modal-{{ $certificate->id }}"><i class="fa fa-trash mr-0"></i> </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $certificates->appends(request()->query())->links() }}
                    @else
                    <p colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No
                        Certificates
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Certificate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.certificate.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Enter Title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" placeholder="Enter description" id="" cols="30" rows="10"
                            class="form-control" required></textarea>
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

@foreach ($certificates as $index=>$certificate)
<!-- Edit-Modal -->
<div class="modal fade" id="Edit-Modal-{{ $certificate->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit :
                    {{ $certificate->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.certificate.update' , $certificate->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ $certificate->title }}" placeholder="Enter Title"
                            class="form-control" required>
                    </div>
                    

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="" cols="30" rows="10"
                            class="form-control" required>{{ $certificate->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="from">Date From</label>
                        <input type="date" name="from" value="{{ $certificate->from }}" placeholder="Date From"
                            class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="to">Date To</label>
                        <input type="date" name="to" value="{{ $certificate->to }}" placeholder="Date To"
                            class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="Delete-Modal-{{ $certificate->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete : {{ $certificate->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.certificate.destroy', $certificate->id) }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('delete')
                <div class="modal-body">
                    <div class="form-group">
                        <h3 for="title">Are you sure you want to delete it?</h3>
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

@stop
