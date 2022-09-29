<?php

/* nice/template/common/currency.twig */
class __TwigTemplate_81ca6f312a11dcbab49e3c0cf50ddc6f79298aeec617ed3394132ab023d7bcca extends Twig_Template
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
        if ((twig_length_filter($this->env, (isset($context["currencies"]) ? $context["currencies"] : null)) > 1)) {
            // line 2
            echo "<div class=\"top-buttons--item\">
  <form action=\"";
            // line 3
            echo (isset($context["action"]) ? $context["action"] : null);
            echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-currency\">
    <div class=\"btn-group\">
      <button class=\"btn btn-link dropdown-toggle\" data-toggle=\"dropdown\">";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["currencies"]) ? $context["currencies"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                // line 6
                if (($this->getAttribute($context["currency"], "symbol_left", array()) && ($this->getAttribute($context["currency"], "code", array()) == (isset($context["code"]) ? $context["code"] : null)))) {
                    echo " <strong class=\"currency-symbol\">";
                    echo $this->getAttribute($context["currency"], "symbol_left", array());
                    echo "</strong>";
                } elseif (($this->getAttribute($context["currency"], "symbol_right", array()) && ($this->getAttribute($context["currency"], "code", array()) == (isset($context["code"]) ? $context["code"] : null)))) {
                    echo " <strong>";
                    echo $this->getAttribute($context["currency"], "symbol_right", array());
                    echo "</strong>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            echo " <span class=\"";
            echo "\">";
            echo (isset($context["text_currency"]) ? $context["text_currency"] : null);
            echo "</span>&nbsp;<i class=\"fa fa-caret-down\"></i></button>
      <ul class=\"dropdown-menu\">";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["currencies"]) ? $context["currencies"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                // line 10
                if ($this->getAttribute($context["currency"], "symbol_left", array())) {
                    // line 11
                    echo "        <li>
          <button class=\"currency-select btn btn-link btn-block\" type=\"button\" name=\"";
                    // line 12
                    echo $this->getAttribute($context["currency"], "code", array());
                    echo "\">";
                    echo $this->getAttribute($context["currency"], "symbol_left", array());
                    echo $this->getAttribute($context["currency"], "title", array());
                    echo "</button>
        </li>";
                } else {
                    // line 15
                    echo "        <li>
          <button class=\"currency-select btn btn-link btn-block\" type=\"button\" name=\"";
                    // line 16
                    echo $this->getAttribute($context["currency"], "code", array());
                    echo "\">";
                    echo $this->getAttribute($context["currency"], "symbol_right", array());
                    echo $this->getAttribute($context["currency"], "title", array());
                    echo "</button>
        </li>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "      </ul>
    </div>
    <input type=\"hidden\" name=\"code\" value=\"\" />
    <input type=\"hidden\" name=\"redirect\" value=\"";
            // line 23
            echo (isset($context["redirect"]) ? $context["redirect"] : null);
            echo "\" />
  </form>
</div>";
        }
        // line 26
        echo " ";
    }

    public function getTemplateName()
    {
        return "nice/template/common/currency.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 26,  90 => 23,  85 => 20,  73 => 16,  70 => 15,  62 => 12,  59 => 11,  57 => 10,  53 => 9,  47 => 7,  33 => 6,  29 => 5,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if currencies|length > 1 %}*/
/* <div class="top-buttons--item">*/
/*   <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-currency">*/
/*     <div class="btn-group">*/
/*       <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">{% for currency in currencies %}*/
/*       {% if currency.symbol_left and currency.code == code %} <strong class="currency-symbol">{{ currency.symbol_left }}</strong> {% elseif currency.symbol_right and currency.code == code %} <strong>{{ currency.symbol_right }}</strong> {% endif %}*/
/*       {% endfor %} <span class="{#hidden-xs#}">{{ text_currency }}</span>&nbsp;<i class="fa fa-caret-down"></i></button>*/
/*       <ul class="dropdown-menu">*/
/*         {% for currency in currencies %}*/
/*         {% if currency.symbol_left %}*/
/*         <li>*/
/*           <button class="currency-select btn btn-link btn-block" type="button" name="{{ currency.code }}">{{ currency.symbol_left }} {{ currency.title }}</button>*/
/*         </li>*/
/*         {% else %}*/
/*         <li>*/
/*           <button class="currency-select btn btn-link btn-block" type="button" name="{{ currency.code }}">{{ currency.symbol_right }} {{ currency.title }}</button>*/
/*         </li>*/
/*         {% endif %}*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*     <input type="hidden" name="code" value="" />*/
/*     <input type="hidden" name="redirect" value="{{ redirect }}" />*/
/*   </form>*/
/* </div>*/
/* {% endif %} */
