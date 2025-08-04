<?php

/**
 *  Get slider template
 */
function mt_get_slider_template()
{
    ob_start();
    require_once plugin_dir_path(__FILE__) . 'public/view/mt-slider-template.php';
    return ob_get_clean();
}

add_shortcode('mt_slider', 'mt_get_slider_template');


/**
 * Slider settings HTML
 */
function mt_swiperjs_slider_settings_page()
{

    if (isset($_POST['mt_loop']) || isset($_POST['mt_autoplay']) || isset($_POST['mt_slider_pagination']) || isset($_POST['mt_slider_arrow'])) {
        update_option('mt_loop', $_POST['mt_loop'] ?? 'off');
        update_option('mt_autoplay', $_POST['mt_autoplay']);
        update_option('mt_slider_pagination', $_POST['mt_slider_pagination'] ?? 'off');
        update_option('mt_slider_arrow', $_POST['mt_slider_arrow'] ?? 'off');
    }


    $mt_loop = get_option('mt_loop');
    $mt_autoplay = get_option('mt_autoplay');
    $mt_slider_pagination = get_option('mt_slider_pagination');
    $mt_slider_arrow = get_option('mt_slider_arrow');


?>
    <h1>MT Slider Settings</h1>
    <form action="" method="post">
        <p>
            <label for="mt_loop"> Enable / Disable Loop</label>
            <input type="checkbox" name="mt_loop" <?php checked('on', $mt_loop); ?>>
        </p>
        <p>
            <label for="mt_autoplay"> Autoplay Speed</label>
            <input type="number" name="mt_autoplay" id="" value="<?php echo $mt_autoplay ?>">
        </p>
        <p>
            <label for="mt_slider_pagination">Pagination</label>
            <input type="checkbox" name="mt_slider_pagination" id="slider_pagination" <?php checked('on', $mt_slider_pagination); ?>>
        </p>
        <p>
            <label for="mt_slider_arrow">Show / Hide Arrow </label>
            <input type="checkbox" name="mt_slider_arrow" id="slider_pagination" <?php checked('on', $mt_slider_arrow); ?>>
        </p>

        <?php
        submit_button();
        ?>
    </form>

<?php
}