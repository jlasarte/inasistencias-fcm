<?php

/* SonataUserBundle:Admin:Security/login.html.twig */
class __TwigTemplate_0a823375526c122e254cd4054c69a39435bba9b78e4aa36b1ad3bf6101a782fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"connection\">
        <form action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("sonata_user_admin_security_check");
        echo "\" method=\"post\">

            ";
        // line 7
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 8
            echo "                <div class=\"alert alert-error\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), array(), "SonataUserBundle"), "html", null, true);
            echo "</div>
            ";
        }
        // line 10
        echo "
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />

            <div class=\"control-group\">
                <label for=\"username\">";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>

                <div class=\"controls\">
                    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" class=\"big sonata-medium\"/>
                </div>
            </div>

            <div class=\"control-group\">
                <label for=\"password\">";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>

                <div class=\"controls\">
                    <input type=\"password\" id=\"password\" name=\"_password\" class=\"big sonata-medium\" />
                </div>
            </div>

            <div class=\"control-group\">
                <label for=\"remember_me\">
                    <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                    ";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "
                </label>
            </div>

            <div class=\"form-actions\">
                <input type=\"submit\" class=\"btn btn-primary\" id=\"_submit\" name=\"_submit\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
            </div>
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "SonataUserBundle:Admin:Security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 37,  81 => 32,  68 => 22,  60 => 17,  54 => 14,  48 => 11,  45 => 10,  39 => 8,  37 => 7,  32 => 5,  29 => 4,  26 => 3,);
    }
}
