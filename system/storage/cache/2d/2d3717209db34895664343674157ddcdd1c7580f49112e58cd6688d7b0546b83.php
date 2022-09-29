<?php

/* nice/template/common/block_home_top.twig */
class __TwigTemplate_556907a20b58f24c8a98fa56e8cc823413be199ff8876290b8fa17d88d6d77d4 extends Twig_Template
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
        // line 1
        echo "<div id=\"block-home-top\">";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["modules"]) ? $context["modules"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 3
            echo $context["module"];
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "nice/template/common/block_home_top.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 5,  25 => 3,  21 => 2,  19 => 1,);
    }
}
/* <div id="block-home-top">*/
/*   {% for module in modules %}*/
/*   {{ module }}*/
/*   {% endfor %}*/
/* </div>*/
/* */
