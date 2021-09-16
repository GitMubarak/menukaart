<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="wph-wrap-all" class="wrap menukaart-manage-views-page">

    <div class="settings-banner">
        <h2 class="menukaart-page-title"><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp;<?php _e('Manage Views', MENUKAART_TXT_DOMAIN); ?></h2>
    </div>

    <?php 
        if ( $menukaartMessage ) {
            $this->menukaart_display_notification('success', 'Your information updated successfully.');
        }
    ?>

    <div class="menukaart-wrap">

        <nav class="nav-tab-wrapper">
            <a href="?post_type=menukaart&page=menukaart-manage-views&tab=general" class="nav-tab <?php if ( ( 'general' === $menukaartTab ) || empty( $menukaartTab ) ) { ?>nav-tab-active<?php } ?>">
                <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;<?php _e('General Settings', MENUKAART_TXT_DOMAIN); ?>
            </a>
            <a href="?post_type=menukaart&page=menukaart-manage-views&tab=theme" class="nav-tab <?php if ( 'theme' === $menukaartTab ) { ?>nav-tab-active<?php } ?>">
                <i class="fa fa-magic" aria-hidden="true"></i>&nbsp;<?php _e('Theme Settings', MENUKAART_TXT_DOMAIN); ?>
            </a>
        </nav>

        <div class="menukaart_personal_wrap menukaart_personal_help" style="width: 75%; float: left;">
            
            <div class="tab-content">
                <?php 
                switch ( $menukaartTab ) {
                    case 'theme':
                        _e('Coming Soon', MENUKAART_TXT_DOMAIN);
                        break;
                    default:
                        include MENUKAART_PATH . 'admin/view/partial/general-settings.php';
                        break;
                } 
                ?>
            </div>
        
        </div>

        <?php $this->menukaart_admin_sidebar(); ?>

    </div>

</div>