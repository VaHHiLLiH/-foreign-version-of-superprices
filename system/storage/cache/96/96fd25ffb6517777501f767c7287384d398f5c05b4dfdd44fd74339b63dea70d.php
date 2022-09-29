<?php

/* nice/template/extension/module/featured.twig */
class __TwigTemplate_f017fab9a816b6c647293b57a2e6b948f38efb32daf92d3c609383be818c675e extends Twig_Template
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
        echo "<div class=\"section section--productlist\">
  <div class=\"section--title-wrapper\"><p class=\"section--title\">";
        // line 2
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</p></div>
  <div class=\"row productlist-row\">";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 5
            echo "    <div class=\"product-layout";
            if ($this->getAttribute((isset($context["nice"]) ? $context["nice"] : null), "productlist_grid_hover_effect", array())) {
                echo "grid-hover-effect";
            }
            echo " product-grid col-md-3 col-sm-6";
            if (("1" == $this->getAttribute((isset($context["nice"]) ? $context["nice"] : null), "productlist_cols_on_mobile", array()))) {
                echo "col-xs-12";
            } else {
                echo "col-xs-6";
            }
            echo "\">
      <div class=\"product-thumb transition\">
        <div class=\"product-thumb--image";
            // line 7
            if ($this->getAttribute((isset($context["nice"]) ? $context["nice"] : null), "productlist_image_margins", array())) {
                echo "-has-margins";
            }
            echo "\"><a href=\"";
            echo $this->getAttribute($context["product"], "href", array());
            echo "\"><img src=\"";
            echo $this->getAttribute($context["product"], "thumb", array());
            echo "\" alt=\"";
            echo $this->getAttribute($context["product"], "name", array());
            echo "\" title=\"";
            echo $this->getAttribute($context["product"], "name", array());
            echo "\" class=\"img-responsive\" /></a></div>
        <div class=\"product-thumb--info\">";
            // line 9
            if ($this->getAttribute($context["product"], "rating", array())) {
                // line 10
                echo "            <div class=\"product-thumb--rating\">";
                // line 11
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 12
                    if (($this->getAttribute($context["product"], "rating", array()) < $context["i"])) {
                        echo "<span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                    } else {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 14
                echo "            </div>";
            }
            // line 16
            echo "          <a class=\"product-thumb--name";
            if (("bold" == $this->getAttribute((isset($context["nice"]) ? $context["nice"] : null), "productlist_name_font_weight", array()))) {
                echo "-bold-sm";
            }
            echo "\" href=\"";
            echo $this->getAttribute($context["product"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["product"], "name", array());
            echo "</a>";
            // line 17
            if ($this->getAttribute((isset($context["nice"]) ? $context["nice"] : null), "productlist_description", array())) {
                echo "<p class=\"product-thumb--description";
                if ( !$this->getAttribute((isset($context["nice"]) ? $context["nice"] : null), "productlist_description_on_mobile", array())) {
                    echo "hidden-xs hidden-sm";
                }
                echo "\">";
                echo $this->getAttribute($context["product"], "description", array());
                echo "</p>";
            }
            // line 18
            if ($this->getAttribute($context["product"], "price", array())) {
                // line 19
                echo "          <div class=\"price\">";
                // line 20
                if ( !$this->getAttribute($context["product"], "special", array())) {
                    // line 21
                    echo "            <span class=\"price-value";
                    if (("bold" == $this->getAttribute((isset($context["nice"]) ? $context["nice"] : null), "productlist_price_font_weight", array()))) {
                        echo "-bold";
                    }
                    echo "\">";
                    echo $this->getAttribute($context["product"], "price", array());
                    echo "</span>";
                } else {
                    // line 23
                    echo "            <span class=\"price-old\">";
                    echo $this->getAttribute($context["product"], "price", array());
                    echo "</span><span class=\"price-new\">";
                    echo $this->getAttribute($context["product"], "special", array());
                    echo "</span>";
                }
                // line 25
                if ($this->getAttribute($context["product"], "tax", array())) {
                    // line 26
                    echo "            <div  class=\"price-tax\">";
                    echo (isset($context["text_tax"]) ? $context["text_tax"] : null);
                    echo $this->getAttribute($context["product"], "tax", array());
                    echo "</div>";
                }
                // line 28
                echo "          </div>";
            }
            // line 30
            echo "          <div>
            <button type=\"button\" class=\"btn btn-accent product-thumb--button-buy -grid-hover-effect-hidden\" onclick=\"cart.add('";
            // line 31
            echo $this->getAttribute($context["product"], "product_id", array());
            echo "');\"><i class=\"fa fa-shopping-cart\"></i> <span class=\"\">";
            echo (isset($context["button_cart"]) ? $context["button_cart"] : null);
            echo "</span></button>
            <div class=\"product-thumb--compare\" data-toggle=\"tooltip\" title=\"";
            // line 32
            echo (isset($context["button_compare"]) ? $context["button_compare"] : null);
            echo "\" onclick=\"compare.add('";
            echo $this->getAttribute($context["product"], "product_id", array());
            echo "');\"><i class=\"fa fa-exchange\"></i></div>
        <div class=\"product-thumb--wishlist\" data-toggle=\"tooltip\" title=\"";
            // line 33
            echo (isset($context["button_wishlist"]) ? $context["button_wishlist"] : null);
            echo "\" onclick=\"wishlist.add('";
            echo $this->getAttribute($context["product"], "product_id", array());
            echo "');\"><i class=\"fa fa-heart-o\"></i></div>
          </div>
        </div>
      </div>
    </div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "nice/template/extension/module/featured.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 39,  147 => 33,  141 => 32,  135 => 31,  132 => 30,  129 => 28,  123 => 26,  121 => 25,  114 => 23,  105 => 21,  103 => 20,  101 => 19,  99 => 18,  89 => 17,  79 => 16,  76 => 14,  66 => 12,  62 => 11,  60 => 10,  58 => 9,  44 => 7,  30 => 5,  26 => 4,  22 => 2,  19 => 1,);
    }
}
/* <div class="section section--productlist">*/
/*   <div class="section--title-wrapper"><p class="section--title">{{ heading_title }}</p></div>*/
/*   <div class="row productlist-row">*/
/*     {% for product in products %}*/
/*     <div class="product-layout {% if nice.productlist_grid_hover_effect %}grid-hover-effect{% endif %} product-grid col-md-3 col-sm-6 {% if '1' == nice.productlist_cols_on_mobile %}col-xs-12{% else %}col-xs-6{% endif %}">*/
/*       <div class="product-thumb transition">*/
/*         <div class="product-thumb--image {% if nice.productlist_image_margins %}-has-margins{% endif %}"><a href="{{ product.href }}"><img src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" class="img-responsive" /></a></div>*/
/*         <div class="product-thumb--info">*/
/*           {% if product.rating %}*/
/*             <div class="product-thumb--rating">*/
/*               {% for i in 1..5 %}*/
/*               {% if product.rating < i %}<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> {% else %} <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>{% endif %}*/
/*               {% endfor %}*/
/*             </div>*/
/*           {% endif %}*/
/*           <a class="product-thumb--name {% if 'bold' == nice.productlist_name_font_weight %}-bold-sm{% endif %}" href="{{ product.href }}">{{ product.name }}</a>*/
/*           {% if nice.productlist_description %}<p class="product-thumb--description {% if not nice.productlist_description_on_mobile %}hidden-xs hidden-sm{% endif %}">{{ product.description }}</p>{% endif %}*/
/*           {% if product.price %}*/
/*           <div class="price">*/
/*             {% if not product.special %}*/
/*             <span class="price-value {% if 'bold' == nice.productlist_price_font_weight %}-bold{% endif %}">{{ product.price }}</span>*/
/*             {% else %}*/
/*             <span class="price-old">{{ product.price }}</span><span class="price-new">{{ product.special }}</span>*/
/*             {% endif %}*/
/*             {% if product.tax %}*/
/*             <div  class="price-tax">{{ text_tax }} {{ product.tax }}</div>*/
/*             {% endif %}*/
/*           </div>*/
/*           {% endif %}*/
/*           <div>*/
/*             <button type="button" class="btn btn-accent product-thumb--button-buy -grid-hover-effect-hidden" onclick="cart.add('{{ product.product_id }}');"><i class="fa fa-shopping-cart"></i> <span class="">{{ button_cart }}</span></button>*/
/*             <div class="product-thumb--compare" data-toggle="tooltip" title="{{ button_compare }}" onclick="compare.add('{{ product.product_id }}');"><i class="fa fa-exchange"></i></div>*/
/*         <div class="product-thumb--wishlist" data-toggle="tooltip" title="{{ button_wishlist }}" onclick="wishlist.add('{{ product.product_id }}');"><i class="fa fa-heart-o"></i></div>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*     {% endfor %}*/
/*   </div>*/
/* </div>*/
