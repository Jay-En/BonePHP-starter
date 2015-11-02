<?php

/* index.html */
class __TwigTemplate_d0f01262ad0da7dc2e9533486a895e7d047dd2139a1d2d2a63daccc727e9ec20 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo " <html>
 <head>
 \t<title>";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>

    
    <link href='public/lib/ngprogress-lite/ngprogress-lite.css' rel='stylesheet'>  
\t<link href=\"public/lib/bootstrap/css/bootstrap.css\" rel=\"stylesheet\" media=\"screen\">
 </head>
 <body>
 \t\t";
        // line 12
        echo "
 \t\t\t{{2+23}}
\t\t";
        echo "
\t\t<div class=\"col-lg-12 col-md-12 offset-menu\" ng-view></div>
 \t\t


        <script type=\"text/javascript\" src=\"public/lib/angular/angular.js\"></script>
        <script type=\"text/javascript\" src=\"public/lib/angular-route/angular-route.js\"></script>
        <script type=\"text/javascript\" src=\"public/lib/angular-resource/angular-resource.js\"></script>
        <script type=\"text/javascript\" src=\"public/lib/angular-sanitize/angular-sanitize.min.js\"></script>

        <script type=\"text/javascript\" src=\"public/lib/ngprogress-lite/ngprogress-lite.js\"></script>

        <script type=\"text/javascript\" src=\"public/lib/jquery/jquery.min.js\"></script>
        <script type=\"text/javascript\" src=\"public/lib/bootstrap/js/bootstrap.min.js\"></script>

        <script type=\"text/javascript\" src=\"public/index/index.client.module.js\"></script>
        <script type=\"text/javascript\" src=\"public/index/controllers/index.client.controller.js\"></script>
        <script type=\"text/javascript\" src=\"public/index/directives/index.client.directive.js\"></script>
        <script type=\"text/javascript\" src=\"public/index/services/index.client.service.js\"></script>
        <script type=\"text/javascript\" src=\"public/\tindex/config/index.client.routes.js\"></script>

        <script type=\"text/javascript\" src=\"public/application.js\"></script>
 </body>\t
 </html>


";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 12,  23 => 3,  19 => 1,);
    }
}
/*  <html>*/
/*  <head>*/
/*  	<title>{{title}}</title>*/
/* */
/*     */
/*     <link href='public/lib/ngprogress-lite/ngprogress-lite.css' rel='stylesheet'>  */
/* 	<link href="public/lib/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">*/
/*  </head>*/
/*  <body>*/
/*  		{% verbatim %}*/
/*  			{{2+23}}*/
/* 		{% endverbatim %}*/
/* 		<div class="col-lg-12 col-md-12 offset-menu" ng-view></div>*/
/*  		*/
/* */
/* */
/*         <script type="text/javascript" src="public/lib/angular/angular.js"></script>*/
/*         <script type="text/javascript" src="public/lib/angular-route/angular-route.js"></script>*/
/*         <script type="text/javascript" src="public/lib/angular-resource/angular-resource.js"></script>*/
/*         <script type="text/javascript" src="public/lib/angular-sanitize/angular-sanitize.min.js"></script>*/
/* */
/*         <script type="text/javascript" src="public/lib/ngprogress-lite/ngprogress-lite.js"></script>*/
/* */
/*         <script type="text/javascript" src="public/lib/jquery/jquery.min.js"></script>*/
/*         <script type="text/javascript" src="public/lib/bootstrap/js/bootstrap.min.js"></script>*/
/* */
/*         <script type="text/javascript" src="public/index/index.client.module.js"></script>*/
/*         <script type="text/javascript" src="public/index/controllers/index.client.controller.js"></script>*/
/*         <script type="text/javascript" src="public/index/directives/index.client.directive.js"></script>*/
/*         <script type="text/javascript" src="public/index/services/index.client.service.js"></script>*/
/*         <script type="text/javascript" src="public/	index/config/index.client.routes.js"></script>*/
/* */
/*         <script type="text/javascript" src="public/application.js"></script>*/
/*  </body>	*/
/*  </html>*/
/* */
/* */
/* */
