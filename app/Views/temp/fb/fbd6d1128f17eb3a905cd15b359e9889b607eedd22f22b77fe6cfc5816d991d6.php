<?php

/* header.html */
class __TwigTemplate_8d39f8caf48f0941d02aba0d853bbdada541873a787e36dc3eb8b414152f33db extends Twig_Template
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
    <base href=\"http://localhost/BonePHP-starter/\" target=\"_blank\">
    <title>";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>

    <link href='public/resource/style.css' rel='stylesheet'>  
    <link href='public/lib/ngprogress-lite/ngprogress-lite.css' rel='stylesheet'>  
    <link href=\"public/lib/bootstrap/css/bootstrap.css\" rel=\"stylesheet\" media=\"screen\">
 </head>
 <body>

 ";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 4,  19 => 1,);
    }
}
/*  <html>*/
/*  <head>*/
/*     <base href="http://localhost/BonePHP-starter/" target="_blank">*/
/*     <title>{{title}}</title>*/
/* */
/*     <link href='public/resource/style.css' rel='stylesheet'>  */
/*     <link href='public/lib/ngprogress-lite/ngprogress-lite.css' rel='stylesheet'>  */
/*     <link href="public/lib/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">*/
/*  </head>*/
/*  <body>*/
/* */
/*  */
