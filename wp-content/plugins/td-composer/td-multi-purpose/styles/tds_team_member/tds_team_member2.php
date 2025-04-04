<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_team_member2 extends td_style {

    private $unique_style_class;
    private $atts = array();
    private $index_style;

    function __construct( $atts, $index_style = '') {
        $this->atts = $atts;
        $this->index_style = $index_style;
    }

	private function get_css() {

        $compiled_css = '';

        $unique_style_class = $this->unique_style_class;

		$raw_css =
			"<style>

                /* @image_repeat */
				.$unique_style_class .tdm-member-image {
					background-repeat: @image_repeat;
				}
				/* @image_size */ 
				.$unique_style_class .tdm-member-image {
					background-size: @image_size;
				}
				/* @image_alignment */
				.$unique_style_class .tdm-member-image {
					background-position: @image_alignment;
				}
				/* @img_height */
				.$unique_style_class .tdm-member-image,
				.$unique_style_class .tdm-member-info {
					padding-bottom: @img_height;
				}
				/* @image_border_radius */
				.$unique_style_class .tdm-member-image,
				.$unique_style_class .tdm-member-image:before,
				.$unique_style_class .tdm-member-image:after,
				.$unique_style_class .tdm-member-info {
					border-radius: @image_border_radius;
				}
				
				/* @name_color */
				.$unique_style_class .tdm-title {
				    color: @name_color;
				}
				/* @title_color */
				.$unique_style_class .tdm-member-title {
				    color: @title_color;
				}
				/* @description_color */
				.$unique_style_class .tdm-descr {
				    color: @description_color;
				}
				/* @description_background_color_gradient */
				.$unique_style_class.tds-team-member2 .tdm-member-info {
				    @description_background_color_gradient
				}
				/* @description_background_color */
				.$unique_style_class.tds-team-member2 .tdm-member-info {
				    background: @description_background_color;
				}
				
				/* @social_icons_space */
				.$unique_style_class .tdm-social-wrapper {
				    margin-top: @social_icons_space;
				}



				/* @f_title */
				.$unique_style_class .tdm-title {
					@f_title
				}
				/* @f_job_title */
				.$unique_style_class .tdm-member-title {
					@f_job_title
				}
				/* @f_descr */
				.$unique_style_class .tdm-descr {
					@f_descr
				}

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->atts);

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
	}

    /**
     * Callback pe media
     *
     * @param $responsive_context td_res_context
     * @param $atts
     */
    static function cssMedia( $res_ctx ) {

        /*-- IMAGE -- */
        // image repeat
        $image_repeat = $res_ctx->get_shortcode_att( 'image_repeat' );
        $res_ctx->load_settings_raw( 'image_repeat', 'no-repeat' );
        if( $image_repeat != '' ) {
            $res_ctx->load_settings_raw( 'image_repeat', $image_repeat );
        }

        // image size
        $image_size = $res_ctx->get_shortcode_att( 'image_size' );
        $res_ctx->load_settings_raw( 'image_size', 'cover' );
        if( $image_size != '' ) {
            $res_ctx->load_settings_raw( 'image_size', $image_size );
        }

        // image alignment
        $image_alignment = $res_ctx->get_shortcode_att( 'image_alignment' );
        $res_ctx->load_settings_raw( 'image_alignment', 'center' );
        if( $image_alignment != '' ) {
            $res_ctx->load_settings_raw( 'image_alignment', $image_alignment );
        }

        // image height
        $res_ctx->load_settings_raw( 'img_height', $res_ctx->get_shortcode_att( 'img_height' ) );

        // image border radius
        $image_border_radius = $res_ctx->get_shortcode_att( 'image_border_radius' );
        $res_ctx->load_settings_raw( 'image_border_radius', $image_border_radius );
        if( $image_border_radius != '' ) {
            if( is_numeric( $image_border_radius ) ) {
                $res_ctx->load_settings_raw( 'image_border_radius', $image_border_radius . 'px' );
            }
        }



        /*-- TEXT -- */
        // name color
        $res_ctx->load_settings_raw( 'name_color', $res_ctx->get_style_att( 'name_color', __CLASS__ ) );

        // job title color
        $res_ctx->load_settings_raw( 'title_color', $res_ctx->get_style_att( 'title_color', __CLASS__ ) );

        // description color
        $res_ctx->load_settings_raw( 'description_color', $res_ctx->get_style_att( 'description_color', __CLASS__ ) );

        // description background color
        $res_ctx->load_color_settings( 'description_background_color', 'description_background_color', 'description_background_color_gradient', '', '', __CLASS__ );



        /*-- SOCIAL ICONS -- */
        // social icons space
        $social_icons_space = $res_ctx->get_shortcode_att( 'social_icons_space' );
        $res_ctx->load_settings_raw( 'social_icons_space', $social_icons_space );
        if( $social_icons_space != '' ) {
            if( is_numeric( $social_icons_space ) ) {
                $res_ctx->load_settings_raw( 'social_icons_space', $social_icons_space . 'px' );
            }
        }



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_title', __CLASS__ );
        $res_ctx->load_font_settings( 'f_job_title', __CLASS__ );
        $res_ctx->load_font_settings( 'f_descr', __CLASS__ );

    }

    function render( $index_style = '' ) {
        if ( ! empty( $index_style ) ) {
            $this->index_template = $index_style;
        }
        $this->unique_style_class = td_global::td_generate_unique_id();

        $image = $this->get_shortcode_att( 'image' );
        $name = $this->get_shortcode_att( 'name' );
        $job_title = $this->get_shortcode_att( 'job_title' );
        $name_tag = $this->get_shortcode_att( 'name_tag' );
        $description = rawurldecode( base64_decode( strip_tags( $this->get_shortcode_att( 'description' ) ) ) );
        $description_align_vertical = 'tds-team-member-' . $this->get_style_att( 'description_align_vertical' );

        // name tag
        if ( empty($name_tag ) ) {
            $name_tag = 'h3';
        }

        $tds_animation_stack = td_util::get_option('tds_animation_stack');

        $buffy = $this->get_style($this->get_css());

        $buffy .= '<div class="tdm-team-member-wrap ' . self::get_class_style(__CLASS__) . ' ' . $description_align_vertical . ' ' . $this->unique_style_class . '">';
            if ( ! empty( $image ) ) {
                if( empty( $tds_animation_stack ) && ! td_util::tdc_is_live_editor_ajax() && ! td_util::tdc_is_live_editor_iframe() && !td_util::is_mobile_theme() && !td_util::is_amp() ) {
                    $buffy .= '<div class="tdm-member-image td-lazy-img td-fix-index" data-type="css_image" data-img-url="' . tdc_util::get_image_or_placeholder($image) . '"></div>';
                } else {
                    $buffy .= '<div class="tdm-member-image td-fix-index" style="background-image: url(' . tdc_util::get_image_or_placeholder($image) . ');"></div>';
                }
            }

            $buffy .= '<' . $name_tag . ' class="tdm-title tdm-title-sm td-fix-index">' . $name . '</' . $name_tag . '>';
            $buffy .= '<span class="tdm-member-title td-fix-index">' . $job_title  . '</span>';

            $buffy .= '<div class="tdm-member-info td-fix-index">';
                $buffy .= '<div class="tdm-member-info-inner">';
                    $buffy .= '<p class="tdm-descr">' . $description . '</p>';

                    // Get progress_bar_style_id
                    $tds_social = $this->get_shortcode_att('tds_social');
                    if ( empty( $tds_social ) ) {
                        $tds_social = td_util::get_option( 'tds_social', 'tds_social1');
                    }
                    $tds_social_instance = new $tds_social( $this->atts );
                    $buffy .= $tds_social_instance->render();
                $buffy .= '</div>';
            $buffy .= '</div>';
        $buffy .= '</div>';

		return $buffy;
	}

    function get_style_att( $att_name ) {
        return $this->get_att( $att_name ,__CLASS__, $this->index_style );
    }

    function get_atts() {
        return $this->atts;
    }
}
