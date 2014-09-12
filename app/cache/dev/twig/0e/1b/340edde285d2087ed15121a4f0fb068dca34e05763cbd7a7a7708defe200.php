<?php

/* ::base.html.twig */
class __TwigTemplate_0e1b340edde285d2087ed15121a4f0fb068dca34e05763cbd7a7a7708defe200 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
\t<head>
\t\t<meta charset=\"UTF-8\" />
\t\t<title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
\t\t";
        // line 7
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "dfe476a_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dfe476a_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/dfe476a_part_1_main_1.css");
            // line 8
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t\t";
        } else {
            // asset "dfe476a"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dfe476a") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/dfe476a.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t\t";
        }
        unset($context["asset_url"]);
        // line 10
        echo "\t\t";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "\t\t";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 14
        echo "\t</head>
\t<body>
\t\t<div id=\"head\">
\t\t\t<div class=\"aspage\">
\t\t\t\t<h1>Facultad de Ciencias Médicas</h1>
\t\t\t\t<h2>Sistema de registro de inasistencias de personal no docente</h2>
\t\t\t</div>
\t\t</div>
\t\t<div id=\"page\" class=\"aspage\">
\t\t\t<ul id=\"nav\">
\t\t\t\t<li><a href=\"#\">Inasistencias</a></li>
\t\t\t\t<li><a href=\"#\">Compensatorios</a></li>
\t\t\t\t<li><a href=\"#\">Empleados</a></li>
\t\t\t\t<li><a href=\"#\">Oficinas</a></li>
\t\t\t\t<li><a href=\"#\">Usuarios</a></li>
\t\t\t</ul>
\t\t\t<div id=\"body\">
\t\t\t\t";
        // line 31
        $this->displayBlock('body', $context, $blocks);
        // line 33
        echo "\t\t\t</div>
\t\t\t<div id=\"foot\">
\t\t\t\t<p>Grupo 2 - Taller de tecnologías de Producción de Software - 2014</p>
\t\t\t</div>
\t\t</div>

\t</body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo " - Registro de Inasistencias de la Facultad de Medicina - UNLP";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "\t\t";
    }

    // line 12
    public function block_javascripts($context, array $blocks = array())
    {
        // line 13
        echo "\t\t";
    }

    // line 31
    public function block_body($context, array $blocks = array())
    {
        // line 32
        echo "\t\t\t\t";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 31,  110 => 13,  100 => 10,  58 => 12,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 12,  61 => 14,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 15,  63 => 15,  59 => 14,  38 => 6,  94 => 5,  89 => 20,  85 => 25,  75 => 17,  68 => 14,  56 => 9,  87 => 25,  21 => 2,  26 => 6,  93 => 28,  88 => 6,  78 => 21,  46 => 7,  27 => 4,  44 => 12,  31 => 5,  28 => 3,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 32,  105 => 40,  91 => 27,  62 => 23,  49 => 19,  24 => 4,  25 => 3,  19 => 1,  79 => 18,  72 => 16,  69 => 25,  47 => 9,  40 => 8,  37 => 7,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 14,  66 => 15,  55 => 10,  52 => 21,  50 => 10,  43 => 8,  41 => 8,  35 => 5,  32 => 4,  29 => 5,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 36,  103 => 11,  99 => 31,  95 => 28,  92 => 21,  86 => 28,  82 => 33,  80 => 31,  73 => 19,  64 => 17,  60 => 6,  57 => 11,  54 => 10,  51 => 14,  48 => 13,  45 => 17,  42 => 7,  39 => 6,  36 => 5,  33 => 6,  30 => 7,);
    }
}
