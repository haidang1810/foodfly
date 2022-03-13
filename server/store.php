<?php
    require_once ('./config/dbhelper.php');
    require_once ('./config/utility.php');
    use MongoDB\Client;
    require './public/vendor/autoload.php';

    if (session_id() === '')
        session_start();

    if(getPOST('action'))
        $action = getPOST('action');
    else $action = getGET('action');

    switch($action){
        case 'storeList': 
            doStoreList();
            break;
        case 'detailStore': 
            doDetailStore();
            break;
        case 'register': 
            doRegister();
            break;
    }

    function doStoreList(){
        $sql = "SELECT *  FROM tb_cua_hang WHERE TrangThai=1";
        $result = executeResult($sql);
        $data = [];
        foreach($result as $item){
            array_push($data,[
                'id'=> $item['Id'],
                'name'=> $item['TenCuaHang'],
                'shopkeeper'=> $item['ChuCuaHang'],
                'avatar'=> $item['AnhBia'],
                'address'=> $item['DiaChi'],
                'timeOpen'=> $item['ThoiGianMoCua'],
                'segment'=> $item['PhanKhuc'],
                'priceRange'=> $item['KhoangGia'],
                'submitDate'=> $item['NgayDangKy'],
                'acceptDate'=> $item['NgayDuocDuyet'],
                'status'=> $item['TrangThai'], 
                'acceptUser'=> $item['NguoiDuyet']
            ]);
        }
        $res = [
            'status' => 1,
            'msg' => 'success...',
            'storeList' => $data
        ];
        echo json_encode($res);
    }
    function doDetailStore(){

    }
    function doRegister(){
       // $filename = $_FILES['file']['name'];
        $res = [
            'status' => 2,
            'msg' => 'fdsdfs'
        ];
        echo json_encode($res);
    }
?>