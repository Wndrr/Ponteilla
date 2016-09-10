<?php

/* layout.html.twig */
class __TwigTemplate_5c97bfd2b42877fcd5e9c4c1bfd9f1bc98db32fb3a86fe9552bf8c52802034ef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>

        </title>

        <!-- FullPageJs -->
        <link href=\"./lib/fullPageJs/jquery.fullpage.min.css\" rel=\"stylesheet\">

        <!-- Bootstrap 3 -->
        <link href=\"./vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">

        <!-- Perso -->
        <link href=\"./css/design.css\" rel=\"stylesheet\">




        <!-- Jqueyr -->
        <script src=\"./vendor/components/jquery/jquery.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
        <!-- bootstrap 3 -->
        <script src=\"./vendor/twbs/bootstrap/dist/js/bootstrap.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>

        <!-- FullPageJs -->
        <script src=\"./lib/fullPageJs/jquery.fullpage.min.js\" type=\"text/javascript\" charset=\"utf-8\" ></script>

    </head>
    <body class=\"container-fluid\">
       <nav id=\"menu\" class=\"navbar navbar-default navbar-fixed-top col-lg-8 col-lg-offset-2\">
          <ul class=\"nav navbar-nav nav-tabs nav-justified\">
            <li>
                <a href=\"#parentWho\">
                   Qui somme-nous ? 
                </a>
            </li>
            <li>
                <a href=\"#parentHow\">
                   Comment nous rejoindre ? 
                </a>
            </li>
          </ul>
        </nav>
        ";
        // line 44
        $this->displayBlock('content', $context, $blocks);
        // line 45
        echo "    <div id=\"footer\" class=\"row\">
        unicorns
    </div>
    </body>
</html>
";
    }

    // line 44
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  76 => 44,  67 => 45,  65 => 44,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <title>*/
/* */
/*         </title>*/
/* */
/*         <!-- FullPageJs -->*/
/*         <link href="./lib/fullPageJs/jquery.fullpage.min.css" rel="stylesheet">*/
/* */
/*         <!-- Bootstrap 3 -->*/
/*         <link href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">*/
/* */
/*         <!-- Perso -->*/
/*         <link href="./css/design.css" rel="stylesheet">*/
/* */
/* */
/* */
/* */
/*         <!-- Jqueyr -->*/
/*         <script src="./vendor/components/jquery/jquery.min.js" type="text/javascript" charset="utf-8"></script>*/
/*         <!-- bootstrap 3 -->*/
/*         <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>*/
/* */
/*         <!-- FullPageJs -->*/
/*         <script src="./lib/fullPageJs/jquery.fullpage.min.js" type="text/javascript" charset="utf-8" ></script>*/
/* */
/*     </head>*/
/*     <body class="container-fluid">*/
/*        <nav id="menu" class="navbar navbar-default navbar-fixed-top col-lg-8 col-lg-offset-2">*/
/*           <ul class="nav navbar-nav nav-tabs nav-justified">*/
/*             <li>*/
/*                 <a href="#parentWho">*/
/*                    Qui somme-nous ? */
/*                 </a>*/
/*             </li>*/
/*             <li>*/
/*                 <a href="#parentHow">*/
/*                    Comment nous rejoindre ? */
/*                 </a>*/
/*             </li>*/
/*           </ul>*/
/*         </nav>*/
/*         {% block content %}{% endblock %}*/
/*     <div id="footer" class="row">*/
/*         unicorns*/
/*     </div>*/
/*     </body>*/
/* </html>*/
/* */
