<?php
class ModelCatalogCategory extends Model {
	public function getCategory($category_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.category_id = '" . (int)$category_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");

		return $query->row;
	}

    public function getProductCategories($product_id) {
        return $this->db->query("SELECT category_id FROM oc_product_to_category WHERE product_id = " . $product_id)->rows;
    }

	public function getCategories($parent_id = 0) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'  AND c.status = '1' ORDER BY c.sort_order, LCASE(cd.name)");

		return $query->rows;
	}

	public function getCategoryFilters($category_id) {
		$implode = array();

		$query = $this->db->query("SELECT filter_id FROM " . DB_PREFIX . "category_filter WHERE category_id = '" . (int)$category_id . "'");

		foreach ($query->rows as $result) {
			$implode[] = (int)$result['filter_id'];
		}

		$filter_group_data = array();

		if ($implode) {
			$filter_group_query = $this->db->query("SELECT DISTINCT f.filter_group_id, fgd.name, fg.sort_order FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_group fg ON (f.filter_group_id = fg.filter_group_id) LEFT JOIN " . DB_PREFIX . "filter_group_description fgd ON (fg.filter_group_id = fgd.filter_group_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND fgd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY f.filter_group_id ORDER BY fg.sort_order, LCASE(fgd.name)");

			foreach ($filter_group_query->rows as $filter_group) {
				$filter_data = array();

				$filter_query = $this->db->query("SELECT DISTINCT f.filter_id, fd.name FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_description fd ON (f.filter_id = fd.filter_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND f.filter_group_id = '" . (int)$filter_group['filter_group_id'] . "' AND fd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY f.sort_order, LCASE(fd.name)");

				foreach ($filter_query->rows as $filter) {
					$filter_data[] = array(
						'filter_id' => $filter['filter_id'],
						'name'      => $filter['name']
					);
				}

				if ($filter_data) {
					$filter_group_data[] = array(
						'filter_group_id' => $filter_group['filter_group_id'],
						'name'            => $filter_group['name'],
						'filter'          => $filter_data
					);
				}
			}
		}

		return $filter_group_data;
	}

	public function getCategoryLayoutId($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category_to_layout WHERE category_id = '" . (int)$category_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return (int)$query->row['layout_id'];
		} else {
			return 0;
		}
	}

	public function getTotalCategoriesByCategoryId($parent_id = 0) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");

		return $query->row['total'];
	}

    public function getCategoryFromParentID($categories, $parent_id) {
        $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.category_id IN (" . $categories . ") AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1' AND c.parent_id = " . (int)$parent_id);

        return $query->row;
    }

    public function getCategoryPath($category_id)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category_path WHERE category_id = " . (int)$category_id . " ORDER BY 'level'");

        return $query->rows;
    }

    public function getBrandsProduct($limit, $category_id)
    {
        $query = $this->db->query("SELECT m.name, COUNT(p.manufacturer_id) FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "manufacturer m ON (m.manufacturer_id = p.manufacturer_id) LEFT JOIN " . DB_PREFIX . "product_to_category ptc ON (p.product_id = ptc.product_id) WHERE ptc.category_id = " . (int)$category_id . " GROUP BY p.manufacturer_id ORDER BY 2 DESC LIMIT " . (int)$limit);

        return $query->rows;
    }

    public function getProductsCategory($limit, $category_id)
    {
        $query = $this->db->query("SELECT pd.name FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_category ptc ON (p.product_id = ptc.product_id) WHERE ptc.category_id = " . (int)$category_id . " ORDER BY p.viewed DESC LIMIT " . (int)$limit);

        return $query->rows;
    }

    public function getSubCategories($limit, $category_id)
    {
        $query = $this->db->query("SELECT cd.name, COUNT(ptc.category_id) FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "product_to_category ptc ON (c.category_id = ptc.category_id) WHERE c.parent_id = " . (int)$category_id . " GROUP BY cd.name ORDER BY 2 DESC LIMIT " . (int)$limit);

        return $query->rows;
    }

    public function getParentCategory($category_id)
    {
        $parent_id = $this->db->query("SELECT * FROM " . DB_PREFIX . "category WHERE category_id = " . (int)$category_id)->row['parent_id'];

        $query = $this->db->query("SELECT cd.name FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) WHERE cd.category_id = " . (int)$parent_id);

        return $query->row;
    }

    public function getProductsChars($category_id, $from, $offset)
    {
        $query = $this->db->query("SELECT spec FROM " . DB_PREFIX . "spec sp LEFT JOIN " . DB_PREFIX . "product_to_category ptc ON (sp.product_id = ptc.product_id) WHERE ptc.category_id = " . (int)$category_id . " LIMIT " . (int)$from . ", " . (int)$offset)->rows;

        return $query;
    }

    public function getCountChars($category_id)
    {
        $query = $this->db->query("SELECT COUNT(*) as count FROM " . DB_PREFIX . "spec sp LEFT JOIN " . DB_PREFIX . "product_to_category ptc ON (sp.product_id = ptc.product_id) WHERE ptc.category_id = " . (int)$category_id)->row;

        return $query['count'];
    }

    public function getProductsCount($category_id)
    {
        $query = $this->db->query("SELECT COUNT(*) as count FROM " . DB_PREFIX . "product_to_category WHERE category_id = " . (int)$category_id);

        return $query->row;
    }

    public function getCategoriesSort($parent_id = 0) {

        $query_sorted = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'  AND c.status = '1' AND c.sort_order <> 0 ORDER BY c.sort_order, LCASE(cd.name)");

        $query_unsorted = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'  AND c.status = '1' AND c.sort_order = 0 ORDER BY c.sort_order, LCASE(cd.name)");

        return array_merge($query_sorted->rows, $query_unsorted->rows);
    }
}