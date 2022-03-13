<?php
    require_once ('./config/dbhelper.php');
    require_once ('./config/utility.php');
    if (session_id() === '')
        session_start();

    if(getPOST('action'))
        $action = getPOST('action');
    else $action = getGET('action');

    switch($action){
        case 'login': 
            doLogin();
            break;
        case 'register': 
            doRegister();
            break;
        case 'list': 
            doUserList();
            break;
        case 'disable': 
            doDisable();
            break;
        case 'enable': 
            doEnable();
        case 'sessionLogin':
            doAutoLogin();
            break;
    }

    function doLogin(){
        $username = getPOST('username');
        $password = md5Security(getPOST('password'));
        $remember = getPOST('remember');
        $sql = "SELECT TaiKhoan, MatKhau FROM tb_nguoi_dung WHERE TaiKhoan='$username'";
        $result = executeResult($sql,true);
        if($result != null){
            if($result['MatKhau']==$password){
                if($remember==1){
                    $tokken = md5Security($username.time());
                    setcookie('token-remember',$tokken, time()+7*24*60*60);
                    $setTokken = "UPDATE tb_nguoi_dung SET Tokken='$tokken' WHERE TaiKhoan='$username'";
                    execute($setTokken);
                }
                $res = [
                    'status' => 1,
                    'msg' => 'Đăng nhập thành công.'
                ];
                $_SESSION['user'] = $username;
            }else $res = [
                'status' => 2,
                'msg' => 'Mật khẩu không chính xác.'
            ];
        }else $res = [
            'status' => 2,
            'msg' => 'Tài khoản không chính xác.'
        ];

        echo json_encode($res);
    }
    function doAutoLogin(){
        if(authenToken()!=null){
            $hoTen = authenToken();
            $res = [
                'status' => 1,
                'msg' => 'Đăng nhập thành công.',
                'fullName' => $hoTen
            ];
        }else $res = [
            'status' => 2,
            'msg' => 'Chưa lưu đăng nhập.',
            'fullName' => ''
        ];
        echo json_encode($res);
    }
    function doRegister(){
        $fullName = getPOST('fullName');
        $username = getPOST('username');
        $password = md5Security(getPOST('password'));
        if(getPOST('type'))
            $type = getPOST('type');
        else $type = 1;
        $checkUser = "SELECT TaiKhoan FROM tb_nguoi_dung WHERE TaiKhoan='$username'";
        $resultUser = executeResult($checkUser,true);
        if($resultUser!=null){
            $res = [
                'status' => 2,
                'msg' => 'Tài khoản đã tồn tại.'
            ];
        }else{
            $user = "INSERT INTO tb_nguoi_dung(TaiKhoan,MatKhau,LoaiND,TrangThai)
            VALUES('$username','$password',$type,1)";
            if(execute($user)){
                $info = "INSERT INTO tb_thong_tin_ca_nhan(TaiKhoan,HoTen)
                VALUES('$username','$fullName')";
                if(execute($info))
                    $res = [
                        'status' => 1,
                        'msg' => 'Thêm tài khoản thành công.'
                    ];
                else $res = [
                    'status' => 2,
                    'msg' => 'Lỗi sql.'
                ];
            }else $res = [
                'status' => 2,
                'msg' => 'Lỗi sql.'
            ];
            
        }
        echo json_encode($res);
    }
    function doUserList(){
        $user = authenToken();
        if($user!=null){
            $sql = "SELECT tb_nguoi_dung.TaiKhoan,Gmail,LoaiND,HoTen,QueQuan,NamSinh,SDT,KinhNghiemKD,avatar
            FROM tb_nguoi_dung, tb_thong_tin_ca_nhan
            WHERE TrangThai=1";
            $result = executeResult($sql);
            $data = [];
            foreach($result as $item){
                array_push($data,[
                    'username'=> $item['TaiKhoan'],
                    'gmail'=> $item['Gmail'],
                    'type'=> $item['LoaiND'],
                    'fullName'=> $item['HoTen'],
                    'homeTown'=> $item['QueQuan'],
                    'yearBirth'=> $item['NamSinh'],
                    'phone'=> $item['SDT'],
                    'avatar'=> $item['avatar']
                ]);
            }
            $res = [
                'status' => 1,
                'msg' => 'success...',
                'userList' => $data
            ];
        }else
            $res = [
                'status' => 2,
                'msg' => 'Chưa đăng nhập.',
                'userList' => []
            ];
        echo json_encode($res);
    }
    function doDisable(){
        $username = getPOST('username');
        $user = authenToken();
        if($user==null){
            $res = [
                'status' => 2,
                'msg' => 'Chưa đăng nhập.',
            ];
        }else{
            $findUser = "SELECT TaiKhoan FROM tb_nguoi_dung WHERE TaiKhoan='$username'";
            $result = executeResult($findUser,true);
            if($result!=null){
                $sql = "UPDATE tb_nguoi_dung SET TrangThai=0 WHERE TaiKhoan='$username'";
                if(execute($sql)){
                    $res = [
                        'status' => 1,
                        'msg' => 'Đã vô hiệu hoá tài khoản thành công.',
                    ];
                }else{
                    $res = [
                        'status' => 2,
                        'msg' => 'Lỗi sql.',
                    ];
                }
            }else{
                $res = [
                    'status' => 2,
                    'msg' => 'Người dùng không tồn tại.',
                ];
            }
        }
        echo json_encode($res);
    }
    function doEnable(){
        $username = getPOST('username');
        $user = authenToken();
        if($user==null){
            $res = [
                'status' => 2,
                'msg' => 'Chưa đăng nhập.',
            ];
        }else{
            $findUser = "SELECT TaiKhoan FROM tb_nguoi_dung WHERE TaiKhoan='$username'";
            $result = executeResult($findUser,true);
            if($result!=null){
                $sql = "UPDATE tb_nguoi_dung SET TrangThai=1 WHERE TaiKhoan='$username'";
                if(execute($sql)){
                    $res = [
                        'status' => 1,
                        'msg' => 'Đã kích hoạt tài khoản thành công.',
                    ];
                }else{
                    $res = [
                        'status' => 2,
                        'msg' => 'Lỗi sql.',
                    ];
                }
            }else{
                $res = [
                    'status' => 2,
                    'msg' => 'Người dùng không tồn tại.',
                ];
            }
        }
        echo json_encode($res);
    }
?>