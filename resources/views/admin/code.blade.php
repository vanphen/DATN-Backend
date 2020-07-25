@extends('layouts.appAdmin')
@section('content')
<div style="padding: 0 20px;">
   <div class="table-wrapper">
      <div class="table-title">
         <div class="row">
            <div class="col-sm-6">
               <h2>Code vào website cho doanh nghiệp của bạn</h2>
            </div>
            <div class="col-sm-3"></div>
         </div>
      </div>
   </div>
   <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-6 col-lg-6">
         <div class="card shadow mb-4" style="">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Hãy nhúng code vào phần cuối trước thẻ /body của footer</h6>
               <div class="dropdown no-arrow">
               </div>
            </div>
            <!-- Card Body -->
            <div class="form-group">
                <textarea class="form-control" readonly id="myInput" rows="10">
<?php echo '<link rel="stylesheet" href="http://18.183.81.183/boxchat/app.min.css">
<script src="http://18.183.81.183/boxchat/app.min.js"></script>
<div id="tlu_rtc"></div> <script>const tluCompanyID = '.Auth::user()->company_id.';$("#tlu_rtc").load("http://18.183.81.183/boxchat/chat3.html");</script>'?>
                </textarea>
            </div>
         </div>
         <button type="button" onclick="myFunction()"  class="btn btn-primary copyCode">Copy Code</button>

      </div>

   </div>
</div>
@endsection
@section('jsScript')
<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
    }
</script>
@endsection