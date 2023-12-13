@extends('administrative.layouts.master')
@section('page-css')
@endsection
@section('content')
    {{-- <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-2 mb-2 ">
        <div>
            <h4 class="mb-3 mb-md-0">Permission Create</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('administrative.permission')}}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="server"></i>
                Permissions
            </a>
        </div>
    </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Permission Create</h6>
                <form class="forms-sample" action="{{route('administrative.permission.store')}} " method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
							<label for="name">Name</label>
								<input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Name" value="{{ old('name', isset($data) ? $data->name : '') }}" aria-invalid="true">
								@if ($errors->has('name'))
									<label id="name-error" class="error mt-2 text-danger" for="name">Please enter a name</label>
								@endif
						</div>

                    <button type="submit" class="btn float-start  btn-primary mr-2">Submit</button>
                    <a href="{{ route('administrative.permission') }}" class="btn float-end  btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div> --}}
    <div class="mt-4"></div>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-2 mb-2 ">
        <div>
            <h4 class="mb-3 mb-md-0">Permission Create</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('administrative.permission') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="uil uil-align-alt" data-feather="server"></i>
                Permissions
            </a>
        </div>
    </div>
    <div class="mt-4"></div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 grid-margin stretch-card">

            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-header">
                    <h6>Permission Create</h6>
                </div>
                <div class="card-body pb-md-30">
                    <div class="Vertical-form">
                        <form action="{{ route('administrative.permission.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name"
                                    class="color-dark fs-14 fw-500 align-center mb-10">Name</label>
                                <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    id="name" name="name" placeholder="" required>
                                @if ($errors->has('name'))
                                    <div id="name-error" class="invalid-feedback" for="name">Please enter a name</div>
                                @endif
                            </div>

                            <div class="layout-button mt-25">
                                <button type="submit" class="btn btn-primary btn-default btn-squared px-20">
                                    save
                                </button>
                                <button type="button" class="btn btn-default btn-squared btn-light px-20 ">
                                    <a href="{{ route('administrative.permission') }}">cancel</a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
@endsection
