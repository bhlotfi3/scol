<?php

namespace HelpieFaq\Includes;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

if (!class_exists('\HelpieFaq\Includes\Actions')) {
    class Actions
    {
        public $faq_category_taxonomy_name = '';

        public function __construct()
        {
            $this->faq_category_taxonomy_name = HELPIE_FAQ_CATEGORY_TAXONOMY;
        }

        public function init()
        {
            $this->init_faq_category_actions();

        }

        public function init_faq_category_actions()
        {
            // action for showing custom fields in category table (quick edit)
            add_action('quick_edit_custom_box', array($this, 'add_category_taxonomy_custom_fields'), 10, 3);

            add_action('edited_' . $this->faq_category_taxonomy_name, array($this, 'save_category_taxonomy_custom_fields'), 10, 2);
        }

        public function add_category_taxonomy_custom_fields($column_name, $screen)
        {

            $taxonomy = isset($_GET['taxonomy']) ? $_GET['taxonomy'] : '';
            $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';
            $is_faq_category = ($taxonomy == HELPIE_FAQ_CATEGORY_TAXONOMY && $post_type == HELPIE_FAQ_POST_TYPE);
            if (!$is_faq_category) {
                return;
            }
            if ($column_name != 'order' && $screen != 'edit-tags') {
                return;
            }

            $content = '<fieldset>';
            $content .= '<div class="inline-edit-col">';
            $content .= '<label>';
            $content .= '<span class="title">Order</span>';
            $content .= '<span class="input-text-wrap">';
            $content .= '<input type="number" name="order" value="0" />';
            $content .= '</span>';
            $content .= '</label>';
            $content .= '</div>';
            $content .= '</fieldset>';

            echo $content;
        }

        public function save_category_taxonomy_custom_fields($term_id)
        {
            if (isset($_POST['order']) && !empty($_POST['order'])) {
                $order = $_POST['order'];
                update_term_meta($term_id, 'order', $order);
            }
        }
    }
}
