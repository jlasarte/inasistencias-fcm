<?php

/* SonataAdminBundle:CRUD:base_edit_form_macro.html.twig */
class __TwigTemplate_b17cc01bc053b31ecfa922c62751bb6e2e2f63744429a1b14609c5e381281a90 extends Twig_Template
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
    }

    // line 1
    public function getrender_groups($_admin = null, $_form = null, $_groups = null, $_has_tab = null)
    {
        $context = $this->env->mergeGlobals(array(
            "admin" => $_admin,
            "form" => $_form,
            "groups" => $_groups,
            "has_tab" => $_has_tab,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            if ((isset($context["has_tab"]) ? $context["has_tab"] : $this->getContext($context, "has_tab"))) {
                echo "<div class=\"row\">";
            }
            // line 3
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : $this->getContext($context, "groups")));
            foreach ($context['_seq'] as $context["_key"] => $context["code"]) {
                // line 4
                echo "        ";
                $context["form_group"] = $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "formgroups"), (isset($context["code"]) ? $context["code"] : $this->getContext($context, "code")), array(), "array");
                // line 5
                echo "        <div class=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "class"), "html", null, true);
                echo "\"> ";
                // line 6
                echo "            <div class=\"box box-success\">
                <div class=\"box-header\">
                    <h4 class=\"box-title\">
                        ";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "trans", array(0 => $this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "name"), 1 => array(), 2 => $this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "translation_domain")), "method"), "html", null, true);
                echo "
                    </h4>
                </div>
                ";
                // line 13
                echo "                <div class=\"box-body\">
                    <div class=\"sonata-ba-collapsed-fields\">
                        ";
                // line 15
                if (($this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "description") != false)) {
                    // line 16
                    echo "                            <p>";
                    echo $this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "description");
                    echo "</p>
                        ";
                }
                // line 18
                echo "
                        ";
                // line 19
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form_group"]) ? $context["form_group"] : $this->getContext($context, "form_group")), "fields"));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                    // line 20
                    echo "                            ";
                    if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formfielddescriptions", array(), "any", false, true), (isset($context["field_name"]) ? $context["field_name"] : $this->getContext($context, "field_name")), array(), "array", true, true)) {
                        // line 21
                        echo "                                ";
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), (isset($context["field_name"]) ? $context["field_name"] : $this->getContext($context, "field_name")), array(), "array"), 'row');
                        echo "
                            ";
                    }
                    // line 23
                    echo "                        ";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 24
                    echo "                            <em>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("message_form_group_empty", array(), "SonataAdminBundle"), "html", null, true);
                    echo "</em>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 26
                echo "                    </div>
                </div>
                ";
                // line 29
                echo "            </div>
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['code'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "    ";
            if ((isset($context["has_tab"]) ? $context["has_tab"] : $this->getContext($context, "has_tab"))) {
                echo "</div>";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_edit_form_macro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 32,  86 => 21,  75 => 18,  67 => 15,  63 => 13,  57 => 9,  48 => 5,  40 => 3,  35 => 2,  21 => 1,  392 => 107,  389 => 106,  383 => 104,  377 => 102,  374 => 101,  368 => 99,  365 => 98,  362 => 97,  354 => 95,  352 => 94,  349 => 93,  342 => 91,  337 => 90,  335 => 89,  332 => 88,  326 => 86,  324 => 85,  318 => 83,  315 => 82,  309 => 79,  305 => 77,  302 => 76,  299 => 75,  293 => 73,  287 => 71,  284 => 70,  282 => 69,  279 => 68,  276 => 67,  271 => 62,  268 => 61,  263 => 58,  257 => 56,  252 => 53,  233 => 48,  230 => 47,  224 => 45,  222 => 44,  211 => 41,  194 => 40,  190 => 38,  167 => 36,  150 => 35,  146 => 33,  144 => 32,  140 => 30,  137 => 29,  134 => 28,  129 => 25,  126 => 24,  119 => 112,  116 => 111,  110 => 29,  105 => 65,  102 => 64,  97 => 24,  95 => 28,  90 => 24,  87 => 23,  81 => 20,  78 => 19,  76 => 18,  69 => 16,  59 => 13,  55 => 12,  52 => 6,  46 => 8,  43 => 7,  41 => 6,  38 => 5,  36 => 4,  30 => 2,  24 => 1,  115 => 40,  112 => 109,  106 => 26,  100 => 61,  96 => 30,  92 => 23,  88 => 28,  83 => 20,  80 => 26,  73 => 17,  70 => 22,  62 => 14,  56 => 16,  53 => 15,  50 => 14,  45 => 4,  12 => 36,);
    }
}
