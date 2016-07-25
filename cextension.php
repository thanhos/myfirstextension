<?php
$url = $_POST['url'];

// query
$query = urlencode('select * from html where url="'.$url.'" and xpath="//title"');
$requesturl = "https://query.yahooapis.com/v1/public/yql?q=".$query."&format=json&diagnostics=true&callback=";

// curl request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $requesturl);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = json_decode(curl_exec($ch));

// filtering title and created 
$title = "";
foreach($response as $data){
 
 foreach($data->results as $row){
 if($row != NULL){
 $title = $row;
 }

 }
}

if($title != ""){
 $return_text .= "<h2>".$title."</h2>";
}else{
 $return_text = "<h2>Not found</h2>";
}

?>

<!doctype html>
<html>
<body style='width: 400px;'>
<?php echo $return_text; ?>
</body>
</html>

