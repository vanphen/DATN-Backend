@extends('layouts.superAdmin')
@section('content')
<div style="padding: 0 20px;">
   <div class="table-wrapper">
      <div class="table-title">
         <div class="row">
            <div class="col-sm-6">
               <h2>Thông tin hội thoại</h2>
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
                     <div style="color:#21a500" class="text-sm text-primary text-uppercase mb-1">Thông tin truy cập khách hàng</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">40</div>
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
                     <div class="text-sm text-success text-uppercase mb-1">Số lượng nhân viên đang hoạt động</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">215</div>
                  </div>
                  <div class="col-auto">
                     <i style = "color:#224fce" class="fas fa-users fa-4x text-red"></i>
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
                     <div style="color:#00c0ef !important" class="text-SM  text-warning text-uppercase mb-1">Số lượng tin nhắn của doanh nghiệp</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">1283</div>
                  </div>
                  <div class="col-auto">
                     <i style="color:#00c0ef !important" class="fas fa-comments fa-4x text-red"></i>
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
                     <div style="color:#00a65a !important" class="text-sm text-warning text-uppercase mb-1">Số lượng tin nhắn của khách hàng</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">1283</div>
                  </div>
                  <div class="col-auto">
                     <i style="color:#00a65a !important" class="fas fa-comments fa-4x text-red"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-6 col-lg-6">
         <div class="card shadow mb-4" style="    overflow: scroll;">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Thông tin nhân viên đang hoạt động</h6>
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
                           <th>ID</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Create</th>
                           <th>Update</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>Phạm văn thạo</td>
                           <td>pvt.html@gmail.com</td>
                           <td>Jun 29 2020</td>
                           <td>Jun 29 2020</td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>


      <div class="col-xl-6 col-lg-6">
         <div class="card shadow mb-4" style="    overflow: scroll;">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng đang kết nối tới hệ thống</h6>
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
                           <th>ID</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Create</th>
                           <th>Update</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>Phạm văn thạo</td>
                           <td>pvt.html@gmail.com</td>
                           <td>Jun 29 2020</td>
                           <td>Jun 29 2020</td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>                        <tr>
                           <td>3</td>
                           <td>thaopv</td>
                           <td>pvp.html@gmail.com</td>
                           <td>Jul 02 2020</td>
                           <td>Jul 02 2020</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection