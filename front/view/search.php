<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Search Items
$mk_title        =  isset( $_GET['mk_title'] ) ? sanitize_text_field( $_GET['mk_title'] ) : '';
$mk_category_s   =  isset( $_GET['mk_category_s'] ) ? sanitize_text_field( $_GET['mk_category_s'] ) : '';

// Search Query Ttitle
if ( '' != $mk_title ) {
    $menukaartArr['s'] = $mk_title;
}

// Search Query Category
if ( '' !== $mk_category_s ) {
    $menukaartArr['tax_query'] = array(
        array(
            'taxonomy' => 'menukaart_courses',
            'field' => 'name',
            'terms' => urldecode ( $mk_category_s )
        )
    );
}

$mk_categories   = get_terms( array( 'taxonomy' => 'menukaart_courses', 'hide_empty' => true, 'order' => 'ASC' ) );
?>
<style type="text/css">
    .mk-search-container {
        border: 1px solid #ddd;
        width: 100%;
        display: grid;
        grid-gap: 10px;
        padding: 10px;
        grid-template-columns: repeat( auto-fit, minmax(150px, 1fr));
        margin-bottom: 10px;
        background: #F2F2F2;
    }

    .mk-search-container .mk-search-item {
        border: 0px solid #DDD;
        min-height: 40px;
        text-align: center;
    }

    .mk-search-container .mk-search-item input,
    .mk-search-container .mk-search-item select {
        width: 100%;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: url("http://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png") no-repeat scroll right 15px center;
        background-color: #ffffff;
        border: 1px solid #dddddd;
        color: #333333;
        font-size: 12px;
        line-height: 18px;
        padding: 13px;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
        transition: all 0.3s linear;
        margin: 0px;
    }

    .mk-search-container .mk-search-item input[type='text'] {
        background: #FFF;
        padding: 15px 13px;
        line-height: 30px;
        height: 45px;
        color: #333!important;
    }

    .mk-search-container .mk-search-item .submit-btn {
        width: 150px;
        height: 45px;
        background: #269FC6;
        color: #ffffff;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        font-weight: 700;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.3s linear;
        transform: translateY(0);
        display: inline-block;
    }

    .mk-search-container .mk-search-item .submit-btn:hover {
        background: #6fa0df;
        border: 1px solid #6fa0df;
        color: #FFF;
    }

    .mk-search-container .mk-search-item a#mk-search-refresh {
        background: #FFF;
        color: #666666;
        padding: 10px;
        font-size: 18px;
        line-height: 25px;
        border: none;
        border-radius: 5px;
        font-weight: 700;
        letter-spacing: 0.5px;
        cursor: pointer;
        display: block;
        width: 50px;
        height: 45px;
        border: 1px solid #666666;
        text-decoration: none;
    }

    .mk-search-container .mk-search-item a#mk-search-refresh:hover {
        background: #6fa0df;
        border: 1px solid #6fa0df;
        color: #FFF;
    }
    @media only screen and (max-width: 767px) {
        .mk-search-container .mk-search-item a#mk-search-refresh {
            margin: auto;
        }
    }
</style>
<form method="GET" action="<?php echo get_permalink( $post->ID ); ?>" id="mk-search-form">

    <div class="mk-search-container">
        
        <div class="mk-search-item">
            <input type="text" name="mk_title" placeholder="<?php _e( 'Food Title', MENUKAART_TXT_DOMAIN ); ?>" value="<?php esc_attr_e( $mk_title ); ?>">
        </div>

        <div class="mk-search-item">
            <select id="mk_category_s" name="mk_category_s">
                <option value=""><?php _e( 'All Food Category', MENUKAART_TXT_DOMAIN ); ?></option>
                <?php
                foreach ( $mk_categories as $category ) {
                    ?>
                    <option value="<?php esc_attr_e( $category->name ); ?>" <?php echo ( $mk_category_s == $category->name ) ? 'Selected' : ''; ?>><?php esc_html_e( $category->name ); ?></option>
                    <?php 
                } 
                ?>
            </select>
        </div>

        <div class="mk-search-item">
            <input type="submit" class="button submit-btn" value="<?php _e('Search Foods', MENUKAART_TXT_DOMAIN); ?>">
        </div>

        <div class="mk-search-item">
            <a href="<?php echo get_permalink( $post->ID ); ?>" class="fa-solid fa-rotate" id="mk-search-refresh"></a>
        </div>
    
    </div>

</form>