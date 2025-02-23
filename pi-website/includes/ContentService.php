<?php
require_once 'interfaces/ProductInterface.php';
require_once 'interfaces/TeamInterface.php';
require_once 'interfaces/MenuInterface.php';
require_once 'interfaces/GeneralInterface.php';

/**
 * ContentService class
 * 
 * This class implements the content interfaces and provides methods to retrieve
 * content from the data files.
 */
class ContentService implements ProductInterface, TeamInterface, MenuInterface, GeneralInterface {
    private $data = [];

    /**
     * Constructor
     * 
     * Loads all data from the data files.
     */
    public function __construct() {
        $this->loadData();
    }

    /**
     * Load data from files
     * 
     * This method loads all data from the data files into the $data property.
     */
    private function loadData() {
        $languages = ['en', 'he'];
        $types = ['products', 'team', 'menu', 'general'];

        foreach ($languages as $lang) {
            foreach ($types as $type) {
                $file = "data/{$lang}_{$type}.php";
                if (file_exists($file)) {
                    $this->data[$lang][$type] = require_once $file;
                } else {
                    throw new Exception("Data file not found: $file");
                }
            }
        }
    }

    /**
     * Get products by type
     * 
     * @param string $lang The language code
     * @param string $type The product type (investment_banking or asset_management)
     * @return array An array of products
     */
    public function getProducts($lang, $type) {
        return $this->data[$lang]['products'][$type] ?? [];
    }

    /**
     * Get a specific product
     * 
     * @param string $lang The language code
     * @param string $type The product type
     * @param string $name The product name
     * @return array|null The product data or null if not found
     */
    public function getProduct($lang, $type, $name) {
        $products = $this->getProducts($lang, $type);
        return array_filter($products, function($product) use ($name) {
            return $product['name'] === $name;
        })[0] ?? null;
    }

    /**
     * Get all team groups
     * 
     * @param string $lang The language code
     * @return array An array of team group names
     */
    public function getTeamGroups($lang) {
        return array_keys($this->data[$lang]['team']);
    }

    /**
     * Get team members by group
     * 
     * @param string $lang The language code
     * @param string $group The team group name
     * @return array An array of team members
     */
    public function getTeamMembers($lang, $group) {
        return $this->data[$lang]['team'][$group] ?? [];
    }

    /**
     * Get a specific team member
     * 
     * @param string $lang The language code
     * @param string $slug The team member's slug
     * @return array|null The team member data or null if not found
     */
    public function getTeamMember($lang, $slug) {
        foreach ($this->data[$lang]['team'] as $group) {
            foreach ($group as $member) {
                if ($member['slug'] === $slug) {
                    return $member;
                }
            }
        }
        return null;
    }

    /**
     * Get the menu structure
     * 
     * @param string $lang The language code
     * @return array The menu structure
     */
    public function getMenu($lang) {
        return $this->data[$lang]['menu'];
    }

    /**
     * Get general content
     * 
     * @param string $lang The language code
     * @return array The general content
     */
    public function getGeneral($lang) {
        return $this->data[$lang]['general'];
    }

    /**
     * Get about page content
     * 
     * @param string $lang The language code
     * @return array The about page content
     */
    public function getAbout($lang) {
        return $this->data[$lang]['general']['about'];
    }

    /**
     * Get contact page content
     * 
     * @param string $lang The language code
     * @return array The contact page content
     */
    public function getContact($lang) {
        return $this->data[$lang]['general']['contact'];
    }
}

