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
						<h2>Quản lý Nhân Viên</h2>
                    </div>
                    <div class="col-sm-4"></div>
					<div class="col-sm-2" style="margin-bottom: 30px">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Create</th>
						<th>Update</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody class ="listEmployee">
                @foreach($users as $user)
                    <tr class = "<?php echo 'employe-'.$user['id'] ?>">
						<td><?php echo $user['id'] ?></td>
						<td class="name-employee<?php echo $user['id'] ?>"><?php echo $user['name'] ?></td>
						<td class="email-employee<?php echo $user['id'] ?>"><?php echo $user['email'] ?></td>
						<td class="phone-employee<?php echo $user['id'] ?>"><?php echo $user['phone'] ?></td>
						<td><?php echo $user['create'] ?></td>
						<td><?php echo $user['update'] ?></td>
						<td>
							<a href="#editEmployeeModal" data-userlist='<?php echo json_encode($user);?>' class="edit editEmployeeModal" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" data-id="<?php echo $user['id'] ?>" class="delete deleteEmployeeModal" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" maxlength="40" class="form-control addEmployeeModalName" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email"  maxlength="40" class="form-control addEmployeeModalEmail" required>
					</div>
					<div class="form-group">
						<label>PassWord</label>
						<input type="password"  maxlength="40" class="form-control addEmployeeModalPassWord" required>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" maxlength="40" class="form-control addEmployeeModalPhone" required>
					</div>
					<div class="form-group" style="display:none">
						<input type="text" value="{{ Auth::user()->company_id }}" class="form-control addEmployeeModalCompany">
					</div>
					<div class="form-group">
						<label class="mesageFailEmployee" style="color:red;display:none"></label>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" class="btn btn-success addEmployeeModal" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control EditEmployeeName" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control EditEmployeeEmail" required>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control EditEmployeePhone" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" class="btn btn-info EditEmployeeUpdate" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Xóa nhân viên</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Bạn có chắc chắn muốn xóa</p>
					<p class="text-warning"><small>Hành động này sẽ không được hoàn lại</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" class="btn btn-danger delete-Employee" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
</div>

@endsection
@section('jsScript')
<script src="{{ asset('manage/manage.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="">

</script>
@endsection
