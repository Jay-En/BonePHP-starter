<?php

/* register.html */
class __TwigTemplate_7c2387783bef3b9d07f3403a1d8af8b127a0e6418511a373e18bcfdee388aa9b extends Twig_Template
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
        echo "
";
        // line 2
        $this->loadTemplate("header.html", "register.html", 2)->display($context);
        // line 3
        echo "<div class=\"ch-container\">
    <div class=\"row\">
<div class=\"col-sm-3 center\" >
       ";
        // line 6
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 7
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["error"]) ? $context["error"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["err"]) {
                // line 8
                echo "             <div class=\"alert alert-danger\" >
                 <strong>ERROR!</strong> ";
                // line 9
                echo twig_escape_filter($this->env, $context["err"], "html", null, true);
                echo "
            </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['err'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "   
    ";
        }
        // line 14
        echo "    ";
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 15
            echo "    <div class=\"alert alert-success\">
      <strong>Success!</strong> ";
            // line 16
            echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : null), "html", null, true);
            echo "
    </div>
    ";
        }
        // line 19
        echo "
<form class=\"form-signin\" action=\"signup\" method=\"POST\" target=\"_self\">
        <h2 class=\"form-signin-heading\">Register</h2>
        <label for=\"name\" class=\"sr-only\">Name</label>
        <input id=\"name\" class=\"form-control\" placeholder=\"name\" required=\"\" autofocus=\"\" type=\"name\" name=\"name\">
        <label for=\"username\" class=\"sr-only\">Username</label>
        <input id=\"username\" class=\"form-control\" placeholder=\"username\" required=\"\" autofocus=\"\" type=\"username\" name=\"username\">
        <label for=\"inputPassword\" class=\"sr-only\">Password</label>
        <input id=\"inputPassword\" class=\"form-control\" placeholder=\"Password\" required=\"\" type=\"password\" name=\"password\">
        <input type=\"hidden\" name=\"token\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\">
        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Sign up</button>
        <a href=\"login\" target=\"_self\">Login</a>
</form>
</div>
</div>
</div>
</form>


</body>
</html>";
    }

    public function getTemplateName()
    {
        return "register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 28,  64 => 19,  58 => 16,  55 => 15,  52 => 14,  48 => 12,  39 => 9,  36 => 8,  31 => 7,  29 => 6,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* */
/* {% include("header.html")  %}*/
/* <div class="ch-container">*/
/*     <div class="row">*/
/* <div class="col-sm-3 center" >*/
/*        {% if error %}*/
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
/* <form class="form-signin" action="signup" method="POST" target="_self">*/
/*         <h2 class="form-signin-heading">Register</h2>*/
/*         <label for="name" class="sr-only">Name</label>*/
/*         <input id="name" class="form-control" placeholder="name" required="" autofocus="" type="name" name="name">*/
/*         <label for="username" class="sr-only">Username</label>*/
/*         <input id="username" class="form-control" placeholder="username" required="" autofocus="" type="username" name="username">*/
/*         <label for="inputPassword" class="sr-only">Password</label>*/
/*         <input id="inputPassword" class="form-control" placeholder="Password" required="" type="password" name="password">*/
/*         <input type="hidden" name="token" value="{{token}}">*/
/*         <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>*/
/*         <a href="login" target="_self">Login</a>*/
/* </form>*/
/* </div>*/
/* </div>*/
/* </div>*/
/* </form>*/
/* */
/* */
/* </body>*/
/* </html>*/
