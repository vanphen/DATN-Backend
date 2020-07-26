@extends('layouts.appAdmin')

@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
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
						<h2>Thông tin quản lí : {{  Auth::user()->name }}</h2>
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
						<th>Tên doanh nghiệp</th>
						<th>Ngày tạo</th>
						<th>Ngày cập nhật</th>
						<th>Hành Động</th>
					</tr>
				</thead>
				<tbody>
                <tr>
						<td class="userId"><?php echo $profile['id']; ?></td>
						<td ><?php echo $profile['name']; ?></td>
						<td class="userEmail"><?php echo $profile['email']; ?></td>
						<td><?php echo $profile['phone']; ?></td>
						<td><?php echo $nameCompany; ?></td>
						<td><?php echo date("M d Y", strtotime($profile['created_at'])); ?></td>
						<td><?php echo date("M d Y", strtotime($profile['created_at'])); ?></td>
						<td>
							<a href="#editEmployeeModal" value="<?php echo $profile['id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i></a>
							<a href="#ChangePassWord" value="<?php echo $profile['id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Change Password">admin_panel_settings</i></a>
						</td>
					</tr>

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

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="/profile/edit">
			@csrf
			@method('PUT')
				<div class="modal-header">						
					<h4 class="modal-title">Thay đổi thông tin các nhân</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Tên nhân viên</label>
						<input type="text" name="name" value="<?php echo $profile['name'] ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email nhân viên</label>
						<input type="email" name="email" value="<?php echo $profile['email'] ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Số điện thoại</label>
						<input type="text" name="phone" value="<?php echo $profile['phone'] ?>" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Thoát">
					<input type="submit" class="btn btn-info" value="Lưu">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="ChangePassWord" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Thay đổi mật khẩu</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Mật khẩu cũ</label>
						<input type="password" class="form-control password-old" required>
						<label class="message-password-old" style="color:red;margin-top: 5px;"></label>
					</div>
					<div class="form-group">
						<label>Mật khẩu mới</label>
						<input type="password" class="form-control password-new" required>
						<label class="message-password-new" style="color:red;margin-top: 5px;"></label>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Thoát">
					<input type="button" class="btn btn-info change-password" value="Đổi mật khẩu">
				</div>
			</form>
		</div>
	</div>
</div>
</div>

@endsection
@section('jsScript')
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('admin/profile.js') }}"></script>
@endsection
