$('.text-price').on('input',function(){
    var value = $(this).val().replaceAll('.','').replace(/[^\d]/,'');
    $(this).val(numberWithCommas(value));
})
$('#price-add-menu').on('input',function(){
    var value = $(this).val().replaceAll('.','').replace(/[^\d]/,'');
    $(this).val(numberWithCommas(value));
})
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
$(document).ready(function() {
    $('#menu-list').DataTable({
        "lengthMenu": [ 5, 10, 15, 20 ]
    });
});

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timerProgressBar: true,
})

$('#btn-basic-info').click(function(){
    let name = $('#store-name').val();
    let address = $('#store-address').val();
    let timeOpen = $('#store-time-open').val()+' - '+$('#store-time-close').val();
    let priceRange = $('#store-price-start').val()+' - '+$('#store-price-end').val();
    let segment = $('#store-segment').val();
    let avatar = $('#avatar-store-img')[0].files[0];
    $.post(BASE_URL+API_STORE,{
        'action': STORE_REGISTER,
        'name': name,
        'avatar': avatar,
        'address': address,
        'timeOpen': timeOpen,
        'segment': segment,
        'priceRange': priceRange,
    },function(data,statusCode){
        if(statusCode=='success'){
            var obj = JSON.parse(data);
            if(obj.status==1){
                Toast.fire({
                    icon: 'success',
                    title: 'Đã xác nhận thông tin',
                    background: 'rgba(35, 147, 67, 0.9)',
                    color: '#ffffff',
                    timer: 2000
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

})