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

function str_strip($str, $backer=1, $sperator='.', $left=false, $url_query_remove=true, $lower=true, $trimed=true){
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

  $str = trim($str, $sperator);
  
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
  $result = join($sperator, $spilted_arry);
  if (lower){
    $result = strtolower($result);
  }
  if ($trimed){
    $result = strtolower($result);
  }
  return $result;
}


$request_path = "https://www.w3schools.com/php/phpTRYit.asp?filename=tryphp_intro";
echo "url Str is:    " .  $request_path . "<br><br>"; 
$request_file = str_strip($request_path, -1, "/", true);
echo "request_filename:     " .  $request_file . "<br><br>"; 
$endpoint_name = str_strip($request_file, -1, ".", false);
echo "endpoint or filename without any extension:   " .  $request_file . "<br><br>"; 
