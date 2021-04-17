@extends('admin.layouts.master')
@section('title','Create | Employee')
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('user.index')}}"><i class="fas fa-list"></i> Employees list</a></li>
            <li class="breadcrumb-item" aria-current="page"><i class="fas fa-plus"></i> Add Employee</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <span class="text-danger">*</span> {{ $errors->first() }}
            </div>
        @endif
        <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
            @csrf

                <div class="form-group">
                    <label class="bmd-label-floating">Name <i class="text-danger">*</i></label>
                    <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                </div>

                <div class="form-group">
                    <label class="bmd-label-floating">Email <i class="text-danger">*</i></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email')}}">
                </div>

                <div class="form-group">
                    <label class="bmd-label-floating">Phone <i class="text-danger">*</i></label>
                    <input type="number" class="form-control" name="phone" value="{{ old('phone')}}" min="1">
                </div>

                <div class="form-group">
                    <label class="bmd-label-floating">DOB <i class="text-danger">*</i></label>
                    <input type="date" class="form-control" name="dob" value="{{ old('dob')}}"  >
                </div>

                <button type="submit" id="btn" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>
@endsection
