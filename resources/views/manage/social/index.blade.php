@extends('layouts.dashboard.backend')



@section('content')


<div>
    <h2>Social Links</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Social Links</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#Add-Modal" class="btn btn-primary"
                                    style="color: white" class="btn btn-primary"><i class="fa fa-plus"></i>
                                    Add</a>
                            </div>
                        </div><!-- end of row -->
                    </form><!-- end of form -->
                </div><!-- end of col 12 -->

            </div><!-- end of row -->
            <br>
            <div class="row">
                <div class="col-md-12">
                    @if ($socials->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($socials as $index=>$social)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    <i class="fa {{ $social->icon }} fa-2x" aria-hidden="true"></i>
                                </td>
                                <td>
                                    {{ $social->title }}
                                </td>
                                <td>
                                    @if ($social->enabled)
                                    <a href="{{ route('manage.social.disabled', $social->id) }}"
                                        class="btn btn-sm btn-danger">Disable</a>
                                    @else
                                    <a href="{{ route('manage.social.enabled', $social->id) }}"
                                        class="btn btn-sm btn-success">Enable</a>
                                    @endif
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#Edit-Modal-{{ $social->id }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit mr-0"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal"
                                        data-target="#Delete-Modal-{{ $social->id }}"><i class="fa fa-trash mr-0"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $socials->appends(request()->query())->links() }}

                    @else
                    <p colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No Social
                        Links
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Social Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.social.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="title" placeholder="Enter name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon => <a href="https://fontawesome.com/icons?d=gallery" target="_blank"
                                style="color:red"> Font Awesome </a></label>
                        <select class="form-control" name="icon" id="social_media" required="">
                            <option></option>
                            <option value="fa-facebook-f">Facebook</option>
                            <option value="fa-twitter">Twitter</option>
                            <option value="fa-google-plus-g">Google Plus</option>
                            <option value="fa-youtube">Youtube</option>
                            <option value="fa-instagram">Instagram</option>
                            <option value="fa-medium">Medium</option>
                            <option value="fa-vk">VK</option>
                            <option value="fa-weibo">Weibo</option>
                            <option value="fa-weixin">WeChat</option>
                            <option value="fa-meetup">Meetup</option>
                            <option value="fa-wikipedia-w">Wikipedia</option>
                            <option value="fa-quora">Quora</option>
                            <option value="fa-pinterest">Pinterest</option>
                            <option value="fa-dribbble">Dribbble</option>
                            <option value="fa-linkedin-in">Linkedin</option>
                            <option value="fa-behance-square">Behance</option>
                            <option value="fa-wordpress">WordPress</option>
                            <option value="fa-blogger-b">Blogger</option>
                            <option value="fa-whatsapp">Whatsapp</option>
                            <option value="fa-telegram">Telegram</option>
                            <option value="fa-skype">Skype</option>
                            <option value="fa-amazon">Amazon</option>
                            <option value="fa-stack-overflow">Stack Overflow</option>
                            <option value="fa-stack-exchange">Stack Exchange</option>
                            <option value="fa-github">Github</option>
                            <option value="fa-android">Android</option>
                            <option value="fa-vimeo-v">Vimeo</option>
                            <option value="fa-tumblr">Tumblr</option>
                            <option value="fa-vine">Vine</option>
                            <option value="fa-twitch">Twitch</option>
                            <option value="fa-flickr">Flickr</option>
                            <option value="fa-yahoo">Yahoo</option>
                            <option value="fa-reddit">Reddit</option>
                            <option value="fa-rss">Rss</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" placeholder="Enter url" class="form-control" required>
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

@foreach ($socials as $social)
<!-- Create Modal -->
<div class="modal fade" id="Edit-Modal-{{ $social->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit : {{ $social->title }}l</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.social.update', $social->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="title" value="{{ $social->title }}" placeholder="Enter name"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon ( <i class="fa {{ $social->icon }} fa-1x" aria-hidden="true"></i>
                            )</label>
                        <select class="form-control" name="icon" required="">
                            <option value="{{ $social->icon }}">{{ $social->title }}</option>
                            <option value="fa-facebook-f">Facebook</option>
                            <option value="fa-twitter">Twitter</option>
                            <option value="fa-google-plus-g">Google Plus</option>
                            <option value="fa-youtube">Youtube</option>
                            <option value="fa-instagram">Instagram</option>
                            <option value="fa-medium">Medium</option>
                            <option value="fa-vk">VK</option>
                            <option value="fa-weibo">Weibo</option>
                            <option value="fa-weixin">WeChat</option>
                            <option value="fa-meetup">Meetup</option>
                            <option value="fa-wikipedia-w">Wikipedia</option>
                            <option value="fa-quora">Quora</option>
                            <option value="fa-pinterest">Pinterest</option>
                            <option value="fa-dribbble">Dribbble</option>
                            <option value="fa-linkedin-in">Linkedin</option>
                            <option value="fa-behance-square">Behance</option>
                            <option value="fa-wordpress">WordPress</option>
                            <option value="fa-blogger-b">Blogger</option>
                            <option value="fa-whatsapp">Whatsapp</option>
                            <option value="fa-telegram">Telegram</option>
                            <option value="fa-skype">Skype</option>
                            <option value="fa-amazon">Amazon</option>
                            <option value="fa-stack-overflow">Stack Overflow</option>
                            <option value="fa-stack-exchange">Stack Exchange</option>
                            <option value="fa-github">Github</option>
                            <option value="fa-android">Android</option>
                            <option value="fa-vimeo-v">Vimeo</option>
                            <option value="fa-tumblr">Tumblr</option>
                            <option value="fa-vine">Vine</option>
                            <option value="fa-twitch">Twitch</option>
                            <option value="fa-flickr">Flickr</option>
                            <option value="fa-yahoo">Yahoo</option>
                            <option value="fa-reddit">Reddit</option>
                            <option value="fa-rss">Rss</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" value="{{ $social->url }}" placeholder="Enter url"
                            class="form-control" required>
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

<!-- Delete Modal -->
<div class="modal fade" id="Delete-Modal-{{ $social->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete "{{ $social->title }}"?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.social.destroy', $social->id) }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('delete')
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
