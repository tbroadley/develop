<?php
/************************************************************/
/*                     SYSTEM CONSTANTS                     */
/************************************************************/
/*

Author: Ozan UYKUN
Site: http://www.zntr.net
Copyright 2012-2015 zntr.net - Tüm hakları saklıdır.

*/
/******************************************************************************************
* BASE_DIR: Sistem kök dizini.                                                            *
******************************************************************************************/	
$baseDir = explode("index.php", $_SERVER['SCRIPT_NAME']);

if( isset($baseDir[0]) )
{
	define('BASE_DIR', $baseDir[0]);
}
/*****************************************************************************************/

/******************************************************************************************
* SYSTEM_DIR: System/                                                                     *
******************************************************************************************/	
define('SYSTEM_DIR', 'System/'); 	

/******************************************************************************************
* CONFIG_DIR: Application/Config/                                                         *
******************************************************************************************/
define('CONFIG_DIR', APP_DIR.'Config/'); 

/******************************************************************************************
* CORE_DIR: System/Core/                                                         		  *
******************************************************************************************/
define('CORE_DIR', SYSTEM_DIR.'Core/'); 		

/******************************************************************************************
* SYSTEM_LANGUAGES_DIR: System/Languages/                                                 *
******************************************************************************************/
define('SYSTEM_LANGUAGES_DIR', SYSTEM_DIR.'Languages/');

/******************************************************************************************
* LANGUAGES_DIR: Application/Languages/                                                   *
******************************************************************************************/
define('LANGUAGES_DIR', APP_DIR.'Languages/'); 

/******************************************************************************************
* SYSTEM_LIBRARIES_DIR: System/Libraries/                                                 *
******************************************************************************************/
define('SYSTEM_LIBRARIES_DIR', SYSTEM_DIR.'Libraries/');

/******************************************************************************************
* LIBRARIES_DIR: Application/Libraries/                                                   * 
******************************************************************************************/
define('LIBRARIES_DIR', APP_DIR.'Libraries/'); 			

/******************************************************************************************
* CONTROLLERS_DIR: Application/Controllers/                                               * 
******************************************************************************************/
define('CONTROLLERS_DIR', APP_DIR.'Controllers/'); 			

/******************************************************************************************
* MODELS_DIR: Application/Models/                                             			  * 
******************************************************************************************/
define('MODELS_DIR', APP_DIR.'Models/'); 				

/******************************************************************************************
* VIEWS_DIR: Application/Views/                                             			  * 
******************************************************************************************/
define('VIEWS_DIR', APP_DIR.'Views/'); 						

/******************************************************************************************
* SCRIPTS_DIR: Application/Views/Scripts/                                             	  * 
******************************************************************************************/	
define('SCRIPTS_DIR', VIEWS_DIR.'Scripts/'); 				

/******************************************************************************************
* PAGES_DIR: Application/Views/Pages/    	                                         	  * 
******************************************************************************************/	
define('PAGES_DIR', VIEWS_DIR.'Pages/'); 					

/******************************************************************************************
* STYLES_DIR: Application/Views/Styles/       	                                      	  * 
******************************************************************************************/	
define('STYLES_DIR', VIEWS_DIR.'Styles/'); 				

/******************************************************************************************
* TRINKETS_DIR: Application/Views/Trinkets/    	                                      	  * 
******************************************************************************************/	
define('TRINKETS_DIR', VIEWS_DIR.'Trinkets/');		

/******************************************************************************************
* FONTS_DIR: Application/Views/Fonts/    	                                      	  	  * 
******************************************************************************************/	
define('FONTS_DIR', VIEWS_DIR.'Fonts/');					

/******************************************************************************************
* FILES_DIR: Application/Views/Trinkets/Files/    	                                      * 
******************************************************************************************/	
define('FILES_DIR', TRINKETS_DIR.'Files/');					

/******************************************************************************************
* TEMPLATES_DIR: Application/Views/Trinkets/Templates/    	                              * 
******************************************************************************************/	
define('TEMPLATES_DIR', TRINKETS_DIR.'Templates/');		

/******************************************************************************************
* SYSTEM_TEMPLATES_DIR: System/Templates/               	                              * 
******************************************************************************************/	
define('SYSTEM_TEMPLATES_DIR', SYSTEM_DIR.'Templates/');	

/******************************************************************************************
* UPLOADS_DIR: Application/Views/Trinkets/Uploads/    	                                  * 
******************************************************************************************/
define('UPLOADS_DIR', TRINKETS_DIR.'Uploads/');						

/******************************************************************************************
* COMPONENTS_DIR: System/Components/    	 	                                 		  * 
******************************************************************************************/
define('COMPONENTS_DIR', SYSTEM_DIR.'Components/');			