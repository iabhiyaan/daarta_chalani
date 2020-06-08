@extends('admin.layouts.app')

@section('page_title', 'Dashboard')

@section('content')

<div class="page-content fade-in-up">

    @if(session('message'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('message') }}
    </div>
    @endif

    {{-- <form method="post" action="{{ route('dashboard.update', $detail->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Dashboard</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-ellipsis-v"></i></a>

                        </div>
                    </div>

                    <div class="ibox-body" style="display:none;">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}

</div>

@endsection

@push('scripts')

<script>
    $(document).ready(function() {

      $("#fileUpload").on('change', function () {

        if (typeof (FileReader) != "undefined") {

         var image_holder = $("#image-holder");

         // $("#image-holder").siblings().remove();

         $("#image-holder").children().remove();

         var reader = new FileReader();
         reader.onload = function (e) {

             $("<img />", {
                 "src": e.target.result,
                 "class": "thumb-image",
                 "width" : '50%'
             }).appendTo(image_holder);

         }
         image_holder.show();
         reader.readAsDataURL($(this)[0].files[0]);
     } else {
         alert("This browser does not support FileReader.");
     }
 });


    $("#fileUpload1").on('change', function () {

      if (typeof (FileReader) != "undefined") {

       var image_holder = $("#image-holder1");

       // $("#image-holder").siblings().remove();

       $("#image-holder1").children().remove();

       var reader = new FileReader();
       reader.onload = function (e) {

           $("<img />", {
               "src": e.target.result,
               "class": "thumb-image",
               "width" : '50%'
           }).appendTo(image_holder);

       }
       image_holder.show();
       reader.readAsDataURL($(this)[0].files[0]);
   } else {
       alert("This browser does not support FileReader.");
   }
});


$("#fileUpload2").on('change', function () {

  if (typeof (FileReader) != "undefined") {

   var image_holder = $("#image-holder2");

   // $("#image-holder").siblings().remove();

   $("#image-holder2").children().remove();

   var reader = new FileReader();
   reader.onload = function (e) {

       $("<img />", {
           "src": e.target.result,
           "class": "thumb-image",
           "width" : '50%'
       }).appendTo(image_holder);

   }
   image_holder.show();
   reader.readAsDataURL($(this)[0].files[0]);
} else {
   alert("This browser does not support FileReader.");
}

  });

});

</script>



@endpush