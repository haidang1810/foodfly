$(".form-check-input").click(function(){
    if($(this).is(':checked')){
        $('#password').attr('type','text');
        $('#rePassword').attr('type','text');
    }else{
        $('#password').attr('type','password');
        $('#rePassword').attr('type','password');
    }
})
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timerProgressBar: true,
})

validator('.form-login',{
    formGroup: '.form-group',
    formMessage: '.form-message',
    onSubmit: function(formValues){
        if(formValues.password!==formValues.rePassword){
            Toast.fire({
                icon: 'error',
                title: 'Nhập lại mật khẩu không chính xác',
                background: 'rgba(220, 52, 73, 0.9)',
                color: '#ffffff',
                timer: 2500
            })
            return;
        }
        $.post(BASE_URL+API_AUTHEN,{
            'action': AUTHEN_REGISTER,
            'fullName': formValues.fullName,
            'username': formValues.userName,
            'password': formValues.password
        },function(data,statusCode){
            if(statusCode=='success'){
                var obj = JSON.parse(data);
                if(obj.status==1){
                    Toast.fire({
                        icon: 'success',
                        title: 'Đăng ký thành công đang chuyển tới trang đăng nhập',
                        background: 'rgba(35, 147, 67, 0.9)',
                        color: '#ffffff',
                        timer: 2000,
                        didClose: () => {
                            window.open('../dang_nhap', '_self');
                        }
                    })
                }else{
                    Toast.fire({
                        icon: 'error',
                        title: obj.msg,
                        background: 'rgba(220, 52, 73, 0.9)',
                        color: '#ffffff',
                        timer: 2500
                    })
                }
            }else if(statusCode=='notmodified')
                alert('notmodified');
                else if(statusCode=='timeout')
                    alert('timeout');
        })
    }
});