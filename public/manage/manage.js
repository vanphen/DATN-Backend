$(document).ready(function(){
    
    $('.addEmployeeModal').on('click', function() {
        user = {
            'name': $('.addEmployeeModalName').val(),
            'email': $('.addEmployeeModalEmail').val(),
            'password': $('.addEmployeeModalPassWord').val(),
            'phone': $('.addEmployeeModalPhone').val(),
            'type':  2,
            'company_id': $('.addEmployeeModalCompany').val()
        }
        check = true;

        for (const key in user) {
            if(!user[key]) {
                check = false;
                alert(''+key+' không được để trống');
                if (key === 'email'){
                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(user[key])) {
                        alert('Email không đúng định dạng');
                        return;
                    }
                }
                return;
            }
            if (key === 'password') {
                if (user[key].length < 8 ) {
                    alert('Mật khẩu phảu lớn hơn hoặc bằng 8 kí tự');
                    return;
                }
            }
        }
        if (check) {
            $('body').LoadingOverlay("show");
            axios.post('/api/manage/create', {
                params: {
                    'user': user,       
                }
            })
            .then(function (response) {
                console.log(response)
                if (response.status == 200) {
                    res = response.data;
                    if (res.status == 'FAIL') {
                        $('.mesageFailEmployee').text('Email đã được đăng kí !');
                        $('.mesageFailEmployee').css('display', 'block');
                    } else {
                        $('.listEmployee').append('<tr><td>'+res['data']['id']+'</td><td>'+res['data']['name']+'</td><td>'+res['data']['email']+'</td><td>'+res['data']['phone']+'</td><td>'+res['created_at']+'</td><td>'+res['updated_at']+'</td><td><a href="#editEmployeeModal" data-userlist=\''+JSON.stringify(res['data'])+'\' class="edit editEmployeeModal" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i></a><a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Delete"></i></a></td></tr>')
                        $('#addEmployeeModal').modal('hide')
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
    })
    var userId;
    $('.editEmployeeModal').on('click', function() {
        list = $(this).data('userlist');
        $('.EditEmployeeName').val(list['name']);
        $('.EditEmployeeEmail').val(list['email']);
        $('.EditEmployeePhone').val(list['phone']);
        userId  = list['id'];
    })

    $('.EditEmployeeUpdate').on('click', function() {
        user = {
            'name': $('.EditEmployeeName').val(),
            'email': $('.EditEmployeeEmail').val(),
            'phone': $('.EditEmployeePhone').val(),
            'id': userId,
        }
        check = true;

        for (const key in user) {
            if(!user[key]) {
                check = false;
                alert(''+key+' không được để trống');
                if (key === 'email'){
                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(user[key])) {
                        alert('Email không đúng định dạng');
                        return;
                    }
                }
                return;
            }
            if (key === 'password') {
                if (user[key].length < 8 ) {
                    alert('Mật khẩu phảu lớn hơn hoặc bằng 8 kí tự');
                    return;
                }
            }
        }
        if (check) {
            $('body').LoadingOverlay("show");
            axios.put('/api/manage/update', {
                params: {
                    'user': user,       
                }
            })
            .then(function (response) {
                console.log(response)
                if (response.status == 200) {
                    $(".name-employee"+userId).text(user['name']);
                    $(".email-employee"+userId).text(user['email']);
                    $(".phone-employee"+userId).text(user['phone']);
                    $('#editEmployeeModal').modal('hide')
                }
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function () {
                $('body').LoadingOverlay("hide");
            });
        }
    })
    var deleteId;
    $('.deleteEmployeeModal').on('click', function() {
        deleteId = $(this).data('id');
    })

    $('.delete-Employee').on('click', function() {
        $('body').LoadingOverlay("show");
        axios.delete('/api/manage/delete'+deleteId)
        .then(function (response) {
            if (response.status == 200) {
                $('.employe-'+deleteId).remove();
                $('#deleteEmployeeModal').modal('hide');
            }
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(function () {
            $('body').LoadingOverlay("hide");
        });

    }) 
});