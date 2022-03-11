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
$('#store-desc-btn').click(function(){
    console.log($('.document-editor__editable').val());
})

const imgList = [];
var index = 0;
$('.list-img-store img').each(function(){
    imgList.push($(this).attr('src'))
})
$('.list-img-store img').click(function(){
    index = imgList.indexOf($(this).attr('src'));
    $('.modal-content-center img').attr('src',imgList[index]);
})
$('.modal-img-btn-left').click(function(){
    if(index-1>=0){
        $('.modal-content-center img').attr('src',imgList[index-1]);
        index--;
    }
})
$('.modal-img-btn-right').click(function(){
    if(index+1<=imgList.length-1){
        $('.modal-content-center img').attr('src',imgList[index+1]);
        index++;
    }
})
$('#button-select-avatar').click(function(){
    let value = $('input[name="select-avatar-store"]:checked').val();
    $('.avatar-store img').attr('src',value);
})