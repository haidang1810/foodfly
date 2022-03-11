$.get(BASE_URL+API_AUTHEN+'/?action=autoLogin',function(data,statusCode){
    if(statusCode=='success'){
        var obj = JSON.parse(data);
        if(obj.status==1){
            window.open('../index.html', '_self');
        }
    }
});
validator('.form-login',{
    formGroup: '.form-group',
    formMessage: '.form-message',
    onSubmit: function(formValues){
        var remember = 0;
        if(formValues.remember!="")
            remember = 1;
        $.post(BASE_URL+API_AUTHEN,{
            'action': 'login',
            'username': formValues.userName,
            'password': formValues.password,
            'remember': remember
        },function(data,statusCode){
            if(statusCode=='success'){
                var obj = JSON.parse(data);
                if(obj.status==1){
                    window.open('../index.html', '_self');
                }else{
                    $('.msg-req').html(obj.msg);
                }
            }else if(statusCode=='notmodified')
                alert('notmodified');
                else if(statusCode=='timeout')
                    alert('timeout');
        })
    }
});