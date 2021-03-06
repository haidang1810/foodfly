<?php
    function fixSqlInjection($str) {
        // abc\okok -> abc\\okok
        //abc\okok (user) -> abc\okok (server) -> sql (abc\okok) -> xuat hien ky tu \ -> ky tu dac biet -> error query
        //abc\okok (user) -> abc\okok (server) -> convert -> abc\\okok -> sql (abc\\okok) -> chinh xac
        $str = str_replace('\\', '\\\\', $str);
        //abc'okok -> abc\'okok
        //abc'okok (user) -> abc'okok (server) -> sql (abc'okok) -> xuat hien ky tu \ -> ky tu dac biet -> error query
        //abc'okok (user) -> abc'okok (server) -> convert -> abc\'okok -> sql (abc\'okok) -> chinh xac
        $str = str_replace('\'', '\\\'', $str);
        $str = str_replace("\"", "\\\"", $str);

        return $str;
    }

    function authenToken() {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        $token = getCOOKIE('token-remember');
        if (empty($token)) {
            return null;
        }

        $sql = "select tb_nguoi_dung.TaiKhoan, Tokken, tb_thong_tin_ca_nhan.HoTen
        from tb_nguoi_dung, tb_thong_tin_ca_nhan 
        where Tokken = '$token' and tb_nguoi_dung.TaiKhoan=tb_thong_tin_ca_nhan.TaiKhoan";
        $result = executeResult($sql,true);

        if ($result != null && count($result) > 0) {
            $_SESSION['user'] = $result['TaiKhoan'];
            return $result['HoTen'];
        }

        return null;
    }

    function getPOST($key) {
        $value = '';
        if (isset($_POST[$key])) {
            $value = $_POST[$key];
        }
        return fixSqlInjection($value);
    }

    function getCOOKIE($key) {
        $value = '';
        if (isset($_COOKIE[$key])) {
            $value = $_COOKIE[$key];
        }
        return fixSqlInjection($value);
    }

    function getGET($key) {
        $value = '';
        if (isset($_GET[$key])) {
            $value = $_GET[$key];
        }
        return fixSqlInjection($value);
    }

    function md5Security($pwd) {
        return md5(md5($pwd).MD5_PRIVATE_KEY);
    }
?>