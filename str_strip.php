function php_isbool($var){
  return is_bool($var) || $var === 0 || $var === 1;
}

function remove_query_params($str){
    if (strpos($str, "?")){
      $splitedQueryA = explode('?',$str);
      array_pop($splitedQueryA);
      $str = join("", $splitedQueryA);
      
    }
    return $str;
}
/* like trim and stirp it remove tralaing space this remove traling character start and end with*/
function trim_char($str, $sperator){
  $start_with_spe = stripos($str,$sperator) == 0;
  $end_with_spe = strripos($str,$sperator) == (strlen($str)-1);
  if ($start_with_spe){
    // remove first chracter
    $str = substr($str,1);  
  }
  if ($end_with_spe) {
    // remove last chracter reversed substr
    $str = strrev($txt);
    $str = substr($txt,1);
    $str = strrev($txt);  
  }
  return $str;
}

function str_strip($str, $backer=1, $sperator='.', $left=false, $url_query_remove=true){
  if (!is_numeric($backer)){
     return '';
  }
  if (!php_isbool($left)){
     $left = false; 
  }
  
  /* option step to remove all query parameters */
  if ($url_query_remove == true){
     $str = remove_query_params($str);
  }
  
  /* remove the sperator from start and end of string to avoid empty exploded array items */
  $str = trim_char($str, $sperator);
  
  $spilted_arry = explode($sperator,$str);
  /* start removing from right or left of the splited string */
  $total_removing = $backer;
  /* -1 means dynamic set the total removed array equals to length of result array*/
  if ($backer === -1){
    $total_removing = count($spilted_arry) -1;
  }
  
  for ($i=0; $i<$total_removing; $i++){
   
    if ($left){
      // remove first index left == true
      array_shift($spilted_arry);
    } else {
      // remove last index left == false which is default rsplit
      array_pop($spilted_arry);
    }
  }

//print_r($spilted_arry);
  return join($sperator, $spilted_arry);
}
$request_path = "https://www.w3schools.com/php/phptryit.asp?filename=tryphp_intro";
$request_file = str_strip($request_path, -1, "/", true);
$endpoint_name = str_strip($request_file, 0, ".", false);
print_r($endpoint_name);
