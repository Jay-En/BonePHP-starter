<?php

/* menu.html */
class __TwigTemplate_1df1a45b6b2198033eedb5f3a6df50cbffb85eefa128f6f0d9566f9a489d5eda extends Twig_Template
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
        echo "<nav class=\"navbar navbar-default\">
        <div class=\"container-fluid\">
          <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
              <span class=\"sr-only\">Toggle navigation</span>
              <span class=\"icon-bar\"></span>
              <span class=\"icon-bar\"></span>
              <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"home\"  target=\"_self\">Contact List</a>
          </div>
          <div id=\"navbar\" class=\"navbar-collapse collapse\">
            <ul class=\"nav navbar-nav\">
              <li><a href=\"home\"  target=\"_self\">Home</a></li>
              <li><a href=\"profile\"  target=\"_self\">Profile</a></li>
              <li><a href=\"changepassword\" target=\"_self\">Change Password</a></li>
            </ul>
            <ul class=\"nav navbar-nav navbar-right\">
              <li><a href=\"logout\"  target=\"_self\">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
   ";
        // line 24
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 25
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["error"]) ? $context["error"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["err"]) {
                // line 26
                echo "             <div class=\"alert alert-danger\" >
                 <strong>ERROR!</strong> ";
                // line 27
                echo twig_escape_filter($this->env, $context["err"], "html", null, true);
                echo "
            </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['err'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "   
    ";
        }
        // line 32
        echo "    ";
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 33
            echo "    <div class=\"alert alert-success\">
      <strong>Success!</strong> ";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : null), "html", null, true);
            echo "
    </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 34,  70 => 33,  67 => 32,  63 => 30,  54 => 27,  51 => 26,  46 => 25,  44 => 24,  19 => 1,);
    }
}
/* <nav class="navbar navbar-default">*/
/*         <div class="container-fluid">*/
/*           <div class="navbar-header">*/
/*             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">*/
/*               <span class="sr-only">Toggle navigation</span>*/
/*               <span class="icon-bar"></span>*/
/*               <span class="icon-bar"></span>*/
/*               <span class="icon-bar"></span>*/
/*             </button>*/
/*             <a class="navbar-brand" href="home"  target="_self">Contact List</a>*/
/*           </div>*/
/*           <div id="navbar" class="navbar-collapse collapse">*/
/*             <ul class="nav navbar-nav">*/
/*               <li><a href="home"  target="_self">Home</a></li>*/
/*               <li><a href="profile"  target="_self">Profile</a></li>*/
/*               <li><a href="changepassword" target="_self">Change Password</a></li>*/
/*             </ul>*/
/*             <ul class="nav navbar-nav navbar-right">*/
/*               <li><a href="logout"  target="_self">Logout</a></li>*/
/*             </ul>*/
/*           </div><!--/.nav-collapse -->*/
/*         </div><!--/.container-fluid -->*/
/*       </nav>*/
/*    {% if error %}*/
/*             {% for err in error %}*/
/*              <div class="alert alert-danger" >*/
/*                  <strong>ERROR!</strong> {{err}}*/
/*             </div>*/
/*     {% endfor %}*/
/*    */
/*     {% endif %}*/
/*     {% if success %}*/
/*     <div class="alert alert-success">*/
/*       <strong>Success!</strong> {{success}}*/
/*     </div>*/
/*     {% endif %}*/
/* */
