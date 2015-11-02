<?php

/* changepassword.html */
class __TwigTemplate_0dbf4b69c98aab913d0667c908b1f96dc5803fa1dd99c25ecefd5c3b15feee43 extends Twig_Template
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
        $this->loadTemplate("header.html", "changepassword.html", 1)->display($context);
        // line 2
        $this->loadTemplate("menu.html", "changepassword.html", 2)->display($context);
        // line 3
        echo "      
<div class=\"ch-container\">
    <div class=\"row\">
<div class=\"col-sm-3 center\" >
<form class=\"form-signin\" action=\"changepassword\" method=\"POST\"  target=\"_self\">
        <h2 class=\"form-signin-heading\">Change Password</h2>
        <label for=\"name\" class=\"sr-only\">Current Password</label>
        <input id=\"name\" class=\"form-control\" placeholder=\"Current Password\" required=\"\" autofocus=\"\" type=\"password\" name=\"password_current\">
        <label for=\"username\"  class=\"sr-only\">New Password</label>
        <input id=\"username\" class=\"form-control\" placeholder=\"New Password\" required=\"\" autofocus=\"\" type=\"password\" name=\"password\">
        <label for=\"inputPassword\"  class=\"sr-only\">Repeat Password</label>
        <input id=\"inputPassword\" class=\"form-control\" placeholder=\"Repeat Password\" required=\"\" type=\"password\" name=\"password_repeat\">
        <input type=\"hidden\" name=\"token\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : null), "html", null, true);
        echo "\">
        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Save</button>
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
        return "changepassword.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 15,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% include("header.html")  %}*/
/* {% include("menu.html")  %}*/
/*       */
/* <div class="ch-container">*/
/*     <div class="row">*/
/* <div class="col-sm-3 center" >*/
/* <form class="form-signin" action="changepassword" method="POST"  target="_self">*/
/*         <h2 class="form-signin-heading">Change Password</h2>*/
/*         <label for="name" class="sr-only">Current Password</label>*/
/*         <input id="name" class="form-control" placeholder="Current Password" required="" autofocus="" type="password" name="password_current">*/
/*         <label for="username"  class="sr-only">New Password</label>*/
/*         <input id="username" class="form-control" placeholder="New Password" required="" autofocus="" type="password" name="password">*/
/*         <label for="inputPassword"  class="sr-only">Repeat Password</label>*/
/*         <input id="inputPassword" class="form-control" placeholder="Repeat Password" required="" type="password" name="password_repeat">*/
/*         <input type="hidden" name="token" value="{{token}}">*/
/*         <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>*/
/* </form>*/
/* </div>*/
/* </div>*/
/* </div>*/
/* </form>*/
/* */
/* */
/* </body>*/
/* </html>*/
