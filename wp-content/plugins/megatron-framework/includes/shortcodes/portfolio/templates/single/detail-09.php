<?php
/**
 * Created by PhpStorm.
 * User: phuongth
 * Date: 7/13/15
 * Time: 11:14 AM
 */
do_action('g5plus_before_page');
$data_section_id = uniqid();
$videos = get_post_meta(get_the_ID(), 'portfolio_video_fields', TRUE);
?>
<div class="portfolio-full detail-03" id="content">
    <div class="container">
        <div class="navigator">
            <?php
            do_action('g5plus_after_single_portfolio_content'); ?>
        </div>
        <div class="row content">
            <div class="col-md-8">
                <div class="post-slideshow" id="post_slideshow_<?php echo esc_attr($data_section_id) ?>">
                    <?php
                    if(isset($videos) && is_array($videos) && count($videos['portfolio_video_fields'])>0){
                        for($i=0; $i<count($videos['portfolio_video_fields']);$i++){
                            ?>
                            <div class="item">
                                <?php echo wp_kses_post($videos['portfolio_video_fields'][$i]['video-field']) ?>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
                <?php include_once(plugin_dir_path( __FILE__ ).'/social-share.php') ?>
            </div>
            <div class="col-md-4">
                <div class="portfolio-info portfolio-content">
                    <h2 class="portfolio-title p-font"><?php the_title() ?></h2>
                    <?php the_content(); ?>
                </div>
                <div class="portfolio-info">
                    <?php
                    $meta = get_post_meta(get_the_ID(), 'portfolio_custom_fields', TRUE);
                    if(isset($meta) && is_array($meta) && count($meta['portfolio_custom_fields'])>0){
                        for($i=0; $i<count($meta['portfolio_custom_fields']);$i++){
                            ?>
                            <div class="portfolio-info-box">
                                <h6 class="p-font"><?php echo wp_kses_post($meta['portfolio_custom_fields'][$i]['custom-field-title']) ?> </h6>
                                <div class="portfolio-term line-height-1"><?php echo wp_kses_post($meta['portfolio_custom_fields'][$i]['custom-field-description']) ?></div>
                            </div>
                        <?php }
                    }
                    ?>
                    <?php if(isset($client_site) && $client_site!=''){ ?>
                        <div class="portfolio-info-box client-site">
                            <h6 class="p-font"><?php echo esc_html__('Client Site','g5plus-megatron') ?> </h6>
                            <div class="portfolio-term line-height-1"><a class="s-color" href="<?php echo esc_url($client_site) ?>"><?php echo esc_html($client_site) ?></a></div>
                        </div>
                    <?php } ?>
                    <?php if(isset($client) && $client!=''){ ?>
                        <div class="portfolio-info-box">
                            <h6 class="p-font"><?php echo esc_html__('Client','g5plus-megatron') ?> </h6>
                            <div class="portfolio-term line-height-1"><?php echo esc_html($client) ?></div>
                        </div>
                    <?php } ?>
                    <?php if(isset($cat) && $cat!=''){ ?>
                        <div class="portfolio-info-box">
                            <h6 class="p-font"><?php echo esc_html__('Categories','g5plus-megatron') ?> </h6>
                            <div class="portfolio-term line-height-1 s-font p-color category"><?php echo wp_kses_post($cat) ?></div>
                        </div>
                    <?php } ?>
                    <?php if(isset($tags) && is_array($tags)){ ?>
                        <div class="portfolio-info-box">
                            <h6 class="p-font"><?php echo esc_html__('Tag','g5plus-megatron') ?> </h6>
                            <div class="portfolio-term line-height-1">
                                <?php foreach($tags as $tag){ ?>
                                    <a href="<?php echo esc_url(get_tag_link($tag->term_id )) ?>">
                                        <span class="tag"><?php echo wp_kses_post($tag->name) ?></span>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>


            </div>
        </div>
        <div class="navigator bottom">
            <?php
            do_action('g5plus_after_single_portfolio_content'); ?>
        </div>

    </div>

</div>

<script type="text/javascript">
    (function($) {
        "use strict";
        $(window).load(function(){
            $(".post-slideshow",'#content').owlCarousel({
                items: 1,
                nav : true,
                navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                dots: false
            });
        })
    })(jQuery);
</script>