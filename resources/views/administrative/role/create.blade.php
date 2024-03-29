@extends('administrative.layouts.master')
@section('page-css')
<style>
    .select2-container .select2-selection--multiple .select2-selection__rendered {
        max-height: auto;
        /* Adjust this value according to your layout and design */
        overflow-y: auto;
        /* Add a vertical scrollbar when content exceeds the height */
    }
</style>
@endsection
@section('content')

<div class="mt-2">
    <ul class="dm-breadcrumb nav">
        <li class="dm-breadcrumb__item">
            <a href="#">
                Home
            </a>
            <span class="slash">/</span>
        </li>
        <li class="dm-breadcrumb__item">
            <a href="{{route('administrative.permission')}}">Role</a>
            <span class="slash">/</span>
        </li>
        <li class="dm-breadcrumb__item">
            <span>Create</span>
        </li>
    </ul>
</div>
<div class="message-wrapper">

</div>
<div class="mt-4"></div>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-2 mb-2 ">
    <div>
        <h4 class="mb-3 mb-md-0">Role Create</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('administrative.permission') }}" class="btn btn-primary btn-xs btn-icon-text mb-2 mb-md-0">
            <i class="uil uil-align-alt" data-feather="server"></i>
            Roles
        </a>
    </div>
</div>
<div class="mt-4"></div>
<div class="row d-flex justify-content-center">
    <div class="col-md-8 grid-margin stretch-card">

        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-header">
                <h6>Role Create</h6>
            </div>
            <div class="card-body pb-md-30">
                <div class="Vertical-form">
                    <form action="{{ route('administrative.role.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="color-dark fs-14 fw-500 align-center mb-10">Name</label>
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="name" name="name" placeholder="" value="{{ old('name', isset($data) ? $data->name : '') }}" required>
                            @if ($errors->has('name'))
                            <div id="name-error" class="invalid-feedback" for="name">Please enter a name</div>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                            <label class="mb-3" for="permission">Permission
                                <span class="btn d-inline-block btn-primary btn-xs select-all">Select All</span>
                                <span class="btn d-inline-block btn-primary btn-xs deselect-all">Deselect All</span>
                            </label>
                            <select style="height: 50px" name="permission[]" id="permission" data-placeholder="Select Permission" class="form-control select2 " multiple="multiple" required>
                                @foreach ($permissions as $id => $permissions)
                                <option value="{{ $id }}" {{ in_array($id, old('permission', [])) || (isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>
                                    {{ ucfirst(str_replace('_', ' ', $permissions)) }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('permission'))
                            <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a
                                permssion</label>
                            @endif
                        </div>

                        <div class="layout-button mt-25">
                            <button type="submit" class="btn btn-primary px-20">
                                save
                            </button>
                            <button type="button" class="btn btn-default btn-squared btn-light px-20 ">
                                <a href="{{ route('administrative.role') }}">cancel</a>
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
<script>
    $(document).ready(function() {
        $('#permission').select2({
            minimumResultsForSearch: -1,
            placeholder: function() {
                $(this).data('placeholder');
            }
        });
    });

    $('.select-all').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', 'selected')
        $select2.trigger('change')
    })
    $('.deselect-all').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', '')
        $select2.trigger('change')
    })
</script>

@endsection
