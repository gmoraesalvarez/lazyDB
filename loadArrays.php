<?php
/*
Basically this serves to load files into JS arrays.
Files are JSON arrays created with JSON.stringyfy() from JS and loaded with JSON.parse().

This function loads the matching ($match) files from a specific $dir
and puts them in an array with the given $arr_name in JS.
Each file is put in one of the array's indexes.
A list of the filtered file names is put in a matching array $ilist in JS.
*/
	function arrays_from_files($dir,$match,$quant,$arr_name,$ilist){
        $arqs = [];
		if ($dir_list = opendir($dir)){
		while(($filename = readdir($dir_list)) !== false){
			if (strpos($filename,$match) !== false){
				$arqs[] = $filename;
         	   //document.print($filename);
				}
			}
		closedir($dir_list);
		}
        rsort($arqs);
        $len = sizeof($arqs);
        if ($len > $quant) {$len = $quant;}
		$files = [];
		$l = 0;
		echo "<script>$arr_name = [];$ilist = [];</script>";
        for ($i=0;$i<$len;$i++){
        	if ( file_exists('dados/'.$arqs[$i]) ){
            	//echo $ftemp." existe. ";
        		$file_raw = file_get_contents('dados/'.$arqs[$i]);
        		$files[] = str_replace(array("\r", "\n"),'',$file_raw);
                $subname = substr($arqs[$i],strlen($match),-4);
        		echo "<script>\n $ilist [$l]='$subname';$arr_name [$l]=JSON.parse('$files[$l]');\n console.log('loaded $arqs[$i] --> $files[$l]');\n</script>";
            	$l++;
        	}
    	}
    }
?>
