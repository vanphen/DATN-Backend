@extends('layouts.app')
@section('content')
<div style="padding: 0 20px;">
   <div class="table-wrapper">
      <div class="table-title">
         <div class="row">
            <div class="col-sm-6">
               <h2>Thông tin hoạt động</h2>
            </div>
            <div class="col-sm-3"></div>
         </div>
      </div>
   </div>
   <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div style="color:#21a500" class="text-sm text-primary text-uppercase mb-1">Số lượng khách hàng đã truy cập</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800 numberAccessCustomer">0</div>
                  </div>
                  <div class="col-auto">
                     <i style="color:#21a500" class="fas fa-user fa-4x text-red"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-sm text-success text-uppercase mb-1">Số lượng khách hàng đang hoạt động</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800 numberCustomerActivity">0</div>
                  </div>
                  <div class="col-auto">
                     <i style = "color:#224fce" class="fas fa-users fa-4x text-red"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <div class="col-xl-3 col-md-6 mb-4">
         <div style="border-left: .25rem solid #00a65a!important" class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div style="color:#00a65a !important" class="text-sm text-warning text-uppercase mb-1">Số lượng khách hàng đã tư vấn</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800 numberCustomer"></div>
                  </div>
                  <div class="col-auto">
                     <i style="color:#00a65a !important" class="fas fa-comments fa-4x text-red"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

            <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
         <div style="border-left: .25rem solid #00c0ef!important" class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div style="color:#00c0ef !important" class="text-SM  text-warning text-uppercase mb-1">Số lượng tin nhắn bạn với khách hàng</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800 numberMessage"></div>
                  </div>
                  <div class="col-auto">
                     <i style="color:#00c0ef !important" class="fas fa-comments fa-4x text-red"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-12">
         <div class="card shadow mb-4" style="    overflow: scroll;">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng chat với hệ thống</h6>
               <div class="dropdown no-arrow">
               </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
               <div class="chart-area">
                  <div class="chartjs-size-monitor">
                     <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                     </div>
                     <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                     </div>
                  </div>
                  <table class="table table-striped table-hover">
                     <thead>
                        <tr>
                           <th>ID phòng</th>
                           <th>Thành phố</th>
                           <th>Đất nước</th>
                           <th>Kiểu thời gian</th>
                           <th>Địa chỉ IP</th>
                           <th>Thời truy cập</th>
                        </tr>
                     </thead>
                     <tbody class="listCustomerChat">

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>
@endsection
@section('jsScript')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script>
        var socket = io.connect("http://18.183.81.183:9000/")
    </script>
    <script>
    socket.on('thong_bao_employee', function(username, idConnect, nameZoom) {
        
        listRooms = JSON.parse(nameZoom);
        let listrooms  = Object.values(listRooms);
        if (username === 'Disconnected') {
            delete listRooms[idConnect];
            $('#'+idConnect).remove();
        }
        $('.numberCustomerActivity').text(listrooms.length);
        if (listrooms.length != 0) {
          for (var key in listrooms) {
            let inforUser = listrooms[key]['inforUser'];
            $('.'+inforUser['nameGroup']).remove();
            $('.listCustomerChat').append('<tr class ="'+inforUser['nameGroup']+'"><td>'+inforUser['nameGroup']+'</td><td>'+inforUser['city']+'</td><td>'+inforUser['country']+'</td> <td>'+inforUser['timezone']+'</td><td>'+inforUser['ip']+'</td><td>'+(inforUser['created_at'])+'</td></tr>')
          }
        }
    });

    // get thong tin so luong truy cap
    $('body').LoadingOverlay("show");
    axios.get('/api/getActivity/<?php echo Auth::user()->id ;?>')
    .then(function (response) {
        $('.numberCustomer').text(response['data']['numberCustomer']);
        $('.numberMessage').text(response['data']['countMessage']);
        $('.numberAccessCustomer').text(response['data']['numberZoom']);
    })
    .catch(function (error) {
        console.log(error);
    })
    .finally(function () {
        $('body').LoadingOverlay("hide");
    });
    </script>
@endsection
