<?php
/*
Plugin Name: NS Studio
Plugin URI: https://www.nss.az
Description: NS Studio tərəfindən hazırlanmış veb saytlar üçün əlavə
Version: 1.3.2
Author: Nail Seyidov
Author URI: https://www.nailseyidov.com
Requires at least: 4.6
Tested up to: 5.8.2
Requires PHP: 5.6
License: GNU
*/
$control= get_option('nsstudio_adres');

add_action('admin_menu', 'nsstudio_menu');
function nsstudio_menu(){
 add_menu_page('NS Studio','NS Studio', 'manage_options', 'ns-studio', 'nsstudio_parametrler', plugins_url( 'ns-studio/img/logo-admin.png'));
}
//Elavenin parametrleri
function nsstudio_parametrler(){
    if (isset($_POST['nsstudio_update'])) {
    // Eger icaze olmasa
    if (!isset($_POST['NS_param']) || ! wp_verify_nonce( $_POST['NS_param'], 'NS_param' ) ) {
    print 'Bunu etmək üçün səlahiyyətiniz yoxdur!';
    exit;
    }else{
    // İcazeni keçdi
    $nsstudio_adres = sanitize_text_field($_POST['nsstudio_adres']);
    $nsstudio_arxaplan = sanitize_text_field($_POST['nsstudio_arxaplan']);
    $nsstudio_margin = sanitize_text_field($_POST['nsstudio_margin']);
    if (empty($nsstudio_margin)) {
        $nsstudio_margin = 0;
    }
    $nsstudio_reng = sanitize_text_field($_POST['nsstudio_reng']);
    $nsstudio_logo = sanitize_text_field($_POST['nsstudio_logo']);
    update_option('nsstudio_adres', $nsstudio_adres);
    update_option('nsstudio_arxaplan', $nsstudio_arxaplan);
    update_option('nsstudio_margin', $nsstudio_margin);
    update_option('nsstudio_reng', $nsstudio_reng);
    update_option('nsstudio_logo', $nsstudio_logo);
    echo'<div class="updated"><p><strong>Parametrlər uğurla yeniləndi.</strong></p></div>';
  }
    }
    ?>
    <style> 
    #nsstudio input[type=text], input[type=number] {
    width: 100%;
    padding: 12px 20px;
    margin: 20px 0;
    box-sizing: border-box;
    }
    
    #nsstudio select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    margin: 20px 0;
    border-radius: 4px;
    background-color: #fff;
    }
    
    
    #nsstudio input[type=button], input[type=submit], input[type=reset] {
    background-color: #5C27A8;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    width: 100%;
    }
    </style>
    <h2>NS Studio Parametrləri</h2>
    <hr>
    <form id='nsstudio' action='' method='POST'>
        <?php wp_nonce_field('NS_param', 'NS_param'); ?>
        <label for="nsstudio_adres">Sayt Adresi (dəyişməyin)</label>
        <input  type="text" minlength="3" value="<?php echo get_option('nsstudio_adres'); ?>" id="nsstudio_adres" name="nsstudio_adres">
        <label for="nsstudio_arxaplan">Arxaplan rəngi</label>
        <input  type="text" minlength="7" value="<?php echo get_option('nsstudio_arxaplan'); ?>" id="nsstudio_arxaplan" name="nsstudio_arxaplan">
        <label for="nsstudio_margin">Üst margin</label>
        <input type="number" maxlength="3" value="<?php echo get_option('nsstudio_margin'); ?>" id="nsstudio_margin" name="nsstudio_margin">
        <p>Logo Rəngi</p>
        <select id="nsstudio_reng" name="nsstudio_reng">
            <option <?php if(get_option('nsstudio_reng') == 'black'){
                echo 'selected';
            }?> value='black'>Qara</option>
            <option <?php if(get_option('nsstudio_reng') == 'white'){
                echo 'selected';
            }?> value='white'>Ağ</option>
        </select>
        <p>Logo Tipi</p>
        <select id="nsstudio_logo" name="nsstudio_logo">
            <option <?php if(get_option('nsstudio_logo') == 'icon'){
                echo 'selected';
            }?> value='icon'>İkon logo</option>
            <option <?php if(get_option('nsstudio_logo') == 'full'){
                echo 'selected';
            }?> value='full'>Tam logo</option>
        </select>
        <hr>
        <input type="submit" value="Saxla" name="nsstudio_update" id="nsstudio_update">
    </form>
    
    <h2>Nümunə</h2>
    <?php if (strlen($GLOBALS['control'])>=5) { ?>
    <hr>
    <style>
    #logo_design {
    height:15px!important;
    }
    .created {
    position: relative;
    margin: 0;
    padding: 0;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    background-color: <?php echo get_option('nsstudio_arxaplan'); ?>;
    }
    </style>
    <div class="created">
    <a target="_blank" href="https://nss.az/portfolio/<?php echo get_option('nsstudio_adres'); ?>">
        <img id="logo_design" src="/wp-content/plugins/ns-studio/img/logo-<?php echo get_option('nsstudio_logo').'-'.get_option('nsstudio_reng'); ?>.svg" title="Bu sayt NS Studio tərəfindən hazırlanmışdır." alt="Bu sayt NS Studio tərəfindən hazırlanmışdır.">
    </a>
    </div>
    <?php
    } else {
        echo "<h3>Parametrlər seçilməyib.</h3>";
    }
}

if (strlen($GLOBALS['control'])>=5) {
/* Elavenin esas funksiyasi */
add_action('wp_footer', 'nsstudio_footer');
function nsstudio_footer(){
?>
<style>
    #logo_design {
    height:15px!important;
    }
    .created {
    position: relative;
    margin-top:  <?php echo get_option('nsstudio_margin'); ?>px;
    padding: 0;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    background-color: <?php echo get_option('nsstudio_arxaplan'); ?>;
    z-index: 10;
    }
    </style>
    <div class="created">
    <a target="_blank" href="https://nss.az/portfolio/<?php echo get_option('nsstudio_adres'); ?>">
        <img id="logo_design" src="/wp-content/plugins/ns-studio/img/logo-<?php echo get_option('nsstudio_logo').'-'.get_option('nsstudio_reng'); ?>.svg" title="Bu sayt NS Studio tərəfindən hazırlanmışdır." alt="Bu sayt NS Studio tərəfindən hazırlanmışdır.">
    </a>
    </div>
<?php
};
}
?>