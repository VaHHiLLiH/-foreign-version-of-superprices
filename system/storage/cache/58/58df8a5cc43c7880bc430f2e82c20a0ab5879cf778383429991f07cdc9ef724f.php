<?php

/* nice/template/common/home.twig */
class __TwigTemplate_69a77d5ad1b6a519d2a3cb707e01999176799f23262bd6fcf1b642c0b778efb0 extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "
<div id=\"common-home\" class=\"container\">";
        // line 3
        echo (isset($context["block_home_top"]) ? $context["block_home_top"] : null);
        echo "
  <div class=\"row\">";
        // line 4
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        // line 5
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 6
            $context["class"] = "col-sm-6";
        } elseif ((        // line 7
(isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 8
            $context["class"] = "col-sm-9";
        } else {
            // line 10
            $context["class"] = "col-sm-12";
        }
        // line 12
        echo "    <div id=\"content\" class=\"";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>";
        // line 13
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>";
        // line 15
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "nice/template/common/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 15,  48 => 13,  41 => 12,  38 => 10,  35 => 8,  33 => 7,  31 => 6,  29 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="common-home" class="container">*/
/*   {{ block_home_top }}*/
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <div id="content" class="{{ class }}">{{ content_top }}{{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* {{ footer }}*/
