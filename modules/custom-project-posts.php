<?php

// Portfolio POST TYPE
add_action('init', 'portfolio_register');  

function portfolio_register() {
    $args = array(
        "labels" => array(
				"name" => __( "Portfolio Items" ),
				"singular_name" => __( "Portfolio" ),
				"add_new_item" => "Add New Portfolio Item"),
        "public" => true,
        "show_ui" => true,
        "capability_type" => "post",
        "hierarchical" => false,
        "rewrite" => true,
        "supports" => array("title", "editor", "excerpt", "custom-fields", "thumbnail", "page-attributes")
       );  

    register_post_type( 'portfolio' , $args );
}



// AGENCY META BOX
add_action("add_meta_boxes", "agency_meta_box");

function agency_meta_box() {
    add_meta_box (
        "agency_meta_box",
        "Agency/Organization",
        "agency_meta_box_cb",
        "portfolio",
        "normal",
        "high"
        #,$args -- optional param
    );
}

function agency_meta_box_cb() {
    global $post;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
    # $url = get_post_custom($post->ID); -- can ALSO use get_post_meta if you want just that specific meta data to be passed, like so:
    $url = get_post_meta($post->ID, "agency_associated_url", true);

    // unique identifier, name of hidden field
    wp_nonce_field(__FILE__, "agency_nonce");
    ?>
   <label for="agency_associated_url">Agency/Org Name:</label>
   <input type="text" name="agency_associated_url" id="agency_associated_url" class="widefat" value="<?php echo $url; ?>" />
   <?php
}


add_action('save_post', 'save_agency'); 
  
function save_agency() {
    global $post;
    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) return;
    // security check -nonce

    // verify this came from the our screen and with proper auth, because save_post can be triggered at other times
    if ($_POST && wp_verify_nonce($_POST["agency_nonce"], __FILE__)) {
        if (isset($_POST["agency_associated_url"])) {
            update_post_meta($post->ID, "agency_associated_url", $_POST["agency_associated_url"]);
        }
    }
}



// AGENCY LINK META BOX
add_action("add_meta_boxes", "agency_link_meta_box");

function agency_link_meta_box() {
    add_meta_box (
        "agency_link_meta_box",
        "Agency/Organization Link",
        "agency_link_meta_box_cb",
        "portfolio",
        "normal",
        "high"
        #,$args -- optional param
    );
}

function agency_link_meta_box_cb() {
    global $post;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
    # $url = get_post_custom($post->ID); -- can ALSO use get_post_meta if you want just that specific meta data to be passed, like so:
    $url = get_post_meta($post->ID, "agency_link_associated_url", true);

    // unique identifier, name of hidden field
    wp_nonce_field(__FILE__, "agency_link_nonce");
    ?>
   <label for="agency_link_associated_url">Agency/Org Site URL:</label>
   <input type="text" name="agency_link_associated_url" id="agency_link_associated_url" class="widefat" value="<?php echo $url; ?>" />
   <?php
}


add_action('save_post', 'save_agency_link_link'); 
  
function save_agency_link_link() {
    global $post;
    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) return;
    // security check -nonce

    // verify this came from the our screen and with proper auth, because save_post can be triggered at other times
    if ($_POST && wp_verify_nonce($_POST["agency_link_nonce"], __FILE__)) {
        if (isset($_POST["agency_link_associated_url"])) {
            update_post_meta($post->ID, "agency_link_associated_url", $_POST["agency_link_associated_url"]);
        }
    }
}


// SITE LINK META BOX
add_action("add_meta_boxes", "site_meta_box");

function site_meta_box() {
    add_meta_box (
        "site_meta_box",
        "Site Link",
        "site_meta_box_cb",
        "portfolio",
        "normal",
        "high"
        #,$args -- optional param
    );
}

function site_meta_box_cb() {
    global $post;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
    # $url = get_post_custom($post->ID); -- can ALSO use get_post_meta if you want just that specific meta data to be passed, like so:
    $url = get_post_meta($post->ID, "site_associated_url", true);

    // unique identifier, name of hidden field
    wp_nonce_field(__FILE__, "site_nonce");
    ?>
   <label for="site_associated_url">Portfolio Page URL:</label>
   <input type="text" name="site_associated_url" id="site_associated_url" class="widefat" value="<?php echo $url; ?>" />
   <?php
}


add_action('save_post', 'save_site_link'); 
  
function save_site_link() {
    global $post;
    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) return;
    // security check -nonce

    // verify this came from the our screen and with proper auth, because save_post can be triggered at other times
    if ($_POST && wp_verify_nonce($_POST["site_nonce"], __FILE__)) {
        if (isset($_POST["site_associated_url"])) {
            update_post_meta($post->ID, "site_associated_url", $_POST["site_associated_url"]);
        }
    }
}



// TECHNOLOGY TAXONOMY
register_taxonomy("technology", array("portfolio"), array("hierarchical" => false, "label" => "Technologies", "singular_label" => "Technology", "rewrite" => true));

// POST GROUP TAXONOMY
register_taxonomy("portfolio-type", array("portfolio"), array("hierarchical" => false, "label" => "Portfolio Types", "singular_label" => "Portfolio Type", "rewrite" => true));


// CUSTOM ADMIN COLUMNS
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");

function portfolio_edit_columns($columns) {
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => "Portfolio",
        "description" => "Description",
        "type" => "Type of Portfolio",
        "tech" => "Technology"
    );

    return $columns;
}

add_action("manage_posts_custom_column",  "portfolio_custom_columns");

function portfolio_custom_columns($column) {
    global $post;
        switch ($column)
        {
            case "description":
                the_excerpt();
                break;
            case "type":
                echo get_the_term_list($post->ID, 'portfolio-type', '', ', ','');
                break;
            case "tech":
                echo get_the_term_list($post->ID, 'technology', '', ', ','');
                break;
        }
}

?>