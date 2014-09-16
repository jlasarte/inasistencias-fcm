<?php

/* SonataBlockBundle:Block:block_base.html.twig */
class __TwigTemplate_bebe2f55a79aee95f70090dc9ec9622075eeac0c86a7b82f974800add84a9759 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "<div id=\"cms-block-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id"), "html", null, true);
        echo "\" class=\"cms-block cms-block-element\">
    ";
        // line 12
        $this->displayBlock('block', $context, $blocks);
        // line 13
        echo "</div>
";
    }

    // line 12
    public function block_block($context, array $blocks = array())
    {
        echo "EMPTY CONTENT";
    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 12,  27 => 13,  25 => 12,  20 => 11,  175 => 74,  168 => 69,  156 => 64,  152 => 62,  150 => 61,  141 => 58,  138 => 57,  134 => 55,  123 => 52,  109 => 46,  105 => 44,  101 => 42,  99 => 41,  93 => 39,  90 => 38,  88 => 37,  74 => 30,  70 => 29,  62 => 24,  58 => 22,  56 => 21,  53 => 20,  46 => 19,  43 => 18,  37 => 17,  29 => 15,  26 => 14,  194 => 66,  189 => 63,  185 => 61,  176 => 58,  171 => 57,  167 => 56,  164 => 55,  162 => 68,  157 => 51,  148 => 49,  144 => 59,  136 => 47,  133 => 46,  129 => 44,  120 => 51,  116 => 50,  113 => 40,  111 => 47,  107 => 37,  98 => 35,  94 => 34,  86 => 33,  83 => 32,  81 => 33,  77 => 31,  73 => 27,  64 => 24,  59 => 23,  55 => 22,  52 => 21,  50 => 20,  45 => 18,  42 => 17,  39 => 16,  34 => 16,  28 => 14,);
    }
}
