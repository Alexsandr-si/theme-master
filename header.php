<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package master-computerov
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="image/png" />
	<?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="container top_header">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="logotype"><a href="http://master-computerov.ru"><strong><?php dynamic_sidebar('logo'); ?></strong></a></div>
                </div>
                <div class="col-md-3 col-sm-3 not_show_in">
                    <p>Москва и Московская область</p>
                </div>
                <div class="col-md-3 col-sm-3 not_show_in">
                    <p class="normal_row">ежедневно 8:00-21:00</p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 fone"><a class="normal_row" href="tel:+79263828748"> тел. 8 (926) 382-87-48</a></div>
            </div>
        </div>
        <div class="icon_menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <nav class="menu_nav">
            <div class="container">
                <div class="row">
                    <ul class="menu_ul">
                        <li><a href="http://master-computerov.ru">главная</a></li>
                        <li class="remove_link"><a href="computers_repair">Ремонт компьютера</a>
                            <ul class="hidden_menu">
                                <li><a href="remont_pc_na_domy">ремонт пк на дому</a></li>
                            </ul>
                        </li>
                        <li class="remove_link"><a href="laptop_repair">Ремонт ноутбука</a>
                            <ul class="hidden_menu">
                                <li><a href="chistka_noutbuka">чистка ноутбука</a></li>
                                <li><a href="zamena_matricy">замена метрицы</a></li>
                            </ul>
                        </li>
                        <li class="remove_link last_item"><a href="content">настройка компьютера</a>
                            <ul class="hidden_menu">
                                <li><a href="ustanovka_windows">установка windows</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
