<?php

    function rupiah($nilai = 0){
		$string = "Rp. " . number_format($nilai);
		return $string;
    }
    
?>