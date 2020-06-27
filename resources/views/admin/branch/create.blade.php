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
    <form method="post" action="{{route('branch.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">नयाँ शाखा</div>
                        <div class="ibox-tools">
                        </div>
                    </div>

                    <!-- <h3>designation Details</h3> -->
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
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>शाखाको नाम</label>
                                <input class="form-control" name="title" value="{{old('title')}}" type="text"
                                    placeholder="शाखाको नाम">
                            </div>
                            <div class="form-group col-md-12">
                                <label>शाखाको बारे</label>
                                <input class="form-control" name="description" value="{{old('description')}}"
                                    type="text" placeholder="शाखाको बारे">
                            </div>

                        </div>

                        <div class="check-list">
                            <label class="ui-checkbox ui-checkbox-primary">
                                <input name="published" type="checkbox" checked>
                                <span class="input-span"></span>Publish</label>
                        </div>

                        <br>

                        <div class="form-group">
                            <button class="btn btn-block btn-success" type="submit">सम्पन गार्नुहोस्</button>
                        </div>

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
@endpush
