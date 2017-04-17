<?php

if (file_exists($_POST['file']))
{
	$file = getFile($_POST['file']);
	$file = preg_replace('`(\b[А-ЯЁA-Z]{2,}\b)`u', '<span style="color:royalblue">$1</span>', $file);
	$file = preg_replace('#(\d+)#','<u>$1</u>', $file);
	$file = preg_replace('`(\b[А-Я][а-я]+\b)`u','<span style="color:green">$1</span>', $file);
	echo $file;
}
else
	echo 'Заданный файл не существует.';


function getExtension(string $filename){
    $path_info = pathinfo($filename);
    return $path_info['extension'];
}

function getFile(string $filename){
	if (getExtension($filename) == "txt"){
		$filedata = file_get_contents($filename);
		return $filedata;
	}else
		echo "Файл не является текстовым.";
}
