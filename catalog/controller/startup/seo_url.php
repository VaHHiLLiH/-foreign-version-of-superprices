<?php
class ControllerStartupSeoUrl extends Controller {
    public function index() {
        // Add rewrite to url class
        if ($this->config->get('config_seo_url')) {
            $this->url->addRewrite($this);
        }

        // Decode URL
        if (isset($this->request->get['_route_'])) {


            $parts = explode('/', $this->request->get['_route_']);
            /*$type_page = NULL;
            if (!empty($parts[0])) {
                $type_page = $parts[0];
            }*/

            // remove any empty arrays from trailing
            if (utf8_strlen(end($parts)) == 0) {
                array_pop($parts);
            }

            // make beauty path PRODUCT
            $search = array_search('product', $parts);
            if ($search !== false) {
                unset($parts[$search]);
            }
            $search = array_search('manufacturer', $parts);
            if ($search !== false) {
                unset($parts[$search]);
            }
            // make beauty path CATEGORY
            $search = array_search('category', $parts);
            if ($search !== false) {
                unset($parts[$search]);
            }
            $search = array_search('blog', $parts);
            if ($search !== false) {
                unset($parts[$search]);
            }
            $search = array_search('rating', $parts);
            if ($search !== false) {
                unset($parts[$search]);
            }

            foreach ($parts as $part) {

                $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE keyword = '" . $this->db->escape($part) . "'");
                /*---------Это Костыль, надеюсь временный----------*/
                /*$query_string = "SELECT * FROM " . DB_PREFIX . "seo_url WHERE keyword = '" . $this->db->escape($part) . "'";
                if (!empty($type_page)) {
                   $query_string .= " AND query LIKE '" . $type_page . "%'";
               }
               $query = $this->db->query($query_string);*/
                /*-------------------------------------------------*/
                if ($query->num_rows) {
                    $url = explode('=', $query->row['query']);

                    if ($url[0] == 'product_id') {
                        $this->request->get['product_id'] = $url[1];
                    }


                    if($url[0] == 'simple_blog_article_id') {
                        $this->request->get['simple_blog_article_id'] = $url[1];
                    }
                    if($url[0] == 'simple_blog_rating_id') {

                        $this->request->get['simple_blog_rating_id'] = $url[1];

                    }
                    if($url[0] == 'simple_blog_author_id') {
                        $this->request->get['simple_blog_author_id'] = $url[1];
                    }

                    if ($url[0] == 'simple_blog_category_id') {
                        if (!isset($this->request->get['simple_blog_category_id'])) {
                            $this->request->get['simple_blog_category_id'] = $url[1];
                        } else {
                            $this->request->get['simple_blog_category_id'] .= '_' . $url[1];
                        }
                    }


                    if ($url[0] == 'category_id') {
                        if (!isset($this->request->get['path'])) {
                            $this->request->get['path'] = $url[1];
                        } else {
                            $this->request->get['path'] .= '_' . $url[1];
                        }
                    }

                    if ($url[0] == 'manufacturer_id') {
                        $this->request->get['manufacturer_id'] = $url[1];
                    }

                    if ($url[0] == 'information_id') {
                        $this->request->get['information_id'] = $url[1];
                    }

                    if ($query->row['query'] && $url[0] != 'information_id' && $url[0] != 'manufacturer_id' && $url[0] != 'category_id' && $url[0] != 'product_id' && $url[0] != 'simple_blog_rating_id') {
                        $this->request->get['route'] = $query->row['query'];
                    }
                } else {

                    /*if($this->db->escape($part) == 'blog') {

                    } else {
                        $this->request->get['route'] = 'error/not_found';

                        break;
                    }*/

                    if(($this->config->has('simple_blog_seo_keyword')) && ($this->db->escape($part) == $this->config->get('simple_blog_seo_keyword'))) {

                    } else if($this->db->escape($part) == 'blog') {

                    } else {
                        $this->request->get['route'] = 'error/not_found';

                        break;
                    }


                }
            }

            if (!isset($this->request->get['route'])) {
                if (isset($this->request->get['product_id'])) {
                    $this->request->get['route'] = 'product/product';
                } elseif (isset($this->request->get['path'])) {
                    $this->request->get['route'] = 'product/category';
                }  elseif (isset($this->request->get['simple_blog_rating_id'])) {
                    $this->request->get['route'] = 'simple_blog/rating';
                }elseif (isset($this->request->get['manufacturer_id'])) {
                    $this->request->get['route'] = 'product/manufacturer/info';
                } elseif (isset($this->request->get['information_id'])) {

                    $this->request->get['route'] = 'information/information';
                }
                if($this->request->get['_route_'] == 'blog') {
                    $this->request->get['route'] = 'simple_blog/article';
                }
            }   }
    }
    public function rewrite($link) {
        $url_info = parse_url(str_replace('&amp;', '&', $link));

        $url = '';

        $data = array();

        parse_str($url_info['query'], $data);

        foreach ($data as $key => $value) {

            if (isset($data['route'])) {
                if (($data['route'] == 'product/product' && $key == 'product_id') || ($data['route'] == 'information/information' && $key == 'information_id')) {
                    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "'");

                    $url .= ($data['route'] == 'product/product' && $key == 'product_id') ? '/product' : '';
                    if ($query->num_rows && $query->row['keyword']) {
                        $url .= '/' . $query->row['keyword'];

                        unset($data[$key]);
                    }

                } else if($data['route'] == 'product/manufacturer/info' && $key == 'manufacturer_id') {

                    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "'");

                    $url .= ($data['route'] == 'product/manufacturer/info' && $key == 'manufacturer_id') ? '/brand' : '';
                    if ($query->num_rows && $query->row['keyword']) {
                        $url .= '/brand/' . $query->row['keyword'];

                        unset($data[$key]);
                    }

                }else if($data['route'] == 'simple_blog/article/view' && $key == 'simple_blog_article_id') {

                    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "'");

                    if ($query->num_rows) {
                        $url .= '/blog/' . $query->row['keyword'];
                        unset($data[$key]);
                    } else {
                        $url .= '/blog/' . (int)$value;
                        unset($data[$key]);
                    }

                } else if($data['route'] == 'simple_blog/rating' && $key == 'simple_blog_rating_id') {

                    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "'");

                    if ($query->num_rows) {
                        $url .= '/rating/' . $query->row['keyword'];
                        unset($data[$key]);
                    } else {
                        $url .= '/rating/' . (int)$value;
                        unset($data[$key]);
                    }

                } else if($data['route'] == 'simple_blog/author' && $key == 'simple_blog_author_id') {
                    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "'");

                    if ($query->num_rows) {
                        $url .= '/blog/' . $query->row['keyword'];
                        unset($data[$key]);
                    } else {
                        $url .= '/blog/' . (int)$value;
                        unset($data[$key]);
                    }
                } else if($data['route'] == 'simple_blog/category' && $key == 'simple_blog_category_id') {

                    $blog_categories = explode("_", $value);

                    foreach ($blog_categories as $blog_category) {
                        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = 'simple_blog_category_id=" . (int)$blog_category . "'");

                        if ($query->num_rows) {
                            $url .= '/blog/' . $query->row['keyword'];
                            unset($data[$key]);
                        } else {
                            $url .= '/blog/' . $blog_category;
                            unset($data[$key]);
                        }
                    }
                    unset($data[$key]);

                } else if($data['route'] == 'simple_blog/search') {
                    //echo $data['route'];
                    if(isset($key) && ($key == 'blog_search')) {
                        $url .= '/search&blog_search=' . $value;
                    } else {
                        $url .= '/search';
                    }
                    //echo $url;
                } else if(isset($data['route']) && $data['route'] == 'simple_blog/article' && $key != 'simple_blog_article_id' && $key != 'simple_blog_author_id' && $key != 'simple_blog_category_id' && $key != 'page') {

                    if($this->config->has('simple_blog_seo_keyword')) {
                        $url .=  '/blog/';
                        unset($data[$key]);
                    } else {
                        $url .=  '/blog';
                        unset($data[$key]);
                    }
                } elseif ($key == 'path') {

                    if ($data['route'] == 'product/category') {
                        $categories = explode('_', $value);
                        $url .= '/category';
                        foreach ($categories as $category) {
                            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = 'category_id=" . (int)$category . "'");

                            if ($query->num_rows && $query->row['keyword']) {
                                $url .= '/' . $query->row['keyword'];
                            } else {
                                $url = '';

                                break;
                            }
                        }
                    }

                    unset($data[$key]);
                }
                elseif (isset($data['route']) && $data['route'] == 'common/home') {
                    $url .= '/';
                    unset($data[$key]);
                }
            }
        }

        if ($url) {

            unset($data['route']);

            $query = '';

            if ($data) {
                foreach ($data as $key => $value) {
                    $query .= '&' . rawurlencode((string)$key) . '=' . rawurlencode((string)$value);
                }

                if ($query) {
                    $query = '?' . str_replace('&', '&amp;', trim($query, '&'));
                }
            }

            return $url_info['scheme'] . '://' . $url_info['host'] . (isset($url_info['port']) ? ':' . $url_info['port'] : '') . str_replace('/index.php', '', $url_info['path']) . $url . $query;
        } else {
            return $link;
        }
    }
}
