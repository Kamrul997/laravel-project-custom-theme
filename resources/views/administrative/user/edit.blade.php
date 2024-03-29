@extends('administrative.layouts.master')
@section('page-css')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Employee Update</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('administrative.user') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="server"></i>
                Employee
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Employee Update</h6>
                    <form class="forms-sample" action="{{ route('administrative.user.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">

                        {!! method_field('PUT') !!}
                        @csrf
                        <div class="form-group {{ $errors->has('full_name') ? 'has-danger' : '' }}">
                            <label for="name">Full Name <span style="color:red">*</span></label>
                            <input required type="text" class="form-control form-control-danger" id="name"
                                name="name" autocomplete="off" placeholder="name"
                                value="{{ old('name', isset($data) ? $data->name : '') }}" aria-invalid="true">
                            @if ($errors->has('name'))
                                <label id="name-error" class="error mt-2 text-danger"
                                    for="name">{{ $errors->first('name') }}</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('employee_id') ? 'has-danger' : '' }}">
                            <label for="name">Employee Id <span style="color:red">*</span></label>
                            <input required type="text" class="form-control form-control-danger" id="employee_id"
                                name="employee_id" autocomplete="off" placeholder="Employee Id"
                                value="{{ old('employee_id', isset($data) ? $data->employee_id : '') }}"
                                aria-invalid="true">
                            @if ($errors->has('employee_id'))
                                <label id="employee_id-error" class="error mt-2 text-danger"
                                    for="name">{{ $errors->first('employee_id') }}</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email">Email <span style="color:red">*</span></label>
                            <input required type="email" class="form-control form-control-danger" id="email"
                                name="email" autocomplete="off" placeholder="Email"
                                value="{{ old('email', isset($data) ? $data->email : '') }}" aria-invalid="true">
                            @if ($errors->has('email'))
                                <label id="email-error" class="error mt-2 text-danger"
                                    for="email">{{ $errors->first('email') }}</label>
                            @endif
                        </div>


                        <div class="form-group {{ $errors->has('designation') ? 'has-danger' : '' }}">
                            <label for="email">Designation</label>
                            <input type="text" class="form-control form-control-danger" id="designation"
                                name="designation" autocomplete="off" placeholder="Designation"
                                value="{{ old('designation', isset($data) ? $data->designation : '') }}"
                                aria-invalid="true">
                            @if ($errors->has('designation'))
                                <label id="designation-error" class="error mt-2 text-danger"
                                    for="designation">{{ $errors->first('designation') }}</label>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('place') ? 'has-danger' : '' }}">
                            <label for="place">Place</label>
                            <input type="text" class="form-control form-control-danger" id="place"
                                name="place" autocomplete="off" placeholder="place"
                                value="{{ old('place', isset($data) ? $data->place : '') }}" aria-invalid="true">
                            @if ($errors->has('place'))
                                <label id="place-error" class="error mt-2 text-danger"
                                    for="place">{{ $errors->first('place') }}</label>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('joining_date') ? 'has-danger' : '' }}">
                            <label for="joining_date">Joining Date</label>
                            <input type="date" class="form-control form-control-danger" id="joining_date"
                                name="joining_date" autocomplete="off" placeholder="Email"
                                value="{{ old('joining_date', isset($data) ? $data->joining_date : '') }}"
                                aria-invalid="true">
                            @if ($errors->has('joining_date'))
                                <label id="joining_date-error" class="error mt-2 text-danger"
                                    for="joining_date">{{ $errors->first('joining_date') }}</label>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('courier_address') ? 'has-danger' : '' }}">
                            <label for="courier_address">Courier Address</label>
                            <input type="text" class="form-control form-control-danger" id="courier_address"
                                name="courier_address" autocomplete="off" placeholder="Courier address"
                                value="{{ old('courier_address', isset($data) ? $data->courier_address : '') }}"
                                aria-invalid="true">
                            @if ($errors->has('courier_address'))
                                <label id="courier_address-error" class="error mt-2 text-danger"
                                    for="email">{{ $errors->first('courier_address') }}</label>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label for="roles">Selected Role <span style="color:red">*</span></label>
                            <select name="role" id="roles" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ (isset($data) && optional($data->roles->first())->id == $id) || old('role') == $id ? 'selected' : '' }}>
                                        {{ $role }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('roles'))
                                <label id="name-error" class="error mt-2 text-danger"
                                    for="name">{{ $errors->first('roles') }}</label>
                            @endif
                        </div>

                        <div id="append">

                        </div>

                        <div class="form-group" id="sub_unit_select" style="display: none">
                            <label for="phone">Select Sub Unit</label>
                            <select id="subUnit_ids" name="sub_unit_id" class="form-control">
                                @if (isset($data->sub_unit_id))
                                    <option value="{{ $data->sub_unit_id }}" selected>{{ $sub_unit->name }}</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone">Phone Number</label>
                            <input required type="text" class="form-control form-control-danger" id="phone"
                                name="phone" autocomplete="off" placeholder="Phone"
                                value="{{ old('phone', isset($data) ? $data->phone : '') }}" aria-invalid="true">
                            @if ($errors->has('phone'))
                                <label id="phone-error" class="error mt-2 text-danger"
                                    for="phone">{{ $errors->first('phone') }}</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-danger" id="password"
                                name="password" autocomplete="off" placeholder="Password" value=""
                                aria-invalid="true">
                            @if ($errors->has('password'))
                                <label id="password-error" class="error mt-2 text-danger"
                                    for="password">{{ $errors->first('password') }}</label>
                            @endif
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('administrative.user') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <script>
        $(document).ready(function() {

            @if ($data->roles->isNotEmpty())
                ajaxCall('{{ $data->roles->first()->id }}');
            @endif
            $(document).on('change', '#roles', function() {
                var id = $(this).val();
                ajaxCall(id);
            });

            function ajaxCall(id, unit_id) {
                if (id == '' || id == 1 || id == 2) {
                    $('#append').empty();
                    $('#sub_unit_select').hide();
                    $('#subUnit_ids').val('');
                    return;
                }
                var url = "{{ route('administrative.user.get.edit.form') }}"
                $.get(url, {
                        id: id,
                    },
                    function(data) {
                        $('#append').empty();
                        $('#append').html(data);

                        if (id == 6) {
                            $('#sub_unit_select').show();
                        } else {
                            $('#sub_unit_select').hide();
                            $('#subUnit_ids').val('');
                        }

                        $('#area_ids').select2({
                            minimumResultsForSearch: -1,
                            placeholder: function() {
                                $(this).data('placeholder');
                            }
                        });

                        $('#unit_ids').select2({
                            minimumResultsForSearch: -1,
                            placeholder: function() {
                                $(this).data('placeholder');
                            }
                        });

                    });
            }

            $(document).on('change', '#zone_id', function() {
                var zoneId = $(this).val();
                if (zoneId == '') {
                    var $el = $("#area_ids");
                    $el.empty();
                    $el.append($("<option></option>")
                        .attr("value", '').text('Select'));
                    return;
                }
                var url = "{{ route('administrative.unit.get.area') }}"
                $.get(url, {
                    id: zoneId,
                }, function(res) {
                    var $el = $("#area_ids");

                    $el.empty(); // remove old options

                    $el.append($("<option></option>")
                        .attr("value", '').text('Select'));
                    $.each(res.data, function(key, value) {
                        $el.append($("<option></option>")
                            .attr("value", value).text(key));
                    });
                });
            });

            $(document).on('change', '#area_id', function() {
                var areaId = $(this).val();
                if (areaId == '') {
                    var $el = $("#unit_ids");
                    $el.empty();
                    $el.append($("<option></option>")
                        .attr("value", '').text('Select'));
                    return;
                }
                var url = "{{ route('administrative.sub.unit.get.unit') }}"
                $.get(url, {
                    id: areaId,
                }, function(res) {
                    var $el = $("#unit_ids");

                    $el.empty(); // remove old options

                    $el.append($("<option></option>")
                        .attr("value", '').text('Select'));
                    $.each(res.data, function(key, value) {
                        $el.append($("<option></option>")
                            .attr("value", value).text(key));
                    });
                });
            });

            $(document).on('change', '.unit_id', function() {
                var unitId = $(this).val();
                $("#sub_unit_select").show();
                if (unitId == '') {
                    var $el = $("#subUnit_ids");
                    $el.empty();
                    $el.append($("<option></option>").attr("value", '').text('Select'));
                    return;
                }
                var url = "{{ route('administrative.unit.get.subUnit') }}";
                $.get(url, {
                    id: unitId,
                }, function(res) {
                    var $el = $("#subUnit_ids");

                    $el.empty(); // remove old options

                    $el.append($("<option></option>").attr("value", '').text('Select'));
                    $.each(res.data, function(key, value) {
                        $el.append($("<option></option>").attr("value", value).text(key));
                    });

                    // Set the selected option based on $data->sub_unit_id
                    var subUnitId = "{{ $data->sub_unit_id }}";
                    $el.val(subUnitId).trigger('change');
                });
            });



        });
    </script>
@endsection
