$.get('../../server/authen.php/?action=autoLogin',function(data,statusCode){
    if(statusCode=='success'){
        var obj = JSON.parse(data);
        if(obj.status==1){
            window.open('../index.html', '_self');
        }
    }
});