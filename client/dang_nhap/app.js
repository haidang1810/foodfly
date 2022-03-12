$.get(BASE_URL+API_AUTHEN+'/?action='+AUTHEN_AUTOLOGIN,function(data,statusCode){
    if(statusCode=='success'){
        var obj = JSON.parse(data);
        if(obj.status==1){
            window.open('../index.html', '_self');
        }
    }
});
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
        var remember = 0;
        if(formValues.remember!="")
            remember = 1;
        $.post(BASE_URL+API_AUTHEN,{
            'action': AUTHEN_LOGIN,
            'username': formValues.userName,
            'password': formValues.password,
            'remember': remember
        },function(data,statusCode){
            if(statusCode=='success'){
                var obj = JSON.parse(data);
                if(obj.status==1){
                    window.open('../index.html', '_self');
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