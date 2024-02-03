<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
    .menukaart-content-wrapper {
        margin: 0 auto;
        padding: 30px;
        box-shadow: none;
        border: none;
    }
    .menukaart-menu-item-container {
        margin-bottom: 0px;
        margin-top: 20px;
        grid-gap: 60px;
    }
    .menukaart-menu-item-wrapper, .menukaart-menu-item {
        display: inline-block;
    }
    .mk-button {
        display: inline-block;
        margin: 0;
        margin-top: 5px!important;
        padding: 12px 15px!important;;
        cursor: pointer;
        border-style: solid;
        -webkit-appearance: none;
        border-radius: 3px;
        white-space: nowrap;
        box-sizing: border-box;
        line-height: 14px;
        font-size: 14px;
        text-align: center;
        text-decoration: none!important;
        width: auto;
        color: #242424!important;
        background: #DDDDDD!important;
    }
    .mk-button:hover {
        background: #242424!important;
        color: #FFFFFF!important;
    }
    @media only screen and (max-width: 767px) {
        .menukaart-content-wrapper {
            padding: 0px;
        }
        .menukaart-menu-item-wrapper, .menukaart-menu-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #DDDDDD;
        }
    }
</style>