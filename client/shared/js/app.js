function createStoreCard(){
    
}
$.get(BASE_URL+API_STORE+'/?action='+STORE_LIST,function(data,statusCode){
    if(statusCode=='success'){
        var obj = JSON.parse(data);
        if(obj.status==1){
            
        }
    }else if(statusCode=='notmodified')
        alert('notmodified');
        else if(statusCode=='timeout')
            alert('timeout');
})