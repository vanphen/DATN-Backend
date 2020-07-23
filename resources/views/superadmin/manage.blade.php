@extends('layouts.superAdmin')

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
						<h2>Quản lý Doanh nghiệp</h2>
                    </div>
                    <div class="col-sm-4"></div>
					<div class="col-sm-2" style="margin-bottom: 30px">
						<!-- <a href="#addcompanyeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm doanh nghiệp</span></a> -->
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tên doanh nghiệp</th>
						<th>Địa chỉ</th>
						<th>Số điện thoại</th>
						<th>Ngày tạo</th>
						<th>Ngày cập nhật</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody class ="listcompanye">
                @foreach($companys as $company)
                    <tr class = "<?php echo 'company-'.$company['id'] ?>">
						<td><?php echo $company['id'] ?></td>
						<td class="name-companye<?php echo $company['id'] ?>"><?php echo $company['name'] ?></td>
						<td class="address-companye<?php echo $company['id'] ?>"><?php echo $company['address'] ?></td>
						<td class="phone-companye<?php echo $company['id'] ?>"><?php echo $company['phone'] ?></td>
						<td><?php echo $company['create'] ?></td>
						<td><?php echo $company['update'] ?></td>
						<td>
							<a href="#editcompanyeModal" data-companylist='<?php echo json_encode($company);?>' class="edit editcompanyeModal" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
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

<div id="editcompanyeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Sửa thông tin doanh nghiệp</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Tên doanh nghiệp</label>
						<input type="text" class="form-control EditcompanyeName" required>
					</div>
					<div class="form-group">
						<label>Địa chỉ doanh nghiệp</label>
						<input type="text" class="form-control EditcompanyeAddress" required>
					</div>		
                    <div class="form-group">
						<label>SĐT</label>
						<input type="text" class="form-control EditcompanyePhone" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy Bỏ">
					<input type="button" class="btn btn-info EditcompanyeUpdate" value="Cập Nhật">
				</div>
			</form>
		</div>
	</div>
</div>

</div>

@endsection
@section('jsScript')
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="{{ asset('manage/company.js') }}"></script>

@endsection
