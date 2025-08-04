<?php
/**
 *  Get slider template
 */
function mt_get_slider_template() {
    ob_start();
    require_once plugin_dir_path( __FILE__ ) . 'public/view/slider-template.php';
    return ob_get_clean();
}

add_shortcode('mt_slider', 'mt_get_slider_template');


/**
 * Slider settings HTML
 */
function mt_slider_settings_page(){
    if( isset($_POST['mt_loop']) || isset($_POST['mt_slider_autoplay']) || isset($_POST['mt_slider_pagination']) ){
        update_option('mt_loop', $_POST['mt_loop']?? 'off');
        update_option('mt_slider_autoplay', $_POST['mt_slider_autoplay']);
        update_option('mt_slider_pagination', $_POST['mt_slider_pagination']?? 'off');
    }

    $mt_loop = get_option('mt_loop');
    $mt_slider_autoplay = get_option('mt_slider_autoplay');
    $mt_slider_pagination = get_option('mt_slider_pagination');

    ?>
    <div class="wrap">
        <h1>MT Slider Settings</h1>
        <form action="" method="post">
            <p>
            <label for="mt_loop">Enable/Disable Loop</label>
            <input type="checkbox" name="mt_loop" id="mt_loop" <?php checked('on', $mt_loop)?>>
            </p>

            <p>
            <label for="slider_autoplay">Autoplay Speed</label>
            <input type="number" name="mt_slider_autoplay" id="slider_autoplay" max="5000" min="1000" value="<?php echo $mt_slider_autoplay ?>">
            </p>

            <p>
            <label for="slider_pagination">Pagination</label>
            <input type="checkbox" name="mt_slider_pagination" id="slider_pagination" <?php checked('on', $mt_slider_pagination)?>>
            </p>

            <?php
                submit_button();
            ?>
        </form>
    <?php
}