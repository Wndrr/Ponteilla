<?php

/* index.html.twig */
class __TwigTemplate_de7702f32c15d465f82ac894b727fac022ecc3fffec46ae1f6ada015e2df6b53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "index.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div id=\"topBanner\" class=\"row\">
        <h1>
            Je marche, donc je suis
        </h1>
    </div>
    <div id=\"parentWho\" class=\"row\">
        <h2 id=\"whoTitle\">
            Qui somme-nous ?
        </h2>
        <div id=\"leftContainer\" class=\"col-lg-5\">
            <div id=\"parentLeft\">
            <h3 id=\"titleLeft\">
                Randonnée pedestre
            </h3>
                <div id=\"childLeft\">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>
        </div>
        <div id=\"rightContainer\" class=\"col-lg-5 col-lg-offset-2\">
            <div id=\"parentRight\">
            <h3 id=\"titleRight\">
                Marche nordique
            </h3>
                <div id=\"childRight\">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>
        </div>
    </div>
    <div id=\"parentHow\" class=\"row\">
        <h2 id=\"howTitle\">
            Comment nous rejoindre ?
        </h2>
        <div id=\"leftContainer\" class=\"col-lg-6\">
            <div id=\"parentLeft\">
            <h3 id=\"titleLeft\">
                Conditions d'adhesion
            </h3>
                <div id=\"childLeft\">
                    Soit tu marche, soit tu vole, mais tu fais pas les deux à la fois.
                    <br />
                    Appart ca ben chais pas, j'ai pas les textes originaux sous les yeux, y sont à Ponteilla -_-
                </div>
            </div>
        </div>
        <div id=\"rightContainer\" class=\"col-lg-6\">
            <div id=\"parentRight\">
            <h3 id=\"titleRight\">
                Informations de contact
            </h3>
                <div id=\"childRight\">
                    Il est possible de nous contacter par
                    <ul>
                        <li>
                            Telephone, au 00.00.00.00.00
                        </li>
                        <li>
                            Email, à l'adresse foyerRural@ponteilla.nyls
                        </li>
                        <li>
                           Fax, just kidding
                        </li>
                        <li>
                            Unicors ? well it's a proof of concept afterall, i can write whatever i want, right ?
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html.twig" %}*/
/* */
/* {% block content %}*/
/*     <div id="topBanner" class="row">*/
/*         <h1>*/
/*             Je marche, donc je suis*/
/*         </h1>*/
/*     </div>*/
/*     <div id="parentWho" class="row">*/
/*         <h2 id="whoTitle">*/
/*             Qui somme-nous ?*/
/*         </h2>*/
/*         <div id="leftContainer" class="col-lg-5">*/
/*             <div id="parentLeft">*/
/*             <h3 id="titleLeft">*/
/*                 Randonnée pedestre*/
/*             </h3>*/
/*                 <div id="childLeft">*/
/*                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod*/
/*                     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,*/
/*                     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo*/
/*                     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse*/
/*                     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non*/
/*                     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         <div id="rightContainer" class="col-lg-5 col-lg-offset-2">*/
/*             <div id="parentRight">*/
/*             <h3 id="titleRight">*/
/*                 Marche nordique*/
/*             </h3>*/
/*                 <div id="childRight">*/
/*                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod*/
/*                     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,*/
/*                     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo*/
/*                     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse*/
/*                     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non*/
/*                     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     <div id="parentHow" class="row">*/
/*         <h2 id="howTitle">*/
/*             Comment nous rejoindre ?*/
/*         </h2>*/
/*         <div id="leftContainer" class="col-lg-6">*/
/*             <div id="parentLeft">*/
/*             <h3 id="titleLeft">*/
/*                 Conditions d'adhesion*/
/*             </h3>*/
/*                 <div id="childLeft">*/
/*                     Soit tu marche, soit tu vole, mais tu fais pas les deux à la fois.*/
/*                     <br />*/
/*                     Appart ca ben chais pas, j'ai pas les textes originaux sous les yeux, y sont à Ponteilla -_-*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         <div id="rightContainer" class="col-lg-6">*/
/*             <div id="parentRight">*/
/*             <h3 id="titleRight">*/
/*                 Informations de contact*/
/*             </h3>*/
/*                 <div id="childRight">*/
/*                     Il est possible de nous contacter par*/
/*                     <ul>*/
/*                         <li>*/
/*                             Telephone, au 00.00.00.00.00*/
/*                         </li>*/
/*                         <li>*/
/*                             Email, à l'adresse foyerRural@ponteilla.nyls*/
/*                         </li>*/
/*                         <li>*/
/*                            Fax, just kidding*/
/*                         </li>*/
/*                         <li>*/
/*                             Unicors ? well it's a proof of concept afterall, i can write whatever i want, right ?*/
/*                         </li>*/
/*                     </ul>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
