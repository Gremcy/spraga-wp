<?php get_header(); ?>

<body class="home-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W3387M6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="fluid-wrapper">
        <main class="main">
            <?php get_template_part('parts/_header'); ?>

            <?php if(get_field('active_1')): ?>
                <div class="home-head">
                    <div class="home-head-logo">
                        <img src="<?php echo \PS::$assets_url; ?>images/logo2.svg" alt="" loading="lazy">
                    </div>
                    <?php $text = get_field('title_1'); if($text): ?>
                        <h1 class="home-head-title"><?php echo $text; ?></h1>
                    <?php endif; ?>
                </div>
                <div class="home-hero">
                    <div class="home-hero-image">
                        <picture>
                            <?php $img = get_field('img_1_3'); if(is_array($img) && count($img)): ?>
                                <source media="(max-width: 650px)" srcset="<?php echo $img['sizes']['960x0']; ?>">
                            <?php endif; ?>
                            <?php $img = get_field('img_1_2'); if(is_array($img) && count($img)): ?>
                                <source media="(max-width: 999px)" srcset="<?php echo $img['sizes']['1600x0']; ?>">
                            <?php endif; ?>
                            <?php $img = get_field('img_1_1'); if(is_array($img) && count($img)): ?>
                                <source media="(min-width: 1000px)" srcset="<?php echo $img['url']; ?>">
                                <img src="<?php echo $img['url']; ?>" alt="" loading="lazy">
                            <?php endif; ?>
                        </picture>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <?php
                global $wp_query;
                \PS\Functions\Helper\Helper::get_random_products(false, 3);
                $custom_query = $wp_query;
                ?>
                <?php if ( $custom_query->have_posts() ): ?>
                    <div class="home-products">
                        <div class="home-products-container">
                            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                <div class="home-products-item">
                                    <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
                                        <a href="<?php echo get_the_permalink(); ?>" class="home-products-item-image">
                                            <img src="<?php echo $img['sizes']['960x0']; ?>" alt="" loading="lazy">
                                        </a>
                                    <?php endif; ?>

                                    <div class="home-products-item-bottom">
                                        <?php if(\PS\Functions\Shop\Helper::has_price(get_the_ID())): ?>
                                            <a href="javascript:void(0)" class="home-products-item-bottom-buy operations_in_cart" data-operation="add" data-product_id="<?php echo get_the_ID(); ?>" data-variant_id="0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none"><path d="M13.8192 28.488C15.0619 28.488 16.0693 27.4806 16.0693 26.2379C16.0693 24.9952 15.0619 23.9878 13.8192 23.9878C12.5765 23.9878 11.5691 24.9952 11.5691 26.2379C11.5691 27.4806 12.5765 28.488 13.8192 28.488Z" fill="#231F20"/><path d="M23.2162 28.488C24.4589 28.488 25.4663 27.4806 25.4663 26.2379C25.4663 24.9952 24.4589 23.9878 23.2162 23.9878C21.9735 23.9878 20.9661 24.9952 20.9661 26.2379C20.9661 27.4806 21.9735 28.488 23.2162 28.488Z" fill="#231F20"/><path d="M1.43346 5.86427C3.49747 5.86427 5.56148 5.86427 7.62548 5.86427C7.24551 5.57482 6.86554 5.2857 6.48557 4.99625C8.04328 10.4378 9.60134 15.8793 11.1591 21.3209C11.304 21.8271 11.769 22.1889 12.299 22.1889C16.4635 22.1889 20.6276 22.1889 24.7921 22.1889C25.3406 22.1889 25.7628 21.8234 25.932 21.3209C27.1712 17.6431 28.4105 13.9653 29.6497 10.2875C29.8976 9.55152 29.2454 8.79124 28.5098 8.79124C22.036 8.79124 15.5627 8.79124 9.08897 8.79124C7.56435 8.79124 7.56435 11.1555 9.08897 11.1555C15.5627 11.1555 22.036 11.1555 28.5098 11.1555C28.1298 10.6566 27.7498 10.1578 27.3698 9.65926C26.1306 13.3371 24.8914 17.0148 23.6522 20.6926C24.0322 20.4032 24.4121 20.1141 24.7921 19.8246C20.6276 19.8246 16.4635 19.8246 12.299 19.8246C12.6789 20.1141 13.0589 20.4032 13.4389 20.6926C11.8812 15.2511 10.3231 9.80956 8.7654 4.36802C8.6205 3.8614 8.15576 3.5 7.62582 3.5C5.56181 3.5 3.49781 3.5 1.4338 3.5C-0.0911573 3.5 -0.0911573 5.86427 1.43346 5.86427Z" fill="#231F20"/></svg>
                                                <span><?php _e( 'купити', \PS::$theme_name ); ?></span>
                                            </a>

                                            <?php $prices = get_field('price'); if(is_array($prices) && count($prices)): ?>
                                                <?php foreach ($prices as $n => $li): ?>
                                                    <?php if($n === 0): ?>
                                                        <div class="cart-goods-item-right-down-price-wrapper">
                                                            <?php $old_price = \PS\Functions\Shop\Helper::format_price($li['old_price']); if($old_price): ?>
                                                                <div class="cart-goods-item-right-down-price-action show">
                                                                    <span class="action-old-price"><?php echo $old_price; ?> <?php _e( 'грн', \PS::$theme_name ); ?></span>
                                                                    <span class="action-new-price"><?php echo \PS\Functions\Shop\Helper::format_price($li['price']); ?> <?php _e( 'грн', \PS::$theme_name ); ?>/12 <?php _e( 'шт', \PS::$theme_name ); ?></span>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="cart-goods-item-right-down-price show"><?php echo \PS\Functions\Shop\Helper::format_price($li['price']); ?> <?php _e( 'грн', \PS::$theme_name ); ?>/12 <?php _e( 'шт', \PS::$theme_name ); ?></div>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <a href="<?php echo get_the_permalink(); ?>" class="home-products-item-bottom-more"><?php _e( 'про напій', \PS::$theme_name ); ?></a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>

                        <?php $text = get_field('button_2', \PS::$pages['front']); if($text['active']): ?>
                            <a href="<?php echo $text['link']; ?>" class="home-products-all-btn">
                                <div class="home-products-all-btn-circle"></div>
                                <span><?php echo $text['text']; ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <div class="home-cans-fluid">
                    <div class="home-cans-inner">
                        <div class="home-cans-center">
                            <?php $text = get_field('subtitle_2', \PS::$pages['products']); if($text): ?>
                                <div class="home-cans-circle">
                                    <div class="home-cans-circle-bg">
                                        <img src="<?php echo \PS::$assets_url; ?>images/6.png" alt="" loading="lazy">
                                    </div>
                                    <span><?php echo $text; ?></span>
                                </div>
                            <?php endif; ?>

                            <div class="home-cans-content">
                                <div class="home-cans-tag"><?php _e( 'Акція', \PS::$theme_name ); ?></div>
                                <div class="home-cans-title">
                                    <?php $text = get_field('title_2', \PS::$pages['products']); if($text): ?>
                                        <span><?php echo $text; ?></span>
                                    <?php endif; ?>
                                    <?php $img = get_field('img_2', \PS::$pages['products']); if(is_array($img) && count($img)): ?>
                                        <div class="home-cans-products-image">
                                            <img src="<?php echo $img['sizes']['960x0']; ?>" alt="" loading="lazy">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php $text = get_field('text_2', \PS::$pages['products']); if($text): ?>
                                    <div class="home-cans-description"><?php echo $text; ?></div>
                                <?php endif; ?>
                                <?php $text = get_field('notice_2', \PS::$pages['products']); if($text): ?>
                                    <div class="home-cans-promo-date">
                                        <span><?php echo $text; ?></span>
                                        <img src="<?php echo \PS::$assets_url; ?>images/icon21.svg" alt="" loading="lazy">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php $text = get_field('file_2', \PS::$pages['products']); if($text['active']): ?>
                        <a href="<?php echo $text['file']; ?>" class="home-cans-all-btn" target="_blank">
                            <div class="home-cans-all-btn-circle"></div>
                            <span><?php echo $text['text']; ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <div class="home-about-fluid">
                    <div class="home-about-centered">
                        <div class="home-about-image">
                            <picture>
                                <?php $img = get_field('img_4_3'); if(is_array($img) && count($img)): ?>
                                    <source media="(max-width: 650px)" srcset="<?php echo $img['sizes']['960x0']; ?>">
                                <?php endif; ?>
                                <?php $img = get_field('img_4_2'); if(is_array($img) && count($img)): ?>
                                    <source media="(max-width: 999px)" srcset="<?php echo $img['sizes']['1600x0']; ?>">
                                <?php endif; ?>
                                <?php $img = get_field('img_4_1'); if(is_array($img) && count($img)): ?>
                                    <source media="(min-width: 1000px)" srcset="<?php echo $img['sizes']['1600x0']; ?>">
                                    <img src="<?php echo $img['sizes']['1600x0']; ?>" alt="" loading="lazy">
                                <?php endif; ?>
                            </picture>
                        </div>
                        <div class="home-about-content">
                            <div class="home-about-top">
                                <?php $text = get_field('title_4'); if($text): ?>
                                    <h2 class="home-about-top-title"><?php echo $text; ?></h2>
                                <?php endif; ?>
                                <?php $text = get_field('text_4'); if($text): ?>
                                    <div class="home-about-top-description"><?php echo $text; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="home-about-list">
                                <?php $text = get_field('title_4_2'); if($text): ?>
                                    <h2 class="home-about-list-title"><?php echo $text; ?></h2>
                                <?php endif; ?>
                                <?php $text = get_field('text_4_2'); if($text): ?>
                                    <?php echo str_ireplace(['<p>', '</p>', '<ul>'], ['<div class="home-about-list-text">', '</div>', '<ul class="home-about-list-elements">'], $text); ?>
                                <?php endif; ?>
                            </div>

                            <?php $list = get_field('list_4'); if(is_array($list) && count($list)): ?>
                                <div class="home-about-advantage">
                                    <?php foreach ($list as $li): ?>
                                        <div class="home-about-advantage-item">
                                            <?php if(is_array($li['img']) && count($li['img'])): ?>
                                                <div class="home-about-advantage-item-icon">
                                                    <img src="<?php echo $li['img']['sizes']['150x0']; ?>" alt="" loading="lazy">
                                                </div>
                                            <?php endif; ?>
                                            <div class="home-about-advantage-item-text"><?php echo $li['text']; ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_5')): ?>
                <div class="home-five-fluid">
                    <div class="home-five-centered">
                        <?php $text = get_field('subtitle_5'); if($text): ?>
                            <div class="home-five-tag"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('title_5'); if($text): ?>
                            <h3 class="home-five-title"><?php echo $text; ?></h3>
                        <?php endif; ?>
                        <?php $img = get_field('img_5'); if(is_array($img) && count($img)): ?>
                            <div class="home-five-image">
                                <img src="<?php echo $img['sizes']['960x0']; ?>" alt="" loading="lazy">
                            </div>
                        <?php endif; ?>
                        <?php $text = get_field('text_5'); if($text): ?>
                            <?php echo str_ireplace(['<p>', '<strong>', '</strong>'], ['<p class="home-five-text">', '<div class="home-five-heading">', '</div>'], $text); ?>
                        <?php endif; ?>

                        <?php $text = get_field('button_5', \PS::$pages['front']); if($text['active']): ?>
                            <a href="<?php echo $text['link']; ?>" class="home-products-all-btn">
                                <div class="home-products-all-btn-circle"></div>
                                <span><?php echo $text['text']; ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_6')): ?>
                <?php $img = get_field('img_6'); if(is_array($img) && count($img)): ?>
                    <div class="home-fluid-image">
                        <img src="<?php echo $img['sizes']['1600x0']; ?>" alt="" loading="lazy">
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_7')): ?>
                <div class="home-insta-fluid">
                    <div class="home-insta-centered">
                        <div class="home-insta-left">
                            <?php $text = get_field('title_7'); if($text): ?>
                                <div class="home-insta-left-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('button_7', \PS::$pages['front']); if($text['active']): ?>
                                <a href="<?php echo $text['link']; ?>" class="home-insta-left-link" target="_blank"><?php echo $text['text']; ?></a>
                            <?php endif; ?>
                        </div>

                        <?php $list = get_field('list_6'); if(is_array($list) && count($list)): ?>
                            <div class="home-insta-container">
                                <?php foreach ($list as $li): ?>
                                    <?php if(is_array($li['img']) && count($li['img'])): ?>
                                        <a href="<?php echo $li['link']; ?>" class="home-insta-item" target="_blank" rel="nofollow">
                                            <img src="<?php echo $li['img']['sizes']['480x0']; ?>" alt="" loading="lazy">
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_8')): ?>
                <div class="home-buy-fluid">
                    <div class="home-buy-centered">
                        <?php $text = get_field('title_1', \PS::$pages['buy']); if($text): ?>
                            <h3 class="home-buy-title"><?php echo $text; ?></h3>
                        <?php endif; ?>
                        <?php $list = get_field('list_1', \PS::$pages['buy']); if(is_array($list) && count($list)): ?>
                            <?php foreach ($list as $li): ?>
                                <div class="home-buy-category">
                                    <div class="home-buy-category-name"><?php echo $li['title']; ?></div>
                                    <?php if(is_array($li['list']) && count($li['list'])): ?>
                                        <div class="home-buy-category-container">
                                            <?php foreach ($li['list'] as $img): ?>
                                                <div class="home-buy-category-element">
                                                    <img src="<?php echo $img['sizes']['480x0']; ?>" alt="" loading="lazy">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>

    <?php /* END */ ?>

</body>
</html>