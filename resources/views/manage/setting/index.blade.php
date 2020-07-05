@extends('layouts.dashboard.backend')


@section('content')

<div>
    <h2>Website Colors</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Setting</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <form action="{{ route('manage.setting.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="preloader">Preloader Color</label>
                    <input type="color" name="preloader" value="{{ $setting->preloader }}"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="font">Font Color</label>
                    <input type="color" name="font" value="{{ $setting->font }}"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="lightbox">lightbox Color</label>
                    <input type="color" name="lightbox" value="{{ $setting->lightbox }}"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="icon">Fav Icon</label>
                    <input type="file" name="icon"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="background">Background Image</label>
                    <input type="file" name="background"
                        class="form-control">
                </div>

                <div class="from-group">
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Update Settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop