<?php

/* nice/template/common/menu_top.twig */
class __TwigTemplate_f2527475f481c03b9bbe43244a98bf78c88e42e506b75126fd8d6b1307936654 extends Twig_Template
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
        echo "<!-- Menu Top -->
<nav id=\"menu-top\" class=\"navbar pull-left\">
  <ul class=\"nav navbar-nav\">";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu_items"]) ? $context["menu_items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 5
            echo "    <li><a href=\"";
            echo $this->getAttribute($context["item"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["item"], "title", array());
            echo "</a></li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "  </ul>       
</nav>";
    }

    public function getTemplateName()
    {
        return "nice/template/common/menu_top.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  27 => 5,  23 => 4,  19 => 1,);
    }
}
/* <!-- Menu Top -->*/
/* <nav id="menu-top" class="navbar pull-left">*/
/*   <ul class="nav navbar-nav">*/
/*     {% for item in menu_items %}*/
/*     <li><a href="{{ item.href }}">{{ item.title }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>       */
/* </nav>*/
