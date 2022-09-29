<?php

/* nice/template/common/cart.twig */
class __TwigTemplate_121490ddcc18da452ce9f3432e5af827f9f21a70f51e97a93dce7949ca620afa extends Twig_Template
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
        echo "<div id=\"cart\" class=\"dropdown\">
  <button type=\"button\" data-toggle=\"dropdown\" data-loading-text=\"";
        // line 2
        echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
        echo "\" class=\"cart-button dropdown-toggle\">";
        // line 15
        echo "    <div class=\"cart-quantity-wrapper\">
      <i class=\"fa fa-shopping-bag cart-icon\"></i>
      <span id=\"cart-quantity\">";
        // line 17
        echo (isset($context["quantity"]) ? $context["quantity"] : null);
        echo "</span>
    </div>
    <div class=\"cart-total-wrapper\">
      <span id=\"cart-total\" class=\"hidden-xs hidden-sm\">";
        // line 20
        echo (isset($context["total"]) ? $context["total"] : null);
        echo "</span>
    </div>";
        // line 23
        echo "  </button>
  <ul class=\"cart-dropdown-container dropdown-menu pull-right\">";
        // line 25
        if (((isset($context["products"]) ? $context["products"] : null) || (isset($context["vouchers"]) ? $context["vouchers"] : null))) {
            // line 26
            echo "    <li>
      <table class=\"table table-striped cart-table\">";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 29
                echo "        <tr>
          <td class=\"text-center\">";
                // line 30
                if ($this->getAttribute($context["product"], "thumb", array())) {
                    echo " <a href=\"";
                    echo $this->getAttribute($context["product"], "href", array());
                    echo "\"><img src=\"";
                    echo $this->getAttribute($context["product"], "thumb", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["product"], "name", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["product"], "name", array());
                    echo "\" class=\"img-thumbnail\" /></a>";
                }
                echo "</td>
          <td class=\"text-left\"><a href=\"";
                // line 31
                echo $this->getAttribute($context["product"], "href", array());
                echo "\">";
                echo $this->getAttribute($context["product"], "name", array());
                echo "</a>";
                if ($this->getAttribute($context["product"], "option", array())) {
                    // line 32
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "option", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                        echo " <br />
            - <small>";
                        // line 33
                        echo $this->getAttribute($context["option"], "name", array());
                        echo $this->getAttribute($context["option"], "value", array());
                        echo "</small>";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                // line 35
                if ($this->getAttribute($context["product"], "recurring", array())) {
                    echo " <br />
            - <small>";
                    // line 36
                    echo (isset($context["text_recurring"]) ? $context["text_recurring"] : null);
                    echo $this->getAttribute($context["product"], "recurring", array());
                    echo "</small>";
                }
                echo "</td>
          <td class=\"text-right cart-table--column-quantity\">x";
                // line 37
                echo $this->getAttribute($context["product"], "quantity", array());
                echo "</td>
          <td class=\"text-right\">";
                // line 38
                echo $this->getAttribute($context["product"], "total", array());
                echo "</td>
          <td class=\"text-center\"><button type=\"button\" onclick=\"cart.remove('";
                // line 39
                echo $this->getAttribute($context["product"], "cart_id", array());
                echo "');\" title=\"";
                echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                echo "\" class=\"cart-btn-remove\"><i class=\"fa fa-trash-o\"></i></button></td>
        </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["vouchers"]) ? $context["vouchers"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["voucher"]) {
                // line 43
                echo "        <tr>
          <td class=\"text-center\"></td>
          <td class=\"text-left\">";
                // line 45
                echo $this->getAttribute($context["voucher"], "description", array());
                echo "</td>
          <td class=\"text-right \">x&nbsp;1</td>
          <td class=\"text-right\">";
                // line 47
                echo $this->getAttribute($context["voucher"], "amount", array());
                echo "</td>
          <td class=\"text-center text-danger\"><button type=\"button\" onclick=\"voucher.remove('";
                // line 48
                echo $this->getAttribute($context["voucher"], "key", array());
                echo "');\" title=\"";
                echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                echo "\" class=\"btn-cart-remove\"><i class=\"fa fa-trash-o\"></i></button></td>
        </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucher'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "      </table>
    </li>
    <li>
      <div>
        <table class=\"table table-bordered\">";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["totals"]) ? $context["totals"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["total"]) {
                // line 57
                echo "          <tr>
            <td class=\"text-right\"><strong>";
                // line 58
                echo $this->getAttribute($context["total"], "title", array());
                echo "</strong></td>
            <td class=\"text-right\">";
                // line 59
                echo $this->getAttribute($context["total"], "text", array());
                echo "</td>
          </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['total'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "        </table>
        <p class=\"text-right\"><a href=\"";
            // line 63
            echo (isset($context["cart"]) ? $context["cart"] : null);
            echo "\" class=\"margin-r-space-2x\"><strong><i class=\"fa fa-shopping-bag\"></i>";
            echo (isset($context["text_cart"]) ? $context["text_cart"] : null);
            echo "</strong></a>&nbsp;&nbsp;&nbsp;<a href=\"";
            echo (isset($context["checkout"]) ? $context["checkout"] : null);
            echo "\"><strong><i class=\"fa fa-share\"></i>";
            echo (isset($context["text_checkout"]) ? $context["text_checkout"] : null);
            echo "</strong></a></p>
      </div>
    </li>";
        } else {
            // line 67
            echo "    <li>
      <p class=\"text-center\">";
            // line 68
            echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
            echo "</p>
    </li>";
        }
        // line 71
        echo "  </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "nice/template/common/cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 71,  188 => 68,  185 => 67,  173 => 63,  170 => 62,  162 => 59,  158 => 58,  155 => 57,  151 => 56,  145 => 51,  135 => 48,  131 => 47,  126 => 45,  122 => 43,  118 => 42,  108 => 39,  104 => 38,  100 => 37,  93 => 36,  89 => 35,  80 => 33,  74 => 32,  68 => 31,  54 => 30,  51 => 29,  47 => 28,  44 => 26,  42 => 25,  39 => 23,  35 => 20,  29 => 17,  25 => 15,  22 => 2,  19 => 1,);
    }
}
/* <div id="cart" class="dropdown">*/
/*   <button type="button" data-toggle="dropdown" data-loading-text="{{ text_loading }}" class="cart-button dropdown-toggle">*/
/* {#    */
/* */
/* // dependency with catalog/view/theme/nice/javascript/common.js*/
/* product.add()*/
/* product.remove()*/
/* product.update()*/
/* voucher.remove()*/
/* */
/* // dependency with catalog/controller/product/product.php*/
/* $('#button-cart').on('click', function() {*/
/* */
/* #}*/
/*     <div class="cart-quantity-wrapper">*/
/*       <i class="fa fa-shopping-bag cart-icon"></i>*/
/*       <span id="cart-quantity">{{ quantity }}</span>*/
/*     </div>*/
/*     <div class="cart-total-wrapper">*/
/*       <span id="cart-total" class="hidden-xs hidden-sm">{{ total }}</span>*/
/*     </div>*/
/* {# dependency with common.js . end #}*/
/*   </button>*/
/*   <ul class="cart-dropdown-container dropdown-menu pull-right">*/
/*     {% if products or vouchers %}*/
/*     <li>*/
/*       <table class="table table-striped cart-table">*/
/*         {% for product in products %}*/
/*         <tr>*/
/*           <td class="text-center">{% if product.thumb %} <a href="{{ product.href }}"><img src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" class="img-thumbnail" /></a> {% endif %}</td>*/
/*           <td class="text-left"><a href="{{ product.href }}">{{ product.name }}</a> {% if product.option %}*/
/*             {% for option in product.option %} <br />*/
/*             - <small>{{ option.name }} {{ option.value }}</small> {% endfor %}*/
/*             {% endif %}*/
/*             {% if product.recurring %} <br />*/
/*             - <small>{{ text_recurring }} {{ product.recurring }}</small> {% endif %}</td>*/
/*           <td class="text-right cart-table--column-quantity">x {{ product.quantity }}</td>*/
/*           <td class="text-right">{{ product.total }}</td>*/
/*           <td class="text-center"><button type="button" onclick="cart.remove('{{ product.cart_id }}');" title="{{ button_remove }}" class="cart-btn-remove"><i class="fa fa-trash-o"></i></button></td>*/
/*         </tr>*/
/*         {% endfor %}*/
/*         {% for voucher in vouchers %}*/
/*         <tr>*/
/*           <td class="text-center"></td>*/
/*           <td class="text-left">{{ voucher.description }}</td>*/
/*           <td class="text-right ">x&nbsp;1</td>*/
/*           <td class="text-right">{{ voucher.amount }}</td>*/
/*           <td class="text-center text-danger"><button type="button" onclick="voucher.remove('{{ voucher.key }}');" title="{{ button_remove }}" class="btn-cart-remove"><i class="fa fa-trash-o"></i></button></td>*/
/*         </tr>*/
/*         {% endfor %}*/
/*       </table>*/
/*     </li>*/
/*     <li>*/
/*       <div>*/
/*         <table class="table table-bordered">*/
/*           {% for total in totals %}*/
/*           <tr>*/
/*             <td class="text-right"><strong>{{ total.title }}</strong></td>*/
/*             <td class="text-right">{{ total.text }}</td>*/
/*           </tr>*/
/*           {% endfor %}*/
/*         </table>*/
/*         <p class="text-right"><a href="{{ cart }}" class="margin-r-space-2x"><strong><i class="fa fa-shopping-bag"></i> {{ text_cart }}</strong></a>&nbsp;&nbsp;&nbsp;<a href="{{ checkout }}"><strong><i class="fa fa-share"></i> {{ text_checkout }}</strong></a></p>*/
/*       </div>*/
/*     </li>*/
/*     {% else %}*/
/*     <li>*/
/*       <p class="text-center">{{ text_empty }}</p>*/
/*     </li>*/
/*     {% endif %}*/
/*   </ul>*/
/* </div>*/
/* */
