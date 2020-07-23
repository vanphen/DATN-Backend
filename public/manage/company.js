$(document).ready(function(){
    
    var companyId;
    $('.editcompanyeModal').on('click', function() {
        list = $(this).data('companylist');
        $('.EditcompanyeName').val(list['name']);
        $('.EditcompanyeAddress').val(list['address']);
        $('.EditcompanyePhone').val(list['phone']);
        companyId  = list['id'];
    })

    $('.EditcompanyeUpdate').on('click', function() {
        company = {
            'name': $('.EditcompanyeName').val(),
            'address': $('.EditcompanyeAddress').val(),
            'phone': $('.EditcompanyePhone').val(),
            'id': companyId,
        }
        check = true;

        for (const key in company) {
            if(!company[key]) {
                check = false;
                alert(''+key+' không được để trống');
                return;
            }
        }
        if (check) {
            $('body').LoadingOverlay("show");
            axios.put('/api/company/update', {
                params: {
                    'company': company,       
                }
            })
            .then(function (response) {
                if (response.status == 200) {
                    $(".name-companye"+companyId).text(company['name']);
                    $(".address-companye"+companyId).text(company['address']);
                    $(".phone-companye"+companyId).text(company['phone']);
                    $('#editcompanyeModal').modal('hide')
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

});