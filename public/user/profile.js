$(document).ready(function(){
	$('.change-password').on('click', function() {
        let passowrd = {
            'password-old': $('.password-old').val(),
            'password-new': $('.password-new').val(), 
            'id': $('.userId').text(),
            'email': $('.userEmail').text(),
        }
        for (const key in passowrd) {
            if (!passowrd[key]) {
                $('.message-'+key).text('Mật khẩu không được để trống');
                return;
            } else {
                $('.message-'+key).text('');
            }
            if (passowrd[key].length < 8 && key !== 'id' && key !== 'email') {
                $('.message-'+key).text('Mật khẩu ít nhất phải có 8 kí tự');
                return;
            } else {
                $('.message-'+key).text('');
            }
        }
        if ($('.password-old').val() === $('.password-new').val()) {
            $('.message-password-new').text('Mật khẩu mới không được giống mật khẩu cũ');
            return
        }
		$('body').LoadingOverlay("show");
		axios.put('/api/profile/changepassword', {
			params: {
                'data': passowrd,
			}
		})
		.then(function (response) {
			if (response.status == 200) {
                res = response.data;
                console.log(res);
                if(res['status'] == 'Fail') {
                    $('.message-password-old').text('Mật khẩu cũ không chính xác');
                } else {
                    alert('Chúc mừng bạn đổi mật khẩu thành công');
                    $('#ChangePassWord').modal('hide')
                }
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