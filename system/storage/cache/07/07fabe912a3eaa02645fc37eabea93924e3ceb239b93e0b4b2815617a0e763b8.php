<?php

/* extension/theme/nice.twig */
class __TwigTemplate_82c192b1e5486e05567f72963ba895ce8796ffdb5e0a3251f6251525cdf51328 extends Twig_Template
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
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-theme\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-nice\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo (isset($context["text_heading_title"]) ? $context["text_heading_title"] : null);
        echo "</h1>
      <ul class=\"breadcrumb\">";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "          <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">";
        // line 17
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "warning", array(), "any", true, true)) {
            // line 18
            echo "      <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i>";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "warning", array());
            echo "
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
      </div>";
        }
        // line 22
        if (array_key_exists("success", $context)) {
            // line 23
            echo "      <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check\"></i>";
            echo (isset($context["success"]) ? $context["success"] : null);
            echo "
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
      </div>";
        }
        // line 27
        echo "    <div class=\"panel panel-nice\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i>";
        // line 29
        echo (isset($context["text_edit"]) ? $context["text_edit"] : null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 32
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-theme\" class=\"form-horizontal\">
          <fieldset>
            <div class=\"form-group\">
              <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 35
        echo (isset($context["entry_status"]) ? $context["entry_status"] : null);
        echo "</label>
              <div class=\"col-sm-10\">
                <select name=\"theme_nice_status\" id=\"input-status\" class=\"form-control\">";
        // line 38
        if ((isset($context["theme_nice_status"]) ? $context["theme_nice_status"] : null)) {
            // line 39
            echo "                    <option value=\"1\" selected=\"selected\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                    <option value=\"0\">";
            // line 40
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>";
        } else {
            // line 42
            echo "                    <option value=\"1\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                    <option value=\"0\" selected=\"selected\">";
            // line 43
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>";
        }
        // line 45
        echo "                </select>
              </div>
            </div>
          </fieldset>
          <hr>
          <div class=\"row\">
            <div class=\"col-lg-2 col-md-3\" >
              <ul class=\"nav nav-pills nav-stacked\">
                <li class=\"active\"><a href=\"#tab-basic-settings\" data-toggle=\"pill\">";
        // line 53
        echo (isset($context["tab_basic_settings"]) ? $context["tab_basic_settings"] : null);
        echo "</a></li>
                <li><a href=\"#tab-colors\" data-toggle=\"pill\">";
        // line 54
        echo (isset($context["tab_colors"]) ? $context["tab_colors"] : null);
        echo "</a></li>
                <li><a href=\"#tab-menu-top\" data-toggle=\"pill\">";
        // line 55
        echo (isset($context["tab_menu_top"]) ? $context["tab_menu_top"] : null);
        echo "</a></li>
                <li><a href=\"#tab-page-home\" data-toggle=\"pill\">";
        // line 56
        echo (isset($context["tab_page_home"]) ? $context["tab_page_home"] : null);
        echo "</a></li>
                <li><a href=\"#tab-page-product\" data-toggle=\"pill\">";
        // line 57
        echo (isset($context["tab_page_product"]) ? $context["tab_page_product"] : null);
        echo "</a></li>
                <li><a href=\"#tab-product-list\" data-toggle=\"pill\">";
        // line 58
        echo (isset($context["tab_product_list"]) ? $context["tab_product_list"] : null);
        echo "</a></li>";
        // line 60
        echo "                <li><a href=\"#tab-about\" data-toggle=\"pill\">";
        echo (isset($context["tab_about"]) ? $context["tab_about"] : null);
        echo "</a></li>
              </ul>
            </div>
            <hr class=\"hidden-lg hidden-md\">
            <div class=\"col-lg-10 col-md-9\" style=\"border-left: 1px solid #eee;\" >
              <div class=\"tab-content\">
                
                
                <!-- Tab Basic Settings . Begin -->
                <div class=\"tab-pane active\" id=\"tab-basic-settings\">
                  <fieldset>
                    <div class=\"form-group\">
                      <label class=\"col-sm-2 control-label\" for=\"input-directory\"><span data-toggle=\"tooltip\" title=\"";
        // line 72
        echo (isset($context["help_directory"]) ? $context["help_directory"] : null);
        echo "\">";
        echo (isset($context["entry_directory"]) ? $context["entry_directory"] : null);
        echo "</span></label>
                      <div class=\"col-sm-10\">
                        <select name=\"theme_nice_directory\" id=\"input-directory\" class=\"form-control\">";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["directories"]) ? $context["directories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["directory"]) {
            // line 76
            if (($context["directory"] == (isset($context["theme_nice_directory"]) ? $context["theme_nice_directory"] : null))) {
                // line 77
                echo "                              <option value=\"";
                echo $context["directory"];
                echo "\" selected=\"selected\">";
                echo $context["directory"];
                echo "</option>";
            } else {
                // line 79
                echo "                              <option value=\"";
                echo $context["directory"];
                echo "\">";
                echo $context["directory"];
                echo "</option>";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['directory'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                        </select>
                      </div>
                    </div>
                    <legend>";
        // line 85
        echo (isset($context["text_product"]) ? $context["text_product"] : null);
        echo "</legend>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-catalog-limit\"><span data-toggle=\"tooltip\" title=\"";
        // line 87
        echo (isset($context["help_product_limit"]) ? $context["help_product_limit"] : null);
        echo "\">";
        echo (isset($context["entry_product_limit"]) ? $context["entry_product_limit"] : null);
        echo "</span></label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"theme_nice_product_limit\" value=\"";
        // line 89
        echo (isset($context["theme_nice_product_limit"]) ? $context["theme_nice_product_limit"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_product_limit"]) ? $context["entry_product_limit"] : null);
        echo "\" id=\"input-catalog-limit\" class=\"form-control\" />";
        // line 90
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "product_limit", array(), "any", true, true)) {
            // line 91
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "product_limit", array());
            echo "</div>";
        }
        // line 93
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-description-lenght\"><span data-toggle=\"tooltip\" title=\"";
        // line 96
        echo (isset($context["help_product_description_length"]) ? $context["help_product_description_length"] : null);
        echo "\">";
        echo (isset($context["entry_product_description_length"]) ? $context["entry_product_description_length"] : null);
        echo "</span></label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"theme_nice_product_description_length\" value=\"";
        // line 98
        echo (isset($context["theme_nice_product_description_length"]) ? $context["theme_nice_product_description_length"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_product_description_length"]) ? $context["entry_product_description_length"] : null);
        echo "\" id=\"input-description-lenght\" class=\"form-control\" />";
        // line 99
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "product_description_length", array(), "any", true, true)) {
            // line 100
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "product_description_length", array());
            echo "</div>";
        }
        // line 102
        echo "                      </div>
                    </div>
                  </fieldset>
                  <fieldset>
                    <legend>";
        // line 106
        echo (isset($context["text_image"]) ? $context["text_image"] : null);
        echo "</legend>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-category-width\">";
        // line 108
        echo (isset($context["entry_image_category"]) ? $context["entry_image_category"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_category_width\" value=\"";
        // line 112
        echo (isset($context["theme_nice_image_category_width"]) ? $context["theme_nice_image_category_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-category-width\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_category_height\" value=\"";
        // line 115
        echo (isset($context["theme_nice_image_category_height"]) ? $context["theme_nice_image_category_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 118
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_category", array(), "any", true, true)) {
            // line 119
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_category", array());
            echo "</div>";
        }
        // line 121
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-manufacturer-width\">";
        // line 124
        echo (isset($context["entry_image_manufacturer"]) ? $context["entry_image_manufacturer"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_manufacturer_width\" value=\"";
        // line 128
        echo (isset($context["theme_nice_image_manufacturer_width"]) ? $context["theme_nice_image_manufacturer_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-manufacturer-width\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_manufacturer_height\" value=\"";
        // line 131
        echo (isset($context["theme_nice_image_manufacturer_height"]) ? $context["theme_nice_image_manufacturer_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 134
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_manufacturer", array(), "any", true, true)) {
            // line 135
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_manufacturer", array());
            echo "</div>";
        }
        // line 137
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-thumb-width\">";
        // line 140
        echo (isset($context["entry_image_thumb"]) ? $context["entry_image_thumb"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_thumb_width\" value=\"";
        // line 144
        echo (isset($context["theme_nice_image_thumb_width"]) ? $context["theme_nice_image_thumb_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-thumb-width\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_thumb_height\" value=\"";
        // line 147
        echo (isset($context["theme_nice_image_thumb_height"]) ? $context["theme_nice_image_thumb_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 150
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_thumb", array(), "any", true, true)) {
            // line 151
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_thumb", array());
            echo "</div>";
        }
        // line 153
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-popup-width\">";
        // line 156
        echo (isset($context["entry_image_popup"]) ? $context["entry_image_popup"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_popup_width\" value=\"";
        // line 160
        echo (isset($context["theme_nice_image_popup_width"]) ? $context["theme_nice_image_popup_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-popup-width\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_popup_height\" value=\"";
        // line 163
        echo (isset($context["theme_nice_image_popup_height"]) ? $context["theme_nice_image_popup_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 166
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_popup", array(), "any", true, true)) {
            // line 167
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_popup", array());
            echo "</div>";
        }
        // line 169
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-product-width\">";
        // line 172
        echo (isset($context["entry_image_product"]) ? $context["entry_image_product"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_product_width\" value=\"";
        // line 176
        echo (isset($context["theme_nice_image_product_width"]) ? $context["theme_nice_image_product_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-product-width\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_product_height\" value=\"";
        // line 179
        echo (isset($context["theme_nice_image_product_height"]) ? $context["theme_nice_image_product_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 182
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_product", array(), "any", true, true)) {
            // line 183
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_product", array());
            echo "</div>";
        }
        // line 185
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-additional-width\">";
        // line 188
        echo (isset($context["entry_image_additional"]) ? $context["entry_image_additional"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_additional_width\" value=\"";
        // line 192
        echo (isset($context["theme_nice_image_additional_width"]) ? $context["theme_nice_image_additional_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-additional-width\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_additional_height\" value=\"";
        // line 195
        echo (isset($context["theme_nice_image_additional_height"]) ? $context["theme_nice_image_additional_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 198
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_additional", array(), "any", true, true)) {
            // line 199
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_additional", array());
            echo "</div>";
        }
        // line 201
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-related\">";
        // line 204
        echo (isset($context["entry_image_related"]) ? $context["entry_image_related"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_related_width\" value=\"";
        // line 208
        echo (isset($context["theme_nice_image_related_width"]) ? $context["theme_nice_image_related_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-related\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_related_height\" value=\"";
        // line 211
        echo (isset($context["theme_nice_image_related_height"]) ? $context["theme_nice_image_related_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 214
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_related", array(), "any", true, true)) {
            // line 215
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_related", array());
            echo "</div>";
        }
        // line 217
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-compare\">";
        // line 220
        echo (isset($context["entry_image_compare"]) ? $context["entry_image_compare"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_compare_width\" value=\"";
        // line 224
        echo (isset($context["theme_nice_image_compare_width"]) ? $context["theme_nice_image_compare_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-compare\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_compare_height\" value=\"";
        // line 227
        echo (isset($context["theme_nice_image_compare_height"]) ? $context["theme_nice_image_compare_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 230
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_compare", array(), "any", true, true)) {
            // line 231
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_compare", array());
            echo "</div>";
        }
        // line 233
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-wishlist\">";
        // line 236
        echo (isset($context["entry_image_wishlist"]) ? $context["entry_image_wishlist"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_wishlist_width\" value=\"";
        // line 240
        echo (isset($context["theme_nice_image_wishlist_width"]) ? $context["theme_nice_image_wishlist_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-wishlist\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_wishlist_height\" value=\"";
        // line 243
        echo (isset($context["theme_nice_image_wishlist_height"]) ? $context["theme_nice_image_wishlist_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 246
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_wishlist", array(), "any", true, true)) {
            // line 247
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_wishlist", array());
            echo "</div>";
        }
        // line 249
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-cart\">";
        // line 252
        echo (isset($context["entry_image_cart"]) ? $context["entry_image_cart"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_cart_width\" value=\"";
        // line 256
        echo (isset($context["theme_nice_image_cart_width"]) ? $context["theme_nice_image_cart_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-cart\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_cart_height\" value=\"";
        // line 259
        echo (isset($context["theme_nice_image_cart_height"]) ? $context["theme_nice_image_cart_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 262
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_cart", array(), "any", true, true)) {
            // line 263
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_cart", array());
            echo "</div>";
        }
        // line 265
        echo "                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-image-location\">";
        // line 268
        echo (isset($context["entry_image_location"]) ? $context["entry_image_location"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_location_width\" value=\"";
        // line 272
        echo (isset($context["theme_nice_image_location_width"]) ? $context["theme_nice_image_location_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-image-location\" class=\"form-control\" />
                          </div>
                          <div class=\"col-sm-6\">
                            <input type=\"text\" name=\"theme_nice_image_location_height\" value=\"";
        // line 275
        echo (isset($context["theme_nice_image_location_height"]) ? $context["theme_nice_image_location_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" />
                          </div>
                        </div>";
        // line 278
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_location", array(), "any", true, true)) {
            // line 279
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "image_location", array());
            echo "</div>";
        }
        // line 281
        echo "                      </div>
                    </div>
                  </fieldset>
                </div> 
                <!-- /Tab Basic Settings . End
                ============================================================ -->
                
                
                <!-- Tab Colors . Begin -->
                <div class=\"tab-pane\" id=\"tab-colors\">
                  <fieldset>
                    <legend>";
        // line 292
        echo (isset($context["legend_colors_global"]) ? $context["legend_colors_global"] : null);
        echo "</legend>
                    <div class=\"form-group color-presets\">
                      <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 294
        echo (isset($context["help_color_preset"]) ? $context["help_color_preset"] : null);
        echo "\">";
        echo (isset($context["entry_color_preset"]) ? $context["entry_color_preset"] : null);
        echo "</span></label>
                      <div class=\"col-sm-10\">
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #6667ab;\" data-color=\"#6667ab\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #ea435d;\" data-color=\"#ea435d\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #2ca5df;\" data-color=\"#2ca5df\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #f85f77;\" data-color=\"#f85f77\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #668aab;\" data-color=\"#668aab\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #d1c485;\" data-color=\"#d1c485\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #ab6466;\" data-color=\"#ab6466\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #a2a2b4;\" data-color=\"#a2a2b4\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #cd79a5;\" data-color=\"#cd79a5\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #8485c0;\" data-color=\"#8485c0\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #a34766;\" data-color=\"#a34766\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #85a094;\" data-color=\"#85a094\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #8766ab;\" data-color=\"#8766ab\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #cd79a5;\" data-color=\"#cd79a5\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #3d9869;\" data-color=\"#3d9869\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #dd65a6;\" data-color=\"#dd65a6\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #9a70a8;\" data-color=\"#9a70a8\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #6ab990;\" data-color=\"#6ab990\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #7c6486;\" data-color=\"#7c6486\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #ebc078;\" data-color=\"#ebc078\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #3d9869;\" data-color=\"#3d9869\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #a6c756;\" data-color=\"#a6c756\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #858597;\" data-color=\"#858597\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #f48744;\" data-color=\"#f48744\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #e6681b;\" data-color=\"#e6681b\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #00a9ad;\" data-color=\"#00a9ad\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #241c40;\" data-color=\"#241c40\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #a2a2b4;\" data-color=\"#a2a2b4\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #90af47;\" data-color=\"#90af47\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #f48744;\" data-color=\"#f48744\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #728f82;\" data-color=\"#728f82\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #cdb97d;\" data-color=\"#cdb97d\"></span>
                        </div>
                        <div class=\"color-presets--item\">
                          <span class=\"color-presets--color -primary\" style=\"background: #a19572;\" data-color=\"#a19572\"></span>
                          <span class=\"color-presets--color -accent\" style=\"background: #85a094;\" data-color=\"#85a094\"></span>
                        </div>

                      </div>
                    </div>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-color-primary\"><span data-toggle=\"tooltip\" title=\"";
        // line 368
        echo (isset($context["help_color_primary"]) ? $context["help_color_primary"] : null);
        echo "\">";
        echo (isset($context["entry_color_primary"]) ? $context["entry_color_primary"] : null);
        echo "</span></label>
                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_primary__lighter_3\" value=\"";
        // line 370
        echo (isset($context["theme_nice_color_primary__lighter_3"]) ? $context["theme_nice_color_primary__lighter_3"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_primary__lighter_3"]) ? $context["entry_color_primary__lighter_3"] : null);
        echo "\" id=\"input-color-primary--lighter-3\" class=\"form-control spectrum-2\" />";
        // line 371
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__lighter_3", array(), "any", true, true)) {
            // line 372
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__lighter_3", array());
            echo "</div>";
        }
        // line 374
        echo "                      </div>
                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_primary__lighter_2\" value=\"";
        // line 376
        echo (isset($context["theme_nice_color_primary__lighter_2"]) ? $context["theme_nice_color_primary__lighter_2"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_primary__lighter_2"]) ? $context["entry_color_primary__lighter_2"] : null);
        echo "\" id=\"input-color-primary--lighter-2\" class=\"form-control spectrum-2\" />";
        // line 377
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__lighter_2", array(), "any", true, true)) {
            // line 378
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__lighter_2", array());
            echo "</div>";
        }
        // line 380
        echo "                      </div>
                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_primary__lighter_1\" value=\"";
        // line 382
        echo (isset($context["theme_nice_color_primary__lighter_1"]) ? $context["theme_nice_color_primary__lighter_1"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_primary__lighter_1"]) ? $context["entry_color_primary__lighter_1"] : null);
        echo "\" id=\"input-color-primary--lighter-1\" class=\"form-control spectrum-2\" />";
        // line 383
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__lighter_1", array(), "any", true, true)) {
            // line 384
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__lighter_1", array());
            echo "</div>";
        }
        // line 386
        echo "                      </div>                    

                      <div class=\"col-sm-2\">
                        <input type=\"text\" name=\"theme_nice_color_primary\" value=\"";
        // line 389
        echo (isset($context["theme_nice_color_primary"]) ? $context["theme_nice_color_primary"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_primary"]) ? $context["entry_color_primary"] : null);
        echo "\" id=\"input-color-primary\" class=\"form-control spectrum\" />";
        // line 390
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary", array(), "any", true, true)) {
            // line 391
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary", array());
            echo "</div>";
        }
        // line 393
        echo "                      </div>

                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_primary__darker_1\" value=\"";
        // line 396
        echo (isset($context["theme_nice_color_primary__darker_1"]) ? $context["theme_nice_color_primary__darker_1"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_primary__darker_1"]) ? $context["entry_color_primary__darker_1"] : null);
        echo "\" id=\"input-color-primary--darker-1\" class=\"form-control spectrum-2\" />";
        // line 397
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__darker_1", array(), "any", true, true)) {
            // line 398
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__darker_1", array());
            echo "</div>";
        }
        // line 400
        echo "                      </div>
                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_primary__darker_2\" value=\"";
        // line 402
        echo (isset($context["theme_nice_color_primary__darker_2"]) ? $context["theme_nice_color_primary__darker_2"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_primary__darker_2"]) ? $context["entry_color_primary__darker_2"] : null);
        echo "\" id=\"input-color-primary--darker-2\" class=\"form-control spectrum-2\" />";
        // line 403
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__darker_2", array(), "any", true, true)) {
            // line 404
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__darker_2", array());
            echo "</div>";
        }
        // line 406
        echo "                      </div>
                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_primary__darker_3\" value=\"";
        // line 408
        echo (isset($context["theme_nice_color_primary__darker_3"]) ? $context["theme_nice_color_primary__darker_3"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_primary__darker_3"]) ? $context["entry_color_primary__darker_3"] : null);
        echo "\" id=\"input-color-primary--darker-3\" class=\"form-control spectrum-2\" />";
        // line 409
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__darker_3", array(), "any", true, true)) {
            // line 410
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_primary__darker_3", array());
            echo "</div>";
        }
        // line 412
        echo "                      </div>                    
                    </div>

                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-color-accent\"><span data-toggle=\"tooltip\" title=\"";
        // line 416
        echo (isset($context["help_color_accent"]) ? $context["help_color_accent"] : null);
        echo "\">";
        echo (isset($context["entry_color_accent"]) ? $context["entry_color_accent"] : null);
        echo "</span></label>
                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_accent__lighter_3\" value=\"";
        // line 418
        echo (isset($context["theme_nice_color_accent__lighter_3"]) ? $context["theme_nice_color_accent__lighter_3"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_accent__lighter_3"]) ? $context["entry_color_accent__lighter_3"] : null);
        echo "\" id=\"input-color-accent--lighter-3\" class=\"form-control spectrum-2\" />";
        // line 419
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__lighter_3", array(), "any", true, true)) {
            // line 420
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__lighter_3", array());
            echo "</div>";
        }
        // line 422
        echo "                      </div>
                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_accent__lighter_2\" value=\"";
        // line 424
        echo (isset($context["theme_nice_color_accent__lighter_2"]) ? $context["theme_nice_color_accent__lighter_2"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_accent__lighter_2"]) ? $context["entry_color_accent__lighter_2"] : null);
        echo "\" id=\"input-color-accent--lighter-2\" class=\"form-control spectrum-2\" />";
        // line 425
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__lighter_2", array(), "any", true, true)) {
            // line 426
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__lighter_2", array());
            echo "</div>";
        }
        // line 428
        echo "                      </div>
                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_accent__lighter_1\" value=\"";
        // line 430
        echo (isset($context["theme_nice_color_accent__lighter_1"]) ? $context["theme_nice_color_accent__lighter_1"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_accent__lighter_1"]) ? $context["entry_color_accent__lighter_1"] : null);
        echo "\" id=\"input-color-accent--lighter-1\" class=\"form-control spectrum-2\" />";
        // line 431
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__lighter_1", array(), "any", true, true)) {
            // line 432
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__lighter_1", array());
            echo "</div>";
        }
        // line 434
        echo "                      </div>                    

                      <div class=\"col-sm-2\">
                        <input type=\"text\" name=\"theme_nice_color_accent\" value=\"";
        // line 437
        echo (isset($context["theme_nice_color_accent"]) ? $context["theme_nice_color_accent"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_accent"]) ? $context["entry_color_accent"] : null);
        echo "\" id=\"input-color-accent\" class=\"form-control spectrum\" />";
        // line 438
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent", array(), "any", true, true)) {
            // line 439
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent", array());
            echo "</div>";
        }
        // line 441
        echo "                      </div>

                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_accent__darker_1\" value=\"";
        // line 444
        echo (isset($context["theme_nice_color_accent__darker_1"]) ? $context["theme_nice_color_accent__darker_1"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_accent__darker_1"]) ? $context["entry_color_accent__darker_1"] : null);
        echo "\" id=\"input-color-accent--darker-1\" class=\"form-control spectrum-2\" />";
        // line 445
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__darker_1", array(), "any", true, true)) {
            // line 446
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__darker_1", array());
            echo "</div>";
        }
        // line 448
        echo "                      </div>
                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_accent__darker_2\" value=\"";
        // line 450
        echo (isset($context["theme_nice_color_accent__darker_2"]) ? $context["theme_nice_color_accent__darker_2"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_accent__darker_2"]) ? $context["entry_color_accent__darker_2"] : null);
        echo "\" id=\"input-color-accent--darker-2\" class=\"form-control spectrum-2\" />";
        // line 451
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__darker_2", array(), "any", true, true)) {
            // line 452
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__darker_2", array());
            echo "</div>";
        }
        // line 454
        echo "                      </div>
                      <div class=\"col-sm-1\">
                        <input type=\"text\" name=\"theme_nice_color_accent__darker_3\" value=\"";
        // line 456
        echo (isset($context["theme_nice_color_accent__darker_3"]) ? $context["theme_nice_color_accent__darker_3"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_accent__darker_3"]) ? $context["entry_color_accent__darker_3"] : null);
        echo "\" id=\"input-color-accent--darker-3\" class=\"form-control spectrum-2\" />";
        // line 457
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__darker_3", array(), "any", true, true)) {
            // line 458
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_accent__darker_3", array());
            echo "</div>";
        }
        // line 460
        echo "                      </div>                    
                    </div>
                  </fieldset>
                  <br>
                  <br>
                  <fieldset>
                    <legend>";
        // line 466
        echo (isset($context["legend_colors_of_element"]) ? $context["legend_colors_of_element"] : null);
        echo "</legend>
                    <div class=\"form-group required\">
                      <label class=\"col-sm-2 control-label\" for=\"input-color-footer-bg\">";
        // line 468
        echo (isset($context["entry_color_footer_bg"]) ? $context["entry_color_footer_bg"] : null);
        echo "</label>
                      <div class=\"col-sm-2\">
                        <input type=\"text\" name=\"theme_nice_color_footer_bg\" value=\"";
        // line 470
        echo (isset($context["theme_nice_color_footer_bg"]) ? $context["theme_nice_color_footer_bg"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_color_footer_bg"]) ? $context["entry_color_footer_bg"] : null);
        echo "\" id=\"input-color-footer-bg\" class=\"form-control spectrum\" />";
        // line 471
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_footer_bg", array(), "any", true, true)) {
            // line 472
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "color_footer_bg", array());
            echo "</div>";
        }
        // line 474
        echo "                      </div>
                    </div>
                  </fieldset>
                  
                </div>
                <!-- /Tab Colors . End
                ============================================================ -->
                
                
                <!-- Tab Menu Top . Begin -->
                <div class=\"tab-pane\" id=\"tab-menu-top\">
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">";
        // line 486
        echo (isset($context["entry_menu_top_status"]) ? $context["entry_menu_top_status"] : null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"btn-group\" data-toggle=\"buttons\">
                        <label class=\"btn btn-default";
        // line 489
        if ( !(isset($context["theme_nice_menu_top_status"]) ? $context["theme_nice_menu_top_status"] : null)) {
            echo " active";
        }
        echo "\">
                          <input type=\"radio\" name=\"theme_nice_menu_top_status\" value=\"0\"";
        // line 490
        if ( !(isset($context["theme_nice_menu_top_status"]) ? $context["theme_nice_menu_top_status"] : null)) {
            echo " checked";
        }
        echo ">
                          <span >";
        // line 491
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "</span>
                        </label>
                        <label class=\"btn btn-default";
        // line 493
        if ((isset($context["theme_nice_menu_top_status"]) ? $context["theme_nice_menu_top_status"] : null)) {
            echo " active";
        }
        echo "\">
                          <input type=\"radio\" name=\"theme_nice_menu_top_status\" value=\"1\"";
        // line 494
        if ((isset($context["theme_nice_menu_top_status"]) ? $context["theme_nice_menu_top_status"] : null)) {
            echo " checked";
        }
        echo ">
                          <span >";
        // line 495
        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
        echo "</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">";
        // line 502
        echo (isset($context["text_menu_top_items"]) ? $context["text_menu_top_items"] : null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <table id=\"main-menu-items\" class=\"table table-bordered\">
                        <thead>
                          <tr>
                            <td class=\"nowrap\">";
        // line 507
        echo (isset($context["text_title"]) ? $context["text_title"] : null);
        echo "</td>
                            <td class=\"nowrap\">";
        // line 508
        echo (isset($context["text_link"]) ? $context["text_link"] : null);
        echo "</td>
                            <td class=\"nowrap\">";
        // line 509
        echo (isset($context["text_sort_order"]) ? $context["text_sort_order"] : null);
        echo "</td>
                            <td class=\"w-1\"></td>
                          </tr>
                        </thead>
                        <tbody>";
        // line 514
        $context["item_row_main"] = 0;
        // line 515
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["theme_nice_menu_top_items"]) ? $context["theme_nice_menu_top_items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["theme_nice_menu_top_item"]) {
            // line 516
            echo "                            <tr id=\"item-row-main";
            echo (isset($context["item_row_main"]) ? $context["item_row_main"] : null);
            echo "\">
                              <td class=\"text-left\">";
            // line 518
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 519
                echo "                                  <div class=\"input-group input-group-sm pull-left\">
                                    <span class=\"input-group-addon\"><img src=\"language/";
                // line 520
                echo $this->getAttribute($context["language"], "code", array());
                echo "/";
                echo $this->getAttribute($context["language"], "code", array());
                echo ".png\" title=\"";
                echo $this->getAttribute($context["language"], "name", array());
                echo "\" /></span>
                                    <input class=\"form-control\" type=\"text\" name=\"theme_nice_menu_top_item[";
                // line 521
                echo (isset($context["item_row_main"]) ? $context["item_row_main"] : null);
                echo "][title][";
                echo $this->getAttribute($context["language"], "language_id", array());
                echo "]\" value=\"";
                echo $this->getAttribute($this->getAttribute($context["theme_nice_menu_top_item"], "title", array()), $this->getAttribute($context["language"], "language_id", array()), array(), "array");
                echo "\" />
                                  </div>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 524
            echo "                              </td>
                              <td class=\"text-left\">";
            // line 526
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 527
                echo "                                  <div class=\"input-group input-group-sm pull-left\">
                                    <span class=\"input-group-addon\"><img src=\"language/";
                // line 528
                echo $this->getAttribute($context["language"], "code", array());
                echo "/";
                echo $this->getAttribute($context["language"], "code", array());
                echo ".png\" title=\"";
                echo $this->getAttribute($context["language"], "name", array());
                echo "\" /></span>
                                    <input class=\"form-control\" type=\"text\" name=\"theme_nice_menu_top_item[";
                // line 529
                echo (isset($context["item_row_main"]) ? $context["item_row_main"] : null);
                echo "][link][";
                echo $this->getAttribute($context["language"], "language_id", array());
                echo "]\" value=\"";
                echo $this->getAttribute($this->getAttribute($context["theme_nice_menu_top_item"], "link", array()), $this->getAttribute($context["language"], "language_id", array()), array(), "array");
                echo "\" />
                                  </div>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 532
            echo "                              </td>
                              <td class=\"text-left\">
                                <input  class=\"form-control\" type=\"text\" name=\"theme_nice_menu_top_item[";
            // line 534
            echo (isset($context["item_row_main"]) ? $context["item_row_main"] : null);
            echo "][sort_order]\" value=\"";
            echo $this->getAttribute($context["theme_nice_menu_top_item"], "sort_order", array());
            echo "\" />
                              </td>
                              <td class=\"text-right\">
                                <a class=\"btn btn-danger\" onclick=\"\$('#item-row-main";
            // line 537
            echo (isset($context["item_row_main"]) ? $context["item_row_main"] : null);
            echo "').remove();\" data-toggle=\"tooltip\" title=\"Удалить\"><i class=\"fa fa-trash-o\"></i></a>
                              </td>
                            </tr>";
            // line 540
            $context["item_row_main"] = ((isset($context["item_row_main"]) ? $context["item_row_main"] : null) + 1);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme_nice_menu_top_item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 542
        echo "                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan=\"3\"></td>
                            <td class=\"text-right\"><a class=\"btn btn-default\" onclick=\"addItemMain();\" data-toggle=\"tooltip\" title=\"Добавить\"><i class=\"fa fa-plus\"></i></a></td>
                          </tr>
                        </tfoot>
                      </table>
                      <script>
                        var item_row_main =";
        // line 551
        echo (isset($context["item_row_main"]) ? $context["item_row_main"] : null);
        echo ";
                                function addItemMain() {
                                  html = '<tr id=\"item-row-main' + item_row_main + '\">';
                                  html += '<td class=\"text-left\">';";
        // line 555
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 556
            echo "                                    html += '<div class=\"input-group input-group-sm pull-left\"><span class=\"input-group-addon\"><img src=\"language/";
            echo $this->getAttribute($context["language"], "code", array());
            echo "/";
            echo $this->getAttribute($context["language"], "code", array());
            echo ".png\" title=\"";
            echo $this->getAttribute($context["language"], "name", array());
            echo "\" /></span>';
                                    html += '<input class=\"form-control\" type=\"text\" name=\"theme_nice_menu_top_item[' + item_row_main + '][title][";
            // line 557
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "]\" value=\"\" />';
                                    html += '</div>';";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 560
        echo "                                    html += '</td>';
                                    html += '<td class=\"text-left\">';";
        // line 562
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 563
            echo "                                    html += '<div class=\"input-group input-group-sm pull-left\"><span class=\"input-group-addon\"><img src=\"language/";
            echo $this->getAttribute($context["language"], "code", array());
            echo "/";
            echo $this->getAttribute($context["language"], "code", array());
            echo ".png\" title=\"";
            echo $this->getAttribute($context["language"], "name", array());
            echo "\" /></span>';
                                    html += '<input class=\"form-control\"  type=\"text\" name=\"theme_nice_menu_top_item[' + item_row_main + '][link][";
            // line 564
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "]\" value=\"\" />';
                                    html += '</div>';";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 567
        echo "                                    html += '</td>';
                                    html += '<td class=\"text-left\"><input class=\"form-control\" type=\"text\" name=\"theme_nice_menu_top_item[' + item_row_main + '][sort_order]\" size=\"1\" value=\"0\" /></td>';
                                    html += '<td class=\"text-right\"><a class=\"btn btn-danger\" onclick=\"\$(\\'#item-row-main' + item_row_main + '\\').remove();\" data-toggle=\"tooltip\" title=\"Удалить\"><i class=\"fa fa-trash-o\"></i></a></td>';
                                    html += '</tr>';
                                    \$('#main-menu-items tbody').append(html);
                                    ;
                                    item_row_main++;
                                  }
                      </script> 
                    </div>
                  </div>
                </div>
                <!-- /Tab Menu Top . End
                ============================================================ -->
                
                <!-- Tab Page Home . Begin -->
                <div class=\"tab-pane\" id=\"tab-page-home\">
                  <fieldset>
                    <legend>";
        // line 585
        echo (isset($context["legend_home_slideshow"]) ? $context["legend_home_slideshow"] : null);
        echo "</legend>
                    <div class=\"form-group\">
                      <label class=\"col-sm-2 control-label\">";
        // line 587
        echo (isset($context["entry_home_slideshow_status"]) ? $context["entry_home_slideshow_status"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"btn-group\" data-toggle=\"buttons\">
                          <label class=\"btn btn-default";
        // line 590
        if ( !(isset($context["theme_nice_home_slideshow_status"]) ? $context["theme_nice_home_slideshow_status"] : null)) {
            echo " active";
        }
        echo "\">
                            <input type=\"radio\" name=\"theme_nice_home_slideshow_status\" value=\"0\"";
        // line 591
        if ( !(isset($context["theme_nice_home_slideshow_status"]) ? $context["theme_nice_home_slideshow_status"] : null)) {
            echo " checked";
        }
        echo ">
                            <span >";
        // line 592
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "</span>
                          </label>
                          <label class=\"btn btn-default";
        // line 594
        if ((isset($context["theme_nice_home_slideshow_status"]) ? $context["theme_nice_home_slideshow_status"] : null)) {
            echo " active";
        }
        echo "\">
                            <input type=\"radio\" name=\"theme_nice_home_slideshow_status\" value=\"1\"";
        // line 595
        if ((isset($context["theme_nice_home_slideshow_status"]) ? $context["theme_nice_home_slideshow_status"] : null)) {
            echo " checked";
        }
        echo ">
                            <span >";
        // line 596
        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
        echo "</span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class=\"form-group\">
                      <label class=\"col-sm-2 control-label\">";
        // line 603
        echo (isset($context["text_home_slideshow"]) ? $context["text_home_slideshow"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"inline-block\">
                          <select name=\"theme_nice_home_slideshow_id\" class=\"form-control\">
                            <option value=\"0\">";
        // line 607
        echo (isset($context["text_select"]) ? $context["text_select"] : null);
        echo "</option>";
        // line 608
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["slideshows"]) ? $context["slideshows"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["slideshow"]) {
            // line 609
            if (($this->getAttribute($context["slideshow"], "slideshow_id", array()) == (isset($context["theme_nice_home_slideshow_id"]) ? $context["theme_nice_home_slideshow_id"] : null))) {
                // line 610
                echo "                              <option value=\"";
                echo $this->getAttribute($context["slideshow"], "slideshow_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["slideshow"], "name", array());
                echo "</option>";
            } else {
                // line 612
                echo "                              <option value=\"";
                echo $this->getAttribute($context["slideshow"], "slideshow_id", array());
                echo "\">";
                echo $this->getAttribute($context["slideshow"], "name", array());
                echo "</option>";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slideshow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 615
        echo "                          </select>";
        // line 616
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "home_slideshow_id", array(), "any", true, true)) {
            // line 617
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "home_slideshow_id", array());
            echo "</div>";
        }
        // line 619
        echo "                        </div>
                        <i>";
        // line 620
        echo (isset($context["see_nice_slideshows"]) ? $context["see_nice_slideshows"] : null);
        echo "</i>
                      </div>
                    </div>
                    <hr>
                    <div class=\"form-group\">
                      <label class=\"col-sm-2 control-label\" for=\"input-home-slideshow-width\">";
        // line 625
        echo (isset($context["entry_home_slideshow_width"]) ? $context["entry_home_slideshow_width"] : null);
        echo "</label>
                      <div class=\"col-sm-4\">
                        <input type=\"text\" name=\"theme_nice_home_slideshow_width\" value=\"";
        // line 627
        echo (isset($context["theme_nice_home_slideshow_width"]) ? $context["theme_nice_home_slideshow_width"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" id=\"input-home-slideshow-width\" class=\"form-control\" />";
        // line 628
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "home_slideshow_width", array(), "any", true, true)) {
            // line 629
            echo "                        <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "home_slideshow_width", array());
            echo "</div>";
        }
        // line 631
        echo "                      </div>
                      <label class=\"col-sm-2 control-label\" for=\"input-home-slideshow-height\">";
        // line 632
        echo (isset($context["entry_home_slideshow_height"]) ? $context["entry_home_slideshow_height"] : null);
        echo "</label>
                      <div class=\"col-sm-4\">
                        <input type=\"text\" name=\"theme_nice_home_slideshow_height\" value=\"";
        // line 634
        echo (isset($context["theme_nice_home_slideshow_height"]) ? $context["theme_nice_home_slideshow_height"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" id=\"input-home-slideshow-height\" class=\"form-control\" />";
        // line 635
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "home_slideshow_height", array(), "any", true, true)) {
            // line 636
            echo "                        <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "home_slideshow_height", array());
            echo "</div>";
        }
        // line 638
        echo "                      </div>
                    </div>
                  </fieldset>
                  <fieldset>
                    <legend>";
        // line 642
        echo (isset($context["legend_home_banners_near_slideshow"]) ? $context["legend_home_banners_near_slideshow"] : null);
        echo "</legend>
                    <div class=\"form-group\">
                      <label class=\"col-sm-2 control-label\">";
        // line 644
        echo (isset($context["entry_home_banners_near_slideshow_status"]) ? $context["entry_home_banners_near_slideshow_status"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"btn-group\" data-toggle=\"buttons\">
                          <label class=\"btn btn-default";
        // line 647
        if ( !(isset($context["theme_nice_home_banner_near_slideshow_status"]) ? $context["theme_nice_home_banner_near_slideshow_status"] : null)) {
            echo " active";
        }
        echo "\">
                            <input type=\"radio\" name=\"theme_nice_home_banner_near_slideshow_status\" value=\"0\"";
        // line 648
        if ( !(isset($context["theme_nice_home_banner_near_slideshow_status"]) ? $context["theme_nice_home_banner_near_slideshow_status"] : null)) {
            echo " checked";
        }
        echo ">
                            <span >";
        // line 649
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "</span>
                          </label>
                          <label class=\"btn btn-default";
        // line 651
        if ((isset($context["theme_nice_home_banner_near_slideshow_status"]) ? $context["theme_nice_home_banner_near_slideshow_status"] : null)) {
            echo " active";
        }
        echo "\">
                            <input type=\"radio\" name=\"theme_nice_home_banner_near_slideshow_status\" value=\"1\"";
        // line 652
        if ((isset($context["theme_nice_home_banner_near_slideshow_status"]) ? $context["theme_nice_home_banner_near_slideshow_status"] : null)) {
            echo " checked";
        }
        echo ">
                            <span >";
        // line 653
        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
        echo "</span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <ul class=\"nav nav-tabs\" id=\"home-banner-language\">";
        // line 660
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 661
            echo "                      <li><a href=\"#home-banner-language-";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\" data-toggle=\"tab\"><img src=\"language/";
            echo $this->getAttribute($context["language"], "code", array());
            echo "/";
            echo $this->getAttribute($context["language"], "code", array());
            echo ".png\" title=\"";
            echo $this->getAttribute($context["language"], "name", array());
            echo "\" />";
            echo $this->getAttribute($context["language"], "name", array());
            echo "</a></li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 663
        echo "                    </ul>
                    <div class=\"tab-content\">";
        // line 665
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 666
            echo "                      <div class=\"tab-pane fade\" id=\"home-banner-language-";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\">
                        <div class=\"table-responsive\">
                          <table class=\"table table-striped table-bordered table-hover\">
                            <thead>
                              <tr>
                                <td class=\"text-left col-sm-2\">";
            // line 671
            echo (isset($context["text_images"]) ? $context["text_images"] : null);
            echo "</td>
                                <td class=\"text-left col-sm-10\">";
            // line 672
            echo (isset($context["text_links"]) ? $context["text_links"] : null);
            echo "</td>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class=\"text-left\"><a href=\"\" id=\"thumb-banners-near-slideshow-";
            // line 677
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "-1\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
            echo $this->getAttribute((isset($context["thumb_home_banners_1"]) ? $context["thumb_home_banners_1"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array");
            echo "\" alt=\"\" title=\"\" data-placeholder=\"";
            echo (isset($context["placeholder"]) ? $context["placeholder"] : null);
            echo "\"/></a> <input type=\"hidden\" name=\"theme_nice_home_banner_1[";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "]\" value=\"";
            echo $this->getAttribute((isset($context["theme_nice_home_banner_1"]) ? $context["theme_nice_home_banner_1"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array");
            echo "\" id=\"input-home-banners-near-slideshow-";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "-1\"/></td>
                                <td><input type=\"text\" name=\"theme_nice_home_banner_1_link[";
            // line 678
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "]\" value=\"";
            echo $this->getAttribute((isset($context["theme_nice_home_banner_1_link"]) ? $context["theme_nice_home_banner_1_link"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array");
            echo "\" placeholder=\"";
            echo (isset($context["text_link"]) ? $context["text_link"] : null);
            echo "\" class=\"form-control\" /></td>
                              </tr>
                              <tr>
                                <td class=\"text-left\"><a href=\"\" id=\"thumb-banners-near-slideshow-";
            // line 681
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "-2\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
            echo $this->getAttribute((isset($context["thumb_home_banners_2"]) ? $context["thumb_home_banners_2"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array");
            echo "\" alt=\"\" title=\"\" data-placeholder=\"";
            echo (isset($context["placeholder"]) ? $context["placeholder"] : null);
            echo "\"/></a> <input type=\"hidden\" name=\"theme_nice_home_banner_2[";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "]\" value=\"";
            echo $this->getAttribute((isset($context["theme_nice_home_banner_2"]) ? $context["theme_nice_home_banner_2"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array");
            echo "\" id=\"input-home-banners-near-slideshow-";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "-2\"/></td>
                                <td><input type=\"text\" name=\"theme_nice_home_banner_2_link[";
            // line 682
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "]\" value=\"";
            echo $this->getAttribute((isset($context["theme_nice_home_banner_2_link"]) ? $context["theme_nice_home_banner_2_link"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array");
            echo "\" placeholder=\"";
            echo (isset($context["text_link"]) ? $context["text_link"] : null);
            echo "\" class=\"form-control\" /></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      
                      </div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 690
        echo "                    </div>
                    <script type=\"text/javascript\">
                    \$('#home-banner-language a:first').tab('show');
                    </script> 
                        
                  </fieldset>
                </div>
                <!-- /Tab Page Home . End
                ============================================================ -->
                
                
                <!-- Tab Page Product . Begin -->
                <div class=\"tab-pane\" id=\"tab-product-list\">
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">";
        // line 704
        echo (isset($context["entry_productlist_image_margins"]) ? $context["entry_productlist_image_margins"] : null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"row\">
                        <label class=\"radio-inline col-sm-4\">
                          <input type=\"radio\" name=\"theme_nice_productlist_image_margins\" value=\"0\"";
        // line 708
        if ( !(isset($context["theme_nice_productlist_image_margins"]) ? $context["theme_nice_productlist_image_margins"] : null)) {
            echo " checked";
        }
        echo ">";
        // line 709
        echo (isset($context["text_productlist_image_margins_yes"]) ? $context["text_productlist_image_margins_yes"] : null);
        echo "
                          <img src=\"view/image/nice/productlist_image_1.jpg\" class=\"img-responsive\">
                        </label>
                        <label  class=\"radio-inline col-sm-4\">
                          <input type=\"radio\" name=\"theme_nice_productlist_image_margins\" value=\"1\"";
        // line 713
        if ((isset($context["theme_nice_productlist_image_margins"]) ? $context["theme_nice_productlist_image_margins"] : null)) {
            echo " checked";
        }
        echo ">";
        // line 714
        echo (isset($context["text_productlist_image_margins_no"]) ? $context["text_productlist_image_margins_no"] : null);
        echo "
                          <img src=\"view/image/nice/productlist_image_2.jpg\" class=\"img-responsive\">
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">";
        // line 721
        echo (isset($context["entry_productlist_description"]) ? $context["entry_productlist_description"] : null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"row\">
                      <label class=\"radio-inline col-sm-4\">
                        <input type=\"radio\" name=\"theme_nice_productlist_description\" value=\"0\"";
        // line 725
        if ( !(isset($context["theme_nice_productlist_description"]) ? $context["theme_nice_productlist_description"] : null)) {
            echo " checked";
        }
        echo ">
                        <span >";
        // line 726
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "</span>
                        <img src=\"view/image/nice/productlist_description_disabled.jpg\" class=\"img-responsive\">
                      </label>
                      <label class=\"radio-inline col-sm-4\">
                        <input type=\"radio\" name=\"theme_nice_productlist_description\" value=\"1\"";
        // line 730
        if ((isset($context["theme_nice_productlist_description"]) ? $context["theme_nice_productlist_description"] : null)) {
            echo " checked";
        }
        echo ">
                        <span >";
        // line 731
        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
        echo "</span>
                        <img src=\"view/image/nice/productlist_description_enabled.jpg\" class=\"img-responsive\">
                      </label>
                      </div>
                    </div>
                  </div>
                  <div class=\"depended-from-productlist-description\">
                    <hr>
                    <div class=\"form-group\">
                      <label class=\"col-sm-2 control-label\">";
        // line 740
        echo (isset($context["entry_productlist_description_on_mobile"]) ? $context["entry_productlist_description_on_mobile"] : null);
        echo "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"row\">
                        <label class=\"radio-inline col-sm-5\">
                          <input type=\"radio\" name=\"theme_nice_productlist_description_on_mobile\" value=\"0\"";
        // line 744
        if ( !(isset($context["theme_nice_productlist_description_on_mobile"]) ? $context["theme_nice_productlist_description_on_mobile"] : null)) {
            echo " checked";
        }
        echo ">
                          <span >";
        // line 745
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "</span>
                          <img src=\"view/image/nice/productlist_description_on_mobile_disabled.jpg\" class=\"img-responsive\">
                        </label>
                        <label class=\"radio-inline col-sm-5\">
                          <input type=\"radio\" name=\"theme_nice_productlist_description_on_mobile\" value=\"1\"";
        // line 749
        if ((isset($context["theme_nice_productlist_description_on_mobile"]) ? $context["theme_nice_productlist_description_on_mobile"] : null)) {
            echo " checked";
        }
        echo ">
                          <span >";
        // line 750
        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
        echo "</span>
                          <img src=\"view/image/nice/productlist_description_on_mobile_enabled.jpg\" class=\"img-responsive\">
                        </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">";
        // line 759
        echo (isset($context["entry_productlist_name_font_weight"]) ? $context["entry_productlist_name_font_weight"] : null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"row\">
                        <label class=\"radio-inline col-sm-4\">
                          <input type=\"radio\" name=\"theme_nice_productlist_name_font_weight\" value=\"regular\"";
        // line 763
        if (("regular" == (isset($context["theme_nice_productlist_name_font_weight"]) ? $context["theme_nice_productlist_name_font_weight"] : null))) {
            echo " checked";
        }
        echo "> 
                          <span >";
        // line 764
        echo (isset($context["text_regular"]) ? $context["text_regular"] : null);
        echo "</span>
                          <img src=\"view/image/nice/productlist_name_font_weight_regular.jpg\" class=\"img-responsive\">
                        </label>
                        <label class=\"radio-inline col-sm-4\">
                          <input type=\"radio\" name=\"theme_nice_productlist_name_font_weight\" value=\"bold\"";
        // line 768
        if (("bold" == (isset($context["theme_nice_productlist_name_font_weight"]) ? $context["theme_nice_productlist_name_font_weight"] : null))) {
            echo " checked";
        }
        echo ">
                          <span >";
        // line 769
        echo (isset($context["text_bold"]) ? $context["text_bold"] : null);
        echo "</span>
                          <img src=\"view/image/nice/productlist_name_font_weight_bold.jpg\" class=\"img-responsive\">
                        </label>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">";
        // line 777
        echo (isset($context["entry_productlist_price_font_weight"]) ? $context["entry_productlist_price_font_weight"] : null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"row\">
                        <label class=\"radio-inline col-sm-4\">
                          <input type=\"radio\" name=\"theme_nice_productlist_price_font_weight\" value=\"regular\"";
        // line 781
        if (("regular" == (isset($context["theme_nice_productlist_price_font_weight"]) ? $context["theme_nice_productlist_price_font_weight"] : null))) {
            echo " checked";
        }
        echo "> 
                          <span >";
        // line 782
        echo (isset($context["text_regular"]) ? $context["text_regular"] : null);
        echo "</span>
                          <img src=\"view/image/nice/productlist_price_font_weight_regular.jpg\" class=\"img-responsive\">
                        </label>
                        <label class=\"radio-inline col-sm-4\">
                          <input type=\"radio\" name=\"theme_nice_productlist_price_font_weight\" value=\"bold\"";
        // line 786
        if (("bold" == (isset($context["theme_nice_productlist_price_font_weight"]) ? $context["theme_nice_productlist_price_font_weight"] : null))) {
            echo " checked";
        }
        echo ">
                          <span >";
        // line 787
        echo (isset($context["text_bold"]) ? $context["text_bold"] : null);
        echo "</span>
                          <img src=\"view/image/nice/productlist_price_font_weight_bold.jpg\" class=\"img-responsive\">
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">";
        // line 794
        echo (isset($context["entry_productlist_grid_hover_effect"]) ? $context["entry_productlist_grid_hover_effect"] : null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"row\">
                      <label class=\"radio-inline col-sm-5\">
                        <input type=\"radio\" name=\"theme_nice_productlist_grid_hover_effect\" value=\"0\"";
        // line 798
        if ( !(isset($context["theme_nice_productlist_grid_hover_effect"]) ? $context["theme_nice_productlist_grid_hover_effect"] : null)) {
            echo " checked";
        }
        echo ">
                        <span >";
        // line 799
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "</span>
                        <img src=\"view/image/nice/productlist_grid_hover_effect_disabled.jpg\" class=\"img-responsive\">
                      </label>
                      <label class=\"radio-inline col-sm-5\">
                        <input type=\"radio\" name=\"theme_nice_productlist_grid_hover_effect\" value=\"1\"";
        // line 803
        if ((isset($context["theme_nice_productlist_grid_hover_effect"]) ? $context["theme_nice_productlist_grid_hover_effect"] : null)) {
            echo " checked";
        }
        echo ">
                        <span >";
        // line 804
        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
        echo "</span>
                        <img src=\"view/image/nice/productlist_grid_hover_effect_enabled.jpg\" class=\"img-responsive\">
                      </label>
                      </div>
                    </div>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">";
        // line 811
        echo (isset($context["entry_productlist_cols_on_mobile"]) ? $context["entry_productlist_cols_on_mobile"] : null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <div class=\"row\">
                      <label class=\"radio-inline col-sm-5\">
                        <input type=\"radio\" name=\"theme_nice_productlist_cols_on_mobile\" value=\"1\"";
        // line 815
        if ((1 == (isset($context["theme_nice_productlist_cols_on_mobile"]) ? $context["theme_nice_productlist_cols_on_mobile"] : null))) {
            echo " checked";
        }
        echo ">
                        <span >";
        // line 816
        echo (isset($context["text_1_col"]) ? $context["text_1_col"] : null);
        echo "</span>
                        <img src=\"view/image/nice/productlist_cols_on_mobile_1.jpg\" class=\"img-responsive\">
                      </label>
                      <label class=\"radio-inline col-sm-5\">
                        <input type=\"radio\" name=\"theme_nice_productlist_cols_on_mobile\" value=\"2\"";
        // line 820
        if ((2 == (isset($context["theme_nice_productlist_cols_on_mobile"]) ? $context["theme_nice_productlist_cols_on_mobile"] : null))) {
            echo " checked";
        }
        echo ">
                        <span >";
        // line 821
        echo (isset($context["text_2_cols"]) ? $context["text_2_cols"] : null);
        echo "</span>
                        <img src=\"view/image/nice/productlist_cols_on_mobile_2.jpg\" class=\"img-responsive\">
                      </label>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /Tab Page Product . End
                ============================================================ -->
                
                
                <!-- Tab Product List . Begin -->
                <div class=\"tab-pane\" id=\"tab-page-product\">
                  <div class=\"form-group required\">
                    <label class=\"col-sm-2 control-label\" for=\"input-page-product-shortdescription-lenght\"><span data-toggle=\"tooltip\" title=\"";
        // line 836
        echo (isset($context["help_page_product_shortdescritipon_length"]) ? $context["help_page_product_shortdescritipon_length"] : null);
        echo "\">";
        echo (isset($context["entry_page_product_shortdescritipon_length"]) ? $context["entry_page_product_shortdescritipon_length"] : null);
        echo "</span></label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"theme_nice_page_product_shortdescritipon_length\" value=\"";
        // line 838
        echo (isset($context["theme_nice_page_product_shortdescritipon_length"]) ? $context["theme_nice_page_product_shortdescritipon_length"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_page_product_shortdescritipon_length"]) ? $context["entry_page_product_shortdescritipon_length"] : null);
        echo "\" id=\"input-page-product-shortdescription-lenght\" class=\"form-control\" />";
        // line 839
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "page_product_shortdescritipon_length", array(), "any", true, true)) {
            // line 840
            echo "                          <div class=\"text-danger\">";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "page_product_shortdescritipon_length", array());
            echo "</div>";
        }
        // line 842
        echo "                      </div>
                    </div>
                  <hr>
                </div>
                <!-- /Tab Page Product . End
                ============================================================ -->
                
                <!-- Tab Footer . Begin -->";
        // line 885
        echo "                <!-- /Tab Footer . End
                ============================================================ -->
                
                
                <!-- Tab About . Begin -->
                <div class=\"tab-pane\" id=\"tab-about\">
                  <div>
                    <h3>";
        // line 892
        echo (isset($context["about_title"]) ? $context["about_title"] : null);
        echo "</h3>
                    <br>
                    <img class=\"img-responsive\" style=\"width: 200px; float: left; margin-right: 16px;\" src=\"view/image/nice/about/logo-7-e-nunito-sans.png\" />";
        // line 895
        echo (isset($context["about_text"]) ? $context["about_text"] : null);
        echo "
                    <br class=\"clear\">
                  </div>
                  <br>
                  <br>
                  <div>
                    <h3>";
        // line 901
        echo (isset($context["about_open_source"]) ? $context["about_open_source"] : null);
        echo "</h3>
                    <br>
                    <img class=\"img-responsive\" style=\"width: 200px; float: left; margin-right: 16px;\" src=\"view/image/nice/about/open-source.png\" />";
        // line 904
        echo (isset($context["about_open_source_text"]) ? $context["about_open_source_text"] : null);
        echo "
                    <br class=\"clear\">
                  </div>
                  <br>
                  <br>
                  <br>
                  <div>
                    <h3>";
        // line 911
        echo (isset($context["about_author_title"]) ? $context["about_author_title"] : null);
        echo "</h3>
                    <br>
                    <img class=\"img-responsive\" style=\"width: 200px; float: left; margin-right: 16px; border-radius: 50%;\" src=\"view/image/nice/about/serge-tkach-200px.jpg\" />";
        // line 914
        echo (isset($context["about_author_text"]) ? $context["about_author_text"] : null);
        echo "
                    <br class=\"clear\">
                  </div>
                  <br>
                                
                </div>
                <!-- /Tab About . End
                ============================================================ -->
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
\$('.spectrum').spectrum({
  type: \"component\",
  hideAfterPaletteSelect: true,
  showInput: true,
  showInitial: true,
  allowEmpty: false
});

\$('.spectrum-2').spectrum({
  type: \"component\",
  hideAfterPaletteSelect: true,
  showPalette: false,
  showInput: true,
  showInitial: true,
  allowEmpty: false
});
</script>

<script>
\$('.color-presets--item').click(function() {
  \$('#input-color-primary').val(\$(this).children('.-primary').data('color'));
  \$('#input-color-primary').trigger('change');
  \$('#input-color-accent').val(\$(this).children('.-accent').data('color'));
  \$('#input-color-accent').trigger('change');
});
</script>

<script>
\$('#input-color-primary').change(function() {
  \$.ajax({
\t\turl: 'index.php?route=extension/theme/nice/getColorTonesByAjax&color=' + encodeURIComponent(\$('#input-color-primary').val()) + '&user_token=";
        // line 962
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
    method: 'GET',
\t\tdataType: 'json',
\t\tsuccess: function(json) {
      if (undefined !== json['tones']) {
        \$('#input-color-primary--darker-1').val(json['tones']['darker-1']); \$('#input-color-primary--darker-1').trigger('change');
        \$('#input-color-primary--darker-2').val(json['tones']['darker-2']); \$('#input-color-primary--darker-2').trigger('change');
        \$('#input-color-primary--darker-3').val(json['tones']['darker-3']); \$('#input-color-primary--darker-3').trigger('change');
        \$('#input-color-primary--lighter-1').val(json['tones']['lighter-1']); \$('#input-color-primary--lighter-1').trigger('change');
        \$('#input-color-primary--lighter-2').val(json['tones']['lighter-2']); \$('#input-color-primary--lighter-2').trigger('change');
        \$('#input-color-primary--lighter-3').val(json['tones']['lighter-3']); \$('#input-color-primary--lighter-3').trigger('change');
      }
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
  
});
\$('#input-color-accent').change(function() {
  
  \$.ajax({
\t\turl: 'index.php?route=extension/theme/nice/getColorTonesByAjax&color=' + encodeURIComponent(\$('#input-color-accent').val()) + '&user_token=";
        // line 984
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
    method: 'GET',
\t\tdataType: 'json',
\t\tsuccess: function(json) {
      if (undefined !== json['tones']) {
        \$('#input-color-accent--darker-1').val(json['tones']['darker-1']); \$('#input-color-accent--darker-1').trigger('change');
        \$('#input-color-accent--darker-2').val(json['tones']['darker-2']); \$('#input-color-accent--darker-2').trigger('change');
        \$('#input-color-accent--darker-3').val(json['tones']['darker-3']); \$('#input-color-accent--darker-3').trigger('change');
        \$('#input-color-accent--lighter-1').val(json['tones']['lighter-1']); \$('#input-color-accent--lighter-1').trigger('change');
        \$('#input-color-accent--lighter-2').val(json['tones']['lighter-2']); \$('#input-color-accent--lighter-2').trigger('change');
        \$('#input-color-accent--lighter-3').val(json['tones']['lighter-3']); \$('#input-color-accent--lighter-3').trigger('change');
      }
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
  
  
});
</script>
                          
<script>
\$(document).ready(function() {
  if (\$(\"input[name='theme_nice_productlist_description']:checked\").val() == 1) {
    \$(\".depended-from-productlist-description\").show();
  } else {
    \$(\".depended-from-productlist-description\").hide();
  }
  
}); 
  
\$(\"input[name='theme_nice_productlist_description']\").on(\"change\", function() {
  if (1 == \$(this).val()) {
    \$(\".depended-from-productlist-description\").slideDown();
  } else {
    \$(\".depended-from-productlist-description\").slideUp();
    \$(\".depended-from-productlist-description\").find(\"input[value='0']\").prop(\"checked\", true);
  }
});
</script>";
        // line 1025
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "extension/theme/nice.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2023 => 1025,  1980 => 984,  1955 => 962,  1904 => 914,  1899 => 911,  1889 => 904,  1884 => 901,  1875 => 895,  1870 => 892,  1861 => 885,  1852 => 842,  1847 => 840,  1845 => 839,  1840 => 838,  1833 => 836,  1815 => 821,  1809 => 820,  1802 => 816,  1796 => 815,  1789 => 811,  1779 => 804,  1773 => 803,  1766 => 799,  1760 => 798,  1753 => 794,  1743 => 787,  1737 => 786,  1730 => 782,  1724 => 781,  1717 => 777,  1706 => 769,  1700 => 768,  1693 => 764,  1687 => 763,  1680 => 759,  1668 => 750,  1662 => 749,  1655 => 745,  1649 => 744,  1642 => 740,  1630 => 731,  1624 => 730,  1617 => 726,  1611 => 725,  1604 => 721,  1594 => 714,  1589 => 713,  1582 => 709,  1577 => 708,  1570 => 704,  1554 => 690,  1537 => 682,  1523 => 681,  1513 => 678,  1499 => 677,  1491 => 672,  1487 => 671,  1478 => 666,  1474 => 665,  1471 => 663,  1455 => 661,  1451 => 660,  1442 => 653,  1436 => 652,  1430 => 651,  1425 => 649,  1419 => 648,  1413 => 647,  1407 => 644,  1402 => 642,  1396 => 638,  1391 => 636,  1389 => 635,  1384 => 634,  1379 => 632,  1376 => 631,  1371 => 629,  1369 => 628,  1364 => 627,  1359 => 625,  1351 => 620,  1348 => 619,  1343 => 617,  1341 => 616,  1339 => 615,  1328 => 612,  1321 => 610,  1319 => 609,  1315 => 608,  1312 => 607,  1305 => 603,  1295 => 596,  1289 => 595,  1283 => 594,  1278 => 592,  1272 => 591,  1266 => 590,  1260 => 587,  1255 => 585,  1235 => 567,  1227 => 564,  1218 => 563,  1214 => 562,  1211 => 560,  1203 => 557,  1194 => 556,  1190 => 555,  1184 => 551,  1173 => 542,  1167 => 540,  1162 => 537,  1154 => 534,  1150 => 532,  1138 => 529,  1130 => 528,  1127 => 527,  1123 => 526,  1120 => 524,  1108 => 521,  1100 => 520,  1097 => 519,  1093 => 518,  1088 => 516,  1084 => 515,  1082 => 514,  1075 => 509,  1071 => 508,  1067 => 507,  1059 => 502,  1049 => 495,  1043 => 494,  1037 => 493,  1032 => 491,  1026 => 490,  1020 => 489,  1014 => 486,  1000 => 474,  995 => 472,  993 => 471,  988 => 470,  983 => 468,  978 => 466,  970 => 460,  965 => 458,  963 => 457,  958 => 456,  954 => 454,  949 => 452,  947 => 451,  942 => 450,  938 => 448,  933 => 446,  931 => 445,  926 => 444,  921 => 441,  916 => 439,  914 => 438,  909 => 437,  904 => 434,  899 => 432,  897 => 431,  892 => 430,  888 => 428,  883 => 426,  881 => 425,  876 => 424,  872 => 422,  867 => 420,  865 => 419,  860 => 418,  853 => 416,  847 => 412,  842 => 410,  840 => 409,  835 => 408,  831 => 406,  826 => 404,  824 => 403,  819 => 402,  815 => 400,  810 => 398,  808 => 397,  803 => 396,  798 => 393,  793 => 391,  791 => 390,  786 => 389,  781 => 386,  776 => 384,  774 => 383,  769 => 382,  765 => 380,  760 => 378,  758 => 377,  753 => 376,  749 => 374,  744 => 372,  742 => 371,  737 => 370,  730 => 368,  651 => 294,  646 => 292,  633 => 281,  628 => 279,  626 => 278,  619 => 275,  611 => 272,  604 => 268,  599 => 265,  594 => 263,  592 => 262,  585 => 259,  577 => 256,  570 => 252,  565 => 249,  560 => 247,  558 => 246,  551 => 243,  543 => 240,  536 => 236,  531 => 233,  526 => 231,  524 => 230,  517 => 227,  509 => 224,  502 => 220,  497 => 217,  492 => 215,  490 => 214,  483 => 211,  475 => 208,  468 => 204,  463 => 201,  458 => 199,  456 => 198,  449 => 195,  441 => 192,  434 => 188,  429 => 185,  424 => 183,  422 => 182,  415 => 179,  407 => 176,  400 => 172,  395 => 169,  390 => 167,  388 => 166,  381 => 163,  373 => 160,  366 => 156,  361 => 153,  356 => 151,  354 => 150,  347 => 147,  339 => 144,  332 => 140,  327 => 137,  322 => 135,  320 => 134,  313 => 131,  305 => 128,  298 => 124,  293 => 121,  288 => 119,  286 => 118,  279 => 115,  271 => 112,  264 => 108,  259 => 106,  253 => 102,  248 => 100,  246 => 99,  241 => 98,  234 => 96,  229 => 93,  224 => 91,  222 => 90,  217 => 89,  210 => 87,  205 => 85,  200 => 82,  189 => 79,  182 => 77,  180 => 76,  176 => 75,  169 => 72,  153 => 60,  150 => 58,  146 => 57,  142 => 56,  138 => 55,  134 => 54,  130 => 53,  120 => 45,  116 => 43,  111 => 42,  107 => 40,  102 => 39,  100 => 38,  95 => 35,  89 => 32,  83 => 29,  79 => 27,  72 => 23,  70 => 22,  63 => 18,  61 => 17,  56 => 13,  46 => 11,  42 => 10,  38 => 8,  32 => 7,  28 => 6,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/*   <div class="page-header">*/
/*     <div class="container-fluid">*/
/*       <div class="pull-right">*/
/*         <button type="submit" form="form-theme" data-toggle="tooltip" title="{{ button_save }}" class="btn btn-primary"><i class="fa fa-save"></i></button>*/
/*         <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-nice"><i class="fa fa-reply"></i></a></div>*/
/*       <h1>{{ text_heading_title }}</h1>*/
/*       <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*           <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*           {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/*   <div class="container-fluid">*/
/*     {% if error.warning is defined %}*/
/*       <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error.warning }}*/
/*         <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*       </div>*/
/*     {% endif %}*/
/*     {% if success is defined %}*/
/*       <div class="alert alert-success alert-dismissible"><i class="fa fa-check"></i> {{ success }}*/
/*         <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*       </div>*/
/*     {% endif %}*/
/*     <div class="panel panel-nice">*/
/*       <div class="panel-heading">*/
/*         <h3 class="panel-title"><i class="fa fa-pencil"></i> {{ text_edit }}</h3>*/
/*       </div>*/
/*       <div class="panel-body">*/
/*         <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-theme" class="form-horizontal">*/
/*           <fieldset>*/
/*             <div class="form-group">*/
/*               <label class="col-sm-2 control-label" for="input-status">{{ entry_status }}</label>*/
/*               <div class="col-sm-10">*/
/*                 <select name="theme_nice_status" id="input-status" class="form-control">*/
/*                   {% if theme_nice_status %}*/
/*                     <option value="1" selected="selected">{{ text_enabled }}</option>*/
/*                     <option value="0">{{ text_disabled }}</option>*/
/*                   {% else %}*/
/*                     <option value="1">{{ text_enabled }}</option>*/
/*                     <option value="0" selected="selected">{{ text_disabled }}</option>*/
/*                   {% endif %}*/
/*                 </select>*/
/*               </div>*/
/*             </div>*/
/*           </fieldset>*/
/*           <hr>*/
/*           <div class="row">*/
/*             <div class="col-lg-2 col-md-3" >*/
/*               <ul class="nav nav-pills nav-stacked">*/
/*                 <li class="active"><a href="#tab-basic-settings" data-toggle="pill">{{ tab_basic_settings }}</a></li>*/
/*                 <li><a href="#tab-colors" data-toggle="pill">{{ tab_colors }}</a></li>*/
/*                 <li><a href="#tab-menu-top" data-toggle="pill">{{ tab_menu_top }}</a></li>*/
/*                 <li><a href="#tab-page-home" data-toggle="pill">{{ tab_page_home }}</a></li>*/
/*                 <li><a href="#tab-page-product" data-toggle="pill">{{ tab_page_product }}</a></li>*/
/*                 <li><a href="#tab-product-list" data-toggle="pill">{{ tab_product_list }}</a></li>*/
/* {#                <li><a href="#tab-footer" data-toggle="pill">{{ tab_footer }}</a></li>#}*/
/*                 <li><a href="#tab-about" data-toggle="pill">{{ tab_about }}</a></li>*/
/*               </ul>*/
/*             </div>*/
/*             <hr class="hidden-lg hidden-md">*/
/*             <div class="col-lg-10 col-md-9" style="border-left: 1px solid #eee;" >*/
/*               <div class="tab-content">*/
/*                 */
/*                 */
/*                 <!-- Tab Basic Settings . Begin -->*/
/*                 <div class="tab-pane active" id="tab-basic-settings">*/
/*                   <fieldset>*/
/*                     <div class="form-group">*/
/*                       <label class="col-sm-2 control-label" for="input-directory"><span data-toggle="tooltip" title="{{ help_directory }}">{{ entry_directory }}</span></label>*/
/*                       <div class="col-sm-10">*/
/*                         <select name="theme_nice_directory" id="input-directory" class="form-control">*/
/*                           {% for directory in directories %}*/
/*                             {% if directory == theme_nice_directory %}*/
/*                               <option value="{{ directory }}" selected="selected">{{ directory }}</option>*/
/*                             {% else %}*/
/*                               <option value="{{ directory }}">{{ directory }}</option>*/
/*                             {% endif %}*/
/*                           {% endfor %}*/
/*                         </select>*/
/*                       </div>*/
/*                     </div>*/
/*                     <legend>{{ text_product }}</legend>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-catalog-limit"><span data-toggle="tooltip" title="{{ help_product_limit }}">{{ entry_product_limit }}</span></label>*/
/*                       <div class="col-sm-10">*/
/*                         <input type="text" name="theme_nice_product_limit" value="{{ theme_nice_product_limit }}" placeholder="{{ entry_product_limit }}" id="input-catalog-limit" class="form-control" />*/
/*                         {% if error.product_limit is defined %}*/
/*                           <div class="text-danger">{{ error.product_limit }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-description-lenght"><span data-toggle="tooltip" title="{{ help_product_description_length }}">{{ entry_product_description_length }}</span></label>*/
/*                       <div class="col-sm-10">*/
/*                         <input type="text" name="theme_nice_product_description_length" value="{{ theme_nice_product_description_length }}" placeholder="{{ entry_product_description_length }}" id="input-description-lenght" class="form-control" />*/
/*                         {% if error.product_description_length is defined %}*/
/*                           <div class="text-danger">{{ error.product_description_length }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                   </fieldset>*/
/*                   <fieldset>*/
/*                     <legend>{{ text_image }}</legend>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-category-width">{{ entry_image_category }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_category_width" value="{{ theme_nice_image_category_width }}" placeholder="{{ entry_width }}" id="input-image-category-width" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_category_height" value="{{ theme_nice_image_category_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_category is defined %}*/
/*                           <div class="text-danger">{{ error.image_category }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-manufacturer-width">{{ entry_image_manufacturer }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_manufacturer_width" value="{{ theme_nice_image_manufacturer_width }}" placeholder="{{ entry_width }}" id="input-image-manufacturer-width" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_manufacturer_height" value="{{ theme_nice_image_manufacturer_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_manufacturer is defined %}*/
/*                           <div class="text-danger">{{ error.image_manufacturer }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-thumb-width">{{ entry_image_thumb }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_thumb_width" value="{{ theme_nice_image_thumb_width }}" placeholder="{{ entry_width }}" id="input-image-thumb-width" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_thumb_height" value="{{ theme_nice_image_thumb_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_thumb is defined %}*/
/*                           <div class="text-danger">{{ error.image_thumb }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-popup-width">{{ entry_image_popup }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_popup_width" value="{{ theme_nice_image_popup_width }}" placeholder="{{ entry_width }}" id="input-image-popup-width" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_popup_height" value="{{ theme_nice_image_popup_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_popup is defined %}*/
/*                           <div class="text-danger">{{ error.image_popup }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-product-width">{{ entry_image_product }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_product_width" value="{{ theme_nice_image_product_width }}" placeholder="{{ entry_width }}" id="input-image-product-width" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_product_height" value="{{ theme_nice_image_product_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_product is defined %}*/
/*                           <div class="text-danger">{{ error.image_product }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-additional-width">{{ entry_image_additional }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_additional_width" value="{{ theme_nice_image_additional_width }}" placeholder="{{ entry_width }}" id="input-image-additional-width" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_additional_height" value="{{ theme_nice_image_additional_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_additional is defined %}*/
/*                           <div class="text-danger">{{ error.image_additional }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-related">{{ entry_image_related }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_related_width" value="{{ theme_nice_image_related_width }}" placeholder="{{ entry_width }}" id="input-image-related" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_related_height" value="{{ theme_nice_image_related_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_related is defined %}*/
/*                           <div class="text-danger">{{ error.image_related }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-compare">{{ entry_image_compare }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_compare_width" value="{{ theme_nice_image_compare_width }}" placeholder="{{ entry_width }}" id="input-image-compare" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_compare_height" value="{{ theme_nice_image_compare_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_compare is defined %}*/
/*                           <div class="text-danger">{{ error.image_compare }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-wishlist">{{ entry_image_wishlist }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_wishlist_width" value="{{ theme_nice_image_wishlist_width }}" placeholder="{{ entry_width }}" id="input-image-wishlist" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_wishlist_height" value="{{ theme_nice_image_wishlist_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_wishlist is defined %}*/
/*                           <div class="text-danger">{{ error.image_wishlist }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-cart">{{ entry_image_cart }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_cart_width" value="{{ theme_nice_image_cart_width }}" placeholder="{{ entry_width }}" id="input-image-cart" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_cart_height" value="{{ theme_nice_image_cart_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_cart is defined %}*/
/*                           <div class="text-danger">{{ error.image_cart }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-image-location">{{ entry_image_location }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_location_width" value="{{ theme_nice_image_location_width }}" placeholder="{{ entry_width }}" id="input-image-location" class="form-control" />*/
/*                           </div>*/
/*                           <div class="col-sm-6">*/
/*                             <input type="text" name="theme_nice_image_location_height" value="{{ theme_nice_image_location_height }}" placeholder="{{ entry_height }}" class="form-control" />*/
/*                           </div>*/
/*                         </div>*/
/*                         {% if error.image_location is defined %}*/
/*                           <div class="text-danger">{{ error.image_location }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                   </fieldset>*/
/*                 </div> */
/*                 <!-- /Tab Basic Settings . End*/
/*                 ============================================================ -->*/
/*                 */
/*                 */
/*                 <!-- Tab Colors . Begin -->*/
/*                 <div class="tab-pane" id="tab-colors">*/
/*                   <fieldset>*/
/*                     <legend>{{ legend_colors_global }}</legend>*/
/*                     <div class="form-group color-presets">*/
/*                       <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="{{ help_color_preset }}">{{ entry_color_preset }}</span></label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #6667ab;" data-color="#6667ab"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #ea435d;" data-color="#ea435d"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #2ca5df;" data-color="#2ca5df"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #f85f77;" data-color="#f85f77"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #668aab;" data-color="#668aab"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #d1c485;" data-color="#d1c485"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #ab6466;" data-color="#ab6466"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #a2a2b4;" data-color="#a2a2b4"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #cd79a5;" data-color="#cd79a5"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #8485c0;" data-color="#8485c0"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #a34766;" data-color="#a34766"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #85a094;" data-color="#85a094"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #8766ab;" data-color="#8766ab"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #cd79a5;" data-color="#cd79a5"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #3d9869;" data-color="#3d9869"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #dd65a6;" data-color="#dd65a6"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #9a70a8;" data-color="#9a70a8"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #6ab990;" data-color="#6ab990"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #7c6486;" data-color="#7c6486"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #ebc078;" data-color="#ebc078"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #3d9869;" data-color="#3d9869"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #a6c756;" data-color="#a6c756"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #858597;" data-color="#858597"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #f48744;" data-color="#f48744"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #e6681b;" data-color="#e6681b"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #00a9ad;" data-color="#00a9ad"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #241c40;" data-color="#241c40"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #a2a2b4;" data-color="#a2a2b4"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #90af47;" data-color="#90af47"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #f48744;" data-color="#f48744"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #728f82;" data-color="#728f82"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #cdb97d;" data-color="#cdb97d"></span>*/
/*                         </div>*/
/*                         <div class="color-presets--item">*/
/*                           <span class="color-presets--color -primary" style="background: #a19572;" data-color="#a19572"></span>*/
/*                           <span class="color-presets--color -accent" style="background: #85a094;" data-color="#85a094"></span>*/
/*                         </div>*/
/* */
/*                       </div>*/
/*                     </div>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-color-primary"><span data-toggle="tooltip" title="{{ help_color_primary }}">{{ entry_color_primary }}</span></label>*/
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_primary__lighter_3" value="{{ theme_nice_color_primary__lighter_3 }}" placeholder="{{ entry_color_primary__lighter_3 }}" id="input-color-primary--lighter-3" class="form-control spectrum-2" />*/
/*                         {% if error.color_primary__lighter_3 is defined %}*/
/*                           <div class="text-danger">{{ error.color_primary__lighter_3 }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_primary__lighter_2" value="{{ theme_nice_color_primary__lighter_2 }}" placeholder="{{ entry_color_primary__lighter_2 }}" id="input-color-primary--lighter-2" class="form-control spectrum-2" />*/
/*                         {% if error.color_primary__lighter_2 is defined %}*/
/*                           <div class="text-danger">{{ error.color_primary__lighter_2 }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_primary__lighter_1" value="{{ theme_nice_color_primary__lighter_1 }}" placeholder="{{ entry_color_primary__lighter_1 }}" id="input-color-primary--lighter-1" class="form-control spectrum-2" />*/
/*                         {% if error.color_primary__lighter_1 is defined %}*/
/*                           <div class="text-danger">{{ error.color_primary__lighter_1 }}</div>*/
/*                         {% endif %}*/
/*                       </div>                    */
/* */
/*                       <div class="col-sm-2">*/
/*                         <input type="text" name="theme_nice_color_primary" value="{{ theme_nice_color_primary }}" placeholder="{{ entry_color_primary }}" id="input-color-primary" class="form-control spectrum" />*/
/*                         {% if error.color_primary is defined %}*/
/*                           <div class="text-danger">{{ error.color_primary }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/* */
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_primary__darker_1" value="{{ theme_nice_color_primary__darker_1 }}" placeholder="{{ entry_color_primary__darker_1 }}" id="input-color-primary--darker-1" class="form-control spectrum-2" />*/
/*                         {% if error.color_primary__darker_1 is defined %}*/
/*                           <div class="text-danger">{{ error.color_primary__darker_1 }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_primary__darker_2" value="{{ theme_nice_color_primary__darker_2 }}" placeholder="{{ entry_color_primary__darker_2 }}" id="input-color-primary--darker-2" class="form-control spectrum-2" />*/
/*                         {% if error.color_primary__darker_2 is defined %}*/
/*                           <div class="text-danger">{{ error.color_primary__darker_2 }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_primary__darker_3" value="{{ theme_nice_color_primary__darker_3 }}" placeholder="{{ entry_color_primary__darker_3 }}" id="input-color-primary--darker-3" class="form-control spectrum-2" />*/
/*                         {% if error.color_primary__darker_3 is defined %}*/
/*                           <div class="text-danger">{{ error.color_primary__darker_3 }}</div>*/
/*                         {% endif %}*/
/*                       </div>                    */
/*                     </div>*/
/* */
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-color-accent"><span data-toggle="tooltip" title="{{ help_color_accent }}">{{ entry_color_accent }}</span></label>*/
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_accent__lighter_3" value="{{ theme_nice_color_accent__lighter_3 }}" placeholder="{{ entry_color_accent__lighter_3 }}" id="input-color-accent--lighter-3" class="form-control spectrum-2" />*/
/*                         {% if error.color_accent__lighter_3 is defined %}*/
/*                           <div class="text-danger">{{ error.color_accent__lighter_3 }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_accent__lighter_2" value="{{ theme_nice_color_accent__lighter_2 }}" placeholder="{{ entry_color_accent__lighter_2 }}" id="input-color-accent--lighter-2" class="form-control spectrum-2" />*/
/*                         {% if error.color_accent__lighter_2 is defined %}*/
/*                           <div class="text-danger">{{ error.color_accent__lighter_2 }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_accent__lighter_1" value="{{ theme_nice_color_accent__lighter_1 }}" placeholder="{{ entry_color_accent__lighter_1 }}" id="input-color-accent--lighter-1" class="form-control spectrum-2" />*/
/*                         {% if error.color_accent__lighter_1 is defined %}*/
/*                           <div class="text-danger">{{ error.color_accent__lighter_1 }}</div>*/
/*                         {% endif %}*/
/*                       </div>                    */
/* */
/*                       <div class="col-sm-2">*/
/*                         <input type="text" name="theme_nice_color_accent" value="{{ theme_nice_color_accent }}" placeholder="{{ entry_color_accent }}" id="input-color-accent" class="form-control spectrum" />*/
/*                         {% if error.color_accent is defined %}*/
/*                           <div class="text-danger">{{ error.color_accent }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/* */
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_accent__darker_1" value="{{ theme_nice_color_accent__darker_1 }}" placeholder="{{ entry_color_accent__darker_1 }}" id="input-color-accent--darker-1" class="form-control spectrum-2" />*/
/*                         {% if error.color_accent__darker_1 is defined %}*/
/*                           <div class="text-danger">{{ error.color_accent__darker_1 }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_accent__darker_2" value="{{ theme_nice_color_accent__darker_2 }}" placeholder="{{ entry_color_accent__darker_2 }}" id="input-color-accent--darker-2" class="form-control spectrum-2" />*/
/*                         {% if error.color_accent__darker_2 is defined %}*/
/*                           <div class="text-danger">{{ error.color_accent__darker_2 }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                       <div class="col-sm-1">*/
/*                         <input type="text" name="theme_nice_color_accent__darker_3" value="{{ theme_nice_color_accent__darker_3 }}" placeholder="{{ entry_color_accent__darker_3 }}" id="input-color-accent--darker-3" class="form-control spectrum-2" />*/
/*                         {% if error.color_accent__darker_3 is defined %}*/
/*                           <div class="text-danger">{{ error.color_accent__darker_3 }}</div>*/
/*                         {% endif %}*/
/*                       </div>                    */
/*                     </div>*/
/*                   </fieldset>*/
/*                   <br>*/
/*                   <br>*/
/*                   <fieldset>*/
/*                     <legend>{{ legend_colors_of_element }}</legend>*/
/*                     <div class="form-group required">*/
/*                       <label class="col-sm-2 control-label" for="input-color-footer-bg">{{ entry_color_footer_bg }}</label>*/
/*                       <div class="col-sm-2">*/
/*                         <input type="text" name="theme_nice_color_footer_bg" value="{{ theme_nice_color_footer_bg }}" placeholder="{{ entry_color_footer_bg }}" id="input-color-footer-bg" class="form-control spectrum" />*/
/*                         {% if error.color_footer_bg is defined %}*/
/*                           <div class="text-danger">{{ error.color_footer_bg }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                   </fieldset>*/
/*                   */
/*                 </div>*/
/*                 <!-- /Tab Colors . End*/
/*                 ============================================================ -->*/
/*                 */
/*                 */
/*                 <!-- Tab Menu Top . Begin -->*/
/*                 <div class="tab-pane" id="tab-menu-top">*/
/*                   <div class="form-group">*/
/*                     <label class="col-sm-2 control-label">{{ entry_menu_top_status }}</label>*/
/*                     <div class="col-sm-10">*/
/*                       <div class="btn-group" data-toggle="buttons">*/
/*                         <label class="btn btn-default {% if not theme_nice_menu_top_status %} active {% endif %}">*/
/*                           <input type="radio" name="theme_nice_menu_top_status" value="0" {% if not theme_nice_menu_top_status %} checked {% endif %}>*/
/*                           <span >{{ text_disabled }}</span>*/
/*                         </label>*/
/*                         <label class="btn btn-default {% if theme_nice_menu_top_status %} active {% endif %}">*/
/*                           <input type="radio" name="theme_nice_menu_top_status" value="1" {% if theme_nice_menu_top_status %} checked {% endif %}>*/
/*                           <span >{{ text_enabled }}</span>*/
/*                         </label>*/
/*                       </div>*/
/*                     </div>*/
/*                   </div>*/
/*                   <hr>*/
/*                   <div class="form-group">*/
/*                     <label class="col-sm-2 control-label">{{ text_menu_top_items }}</label>*/
/*                     <div class="col-sm-10">*/
/*                       <table id="main-menu-items" class="table table-bordered">*/
/*                         <thead>*/
/*                           <tr>*/
/*                             <td class="nowrap">{{ text_title }}</td>*/
/*                             <td class="nowrap">{{ text_link }}</td>*/
/*                             <td class="nowrap">{{ text_sort_order }}</td>*/
/*                             <td class="w-1"></td>*/
/*                           </tr>*/
/*                         </thead>*/
/*                         <tbody>*/
/*                           {% set item_row_main = 0 %}*/
/*                           {% for theme_nice_menu_top_item in theme_nice_menu_top_items %}*/
/*                             <tr id="item-row-main{{ item_row_main }}">*/
/*                               <td class="text-left">*/
/*                                 {% for language in languages %}*/
/*                                   <div class="input-group input-group-sm pull-left">*/
/*                                     <span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/*                                     <input class="form-control" type="text" name="theme_nice_menu_top_item[{{ item_row_main }}][title][{{ language.language_id }}]" value="{{ theme_nice_menu_top_item.title[language.language_id] }}" />*/
/*                                   </div>*/
/*                                 {% endfor %}*/
/*                               </td>*/
/*                               <td class="text-left">*/
/*                                 {% for language in languages %}*/
/*                                   <div class="input-group input-group-sm pull-left">*/
/*                                     <span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/*                                     <input class="form-control" type="text" name="theme_nice_menu_top_item[{{ item_row_main }}][link][{{ language.language_id }}]" value="{{ theme_nice_menu_top_item.link[language.language_id] }}" />*/
/*                                   </div>*/
/*                                 {% endfor %}*/
/*                               </td>*/
/*                               <td class="text-left">*/
/*                                 <input  class="form-control" type="text" name="theme_nice_menu_top_item[{{ item_row_main }}][sort_order]" value="{{ theme_nice_menu_top_item.sort_order }}" />*/
/*                               </td>*/
/*                               <td class="text-right">*/
/*                                 <a class="btn btn-danger" onclick="$('#item-row-main{{ item_row_main }}').remove();" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash-o"></i></a>*/
/*                               </td>*/
/*                             </tr>*/
/*                             {% set item_row_main = item_row_main + 1 %}*/
/*                           {% endfor %}*/
/*                         </tbody>*/
/*                         <tfoot>*/
/*                           <tr>*/
/*                             <td colspan="3"></td>*/
/*                             <td class="text-right"><a class="btn btn-default" onclick="addItemMain();" data-toggle="tooltip" title="Добавить"><i class="fa fa-plus"></i></a></td>*/
/*                           </tr>*/
/*                         </tfoot>*/
/*                       </table>*/
/*                       <script>*/
/*                         var item_row_main = {{ item_row_main }};*/
/*                                 function addItemMain() {*/
/*                                   html = '<tr id="item-row-main' + item_row_main + '">';*/
/*                                   html += '<td class="text-left">';*/
/*                         {% for language in languages %}*/
/*                                     html += '<div class="input-group input-group-sm pull-left"><span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>';*/
/*                                     html += '<input class="form-control" type="text" name="theme_nice_menu_top_item[' + item_row_main + '][title][{{ language.language_id }}]" value="" />';*/
/*                                     html += '</div>';*/
/*                         {% endfor %}*/
/*                                     html += '</td>';*/
/*                                     html += '<td class="text-left">';*/
/*                         {% for language in languages %}*/
/*                                     html += '<div class="input-group input-group-sm pull-left"><span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>';*/
/*                                     html += '<input class="form-control"  type="text" name="theme_nice_menu_top_item[' + item_row_main + '][link][{{ language.language_id }}]" value="" />';*/
/*                                     html += '</div>';*/
/*                         {% endfor %}*/
/*                                     html += '</td>';*/
/*                                     html += '<td class="text-left"><input class="form-control" type="text" name="theme_nice_menu_top_item[' + item_row_main + '][sort_order]" size="1" value="0" /></td>';*/
/*                                     html += '<td class="text-right"><a class="btn btn-danger" onclick="$(\'#item-row-main' + item_row_main + '\').remove();" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash-o"></i></a></td>';*/
/*                                     html += '</tr>';*/
/*                                     $('#main-menu-items tbody').append(html);*/
/*                                     ;*/
/*                                     item_row_main++;*/
/*                                   }*/
/*                       </script> */
/*                     </div>*/
/*                   </div>*/
/*                 </div>*/
/*                 <!-- /Tab Menu Top . End*/
/*                 ============================================================ -->*/
/*                 */
/*                 <!-- Tab Page Home . Begin -->*/
/*                 <div class="tab-pane" id="tab-page-home">*/
/*                   <fieldset>*/
/*                     <legend>{{ legend_home_slideshow }}</legend>*/
/*                     <div class="form-group">*/
/*                       <label class="col-sm-2 control-label">{{ entry_home_slideshow_status }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="btn-group" data-toggle="buttons">*/
/*                           <label class="btn btn-default {% if not theme_nice_home_slideshow_status %} active {% endif %}">*/
/*                             <input type="radio" name="theme_nice_home_slideshow_status" value="0" {% if not theme_nice_home_slideshow_status %} checked {% endif %}>*/
/*                             <span >{{ text_disabled }}</span>*/
/*                           </label>*/
/*                           <label class="btn btn-default {% if theme_nice_home_slideshow_status %} active {% endif %}">*/
/*                             <input type="radio" name="theme_nice_home_slideshow_status" value="1" {% if theme_nice_home_slideshow_status %} checked {% endif %}>*/
/*                             <span >{{ text_enabled }}</span>*/
/*                           </label>*/
/*                         </div>*/
/*                       </div>*/
/*                     </div>*/
/*                     <hr>*/
/*                     <div class="form-group">*/
/*                       <label class="col-sm-2 control-label">{{ text_home_slideshow }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="inline-block">*/
/*                           <select name="theme_nice_home_slideshow_id" class="form-control">*/
/*                             <option value="0">{{ text_select }}</option>*/
/*                             {% for slideshow in slideshows %}*/
/*                               {% if slideshow.slideshow_id == theme_nice_home_slideshow_id %}*/
/*                               <option value="{{ slideshow.slideshow_id }}" selected="selected">{{ slideshow.name }}</option>*/
/*                               {% else %}*/
/*                               <option value="{{ slideshow.slideshow_id }}">{{ slideshow.name }}</option>*/
/*                               {% endif %}*/
/*                             {% endfor %}*/
/*                           </select>*/
/*                           {% if error.home_slideshow_id is defined %}*/
/*                           <div class="text-danger">{{ error.home_slideshow_id }}</div>*/
/*                           {% endif %}*/
/*                         </div>*/
/*                         <i>{{ see_nice_slideshows }}</i>*/
/*                       </div>*/
/*                     </div>*/
/*                     <hr>*/
/*                     <div class="form-group">*/
/*                       <label class="col-sm-2 control-label" for="input-home-slideshow-width">{{ entry_home_slideshow_width }}</label>*/
/*                       <div class="col-sm-4">*/
/*                         <input type="text" name="theme_nice_home_slideshow_width" value="{{ theme_nice_home_slideshow_width }}" placeholder="{{ entry_width }}" id="input-home-slideshow-width" class="form-control" />*/
/*                         {% if error.home_slideshow_width is defined %}*/
/*                         <div class="text-danger">{{ error.home_slideshow_width }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                       <label class="col-sm-2 control-label" for="input-home-slideshow-height">{{ entry_home_slideshow_height }}</label>*/
/*                       <div class="col-sm-4">*/
/*                         <input type="text" name="theme_nice_home_slideshow_height" value="{{ theme_nice_home_slideshow_height }}" placeholder="{{ entry_height }}" id="input-home-slideshow-height" class="form-control" />*/
/*                         {% if error.home_slideshow_height is defined %}*/
/*                         <div class="text-danger">{{ error.home_slideshow_height }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                   </fieldset>*/
/*                   <fieldset>*/
/*                     <legend>{{ legend_home_banners_near_slideshow }}</legend>*/
/*                     <div class="form-group">*/
/*                       <label class="col-sm-2 control-label">{{ entry_home_banners_near_slideshow_status }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="btn-group" data-toggle="buttons">*/
/*                           <label class="btn btn-default {% if not theme_nice_home_banner_near_slideshow_status %} active {% endif %}">*/
/*                             <input type="radio" name="theme_nice_home_banner_near_slideshow_status" value="0" {% if not theme_nice_home_banner_near_slideshow_status %} checked {% endif %}>*/
/*                             <span >{{ text_disabled }}</span>*/
/*                           </label>*/
/*                           <label class="btn btn-default {% if theme_nice_home_banner_near_slideshow_status %} active {% endif %}">*/
/*                             <input type="radio" name="theme_nice_home_banner_near_slideshow_status" value="1" {% if theme_nice_home_banner_near_slideshow_status %} checked {% endif %}>*/
/*                             <span >{{ text_enabled }}</span>*/
/*                           </label>*/
/*                         </div>*/
/*                       </div>*/
/*                     </div>*/
/*                     <hr>*/
/*                     <ul class="nav nav-tabs" id="home-banner-language">*/
/*                       {% for language in languages %}*/
/*                       <li><a href="#home-banner-language-{{ language.language_id }}" data-toggle="tab"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /> {{ language.name }}</a></li>*/
/*                       {% endfor %}*/
/*                     </ul>*/
/*                     <div class="tab-content">*/
/*                       {% for language in languages %}*/
/*                       <div class="tab-pane fade" id="home-banner-language-{{ language.language_id }}">*/
/*                         <div class="table-responsive">*/
/*                           <table class="table table-striped table-bordered table-hover">*/
/*                             <thead>*/
/*                               <tr>*/
/*                                 <td class="text-left col-sm-2">{{ text_images }}</td>*/
/*                                 <td class="text-left col-sm-10">{{ text_links }}</td>*/
/*                               </tr>*/
/*                             </thead>*/
/*                             <tbody>*/
/*                               <tr>*/
/*                                 <td class="text-left"><a href="" id="thumb-banners-near-slideshow-{{ language.language_id }}-1" data-toggle="image" class="img-thumbnail"><img src="{{ thumb_home_banners_1[language.language_id] }}" alt="" title="" data-placeholder="{{ placeholder }}"/></a> <input type="hidden" name="theme_nice_home_banner_1[{{ language.language_id }}]" value="{{ theme_nice_home_banner_1[language.language_id] }}" id="input-home-banners-near-slideshow-{{ language.language_id }}-1"/></td>*/
/*                                 <td><input type="text" name="theme_nice_home_banner_1_link[{{ language.language_id }}]" value="{{ theme_nice_home_banner_1_link[language.language_id] }}" placeholder="{{ text_link }}" class="form-control" /></td>*/
/*                               </tr>*/
/*                               <tr>*/
/*                                 <td class="text-left"><a href="" id="thumb-banners-near-slideshow-{{ language.language_id }}-2" data-toggle="image" class="img-thumbnail"><img src="{{ thumb_home_banners_2[language.language_id] }}" alt="" title="" data-placeholder="{{ placeholder }}"/></a> <input type="hidden" name="theme_nice_home_banner_2[{{ language.language_id }}]" value="{{ theme_nice_home_banner_2[language.language_id] }}" id="input-home-banners-near-slideshow-{{ language.language_id }}-2"/></td>*/
/*                                 <td><input type="text" name="theme_nice_home_banner_2_link[{{ language.language_id }}]" value="{{ theme_nice_home_banner_2_link[language.language_id] }}" placeholder="{{ text_link }}" class="form-control" /></td>*/
/*                               </tr>*/
/*                             </tbody>*/
/*                           </table>*/
/*                         </div>*/
/*                       */
/*                       </div>*/
/*                       {% endfor %}*/
/*                     </div>*/
/*                     <script type="text/javascript">*/
/*                     $('#home-banner-language a:first').tab('show');*/
/*                     </script> */
/*                         */
/*                   </fieldset>*/
/*                 </div>*/
/*                 <!-- /Tab Page Home . End*/
/*                 ============================================================ -->*/
/*                 */
/*                 */
/*                 <!-- Tab Page Product . Begin -->*/
/*                 <div class="tab-pane" id="tab-product-list">*/
/*                   <div class="form-group">*/
/*                     <label class="col-sm-2 control-label">{{ entry_productlist_image_margins }}</label>*/
/*                     <div class="col-sm-10">*/
/*                       <div class="row">*/
/*                         <label class="radio-inline col-sm-4">*/
/*                           <input type="radio" name="theme_nice_productlist_image_margins" value="0" {% if not theme_nice_productlist_image_margins %} checked {% endif %}>*/
/*                           {{ text_productlist_image_margins_yes }}*/
/*                           <img src="view/image/nice/productlist_image_1.jpg" class="img-responsive">*/
/*                         </label>*/
/*                         <label  class="radio-inline col-sm-4">*/
/*                           <input type="radio" name="theme_nice_productlist_image_margins" value="1" {% if theme_nice_productlist_image_margins %} checked {% endif %}>*/
/*                           {{ text_productlist_image_margins_no }}*/
/*                           <img src="view/image/nice/productlist_image_2.jpg" class="img-responsive">*/
/*                         </label>*/
/*                       </div>*/
/*                     </div>*/
/*                   </div>*/
/*                   <div class="form-group">*/
/*                     <label class="col-sm-2 control-label">{{ entry_productlist_description }}</label>*/
/*                     <div class="col-sm-10">*/
/*                       <div class="row">*/
/*                       <label class="radio-inline col-sm-4">*/
/*                         <input type="radio" name="theme_nice_productlist_description" value="0" {% if not theme_nice_productlist_description %} checked {% endif %}>*/
/*                         <span >{{ text_disabled }}</span>*/
/*                         <img src="view/image/nice/productlist_description_disabled.jpg" class="img-responsive">*/
/*                       </label>*/
/*                       <label class="radio-inline col-sm-4">*/
/*                         <input type="radio" name="theme_nice_productlist_description" value="1" {% if theme_nice_productlist_description %} checked {% endif %}>*/
/*                         <span >{{ text_enabled }}</span>*/
/*                         <img src="view/image/nice/productlist_description_enabled.jpg" class="img-responsive">*/
/*                       </label>*/
/*                       </div>*/
/*                     </div>*/
/*                   </div>*/
/*                   <div class="depended-from-productlist-description">*/
/*                     <hr>*/
/*                     <div class="form-group">*/
/*                       <label class="col-sm-2 control-label">{{ entry_productlist_description_on_mobile }}</label>*/
/*                       <div class="col-sm-10">*/
/*                         <div class="row">*/
/*                         <label class="radio-inline col-sm-5">*/
/*                           <input type="radio" name="theme_nice_productlist_description_on_mobile" value="0" {% if not theme_nice_productlist_description_on_mobile %} checked {% endif %}>*/
/*                           <span >{{ text_disabled }}</span>*/
/*                           <img src="view/image/nice/productlist_description_on_mobile_disabled.jpg" class="img-responsive">*/
/*                         </label>*/
/*                         <label class="radio-inline col-sm-5">*/
/*                           <input type="radio" name="theme_nice_productlist_description_on_mobile" value="1" {% if theme_nice_productlist_description_on_mobile %} checked {% endif %}>*/
/*                           <span >{{ text_enabled }}</span>*/
/*                           <img src="view/image/nice/productlist_description_on_mobile_enabled.jpg" class="img-responsive">*/
/*                         </label>*/
/*                         </div>*/
/*                       </div>*/
/*                     </div>*/
/*                   </div>*/
/*                   <hr>*/
/*                   <div class="form-group">*/
/*                     <label class="col-sm-2 control-label">{{ entry_productlist_name_font_weight }}</label>*/
/*                     <div class="col-sm-10">*/
/*                       <div class="row">*/
/*                         <label class="radio-inline col-sm-4">*/
/*                           <input type="radio" name="theme_nice_productlist_name_font_weight" value="regular" {% if 'regular' == theme_nice_productlist_name_font_weight %} checked {% endif %}> */
/*                           <span >{{ text_regular }}</span>*/
/*                           <img src="view/image/nice/productlist_name_font_weight_regular.jpg" class="img-responsive">*/
/*                         </label>*/
/*                         <label class="radio-inline col-sm-4">*/
/*                           <input type="radio" name="theme_nice_productlist_name_font_weight" value="bold" {% if 'bold' == theme_nice_productlist_name_font_weight %} checked {% endif %}>*/
/*                           <span >{{ text_bold }}</span>*/
/*                           <img src="view/image/nice/productlist_name_font_weight_bold.jpg" class="img-responsive">*/
/*                         </label>*/
/*                       </div>*/
/*                     </div>*/
/*                   </div>*/
/*                   <hr>*/
/*                   <div class="form-group">*/
/*                     <label class="col-sm-2 control-label">{{ entry_productlist_price_font_weight }}</label>*/
/*                     <div class="col-sm-10">*/
/*                       <div class="row">*/
/*                         <label class="radio-inline col-sm-4">*/
/*                           <input type="radio" name="theme_nice_productlist_price_font_weight" value="regular" {% if 'regular' == theme_nice_productlist_price_font_weight %} checked {% endif %}> */
/*                           <span >{{ text_regular }}</span>*/
/*                           <img src="view/image/nice/productlist_price_font_weight_regular.jpg" class="img-responsive">*/
/*                         </label>*/
/*                         <label class="radio-inline col-sm-4">*/
/*                           <input type="radio" name="theme_nice_productlist_price_font_weight" value="bold" {% if 'bold' == theme_nice_productlist_price_font_weight %} checked {% endif %}>*/
/*                           <span >{{ text_bold }}</span>*/
/*                           <img src="view/image/nice/productlist_price_font_weight_bold.jpg" class="img-responsive">*/
/*                         </label>*/
/*                       </div>*/
/*                     </div>*/
/*                   </div>*/
/*                   <div class="form-group">*/
/*                     <label class="col-sm-2 control-label">{{ entry_productlist_grid_hover_effect }}</label>*/
/*                     <div class="col-sm-10">*/
/*                       <div class="row">*/
/*                       <label class="radio-inline col-sm-5">*/
/*                         <input type="radio" name="theme_nice_productlist_grid_hover_effect" value="0" {% if not theme_nice_productlist_grid_hover_effect %} checked {% endif %}>*/
/*                         <span >{{ text_disabled }}</span>*/
/*                         <img src="view/image/nice/productlist_grid_hover_effect_disabled.jpg" class="img-responsive">*/
/*                       </label>*/
/*                       <label class="radio-inline col-sm-5">*/
/*                         <input type="radio" name="theme_nice_productlist_grid_hover_effect" value="1" {% if theme_nice_productlist_grid_hover_effect %} checked {% endif %}>*/
/*                         <span >{{ text_enabled }}</span>*/
/*                         <img src="view/image/nice/productlist_grid_hover_effect_enabled.jpg" class="img-responsive">*/
/*                       </label>*/
/*                       </div>*/
/*                     </div>*/
/*                   </div>*/
/*                   <div class="form-group">*/
/*                     <label class="col-sm-2 control-label">{{ entry_productlist_cols_on_mobile }}</label>*/
/*                     <div class="col-sm-10">*/
/*                       <div class="row">*/
/*                       <label class="radio-inline col-sm-5">*/
/*                         <input type="radio" name="theme_nice_productlist_cols_on_mobile" value="1" {% if 1 == theme_nice_productlist_cols_on_mobile %} checked {% endif %}>*/
/*                         <span >{{ text_1_col }}</span>*/
/*                         <img src="view/image/nice/productlist_cols_on_mobile_1.jpg" class="img-responsive">*/
/*                       </label>*/
/*                       <label class="radio-inline col-sm-5">*/
/*                         <input type="radio" name="theme_nice_productlist_cols_on_mobile" value="2" {% if 2 == theme_nice_productlist_cols_on_mobile %} checked {% endif %}>*/
/*                         <span >{{ text_2_cols }}</span>*/
/*                         <img src="view/image/nice/productlist_cols_on_mobile_2.jpg" class="img-responsive">*/
/*                       </label>*/
/*                       </div>*/
/*                     </div>*/
/*                   </div>*/
/*                   */
/*                 </div>*/
/*                 <!-- /Tab Page Product . End*/
/*                 ============================================================ -->*/
/*                 */
/*                 */
/*                 <!-- Tab Product List . Begin -->*/
/*                 <div class="tab-pane" id="tab-page-product">*/
/*                   <div class="form-group required">*/
/*                     <label class="col-sm-2 control-label" for="input-page-product-shortdescription-lenght"><span data-toggle="tooltip" title="{{ help_page_product_shortdescritipon_length }}">{{ entry_page_product_shortdescritipon_length }}</span></label>*/
/*                       <div class="col-sm-10">*/
/*                         <input type="text" name="theme_nice_page_product_shortdescritipon_length" value="{{ theme_nice_page_product_shortdescritipon_length }}" placeholder="{{ entry_page_product_shortdescritipon_length }}" id="input-page-product-shortdescription-lenght" class="form-control" />*/
/*                         {% if error.page_product_shortdescritipon_length is defined %}*/
/*                           <div class="text-danger">{{ error.page_product_shortdescritipon_length }}</div>*/
/*                         {% endif %}*/
/*                       </div>*/
/*                     </div>*/
/*                   <hr>*/
/*                 </div>*/
/*                 <!-- /Tab Page Product . End*/
/*                 ============================================================ -->*/
/*                 */
/*                 <!-- Tab Footer . Begin -->*/
/*                 {#<div class="tab-pane" id="tab-footer">*/
/*                   <div class="form-group">*/
/*                     <label class="col-sm-3 control-label">{{ entry_footer_icons }}</label>*/
/*                     <div class="col-sm-9">*/
/*                       <div class="btn-group" data-toggle="buttons">*/
/*                         <label class="btn btn-default {% if not theme_nice_pay_icons_toggle %} active {% endif %}">*/
/*                           <input type="radio" name="theme_nice_pay_icons_toggle" value="0" {% if not theme_nice_pay_icons_toggle %} checked {% endif %}>*/
/*                           <span >{{ text_enabled }}</span>*/
/*                         </label>*/
/*                         <label class="btn btn-default {% if theme_nice_pay_icons_toggle %} active {% endif %}">*/
/*                           <input type="radio" name="theme_nice_pay_icons_toggle" value="1" {% if theme_nice_pay_icons_toggle %} checked {% endif %}>*/
/*                           <span >{{ text_disabled }}</span>*/
/*                         </label>*/
/*                       </div>*/
/*                     </div>*/
/*                   </div>*/
/*                   <hr>*/
/*                   <div class="form-group">*/
/*                     <label class="col-sm-3 control-label">{{ text_banner }}</label>*/
/*                     <div class="col-sm-9">*/
/*                       <div class="inline-block">*/
/*                         <select name="theme_nice_pay_icons_banner_id" class="form-control">*/
/*                           <option value="-1">{{ text_select }}</option>*/
/*                           {% for banner in banners %}*/
/*                             {% if banner.banner_id == theme_nice_pay_icons_banner_id %}*/
/*                               <option value="{{ banner.banner_id }}" selected="selected">{{ banner.name }}</option>*/
/*                             {% else %}*/
/*                               <option value="{{ banner.banner_id }}">{{ banner.name }}</option>*/
/*                             {% endif %}*/
/*                           {% endfor %}*/
/*                         </select>*/
/*                       </div>*/
/*                     </div>*/
/*                   </div>*/
/*                 </div>#}*/
/*                 <!-- /Tab Footer . End*/
/*                 ============================================================ -->*/
/*                 */
/*                 */
/*                 <!-- Tab About . Begin -->*/
/*                 <div class="tab-pane" id="tab-about">*/
/*                   <div>*/
/*                     <h3>{{ about_title }}</h3>*/
/*                     <br>*/
/*                     <img class="img-responsive" style="width: 200px; float: left; margin-right: 16px;" src="view/image/nice/about/logo-7-e-nunito-sans.png" />*/
/*                     {{ about_text }}*/
/*                     <br class="clear">*/
/*                   </div>*/
/*                   <br>*/
/*                   <br>*/
/*                   <div>*/
/*                     <h3>{{ about_open_source }}</h3>*/
/*                     <br>*/
/*                     <img class="img-responsive" style="width: 200px; float: left; margin-right: 16px;" src="view/image/nice/about/open-source.png" />*/
/*                     {{ about_open_source_text }}*/
/*                     <br class="clear">*/
/*                   </div>*/
/*                   <br>*/
/*                   <br>*/
/*                   <br>*/
/*                   <div>*/
/*                     <h3>{{ about_author_title }}</h3>*/
/*                     <br>*/
/*                     <img class="img-responsive" style="width: 200px; float: left; margin-right: 16px; border-radius: 50%;" src="view/image/nice/about/serge-tkach-200px.jpg" />*/
/*                     {{ about_author_text }}*/
/*                     <br class="clear">*/
/*                   </div>*/
/*                   <br>*/
/*                                 */
/*                 </div>*/
/*                 <!-- /Tab About . End*/
/*                 ============================================================ -->*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*         </form>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* */
/* <script>*/
/* $('.spectrum').spectrum({*/
/*   type: "component",*/
/*   hideAfterPaletteSelect: true,*/
/*   showInput: true,*/
/*   showInitial: true,*/
/*   allowEmpty: false*/
/* });*/
/* */
/* $('.spectrum-2').spectrum({*/
/*   type: "component",*/
/*   hideAfterPaletteSelect: true,*/
/*   showPalette: false,*/
/*   showInput: true,*/
/*   showInitial: true,*/
/*   allowEmpty: false*/
/* });*/
/* </script>*/
/* */
/* <script>*/
/* $('.color-presets--item').click(function() {*/
/*   $('#input-color-primary').val($(this).children('.-primary').data('color'));*/
/*   $('#input-color-primary').trigger('change');*/
/*   $('#input-color-accent').val($(this).children('.-accent').data('color'));*/
/*   $('#input-color-accent').trigger('change');*/
/* });*/
/* </script>*/
/* */
/* <script>*/
/* $('#input-color-primary').change(function() {*/
/*   $.ajax({*/
/* 		url: 'index.php?route=extension/theme/nice/getColorTonesByAjax&color=' + encodeURIComponent($('#input-color-primary').val()) + '&user_token={{ user_token }}',*/
/*     method: 'GET',*/
/* 		dataType: 'json',*/
/* 		success: function(json) {*/
/*       if (undefined !== json['tones']) {*/
/*         $('#input-color-primary--darker-1').val(json['tones']['darker-1']); $('#input-color-primary--darker-1').trigger('change');*/
/*         $('#input-color-primary--darker-2').val(json['tones']['darker-2']); $('#input-color-primary--darker-2').trigger('change');*/
/*         $('#input-color-primary--darker-3').val(json['tones']['darker-3']); $('#input-color-primary--darker-3').trigger('change');*/
/*         $('#input-color-primary--lighter-1').val(json['tones']['lighter-1']); $('#input-color-primary--lighter-1').trigger('change');*/
/*         $('#input-color-primary--lighter-2').val(json['tones']['lighter-2']); $('#input-color-primary--lighter-2').trigger('change');*/
/*         $('#input-color-primary--lighter-3').val(json['tones']['lighter-3']); $('#input-color-primary--lighter-3').trigger('change');*/
/*       }*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/*   */
/* });*/
/* $('#input-color-accent').change(function() {*/
/*   */
/*   $.ajax({*/
/* 		url: 'index.php?route=extension/theme/nice/getColorTonesByAjax&color=' + encodeURIComponent($('#input-color-accent').val()) + '&user_token={{ user_token }}',*/
/*     method: 'GET',*/
/* 		dataType: 'json',*/
/* 		success: function(json) {*/
/*       if (undefined !== json['tones']) {*/
/*         $('#input-color-accent--darker-1').val(json['tones']['darker-1']); $('#input-color-accent--darker-1').trigger('change');*/
/*         $('#input-color-accent--darker-2').val(json['tones']['darker-2']); $('#input-color-accent--darker-2').trigger('change');*/
/*         $('#input-color-accent--darker-3').val(json['tones']['darker-3']); $('#input-color-accent--darker-3').trigger('change');*/
/*         $('#input-color-accent--lighter-1').val(json['tones']['lighter-1']); $('#input-color-accent--lighter-1').trigger('change');*/
/*         $('#input-color-accent--lighter-2').val(json['tones']['lighter-2']); $('#input-color-accent--lighter-2').trigger('change');*/
/*         $('#input-color-accent--lighter-3').val(json['tones']['lighter-3']); $('#input-color-accent--lighter-3').trigger('change');*/
/*       }*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/*   */
/*   */
/* });*/
/* </script>*/
/*                           */
/* <script>*/
/* $(document).ready(function() {*/
/*   if ($("input[name='theme_nice_productlist_description']:checked").val() == 1) {*/
/*     $(".depended-from-productlist-description").show();*/
/*   } else {*/
/*     $(".depended-from-productlist-description").hide();*/
/*   }*/
/*   */
/* }); */
/*   */
/* $("input[name='theme_nice_productlist_description']").on("change", function() {*/
/*   if (1 == $(this).val()) {*/
/*     $(".depended-from-productlist-description").slideDown();*/
/*   } else {*/
/*     $(".depended-from-productlist-description").slideUp();*/
/*     $(".depended-from-productlist-description").find("input[value='0']").prop("checked", true);*/
/*   }*/
/* });*/
/* </script>*/
/* {{ footer }}*/
