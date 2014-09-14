<?php

/* ::base.html.twig */
class __TwigTemplate_34b3155409561aec466660202df56c2819c710a7148b73fd34c39c9f1f379b4c extends Twig_Template
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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dfe476a_0") : $this->env->getExtension('assets')->getAssetUrl("css/dfe476a_part_1_main_1.css");
            // line 8
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t\t";
        } else {
            // asset "dfe476a"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dfe476a") : $this->env->getExtension('assets')->getAssetUrl("css/dfe476a.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
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
        return array (  117 => 32,  114 => 31,  110 => 13,  107 => 12,  103 => 11,  100 => 10,  94 => 5,  82 => 33,  80 => 31,  61 => 14,  58 => 12,  55 => 10,  41 => 8,  37 => 7,  33 => 6,  23 => 1,  39 => 6,  36 => 5,  29 => 5,);
    }
}
