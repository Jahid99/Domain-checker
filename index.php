<!DOCTYPE html>
<html>
<head>
    <title>Domain Availability Checker</title>
</head>
<body>
 

<?php 

  if (isset($_GET["domaintopurchase"])) {
                        
    $domaintopurchase = $_GET["domaintopurchase"];

$url = 'https://www.avifoxllc.com/verifyavailability/purchase.php?domaintopurchase='.$domaintopurchase.'&tld=ax';


      function file_get_contents_curl_get_single_movie($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}



   $html = file_get_contents_curl_get_single_movie($url);

    $doc = new DOMDocument();

    @$doc->loadHTML($html);

    $finder = new DomXPath($doc);

    $divs = $finder->query("//*[contains(@class, 'page-content')]");

    $message = trim($divs[0]->nodeValue);

    if($message == 'abc.ax is already registered and is not available for purchase. Please click here to go back and search for a new domain name.'){ ?>

    <h2 style="color:red">abc.ax is already registered and is not available for purchase. Please  <a href="index.php">click here</a> to go back and search for a new domain name.</h2>
        
   <?php }else{
        $message = explode("!",$message); ?>

        <h2 style="color:green"><?php echo $message[0].'!'; ?> Please  <a href="register.html">click here</a> to purchase it.</h2>

   <?php }

    exit;


}

 ?>


   <form action="" method="get">
Domain:<input type="text" name="domaintopurchase">.<select name="tld">
  <option value="ax">ax</option>
</select>
<input type="submit" value="Buy">
    </form>



  

  


</body>
</html>
