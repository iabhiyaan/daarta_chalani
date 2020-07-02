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
    <form method="post" action="{{route('branch.update', $detail->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">शाखा ईदित गार्नुहोस्</div>

                        <div class="ibox-tools">

                        </div>
                    </div>

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
                                <input class="form-control" name="title" value="{{$detail->title}}" type="text"
                                placeholder="शाखाको नाम">
                            </div>
                            <div class="form-group col-md-12">
                                <label>शाखाको बारे</label>
                                <textarea class="form-control" name="description"
                                type="text">{{$detail->description}}</textarea>
                            </div>
                        </div>

                        <div class="check-list">
                            <label class="ui-checkbox ui-checkbox-primary">
                                <input name="published" type="checkbox" {{$detail->published == 1 ? 'checked' : ''}}>
                                <span class="input-span"></span>Publish</label>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit">सम्पन गार्नुहोस्</button>
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