<?php
$input_file = readline('Masukan file: ');
$c_name = readline('bernama nama file untuk di save: ');
$save = fopen($c_name,'w');
if (file_exists($input_file)){
    $baca = fopen($input_file,"r");
    while(!feof($baca)){
        $line = fgets($baca);
        if ($line === null)break;
        $string = trim(preg_replace('/\s\s+/', ' ', $line));   
        $ipaddres = gethostbyname($string);
        if( filter_var($ipaddres, FILTER_VALIDATE_IP)){
            // echo ' Hostname is an IP address already'. PHP_EOL;
            echo $ipaddres. PHP_EOL;
            fwrite($save,$ipaddres. PHP_EOL); 
        }elseif($ipaddres==$string){
            echo  'time out - '.$string. PHP_EOL;
        }
    }
    fclose($baca);   
    fclose($save);
}else{
    echo 'file tidak di temukan';
}
?>