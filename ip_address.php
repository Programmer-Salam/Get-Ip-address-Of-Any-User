<?php
//session_start();
function mailin(){
    $GLOBALS['z'] = $_SESSION['email'];
}
function pcatid(){
    $GLOBALS['pid'] = $_SESSION['pcategory_id'];
}
function get_ip(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip_add = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip_add = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip_add = $_SERVER['REMOTE_ADDR'];
    }
    return $ip_add;
}       
function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
function update_cart(){
    if(isset($_POST['update_cart'])){
    
    foreach($_POST['remove'] as $remove_id){
    
    
    $delete_product = "delete from cart where cart_id='$remove_id'";
    
    $run_delete = mysqli_query($phdb,$delete_product);
    
    if($run_delete){
    echo '<script>window.location = "cart.php"</script>';
    }
    }
    }
}
function transparent_background($filename, $color) 
{
    $img = imagecreatefrompng('image.png'); //or whatever loading function you need
    $colors = explode(',', $color);
    $remove = imagecolorallocate($img, $colors[0], $colors[1], $colors[2]);
    imagecolortransparent($img, $remove);
    imagepng($img, $_SERVER['DOCUMENT_ROOT'].'/'.$filename);
}

//transparent_background('logo_100x100.png', '255,255,255');
?>