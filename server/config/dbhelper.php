<?php
    require_once ('config.php');

    function execute($sql) {
        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'utf8');
        if(mysqli_query($conn, $sql)){
            mysqli_close($conn);
            return true;
        }else{
            mysqli_close($conn);
            return false;
        }
        
    }
    function executeResult($sql,$only=false) {
        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'utf8');
        if(mysqli_query($conn, $sql))
            $resultset = mysqli_query($conn, $sql);
        else{
            echo mysqli_error($conn);
            exit;
        }
        if($only){
            $data =  mysqli_fetch_array($resultset);
        }else{
            $data = [];
            while (($row = mysqli_fetch_array($resultset)) != null) {
                $data[] = $row;
            }
            mysqli_close($conn);
        }
        
        return $data;
    }
?>