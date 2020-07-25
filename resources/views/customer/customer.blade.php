@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@endsection
@section('content')
<div class='manage-content'>
<div class="container-fluid">
	<div class="table-responsive" style="overflow-x: hidden;">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Danh sách khách hàng đăng kí</h2>
                    </div>
                    <div class="col-sm-3"></div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tên</th>
						<th>Email</th>
						<th>SĐT</th>
						<th>Thành phố</th>
						<th>Địa chỉ IP</th>
						<th>Nội dung tư vấn</th>
						<th>Trạng thái</th>
						<th>Ngày đăng kí</th>
						<th>Hành Động</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($customers as $customer)
                    <tr class= 'customer-<?php echo $customer['id'] ?>'>
                        <th><?php echo $customer['id'] ?></th>
						<th><?php echo $customer['name'] ?></th>
						<th><?php echo $customer['email'] ?></th>
						<th><?php echo $customer['phone'] ?></th>
						<th><?php echo $customer['address'] ?></th>
						<th><?php echo $customer['ip'] ?></th>
						<th><?php echo $customer['message'] ?></th>
						<th class ="customer-status<?php echo $customer['id'] ?>"><?php if($customer['status'] == 0){ echo 'chưa tư vấn';} else {echo 'đã tư vấn';} ?></th>
						<th><?php echo  date("M d Y", strtotime($customer['created_at'])) ?></th>
						<td>
							<a href="javascript: void(0)" onclick="updateStatus(<?php echo $customer['id'] ?>)" class="edit"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit">done_outline</i></a>
						</td>
					</tr>
                    @endforeach
				</tbody>
			</table>
			<!-- <div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div> -->
		</div>
	</div>        
</div>
</div>

@endsection
@section('jsScript')
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    function updateStatus(id) {
        $('body').LoadingOverlay("show");
		axios.put('/api/customer/updateStatus/'+id)
		.then(function (response) {
			if (response.status == 200) {
                if (response.data['status'] == 'OK'){
                    $('.customer-status'+id).text('đã tư vấn');
                    alter('Cập nhật tư vấn thành công');
                }
			}
		})
		.catch(function (error) {
			console.log(error);
		})
		.finally(function () {
			$('body').LoadingOverlay("hide");
		});
    }
</script>
@endsection
