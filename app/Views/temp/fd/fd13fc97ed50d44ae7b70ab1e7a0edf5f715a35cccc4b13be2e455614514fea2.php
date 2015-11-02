<?php

/* login.html */
class __TwigTemplate_d84c0af14adc45b795fb0aaff3206e3baebc61b04faa2c4a3a8865bc22868f70 extends Twig_Template
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
        $this->loadTemplate("header.html", "login.html", 2)->display($context);
        // line 3
        echo "      

<div class=\"ch-container\">
    <div class=\"row\">
<div class=\"col-sm-3 center\" >
       ";
        // line 8
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 9
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["error"]) ? $context["error"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["err"]) {
                // line 10
                echo "             <div class=\"alert alert-danger\" >
                 <strong>ERROR!</strong> ";
                // line 11
                echo twig_escape_filter($this->env, $context["err"], "html", null, true);
                echo "
            </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['err'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "   
    ";
        }
        // line 16
        echo "    ";
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 17
            echo "    <div class=\"alert alert-success\">
      <strong>Success!</strong> ";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : null), "html", null, true);
            echo "
    </div>
    ";
        }
        // line 21
        echo "
<form class=\"form-signin\" action=\"login\" method=\"POST\" target=\"_self\">
        <h2 class=\"form-signin-heading\">Please sign in</h2>
        <label for=\"username\" class=\"sr-only\">Username</label>
        <input id=\"username\" class=\"form-control\" placeholder=\"username\" required=\"\" autofocus=\"\" type=\"username\" name=\"username\">
        <label for=\"inputPassword\" class=\"sr-only\">Password</label>
        <input id=\"inputPassword\" class=\"form-control\" placeholder=\"Password\" required=\"\" type=\"password\" name=\"password\">
        <input type=\"hidden\" name=\"token\" value=";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo ">
        <div class=\"checkbox\">
          <label>
            <input name=\"remember\"type=\"checkbox\"> Remember me
          </label>
        </div>
        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Sign in</button>
        <a href=\"signup\" target=\"_self\">Register</a>
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
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 28,  66 => 21,  60 => 18,  57 => 17,  54 => 16,  50 => 14,  41 => 11,  38 => 10,  33 => 9,  31 => 8,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* */
/* {% include("header.html")  %}*/
/*       */
/* */
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
/* <form class="form-signin" action="login" method="POST" target="_self">*/
/*         <h2 class="form-signin-heading">Please sign in</h2>*/
/*         <label for="username" class="sr-only">Username</label>*/
/*         <input id="username" class="form-control" placeholder="username" required="" autofocus="" type="username" name="username">*/
/*         <label for="inputPassword" class="sr-only">Password</label>*/
/*         <input id="inputPassword" class="form-control" placeholder="Password" required="" type="password" name="password">*/
/*         <input type="hidden" name="token" value={{token}}>*/
/*         <div class="checkbox">*/
/*           <label>*/
/*             <input name="remember"type="checkbox"> Remember me*/
/*           </label>*/
/*         </div>*/
/*         <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>*/
/*         <a href="signup" target="_self">Register</a>*/
/* </form>*/
/* </div>*/
/* </div>*/
/* </div>*/
/* </form>*/
/* */
/* */
/* </body>*/
/* </html>*/
