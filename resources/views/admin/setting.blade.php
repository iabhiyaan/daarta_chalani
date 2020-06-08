@extends('admin.layouts.app')

@section('page_title', 'Site Dashboard')

@section('content')

<div class="page-content fade-in-up">
   <form method="post" action="{{ route('settings.update', $detail->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="row">
         <div class="col-md-12">
            <div class="ibox">
               <div class="ibox-head">
                  <div class="ibox-title">Homepage Setups</div>

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

      <div class="row">
         <div class="col-md-12">
            <div class="ibox">
               <div class="ibox-head">
                  <div class="ibox-title">Site Setting</div>

                  <div class="ibox-tools">
                     <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                     <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                           class="fa fa-ellipsis-v"></i></a>
                     <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div> -->
                  </div>
               </div>
               <div class="ibox-body" style="">
               </div>
            </div>
         </div>

      </div>


   </form>

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