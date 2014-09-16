<?php

/* SonataUserBundle:Admin:Field/impersonating.html.twig */
class __TwigTemplate_47bed1fb1acb48f177dc78d7eed9b9fbdf86eb243842de8653114ec19337b1d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        // line 15
        echo "    ";
        if ((($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user") && ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "username") != $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username"))) && $this->getAttribute((isset($context["sonata_user"]) ? $context["sonata_user"] : $this->getContext($context, "sonata_user")), "impersonating"))) {
            // line 16
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl($this->getAttribute($this->getAttribute((isset($context["sonata_user"]) ? $context["sonata_user"] : $this->getContext($context, "sonata_user")), "impersonating"), "route"), twig_array_merge($this->getAttribute($this->getAttribute((isset($context["sonata_user"]) ? $context["sonata_user"] : $this->getContext($context, "sonata_user")), "impersonating"), "parameters"), array("_switch_user" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "username")))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("switch_user", array(), "SonataUserBundle"), "html", null, true);
            echo "\">
            <img src=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/famfamfam/group_go.png"), "html", null, true);
            echo "\"  alt=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("switch_user", array(), "SonataUserBundle"), "html", null, true);
            echo "\" />
        </a>
    ";
        } else {
            // line 20
            echo "        -
    ";
        }
    }

    public function getTemplateName()
    {
        return "SonataUserBundle:Admin:Field/impersonating.html.twig";
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
