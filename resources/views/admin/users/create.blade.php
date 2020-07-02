@extends('admin.layouts.app')

@push('styles')
<style media="screen">
    .line {
        width: 100%;
        height: 1px;
        background-color: green;
    }
</style>
@endpush

@section('content')


<div class="page-content fade-in-up">
    <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Create user</div>

                        <div class="ibox-tools">

                        </div>
                    </div>

                    <!-- <h3>users Details</h3> -->
                    <div class="ibox-body" style="">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{-- Personal info --}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name <span class="text-danger">*</span></label>
                                <input class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Enter fullname" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" name="email" value="{{old('email')}}" type="email" placeholder="Enter user's email" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Address <span class="text-danger">*</span></label>
                                <input class="form-control" name="address" value="{{old('address')}}" type="text" placeholder="Enter user's address" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Mobile number <span class="text-danger">*</span></label>
                                <input class="form-control" name="mobile_no" value="{{old('mobile_no')}}" type="number" placeholder="Enter user's mobile number" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Password <span class="text-danger">*</span></label>
                                <input class="form-control" name="password" value="{{old('password')}}" type="password" placeholder="Enter new password" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Password Again <span class="text-danger">*</span></label>
                                <input class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" type="password" placeholder="Enter password again" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>National id <span class="text-danger">*</span></label>
                                <input class="form-control" name="national_id" value="{{old('national_id')}}" type="text" placeholder="Enter user's national id" required>
                            </div>
                        </div>

                        {{-- Address info --}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>District</label>
                                <input class="form-control" name="district" value="{{old('district')}}" type="text" placeholder="Enter district">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Zone</label>
                                <input class="form-control" name="zone" value="{{old('zone')}}" type="text" placeholder="Enter zone">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Pincode</label>
                                <input class="form-control" name="pincode" value="{{old('pincode')}}" type="text" placeholder="Enter pincode" required>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Position --}}
                            <div class="form-group col-md-6">
                                <label>Designation</label>
                                <select name="designation" class="form-control">
                                    @if($composer_designations->isNotEmpty())
                                    <option selected value>Please select designation</option>
                                    @foreach($composer_designations as $key=> $designation)
                                    <option value="{{ $designation->id }}">{{$designation->designation_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            {{-- Branch --}}
                            <div class="form-group col-md-6">
                                <label>Branch Name</label>
                                <select name="branch_name" class="form-control">
                                    @if($composer_branch->isNotEmpty())
                                    <option selected value>Please select branch</option>
                                    @foreach($composer_branch as $key=> $branch)
                                    <option value="{{ $branch->id }}">{{$branch->title}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                        </div>
                        <div class="check-list">
                            <label class="ui-checkbox ui-checkbox-primary">
                                <input type="checkbox" name="status" checked>
                                <span class="input-span"></span>Publish</label>
                            </div>

                            <br>

                            <div class="form-group">
                                <button class="btn btn-block btn-success" type="submit">सम्पन गार्नुहोस्</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Role</div>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-body" style="">
                            @if(isset($access_levels) && count($access_levels))
                            @foreach($access_levels as $key => $option)
                            <div class="check-list mb-3">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input type="checkbox" value={{ $key }} name="access[]">
                                    <span class="input-span"></span>{{ $option }}
                                </label>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>

    @endsection

    @push('scripts')
    @include('admin.layouts._partials.ckeditorsetting')
    @include('admin.layouts._partials.imagepreview')
    <script type="text/javascript">
       fetch("{{route('getUserFromBranch', 1)}}").then(response => response.json()).then(data => console.log(data));
   </script>
   @endpush