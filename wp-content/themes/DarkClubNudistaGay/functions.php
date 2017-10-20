<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
function add_css_js_custom_Dark() {
	//wp_enqueue_style('custom-dark-css', get_template_directory_uri() . '/assets/css/custom.css' );
  wp_enqueue_style('bootstrap-dark-css', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_script( 'script-dark-js', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'add_css_js_custom_Dark' );

add_filter('wp_trim_excerpt', function($text){
   $max_length = 150;

   if(mb_strlen($text, 'UTF-8') > $max_length){
     $split_pos = mb_strpos(wordwrap($text, $max_length), "\n", 0, 'UTF-8');
     $text = mb_substr($text, 0, $split_pos, 'UTF-8');
   }
   return $text;
});



function mytheme_custom_login_redirect($redirect_to, $request, $user) {
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {

        // Si es un usuario administrador
        // le redirigimos a la página de gestión de plugins
        if ( in_array( 'administrator', $user->roles ) )
            return home_url( '/' );

        // Si es un usuario con permisos de editor
        // le enviamos a la página de gestión de entradas.
        elseif ( in_array( 'editor', $user->roles ) )
            return home_url( '/wp-admin/edit.php' );

        // Y a todos los demás usuarios
        // les redirigimos a la página de inicio de la web.
        else
            return home_url();

    } else {
        return $redirect_to;
    }
}
add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
if(!session_id()) {
session_start();
}
}

function myEndSession() {
session_destroy ();
}

add_filter( 'login_redirect', 'mytheme_custom_login_redirect', 10, 3 );

// AÑADIR CAMPOS EN EL VISTA  ***********************************************
// AÑADIR CAMPOS EN EL VISTA  ***********************************************
add_action('register_form', 'agregar_campos_registro' );
add_filter('registration_errors', 'validar_campos_registro', 10, 3);
add_action('user_register', 'guardar_campos_registro');

function agregar_campos_registro() {
	$user_edad = ( isset( $_POST['user_edad'] ) ) ? $_POST['user_edad']: '';
?>
  <p>
    <label for="telefono">Telefono<br />
    <input type="text" name="telefono" id="telefono" class="input" size="20" /></label>
  </p>
	<p>
	    <label for="user_edad">Edad<br />
	    <input type="text" name="user_edad" id="user_edad" class="input" value="<?php echo esc_attr(stripslashes($user_edad)); ?>" size="20" /></label>
	</p>
  <p>
	    <label for="user_estatura">Estatura (cm)<br />
      <select class="" name="user_estatura">
        <?php for ($i=120; $i < 210; $i++) { ?>
          <option value="<?php echo $i ?>" size="20"><?php echo $i ?></option>
        <?php } ?>
      </select>
	</p>
  <p>
	    <label for="user_peso">Peso (Kl)<br />
      <select class="" name="user_peso">
        <?php for ($i=45; $i < 110; $i++) { ?>
          <option value="<?php echo $i ?>" size="20"><?php echo $i ?></option>
        <?php } ?>
      </select>
	</p>
  <p>
	    <label for="user_contextura">Contextura<br />

      <select class="" name="user_contextura">
        <option value="Delgada">Delgada</option>
        <option value="Atlética">Atlética</option>
        <option value="Musculosa">Musculosa</option>
        <option value="Curpulenta">Curpulenta</option>
        <option value="Maldito cerdo">Maldito cerdo</option>
      </select>
	</p>
  <p>
      <label for="user_color_ojos">Color de Ojos<br />
      <select class="" name="user_color_ojos">
        <option value="Azul">Azul</option>
        <option value="Verde">Verde</option>
        <option value="Miel">Miel</option>
        <option value="Cafe">Café</option>
        <option value="Negro">Negro</option>
        <option value="Gris">Gris</option>
        <option value="Violeta">Violeta</option>
      </select>
  </p>
  <p>
      <label for="user_color_cabello">Color de Cabello<br />
      <select class="" name="user_color_cabello">
        <option value="Rapado">Rapado (skin)</option>
        <option value="Calvo">Calvo</option>
        <option value="Rubio">Rubio</option>
        <option value="Rojizo">Rojizo</option>
        <option value="Castaño">Castaño</option>
        <option value="Negro">Negro</option>
        <option value="Platinado">Platinado</option>
        <option value="Blanco">Blanco</option>
      </select>
  </p>
  <p>
      <label for="user_velludo">Es velludo<br />
      <select class="" name="user_velludo">
        <option value="Velludo">Velludo</option>
        <option value="Medio Velludo">Medio Velludo</option>
        <option value="Sin Vello">Sin Vello</option>
      </select>
  </p>
  <p>
      <label for="user_vellos_cara">Vellos en la cara<br />
      <select class="" name="user_vellos_cara">
        <option value="Barba">Barba</option>
        <option value="Candado">Candado</option>
        <option value="Vigotes">Vigotes</option>
        <option value="Sin Barba">Sin Barba</option>
      </select>
  </p>
  <p>
      <label for="user_verga">Cómo es tu verga<br />
      <select class="" name="user_verga">
        <option value="Gruesa">Gruesa</option>
        <option value="Normal">Normal</option>
        <option value="Delgada">Delgada</option>
      </select>
  </p>
  <p>
      <label for="user_verga_erecta">Largo de tu verga erecta (Cm)<br />
      <select class="" name="user_verga_erecta">
        <option value="Menos de 10">Menos de 10</option>
        <?php for ($i=10; $i < 29; $i++) { ?>
          <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php } ?>
        <option value="Más de 30">Más de 30</option>
      </select>
  </p>
  <p>
      <label for="user_inclinacion_sexual">Inclinación Sexual<br />
      <select class="" name="user_inclinacion_sexual">
        <option value="Gay">Gay</option>
        <option value="Bisexual">Bisexual</option>
      </select>
  </p>
  <p>
      <label for="user_al_culear">Al culear o hacer sexo que posición adopta<br />
      <select class="" name="user_al_culear">
        <option value="Activo">Activo</option>
        <option value="Pasivo">Pasivo</option>
        <option value="Versatil">Versatil 50/50</option>
      </select>
  </p>
  <p>
      <label for="user_considera">Como se considera en cuanto a sexo explícito, Nudísmo, Exhibicismo, Voyeurismo y Pornografía ?<br />
      <select class="" name="user_considera">
        <option value="Liberado">Liberado</option>
        <option value="Tolerante">Tolerante</option>
        <option value="Reservado">Reservado</option>
        <option value="Timido">Timido</option>
      </select>
  </p>
  <p>
      <label for="user_experiencia_sexo">Tiene experiencia en Sadomasoquísmo y Sexo Duro ?<br />
      <select class="" name="user_experiencia_sexo">
        <option value="Mucha">Mucha</option>
        <option value="Poca">Poca</option>
        <option value="Alguna">Alguna</option>
        <option value="Ninguna">Ninguna</option>
      </select>
  </p>
  <p>
      <label for="user_rol_sado">Cuál es su rol o papel en sadomasoquísmo ?<br />
      <select class="" name="user_rol_sado">
        <option value="Amo">Amo (Master)</option>
        <option value="Esclavo">Esclavo (Slave)</option>
        <option value="Ambos">Ambos</option>
      </select>
  </p>
  <p>
      <label for="user_uso_de_condon">Cuándo cule usa condones ?<br />
      <select class="" name="user_uso_de_condon">
        <option value="Siempre">Siempre</option>
        <option value="Casi siempre">Casi siempre</option>
        <option value="Algunas veces">Algunas veces</option>
        <option value="Nunca">Nunca</option>
      </select>
  </p>
  <h3>Fetiches</h3>
  <h4>Cuáles atuendos del Dress Code ( Código de vestido fetichista) le gustan más o con cuáles fetiches se identifica?</h4>
  <p>
    <label for="Leather"><input type="checkbox" name="Leather" class="form-check-input">Leather (Cuero)</label>
  </p>
  <p>
    <label for="Rubber"><input type="checkbox" name="Rubber" class="form-check-input"> Rubber (Latex - Sintéticos)</label>
  </p>
  <p>
    <label for="Cowboys"><input type="checkbox" name="Cowboys" class="form-check-input"> Cowboys (Vaqueros)</label>
  </p>
  <p>
    <label for="Cops"><input type="checkbox" name="Cops" class="form-check-input">Cops (Policías)</label>
  </p>
  <p>
    <label for="Uniforms"><input type="checkbox" name="Uniforms" class="form-check-input">Uniforms (Militares Bomberos, Marinos, Camuflados)</label>
  </p>
  <p>
    <label for="Skin"><input type="checkbox" name="Skin" class="form-check-input">Skin (Rapados)</label>
  </p>
  <p>
    <label for="Work"><input type="checkbox" name="Work" class="form-check-input">Work (Obreros)</label>
  </p>
  <p>
    <label for="Sport"><input type="checkbox" name="Sport" class="form-check-input">Sport (Prendas deportivas)</label>
  </p>
  <p>
    <label for="Bear"><input type="checkbox" name="Bear" class="form-check-input">Bear (Osos - Velludos)</label>
  </p>
  <p>
    <label for="Boots"><input type="checkbox" name="Boots" class="form-check-input">Boots (Botas)</label>
  </p>
  <h3>TECNICAS DE SEXO DURO</h3>
  <h4>Cuáles técnicas de sexo duro  o sadomasoquismo ha practicado o le gustaría experimentar o perfeccionar?</h4>
  <p>
    <label for="Bondage"><input type="checkbox" name="Bondage" class="form-check-input">Bondage (Amarrar e inmovilizar)</label>
  </p>
  <p>
    <label for="Spanking"><input type="checkbox" name="Spanking" class="form-check-input">Spanking (Azotes - Palmadas)</label>
  </p>
  <p>
    <label for="Torture"><input type="checkbox" name="Torture" class="form-check-input">Torture Tits, Cock & Balls (torturas en tetillas, verga y testículos)</label>
  </p>
  <p>
    <label for="Piercing"><input type="checkbox" name="Piercing" class="form-check-input">Piercing (perforaciones corporales)</label>
  </p>
  <p>
    <label for="Pissing"><input type="checkbox" name="Pissing" class="form-check-input">Pissing (orinar)</label>
  </p>
  <p>
    <label for="Hot"><input type="checkbox" name="Hot" class="form-check-input">Hot Wax (Cera caliente)</label>
  </p>
  <p>
    <label for="Dildos"><input type="checkbox" name="Dildos" class="form-check-input">Dildos & Pumps (consoladores, vibradores y plugs, bolas, bombas)</label>
  </p>
  <p>
    <label for="Bareback"><input type="checkbox" name="Bareback" class="form-check-input">Bareback & Sperm (sexo sin condón y juegos con semen)</label>
  </p>
  <p>
    <label for="Hanging"><input type="checkbox" name="Hanging" class="form-check-input">Hanging (colgadura o suspensión de pies, manos, verga y pelotas</label>
  </p>
  <p>
    <label for="Fisting"><input type="checkbox" name="Fisting" class="form-check-input">Fisting (meter manos en el culo)</label>
  </p>
  <p>
    <label for="Training"><input type="checkbox" name="Training" class="form-check-input">Training (entrenamiento de perros)</label>
  </p>
  <p>
    <label for="Rimming"><input type="checkbox" name="Rimming" class="form-check-input">Rimming & Scat (chupar culos y juegos con excrementos</label>
  </p>
  <h3>FANTASIAS  o  PRACTICAS SEXUALES</h3>
  <h4>Cuáles prácticas sexuales ha realizado o le gustaría realizar?</h4>
  <p>
    <label for="Orgias_bisex"><input type="checkbox" name="Orgias_bisex" class="form-check-input">Orgías Bisex (Sexo con Machos y hembras gay)</label>
  </p>
  <p>
    <label for="Orgias_chicos"><input type="checkbox" name="Orgias_chicos" class="form-check-input">Orgías de Chicos de 18 a 25 años</label>
  </p>
  <p>
    <label for="Filmaciones_gay_sadom"><input type="checkbox" name="Filmaciones_gay_sadom" class="form-check-input">Filmaciones Porno de sexo  gay sadomasoquista</label>
  </p>
  <p>
    <label for="Orgias_swinger"><input type="checkbox" name="Orgias_swinger" class="form-check-input">Orgías Swingger (Intercambio de parejas hétero hombre-mujer)</label>
  </p>
  <p>
    <label for="Orgias_hombres"><input type="checkbox" name="Orgias_hombres" class="form-check-input">Orgías de Hombres de 25 a 45 años</label>
  </p>
  <p>
    <label for="Filmaciones_gay_tradicional"><input type="checkbox" name="Filmaciones_gay_tradicional" class="form-check-input">Filmaciones Porno de sexo gay tradicional</label>
  </p>
  <p>
    <label for="Ser_stripper_show"><input type="checkbox" name="Ser_stripper_show" class="form-check-input">Ser stripper o hacer shows de sexo gay tradicional en público.</label>
  </p>
  <p>
    <label for="hacer_show_sexo_gay"><input type="checkbox" name="hacer_show_sexo_gay" class="form-check-input">Hacer shows de sexo gay sadomasoquista en público</label>
  </p>
  <p>
    <label for="Sexo_interrracial"><input type="checkbox" name="Sexo_interrracial" class="form-check-input">Sexo interracial. (Culear con negros, rubios, asiáticos etc, en pareja u orgía)</label>
  </p>
  <p>
    <label for="Tiene_practicas_sexuales"><input type="checkbox" name="Tiene_practicas_sexuales" class="form-check-input">Tiene o pertenece a algún tipo de grupo de prácticas sexuales. (Bisex, swingger, sadomasoquistas, fetish)</label>
  </p>
  <p>
    <label for="utilizar_juguetes"><input type="checkbox" name="utilizar_juguetes" class="form-check-input">Utilizar juguetes, equipos y aparatos o ayudas sexuales</label>
  </p>
  <p>
    <label for="Utilizar_estimulantes"><input type="checkbox" name="Utilizar_estimulantes" class="form-check-input">Utilizar estimulantes sexuales como poppers o viagra.</label>
  </p>
  <p>
    <label for="Pichar_con_jovenes"><input type="checkbox" name="Pichar_con_jovenes" class="form-check-input">Pichar con jóvenes menores que usted</label>
  </p>
  <p>
    <label for="Pichar_con_adultos"><input type="checkbox" name="Pichar_con_adultos" class="form-check-input">Pichar con adultos maduros mayores que usted</label>
  </p>
	<!-- <p style="margin-bottom:20px">
		<label>Sexo</label><br />
		<input type="radio" name="user_sexo" class="radio" value="h" checked /> Hombre
		<input type="radio" name="user_sexo" class="radio" value="m" style="margin-left:10px" /> Mujer
	</p> -->
<?php
}

function validar_campos_registro ($errors, $sanitized_user_login, $user_email) {
    if ( empty( $_POST['user_edad'] ) )
        $errors->add( 'user_edad_error', __('<strong>ERROR</strong>: Por favor, introduce tu edad.') );
    return $errors;
}

function guardar_campos_registro ($user_id) {
	if ( isset($_POST['user_edad']) && isset($_POST['user_estatura']) && isset($_POST['user_peso']) ){
		update_user_meta($user_id, 'user_edad', $_POST['user_edad']);
    update_user_meta($user_id, 'user_estatura', $_POST['user_estatura']);
    update_user_meta($user_id, 'user_peso', $_POST['user_peso']);
    update_user_meta($user_id, 'user_contextura', $_POST['user_contextura']);
    update_user_meta($user_id, 'user_color_ojos', $_POST['user_color_ojos']);
    update_user_meta($user_id, 'user_color_cabello', $_POST['user_color_cabello']);
    update_user_meta($user_id, 'user_velludo', $_POST['user_velludo']);
    update_user_meta($user_id, 'user_vellos_cara', $_POST['user_vellos_cara']);
    update_user_meta($user_id, 'user_verga', $_POST['user_verga']);
    update_user_meta($user_id, 'user_verga_erecta', $_POST['user_verga_erecta']);
    update_user_meta($user_id, 'user_inclinacion_sexual', $_POST['user_inclinacion_sexual']);
    update_user_meta($user_id, 'user_al_culear', $_POST['user_al_culear']);
    update_user_meta($user_id, 'user_considera', $_POST['user_considera']);
    update_user_meta($user_id, 'user_experiencia_sexo', $_POST['user_experiencia_sexo']);
    update_user_meta($user_id, 'user_rol_sado', $_POST['user_rol_sado']);
    update_user_meta($user_id, 'user_uso_de_condon', $_POST['user_uso_de_condon']);
    // chekboxes fetiches
    if (!empty($_POST['Leather'])) {
      update_user_meta($user_id, 'Leather', $_POST['Leather']);
    }else {
      update_user_meta($user_id, 'Leather', 'off');
    }
    if (!empty($_POST['Rubber'])) {
      update_user_meta($user_id, 'Rubber', $_POST['Rubber']);
    }else {
      update_user_meta($user_id, 'Rubber', 'off');
    }
    if (!empty($_POST['Cowboys'])) {
      update_user_meta($user_id, 'Cowboys', $_POST['Cowboys']);
    }else {
      update_user_meta($user_id, 'Cowboys', 'off');
    }
    if (!empty($_POST['Cops'])) {
      update_user_meta($user_id, 'Cops', $_POST['Cops']);
    }else {
      update_user_meta($user_id, 'Cops', 'off');
    }
    if (!empty($_POST['Uniforms'])) {
      update_user_meta($user_id, 'Uniforms', $_POST['Uniforms']);
    }else {
      update_user_meta($user_id, 'Uniforms', 'off');
    }
    if (!empty($_POST['Skin'])) {
      update_user_meta($user_id, 'Skin', $_POST['Skin']);
    }else {
      update_user_meta($user_id, 'Skin', 'off');
    }
    if (!empty($_POST['Work'])) {
      update_user_meta($user_id, 'Work', $_POST['Work']);
    }else {
      update_user_meta($user_id, 'Work', 'off');
    }
    if (!empty($_POST['Sport'])) {
      update_user_meta($user_id, 'Sport', $_POST['Sport']);
    }else {
      update_user_meta($user_id, 'Sport', 'off');
    }
    if (!empty($_POST['Bear'])) {
      update_user_meta($user_id, 'Bear', $_POST['Bear']);
    }else {
      update_user_meta($user_id, 'Bear', 'off');
    }
    if (!empty($_POST['Boots'])) {
      update_user_meta($user_id, 'Boots', $_POST['Boots']);
    }else {
      update_user_meta($user_id, 'Boots', 'off');
    }
    // chekboxes TECNICAS DE SEXO DURO
    if (!empty($_POST['Bondage'])) {
      update_user_meta($user_id, 'Bondage', $_POST['Bondage']);
    }else {
      update_user_meta($user_id, 'Bondage', 'off');
    }
    if (!empty($_POST['Spanking'])) {
      update_user_meta($user_id, 'Spanking', $_POST['Spanking']);
    }else {
      update_user_meta($user_id, 'Spanking', 'off');
    }
    if (!empty($_POST['Torture'])) {
      update_user_meta($user_id, 'Torture', $_POST['Torture']);
    }else {
      update_user_meta($user_id, 'Torture', 'off');
    }
    if (!empty($_POST['Piercing'])) {
      update_user_meta($user_id, 'Piercing', $_POST['Piercing']);
    }else {
      update_user_meta($user_id, 'Piercing', 'off');
    }
    if (!empty($_POST['Pissing'])) {
      update_user_meta($user_id, 'Pissing', $_POST['Pissing']);
    }else {
      update_user_meta($user_id, 'Pissing', 'off');
    }
    if (!empty($_POST['Hot'])) {
      update_user_meta($user_id, 'Hot', $_POST['Hot']);
    }else {
      update_user_meta($user_id, 'Hot', 'off');
    }
    if (!empty($_POST['Dildos'])) {
      update_user_meta($user_id, 'Dildos', $_POST['Dildos']);
    }else {
      update_user_meta($user_id, 'Dildos', 'off');
    }
    if (!empty($_POST['Bareback'])) {
      update_user_meta($user_id, 'Bareback', $_POST['Bareback']);
    }else {
      update_user_meta($user_id, 'Bareback', 'off');
    }
    if (!empty($_POST['Dildos'])) {
      update_user_meta($user_id, 'Dildos', $_POST['Dildos']);
    }else {
      update_user_meta($user_id, 'Dildos', 'off');
    }
    if (!empty($_POST['Hanging'])) {
      update_user_meta($user_id, 'Hanging', $_POST['Hanging']);
    }else {
      update_user_meta($user_id, 'Hanging', 'off');
    }
    if (!empty($_POST['Fisting'])) {
      update_user_meta($user_id, 'Fisting', $_POST['Fisting']);
    }else {
      update_user_meta($user_id, 'Fisting', 'off');
    }
    if (!empty($_POST['Training'])) {
      update_user_meta($user_id, 'Training', $_POST['Training']);
    }else {
      update_user_meta($user_id, 'Training', 'off');
    }
    if (!empty($_POST['Rimming'])) {
      update_user_meta($user_id, 'Rimming', $_POST['Rimming']);
    }else {
      update_user_meta($user_id, 'Rimming', 'off');
    }
    // chekboxes FANTASIAS  o  PRACTICAS SEXUALES
    if (!empty($_POST['Orgias_bisex'])) {
      update_user_meta($user_id, 'Orgias_bisex', $_POST['Orgias_bisex']);
    }else {
      update_user_meta($user_id, 'Orgias_bisex', 'off');
    }
    if (!empty($_POST['Orgias_chicos'])) {
      update_user_meta($user_id, 'Orgias_chicos', $_POST['Orgias_chicos']);
    }else {
      update_user_meta($user_id, 'Orgias_chicos', 'off');
    }
    if (!empty($_POST['Filmaciones_gay_sadom'])) {
      update_user_meta($user_id, 'Filmaciones_gay_sadom', $_POST['Filmaciones_gay_sadom']);
    }else {
      update_user_meta($user_id, 'Filmaciones_gay_sadom', 'off');
    }
    if (!empty($_POST['Orgias_swinger'])) {
      update_user_meta($user_id, 'Orgias_swinger', $_POST['Orgias_swinger']);
    }else {
      update_user_meta($user_id, 'Orgias_swinger', 'off');
    }
    if (!empty($_POST['Orgias_hombres'])) {
      update_user_meta($user_id, 'Orgias_hombres', $_POST['Orgias_hombres']);
    }else {
      update_user_meta($user_id, 'Orgias_hombres', 'off');
    }
    if (!empty($_POST['Filmaciones_gay_tradicional'])) {
      update_user_meta($user_id, 'Filmaciones_gay_tradicional', $_POST['Filmaciones_gay_tradicional']);
    }else {
      update_user_meta($user_id, 'Filmaciones_gay_tradicional', 'off');
    }
    if (!empty($_POST['Ser_stripper_show'])) {
      update_user_meta($user_id, 'Ser_stripper_show', $_POST['Ser_stripper_show']);
    }else {
      update_user_meta($user_id, 'Ser_stripper_show', 'off');
    }
    if (!empty($_POST['hacer_show_sexo_gay'])) {
      update_user_meta($user_id, 'hacer_show_sexo_gay', $_POST['hacer_show_sexo_gay']);
    }else {
      update_user_meta($user_id, 'hacer_show_sexo_gay', 'off');
    }
    if (!empty($_POST['Sexo_interrracial'])) {
      update_user_meta($user_id, 'Sexo_interrracial', $_POST['Sexo_interrracial']);
    }else {
      update_user_meta($user_id, 'Sexo_interrracial', 'off');
    }
    if (!empty($_POST['Tiene_practicas_sexuales'])) {
      update_user_meta($user_id, 'Tiene_practicas_sexuales', $_POST['Tiene_practicas_sexuales']);
    }else {
      update_user_meta($user_id, 'Tiene_practicas_sexuales', 'off');
    }
    if (!empty($_POST['utilizar_juguetes'])) {
      update_user_meta($user_id, 'utilizar_juguetes', $_POST['utilizar_juguetes']);
    }else {
      update_user_meta($user_id, 'utilizar_juguetes', 'off');
    }
    if (!empty($_POST['Utilizar_estimulantes'])) {
      update_user_meta($user_id, 'Utilizar_estimulantes', $_POST['Utilizar_estimulantes']);
    }else {
      update_user_meta($user_id, 'Utilizar_estimulantes', 'off');
    }
    if (!empty($_POST['Pichar_con_jovenes'])) {
      update_user_meta($user_id, 'Pichar_con_jovenes', $_POST['Pichar_con_jovenes']);
    }else {
      update_user_meta($user_id, 'Pichar_con_jovenes', 'off');
    }
    if (!empty($_POST['Pichar_con_adultos'])) {
      update_user_meta($user_id, 'Pichar_con_adultos', $_POST['Pichar_con_adultos']);
    }else {
      update_user_meta($user_id, 'Pichar_con_adultos', 'off');
    }
	}
}
// AÑADIR CAMPOS EN EL VISTA  ***********************************************
// AÑADIR CAMPOS EN EL VISTA  ***********************************************


// AÑADIR CAMPOS EN EL ADMINISTRADOR ***********************************************





// AÑADIR CAMPOS EN EL ADMINISTRADOR ***********************************************

add_action( 'show_user_profile', 'agregar_campos_perfil' );
add_action( 'edit_user_profile', 'agregar_campos_perfil' );
add_action( 'personal_options_update', 'guardar_campos_registro' );
add_action( 'edit_user_profile_update', 'guardar_campos_registro' );

function agregar_campos_perfil( $user ) {
	$user_edad = esc_attr( get_the_author_meta( 'user_edad', $user->ID ) );
	$user_estatura = esc_attr( get_the_author_meta( 'user_estatura', $user->ID ) );
  $user_peso = esc_attr( get_the_author_meta( 'user_peso', $user->ID ) );
  $user_contextura = esc_attr( get_the_author_meta( 'user_contextura', $user->ID ) );
  $user_color_ojos = esc_attr( get_the_author_meta( 'user_color_ojos', $user->ID ) );
  $user_color_cabello = esc_attr( get_the_author_meta( 'user_color_cabello', $user->ID ) );
  $user_velludo = esc_attr( get_the_author_meta( 'user_velludo', $user->ID ) );
  $user_verga = esc_attr( get_the_author_meta( 'user_verga', $user->ID ) );
  $user_vellos_cara = esc_attr( get_the_author_meta( 'user_vellos_cara', $user->ID ) );
  $user_verga_erecta = esc_attr( get_the_author_meta( 'user_verga_erecta', $user->ID ) );
  $user_inclinacion_sexual = esc_attr( get_the_author_meta( 'user_inclinacion_sexual', $user->ID ) );
  $user_al_culear = esc_attr( get_the_author_meta( 'user_al_culear', $user->ID ) );
  $user_considera = esc_attr( get_the_author_meta( 'user_considera', $user->ID ) );
  $user_experiencia_sexo = esc_attr( get_the_author_meta( 'user_experiencia_sexo', $user->ID ) );
  $user_rol_sado = esc_attr( get_the_author_meta( 'user_rol_sado', $user->ID ) );
  $user_uso_de_condon = esc_attr( get_the_author_meta( 'user_uso_de_condon', $user->ID ) );
  //fetiches -------------------------------------------------------
  //fetiches -------------------------------------------------------
  $Leather = esc_attr( get_the_author_meta( 'Leather', $user->ID ) );
  $Rubber = esc_attr( get_the_author_meta( 'Rubber', $user->ID ) );
  $Leather = esc_attr( get_the_author_meta( 'Leather', $user->ID ) );
  $Cowboys = esc_attr( get_the_author_meta( 'Cowboys', $user->ID ) );
  $Cops = esc_attr( get_the_author_meta( 'Cops', $user->ID ) );
  $Uniforms = esc_attr( get_the_author_meta( 'Uniforms', $user->ID ) );
  $Skin = esc_attr( get_the_author_meta( 'Skin', $user->ID ) );
  $Work = esc_attr( get_the_author_meta( 'Work', $user->ID ) );
  $Sport = esc_attr( get_the_author_meta( 'Sport', $user->ID ) );
  $Bear = esc_attr( get_the_author_meta( 'Bear', $user->ID ) );
  $Boots = esc_attr( get_the_author_meta( 'Boots', $user->ID ) );

  $Bondage = esc_attr( get_the_author_meta( 'Bondage', $user->ID ) );
  $Spanking = esc_attr( get_the_author_meta( 'Spanking', $user->ID ) );
  $Torture = esc_attr( get_the_author_meta( 'Torture', $user->ID ) );
  $Piercing = esc_attr( get_the_author_meta( 'Piercing', $user->ID ) );
  $Pissing = esc_attr( get_the_author_meta( 'Pissing', $user->ID ) );
  $Hot = esc_attr( get_the_author_meta( 'Hot', $user->ID ) );
  $Dildos = esc_attr( get_the_author_meta( 'Dildos', $user->ID ) );
  $Bareback = esc_attr( get_the_author_meta( 'Bareback', $user->ID ) );
  $Hanging = esc_attr( get_the_author_meta( 'Hanging', $user->ID ) );
  $Fisting = esc_attr( get_the_author_meta( 'Fisting', $user->ID ) );
  $Training = esc_attr( get_the_author_meta( 'Training', $user->ID ) );
  $Rimming = esc_attr( get_the_author_meta( 'Rimming', $user->ID ) );

  $Orgias_bisex = esc_attr( get_the_author_meta( 'Orgias_bisex', $user->ID ) );
  $Orgias_chicos = esc_attr( get_the_author_meta( 'Orgias_chicos', $user->ID ) );
  $Filmaciones_gay_sadom = esc_attr( get_the_author_meta( 'Filmaciones_gay_sadom', $user->ID ) );
  $Orgias_swinger = esc_attr( get_the_author_meta( 'Orgias_swinger', $user->ID ) );
  $Orgias_hombres = esc_attr( get_the_author_meta( 'Orgias_hombres', $user->ID ) );
  $Filmaciones_gay_tradicional = esc_attr( get_the_author_meta( 'Filmaciones_gay_tradicional', $user->ID ) );
  $Ser_stripper_show = esc_attr( get_the_author_meta( 'Ser_stripper_show', $user->ID ) );
  $hacer_show_sexo_gay = esc_attr( get_the_author_meta( 'hacer_show_sexo_gay', $user->ID ) );
  $Sexo_interrracial = esc_attr( get_the_author_meta( 'Sexo_interrracial', $user->ID ) );
  $Tiene_practicas_sexuales = esc_attr( get_the_author_meta( 'Tiene_practicas_sexuales', $user->ID ) );
  $utilizar_juguetes = esc_attr( get_the_author_meta( 'utilizar_juguetes', $user->ID ) );
  $Utilizar_estimulantes = esc_attr( get_the_author_meta( 'Utilizar_estimulantes', $user->ID ) );
  $Pichar_con_jovenes = esc_attr( get_the_author_meta( 'Pichar_con_jovenes', $user->ID ) );
  $Pichar_con_adultos = esc_attr( get_the_author_meta( 'Pichar_con_adultos', $user->ID ) );

  //fetiches -------------------------------------------------------
  //fetiches -------------------------------------------------------


?>
	<h3>Campos adicionales</h3>

	<table class="form-table">
		<tr>
			<th><label for="direccion">Edad</label></th>
			<td>
				<input type="text" name="user_edad" id="user_edad" class="input" value="<?php echo $user_edad; ?>" size="20" />
				<span class="description">Inserta tu edad</span>
			</td>
		</tr>
		<tr>
			<th><label>Estatura</label></th>
			<td>
        <input type="text" name="user_estatura" id="user_estatura" class="input" value="<?php echo $user_estatura; ?>" size="20" />
				<span class="description">Inserta tu estatura</span>
			</td>
		</tr>
    <tr>
			<th><label>Peso</label></th>
			<td>
        <input type="text" name="user_peso" id="user_peso" class="input" value="<?php echo $user_peso; ?>" size="20" />
				<span class="description">Inserta tu Peso</span>
			</td>
		</tr>
    <tr>
			<th><label>Contextura</label></th>
			<td>
        <select class="" name="user_contextura">
          <option value="<?php echo $user_contextura; ?>"><?php echo $user_contextura; ?></option>
          <option value="Delgada">Delgada</option>
          <option value="Atlética">Atlética</option>
          <option value="Musculosa">Musculosa</option>
          <option value="Curpulenta">Curpulenta</option>
          <option value="Maldito cerdo">Maldito cerdo</option>
        </select>
				<span class="description">Inserta tu Contextura</span>
			</td>
		</tr>
    <tr>
      <th><label>Color de los Ojos</label></th>
      <td>
        <select class="" name="user_color_ojos">
          <option value="<?php echo $user_color_ojos ?>"><?php echo $user_color_ojos ?></option>
          <option value="Azul">Azul</option>
          <option value="Verde">Verde</option>
          <option value="Miel">Miel</option>
          <option value="Cafe">Café</option>
          <option value="Negro">Negro</option>
          <option value="Gris">Gris</option>
          <option value="Violeta">Violeta</option>
        </select>
      </td>
    </tr>
    <tr>
      <th><label>Color del Cabello</label></th>
      <td>
        <select class="" name="user_color_cabello">
          <option value="<?php echo $user_color_cabello ?>"><?php echo $user_color_cabello ?></option>
          <option value="Rapado">Rapado (skin)</option>
          <option value="Calvo">Calvo</option>
          <option value="Rubio">Rubio</option>
          <option value="Rojizo">Rojizo</option>
          <option value="Castaño">Castaño</option>
          <option value="Negro">Negro</option>
          <option value="Platinado">Platinado</option>
          <option value="Blanco">Blanco</option>
        </select>
      </td>
    </tr>
    <tr>
      <th><label>Eres velludo ?</label></th>
      <td>
        <select class="" name="user_velludo">
          <option value="<?php echo $user_velludo ?>"><?php echo $user_velludo ?></option>
          <option value="Velludo">Velludo</option>
          <option value="Medio Velludo">Medio Velludo</option>
          <option value="Sin Vello">Sin Vello</option>
        </select>
      </td>
    </tr>
    <tr>
      <th><label>Tienes vellos en la cara ?</label></th>
      <td>
        <select class="" name="user_vellos_cara">
          <option value="<?php echo $user_vellos_cara ?>"><?php echo $user_vellos_cara ?></option>
          <option value="Barba">Barba</option>
          <option value="Candado">Candado</option>
          <option value="Vigotes">Vigotes</option>
          <option value="Sin Barba">Sin Barba</option>
        </select>
      </td>
    </tr>
    <tr>
      <th><label>Como es tu Verga</label></th>
      <td>
        <select class="" name="user_verga">
          <option value="<?php echo $user_verga ?>"><?php echo $user_verga ?></option>
          <option value="Gruesa">Gruesa</option>
          <option value="Normal">Normal</option>
          <option value="Delgada">Delgada</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Cuanto mide tu Verga Erecta</th>
      <td>
        <select class="" name="user_verga_erecta">
          <option value="<?php echo $user_verga_erecta ?>"><?php echo $user_verga_erecta ?></option>
          <option value="Menos de 10">Menos de 10</option>
          <?php for ($i=10; $i < 29; $i++) { ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
          <?php } ?>
          <option value="Más de 30">Más de 30</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Cual es tu Inclinación Sexual</th>
      <td>
        <select class="" name="user_inclinacion_sexual">
          <option value="<?php echo $user_inclinacion_sexual ?>"><?php echo $user_inclinacion_sexual ?></option>
          <option value="Gay">Gay</option>
          <option value="Bisexual">Bisexual</option>
        </select>
      </td>
    </tr>
    <tr>
      <th><label>Al culear o hacer sexo que posición adopta</label></th>
      <td>
        <select class="" name="user_al_culear">
          <option value="<?php echo $user_al_culear ?>"><?php echo $user_al_culear ?></option>
          <option value="Activo">Activo</option>
          <option value="Pasivo">Pasivo</option>
          <option value="Versatil">Versatil 50/50</option>
        </select>
      </td>
    </tr>
    <tr>
      <th><label>Como se considera en cuanto a sexo explícito, Nudísmo, Exhibicismo, Voyeurismo y Pornografía ?</label></th>
      <td>
        <select class="" name="user_considera">
          <option value="<?php echo $user_considera ?>"><?php echo $user_considera ?></option>
          <option value="Liberado">Liberado</option>
          <option value="Tolerante">Tolerante</option>
          <option value="Reservado">Reservado</option>
          <option value="Timido">Timido</option>
        </select>
      </td>
    </tr>
    <tr>
      <th><label>Tiene experiencia en Sadomasoquísmo y Sexo Duro ?</label></th>
      <td>

        <select class="" name="user_experiencia_sexo">
          <option value="<?php echo $user_experiencia_sexo ?> "><?php echo $user_experiencia_sexo ?></option>
          <option value="Mucha">Mucha</option>
          <option value="Poca">Poca</option>
          <option value="Alguna">Alguna</option>
          <option value="Ninguna">Ninguna</option>
        </select>
      </td>
    </tr>
    <tr>
      <th><label>Cuál es su rol o papel en sadomasoquísmo ?</label></th>
      <td>
        <select class="" name="user_rol_sado">
          <option value="<?php echo $user_rol_sado ?>"><?php echo $user_rol_sado ?></option>
          <option value="Amo">Amo (Master)</option>
          <option value="Esclavo">Esclavo (Slave)</option>
          <option value="Ambos">Ambos</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Cuándo culea usa condones ?</th>
      <td>
        <select class="" name="user_uso_de_condon">
          <option value="<?php echo $user_uso_de_condon ?>"><?php echo $user_uso_de_condon ?></option>
          <option value="Siempre">Siempre</option>
          <option value="Casi siempre">Casi siempre</option>
          <option value="Algunas veces">Algunas veces</option>
          <option value="Nunca">Nunca</option>
        </select>
      </td>
    </tr>
    <tr>
      <th><h3>Fetiches</h3></th>
    </tr>
    <tr>
      <th><h4>Cuáles atuendos del Dress Code ( Código de vestido fetichista) le gustan más o con cuáles fetiches se identifica?</h4></th>
      <td>
        <label for="">Leather</label>
        <?php if ($Leather == "off"){ ?>
            <input type="checkbox" name="Leather">
        <?php }else{ ?>
          <input type="checkbox" name="Leather" checked>
        <?php } ?>

        <label for="">Rubber</label>
        <?php if ($Rubber == "off"){ ?>
            <input type="checkbox" name="Rubber">
        <?php }else{ ?>
          <input type="checkbox" name="Rubber" checked>
        <?php } ?>

        <label for="">Leather</label>
        <?php if ($Leather == "off"){ ?>
            <input type="checkbox" name="Leather">
        <?php }else{ ?>
          <input type="checkbox" name="Leather" checked>
        <?php } ?>

        <label for="">Cowboys</label>
        <?php if ($Cowboys == "off"){ ?>
            <input type="checkbox" name="Cowboys">
        <?php }else{ ?>
          <input type="checkbox" name="Cowboys" checked>
        <?php } ?>

        <label for="">Cops</label>
        <?php if ($Cops == "off"){ ?>
            <input type="checkbox" name="Cops">
        <?php }else{ ?>
          <input type="checkbox" name="Cops" checked>
        <?php } ?>

        <label for="">Uniforms</label>
        <?php if ($Uniforms == "off"){ ?>
            <input type="checkbox" name="Uniforms">
        <?php }else{ ?>
          <input type="checkbox" name="Uniforms" checked>
        <?php } ?>

        <label for="">Skin</label>
        <?php if ($Skin == "off"){ ?>
            <input type="checkbox" name="Skin">
        <?php }else{ ?>
          <input type="checkbox" name="Skin" checked>
        <?php } ?>

        <label for="">Work</label>
        <?php if ($Work == "off"){ ?>
            <input type="checkbox" name="Work">
        <?php }else{ ?>
          <input type="checkbox" name="Work" checked>
        <?php } ?>

        <label for="">Sport</label>
        <?php if ($Sport == "off"){ ?>
            <input type="checkbox" name="Sport">
        <?php }else{ ?>
          <input type="checkbox" name="Sport" checked>
        <?php } ?>

        <label for="">Bear</label>
        <?php if ($Bear == "off"){ ?>
            <input type="checkbox" name="Bear">
        <?php }else{ ?>
          <input type="checkbox" name="Bear" checked>
        <?php } ?>

        <label for="">Boots</label>
        <?php if ($Boots == "off"){ ?>
            <input type="checkbox" name="Boots">
        <?php }else{ ?>
          <input type="checkbox" name="Boots" checked>
        <?php } ?>

      </td>
    </tr>
    <tr>
      <th><h3>Ténicas de sexo duro</h3></th>
      <td>
      </td>
    </tr>

    <tr>
      <th><h4>Cuáles técnicas de sexo duro  o sadomasoquismo ha practicado o le gustaría experimentar o perfeccionar?</h4></th>
      <td>
        <label for="">Bondage</label>
        <?php if ($Bondage == "off"){ ?>
            <input type="checkbox" name="Bondage">
        <?php }else{ ?>
          <input type="checkbox" name="Bondage" checked>
        <?php } ?>

        <label for="">Spanking</label>
        <?php if ($Spanking == "off"){ ?>
            <input type="checkbox" name="Spanking">
        <?php }else{ ?>
          <input type="checkbox" name="Spanking" checked>
        <?php } ?>

        <label for="">Torture</label>
        <?php if ($Torture == "off"){ ?>
            <input type="checkbox" name="Torture">
        <?php }else{ ?>
          <input type="checkbox" name="Torture" checked>
        <?php } ?>

        <label for="">Piercing</label>
        <?php if ($Piercing == "off"){ ?>
            <input type="checkbox" name="Piercing">
        <?php }else{ ?>
          <input type="checkbox" name="Piercing" checked>
        <?php } ?>

        <label for="">Pissing</label>
        <?php if ($Pissing == "off"){ ?>
            <input type="checkbox" name="Pissing">
        <?php }else{ ?>
          <input type="checkbox" name="Pissing" checked>
        <?php } ?>

        <label for="">Dildos</label>
        <?php if ($Dildos == "off"){ ?>
            <input type="checkbox" name="Dildos">
        <?php }else{ ?>
          <input type="checkbox" name="Dildos" checked>
        <?php } ?>

        <label for="">Bareback</label>
        <?php if ($Bareback == "off"){ ?>
            <input type="checkbox" name="Bareback">
        <?php }else{ ?>
          <input type="checkbox" name="Bareback" checked>
        <?php } ?>

        <label for="">Fisting</label>
        <?php if ($Fisting == "off"){ ?>
            <input type="checkbox" name="Fisting">
        <?php }else{ ?>
          <input type="checkbox" name="Fisting" checked>
        <?php } ?>

        <label for="">Training</label>
        <?php if ($Training == "off"){ ?>
            <input type="checkbox" name="Training">
        <?php }else{ ?>
          <input type="checkbox" name="Training" checked>
        <?php } ?>

        <label for="">Rimming</label>
        <?php if ($Rimming == "off"){ ?>
            <input type="checkbox" name="Rimming">
        <?php }else{ ?>
          <input type="checkbox" name="Rimming" checked>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <th><h3>FANTASIAS  o  PRACTICAS SEXUALES</h3></th>
    </tr>
    <tr>
      <th><h4>Cuáles prácticas sexuales ha realizado o le gustaría realizar?</h4></th>
      <td>
        <label for="">Orgias_bisex</label>
        <?php if ($Orgias_bisex == "off"){ ?>
            <input type="checkbox" name="Orgias_bisex">
        <?php }else{ ?>
          <input type="checkbox" name="Orgias_bisex" checked>
        <?php } ?>

        <label for="">Orgias_chicos</label>
        <?php if ($Orgias_chicos == "off"){ ?>
            <input type="checkbox" name="Orgias_chicos">
        <?php }else{ ?>
          <input type="checkbox" name="Orgias_chicos" checked>
        <?php } ?>

        <label for="">Filmaciones_gay_sadom</label>
        <?php if ($Filmaciones_gay_sadom == "off"){ ?>
            <input type="checkbox" name="Filmaciones_gay_sadom">
        <?php }else{ ?>
          <input type="checkbox" name="Filmaciones_gay_sadom" checked>
        <?php } ?>

        <label for="">Orgias_swinger</label>
        <?php if ($Orgias_swinger == "off"){ ?>
            <input type="checkbox" name="Orgias_swinger">
        <?php }else{ ?>
          <input type="checkbox" name="Orgias_swinger" checked>
        <?php } ?>

        <label for="">Orgias_hombres</label>
        <?php if ($Orgias_hombres == "off"){ ?>
            <input type="checkbox" name="Orgias_hombres">
        <?php }else{ ?>
          <input type="checkbox" name="Orgias_hombres" checked>
        <?php } ?>

        <label for="">Filmaciones_gay_tradicional</label>
        <?php if ($Filmaciones_gay_tradicional == "off"){ ?>
            <input type="checkbox" name="Filmaciones_gay_tradicional">
        <?php }else{ ?>
          <input type="checkbox" name="Filmaciones_gay_tradicional" checked>
        <?php } ?>

        <label for="">Ser_stripper_show</label>
        <?php if ($Ser_stripper_show == "off"){ ?>
            <input type="checkbox" name="Ser_stripper_show">
        <?php }else{ ?>
          <input type="checkbox" name="Ser_stripper_show" checked>
        <?php } ?>

        <label for="">hacer_show_sexo_gay</label>
        <?php if ($hacer_show_sexo_gay == "off"){ ?>
            <input type="checkbox" name="hacer_show_sexo_gay">
        <?php }else{ ?>
          <input type="checkbox" name="hacer_show_sexo_gay" checked>
        <?php } ?>

        <label for="">Sexo_interrracial</label>
        <?php if ($Sexo_interrracial == "off"){ ?>
            <input type="checkbox" name="Sexo_interrracial">
        <?php }else{ ?>
          <input type="checkbox" name="Sexo_interrracial" checked>
        <?php } ?>

        <label for="">Tiene_practicas_sexuales</label>
        <?php if ($Tiene_practicas_sexuales == "off"){ ?>
            <input type="checkbox" name="Tiene_practicas_sexuales">
        <?php }else{ ?>
          <input type="checkbox" name="Tiene_practicas_sexuales" checked>
        <?php } ?>

        <label for="">utilizar_juguetes</label>
        <?php if ($utilizar_juguetes == "off"){ ?>
            <input type="checkbox" name="utilizar_juguetes">
        <?php }else{ ?>
          <input type="checkbox" name="utilizar_juguetes" checked>
        <?php } ?>

        <label for="">Utilizar_estimulantes</label>
        <?php if ($Utilizar_estimulantes == "off"){ ?>
            <input type="checkbox" name="Utilizar_estimulantes">
        <?php }else{ ?>
          <input type="checkbox" name="Utilizar_estimulantes" checked>
        <?php } ?>

        <label for="">Pichar_con_jovenes</label>
        <?php if ($Pichar_con_jovenes == "off"){ ?>
            <input type="checkbox" name="Pichar_con_jovenes">
        <?php }else{ ?>
          <input type="checkbox" name="Pichar_con_jovenes" checked>
        <?php } ?>

        <label for="">Pichar_con_adultos</label>
        <?php if ($Pichar_con_adultos == "off"){ ?>
            <input type="checkbox" name="Pichar_con_adultos">
        <?php }else{ ?>
          <input type="checkbox" name="Pichar_con_adultos" checked>
        <?php } ?>


      </td>
    </tr>

	</table>
<?php } ?>
