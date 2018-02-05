<?php

error_reporting(0); // Set E_ALL for debuging

// elFinder autoload
require './autoload.php';
// ===============================================

function access($attr, $path, $data, $volume, $isDir, $relpath) {
	$basename = basename($path);
	return $basename[0] === '.'                  // if file/folder begins with '.' (dot)
			 && strlen($relpath) !== 1           // but with out volume root
		? !($attr == 'read' || $attr == 'write') // set read+write to false, other (locked+hidden) set to true
		:  null;                                 // else elFinder decide it itself
}



// Documentation for connector options:
$endpasta=$_GET['endpasta'];
$nivel=$_GET['nivel'];
//Controla nivel de permissao
if(isset($nivel) && $nivel > 4) {
$opts = array(
    'locale' => '',
    'roots'  => array(
        array(
            'driver' => 'LocalFileSystem',
            'path'   => "../../assets/clientes/".$endpasta."/",
			//http://www.fsconsultores.org/fscon/
            'URL'    => "http://www.fsconsultores.org/fs/assets/clientes/".$endpasta."/",
			'accessControl' => 'access',   // disable and hide dot starting files (OPTIONAL)
			'defaults' => array('read' => true, 'write' => true, 'locked' => false)
        )
    )
);
}else{
	$opts = array(
    'locale' => '',
    'roots'  => array(
        array(
            'driver' => 'LocalFileSystem',
            'path'   => "../../assets/clientes/".$endpasta."/",
            'URL'    => "http://www.fsconsultores.org/fs/assets/clientes/".$endpasta."/",
			'accessControl' => 'access',   // disable and hide dot starting files (OPTIONAL)
			'defaults' => array('read' => true, 'write' => true, 'locked' => true)
        )
    )
);
	
	}

// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();
