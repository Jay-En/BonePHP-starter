<?php
class Controller{

		function htmlResponse($html, $params=""){
			$params['baseurl'] = config::get('base_url');
			
			$path="app/Views";
	        $loader = new Twig_Loader_Filesystem($path);
	        $twig = new Twig_Environment($loader, array(
	            'cache' => $path.'/temp',
	        ));
			$template = $twig->loadTemplate($html);

				echo $template->render($params);
			

		}


}