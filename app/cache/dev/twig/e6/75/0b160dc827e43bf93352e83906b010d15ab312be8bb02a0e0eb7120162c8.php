<?php

/* SonataAdminBundle:Pager:results.html.twig */
class __TwigTemplate_e6750b160dc827e43bf93352e83906b010d15ab312be8bb02a0e0eb7120162c8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:Pager:base_results.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:Pager:base_results.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Pager:results.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 20,  41 => 17,  77 => 33,  71 => 31,  65 => 29,  62 => 28,  45 => 21,  37 => 20,  138 => 36,  135 => 35,  127 => 32,  124 => 31,  119 => 28,  105 => 27,  99 => 26,  78 => 24,  60 => 22,  57 => 20,  54 => 18,  52 => 23,  28 => 14,  95 => 32,  89 => 24,  84 => 39,  81 => 25,  75 => 36,  69 => 33,  64 => 23,  61 => 31,  59 => 27,  56 => 26,  53 => 28,  50 => 27,  46 => 25,  44 => 24,  40 => 20,  38 => 16,  35 => 15,  32 => 14,  30 => 13,  24 => 14,  21 => 11,  39 => 18,  36 => 17,  34 => 16,  31 => 15,  29 => 15,  26 => 14,  22 => 12,  19 => 11,);
    }
}
