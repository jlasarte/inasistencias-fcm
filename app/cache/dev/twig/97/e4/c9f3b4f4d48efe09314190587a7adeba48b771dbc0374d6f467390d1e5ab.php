<?php

/* SonataDoctrineORMAdminBundle:CRUD:edit_modal.html.twig */
class __TwigTemplate_97e4c9f3b4f4d48efe09314190587a7adeba48b771dbc0374d6f467390d1e5ab extends Twig_Template
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
        // line 11
        echo "
<div class=\"modal fade\" id=\"field_dialog_";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                <h4 class=\"modal-title\"></h4>
            </div>
            <div class=\"modal-body\">
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "SonataDoctrineORMAdminBundle:CRUD:edit_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 12,  320 => 122,  317 => 121,  315 => 120,  311 => 118,  309 => 117,  305 => 115,  299 => 112,  293 => 109,  288 => 107,  284 => 106,  281 => 105,  279 => 104,  275 => 103,  269 => 100,  265 => 99,  260 => 98,  256 => 96,  253 => 95,  250 => 93,  243 => 89,  237 => 86,  232 => 84,  228 => 83,  222 => 81,  220 => 80,  217 => 79,  215 => 78,  210 => 75,  204 => 73,  201 => 72,  197 => 70,  191 => 69,  185 => 68,  179 => 66,  176 => 65,  174 => 64,  171 => 63,  168 => 60,  165 => 59,  160 => 58,  156 => 57,  153 => 56,  150 => 55,  145 => 52,  138 => 50,  131 => 48,  125 => 45,  122 => 44,  119 => 43,  113 => 41,  110 => 40,  108 => 39,  102 => 37,  100 => 36,  89 => 35,  85 => 34,  82 => 33,  78 => 32,  73 => 29,  67 => 28,  61 => 25,  56 => 24,  50 => 22,  47 => 21,  43 => 20,  38 => 17,  35 => 16,  32 => 15,  30 => 14,  26 => 13,  21 => 12,  19 => 11,);
    }
}
