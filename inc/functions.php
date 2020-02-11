<?php
session_start();

$data=[
    'name'=>'',
    'email'=>'',
    'product'=>'',
    'price'=>'',
];

if (!empty($_POST)) {
    require_once 'db.php';
    $data=load($data);
    $order_id=save('orders',$data);
    setPaymentData($order_id);
    header('Location: pages/form.php');
    die;
}

function setPaymentData($order_id){
    if(isset($_SESSION['pay'])) unset($_SESSION['pay']);
    $_SESSION['pay'] ['id'] = $order_id;
    $_SESSION['pay'] ['price'] = $_POST['price'];
}

function load($data){
    foreach ($_POST as $k => $v) {
        if(array_key_exists($k,$data)){
            $data[$k]=$v;
        }
    }
    return $data;
}

function save($table,$data) {
    $tbl = R::dispense($table);
    foreach ($data as $k => $v) {
        $tbl->$k=$v;
    }
    return R::store($tbl);
}

function debug($data) {
    echo '<pre>' . print_r($data,true) . '</pre>';
}