<?php

/* SonataAdminBundle:CRUD:list_string.html.twig */
class __TwigTemplate_9f2517ec75e14a3a394b4143cfdc2e1ce955ed770e68b3b11a3302a0037eff6e extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list_string.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 32,  89 => 24,  84 => 39,  81 => 38,  75 => 36,  69 => 33,  64 => 32,  61 => 31,  59 => 30,  56 => 29,  53 => 28,  50 => 27,  46 => 25,  44 => 24,  40 => 23,  38 => 16,  35 => 15,  32 => 14,  30 => 13,  24 => 12,  21 => 11,  39 => 18,  36 => 17,  34 => 16,  31 => 15,  29 => 15,  26 => 14,  22 => 12,  19 => 11,);
    }
}
