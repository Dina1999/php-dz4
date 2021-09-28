<? php
function  upload_file ( $ file ) {
	if ( $ file [ 'name' ] == '' ) {
		echo  'Файл не выбран!' ;
		возврат ;
	}
	// Проверяем расширений изображений, их размер и процесс создания временной директории
	if ( $ file [ 'type' ] == 'image / jpeg' || $ file [ 'type' ] == 'image / png' || $ file [ 'type' ] == 'image / pjpeg' || $ file [ 'type' ] == 'image / gif' ) {
		if ( $ file [ 'size' ] <= GW_MAXFILESIZE ) {
			if ( copy ( $ file [ 'tmp_name' ], 'img /' . $ file [ 'name' ])) {
				echo  'Файл успешно загружен' ;
				img_resize ( 'img /' . $ file [ 'имя' ], 'thumbs / thumb_' . $ file [ 'name' ], '250' , '150' );
			} else { echo  'Ошибка загрузки файла' ; return ;}	
		} else {
			echo  "Файл не должен быть размер в 5 Мб!" ; возврат ; }
	} else {
		echo  "Файл должен иметь одно из известных расширенных графических изображений (gif, jpeg или png)!" ;
		возврат ;
	}
}



?>

<! DOCTYPE html >
< html >
< голова >
	< meta  http-Equiv = " Content-Type " content = " text / html; charset = UTF-8 " >
	< link  rel = " stylesheet " href = " style.css " >
	< title > Загрузка файла на сервер </ title > 
</ голова >
< тело >

	< h3 > Здесь Вы можете добавить свои чудесные изображения на наш сайт! </ h3 >

	<? php 
		if ( isset ( $ _FILES [ 'файл' ])) {
			upload_file ( $ _FILES [ 'файл' ]);
		}
	 ?>

	< form  method = " post " enctype = " multipart / form-data " > 
		< input  type = " file " name = " file " >
		< input  type = " submit " value = " Загрузить файл! " >
	</ форма >


	<? php

	$ current_page = mb_substr ( $ _SERVER [ 'REQUEST_URI' ], 0 , 29 );

	// Вывод миниатюр на экран
	$ handle = opendir ( 'большие пальцы' );
	if ( $ handle ! = false ) {
		// echo "Дескриптор каталога: $ handle <br/>"; 
		echo  "Галерея: <br/>" ;
		
	    while ( false ! == ( $ file = readdir ( $ handle ))) {
	        if ( $ file ! = '.' && $ file ! = '..' && $ file ! = '.DS_Store' ) {
	        	$ full_size = mb_substr ( $ файл , 6 );
				echo  "<a href=\"$current_page/img/$full_size\" class=\"flipLightBox\" target=\"_blank\"> <img src = \" thumbs / $ file \ "alt = \" \ " > <span> Очень даже классная галерея на js и php! </span> </a> " ;
			}
	    }
	    closedir ( $ handle );
	}

	?>

< script  type = " text / javascript " src = " http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js " > </ script >
< script  type = " text / javascript " src = " fliplightbox / fliplightbox.min.js " > </ script >
< script  type = " text / javascript " > $ ( 'body' ) . flipLightBox ( ) </ скрипт >

</ body >
</ html >