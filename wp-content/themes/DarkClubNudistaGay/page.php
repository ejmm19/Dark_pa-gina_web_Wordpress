<?php get_header(); ?>
<!-- <section id="content" role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="header">
      <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
    </header>
  <section class="entry-content">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
    <?php the_content(); ?>
    <div class="entry-links"><?php wp_link_pages(); ?></div>
  </section>
  </article>
  <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
  <?php endwhile; endif; ?>
</section> -->
<?php //get_sidebar(); ?>

<?php


  if (isset($_GET['loggedout'])) {
    if ($_GET['loggedout']==true) {
      echo "<script> window.location='".home_url()."';</script>";
    }
  }

  // if (isset($_SESSION['usuario'])) {
  //   var_dump($_SESSION['usuario']);
  // }else {
  //   var_dump($_SESSION['usuario']);
  // }
  // var_dump($_SESSION['usuario']);
  ?>
    <div class="home-page" id="home-1">
      <div class="container" id="container-2">
        <div class="col-md-1" id="rw-izq">
        </div>
        <div class="col-md-10" id="row-home-1">
          <center>
            <img src="wp-content/themes/twentyseventeen/assets/img/logo_dark.png" alt="">
            <p>ESTA PÁGINA CONTIENE MATERIAL EXPLÍCITO Y CONTENIDO SEXUAL SÓLO PARA ADULTOS</p>
            <a href="#home" id="entrar" class="btn btn-danger bnt-entrar">TENGO +18... DÉJAME ENTRAR</a>
            <div class="iconos-socials-ini">
              <a href="#"><img src="wp-content/themes/twentyseventeen/assets/img/icono-facebook.png" alt=""></a>
              <a href="#"><img src="wp-content/themes/twentyseventeen/assets/img/icono_blogger.png" alt=""></a>
            </div>
            <a href="" id="terminos-cond" >Terminos y Condiciones</a>
          </center>
        </div>
        <div class="col-md-1" id="rw-der">
        </div>
      </div>
    </div>




<!-- HOME 2  -->
<div class="home-page" id="home-2">
  <div id="home"></div>
    <!-- NAVEGACIÓN PRICIPAL -->
    <nav class="navbar navbar-default" id="barra-nav-custom">
      <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <ul class="nav navbar-nav">
              <li><a href="#home">EL CLUB </a></li>
              <li><a href="#unete">ÚNETE</a></li>
              <li class="dropdown" id="events">
              <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">EVENTOS <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" id="sub-menu-events">
                <li><a href="#eventos">PROGRAMACIÓN</a></li>
                <li><a href="#">FIESTAS PRIVADAS</a></li>
              </ul>
            </li>
              <li><a href="#videos">VIDEOS</a></li>
              <li><a href="#contactenos">CONTACTENOS</a></li>
            </ul>

        </div>
        <div class="col-md-1">
          <ul class="nav navbar-nav navbar-right" id="login-busq">
            <?php get_sidebar(); ?>
          </ul>
        </div>

      </div>

    </nav>
    <!-- NAVEGACIÓN PRICIPAL -->
    <nav class="navbar navbar-fixed-top" id="barra-nav-custom-fixed-top">
      <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <ul class="nav navbar-nav">
              <li><a href="#home">EL CLUB </a></li>
              <li><a href="#unete">ÚNETE</a></li>
              <li class="dropdown" id="events-fixed">
              <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">EVENTOS <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" id="sub-menu-events-fixed">
                <li><a href="#eventos">PROGRAMACIÓN</a></li>
                <li><a href="#">FIESTAS PRIVADAS</a></li>
              </ul>
            </li>
              <li><a href="#videos">VIDEOS</a></li>
              <li><a href="#contactenos">CONTACTENOS</a></li>
            </ul>

        </div>
        <div class="col-md-1"></div>
      </div>
    </nav>

  <div class="container" id="container-3">
    <div class="col-md-1" id="rw-izq-2">
    </div>
    <div class="col-md-10" id="row-home-2">
      <div class="contenido-page" style="color:#fff;">
        <div class="contenido-page-parrafos">
        <?php
          $post   = get_post(6);
          $titulo = $post->post_title;
          $output =  apply_filters( 'the_content', $post->post_content );
          echo $output;
        ?>
        </div>
      </div>
    </div>
    <div class="col-md-1" id="rw-der-2">
    </div>
  </div>
  <div id="unete"></div>
 </div>
<!-- HOME 2  END-->


<!-- UNETE INICIO -->
<div class="home-page" id="home-4">

  <nav class="navbar navbar-default" id="barra-nav-custom-ancla-eventos">
    <div class="container">
      <div class="col-md-1"></div>
      <div class="col-md-10 itm-menu" >
        <h3>UNETE</h3>
      </div>
      <div class="col-md-1"></div>
    </div>
  </nav>

  <div class="container" id="container-4">
    <div class="col-md-1" id="rw-izq-2">
    </div>
    <div class="col-md-10" id="row-home-3">
      <div class="contenido-page-parrafos">

        <?php if (!$user_ID) { ?>
          <form name="registerform" id="form-registro" class="form-horizontal" id="registerform" action="<?php echo home_url()?>/wp-login.php?action=register" method="post" novalidate="novalidate">
              <div class="col-lg-6">
                  <div class="form-group">
                    <div class="col-lg-12">
                      <input type="text" name="user_login"  class="form-control" placeholder="Nombre de usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <input type="text" name="user_email"  class="form-control" placeholder="Correo">
                    </div>
                  </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <div class="col-lg-12">
                  <input autocomplete="off" name="pass1"  class="form-control" type="password" placeholder="Contraseña">
                  </div>
                </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <input autocomplete="off" name="pass2"  class="form-control" type="password" placeholder="Confirmar Contraseña">
                </div>
              </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="select" class="col-lg-4 control-label">Estatura (CM)</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="user_estatura">
                      <?php for ($i=120; $i < 210; $i++) { ?>
                        <option value="<?php echo $i ?>" size="20"><?php echo $i ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              <div class="form-group">
                <label for="select" class="col-lg-4 control-label">Peso (Kg)</label>
                <div class="col-lg-8">
                  <select class="form-control" name="user_peso">
                    <?php for ($i=45; $i < 110; $i++) { ?>
                      <option value="<?php echo $i ?>" size="20"><?php echo $i ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="select" class="col-lg-4 control-label">Contextura</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="user_contextura">
                      <option value="Delgada">Delgada</option>
                      <option value="Atlética">Atlética</option>
                      <option value="Musculosa">Musculosa</option>
                      <option value="Curpulenta">Curpulenta</option>
                      <option value="Maldito cerdo">Maldito cerdo</option>
                    </select>
                  </div>
                </div>
              <div class="form-group">
                <label for="select" class="col-lg-5 control-label">Color de los Ojos</label>
                <div class="col-lg-7">
                  <select class="form-control" name="user_color_ojos">
                    <option value="Azul">Azul</option>
                    <option value="Verde">Verde</option>
                    <option value="Miel">Miel</option>
                    <option value="Cafe">Café</option>
                    <option value="Negro">Negro</option>
                    <option value="Gris">Gris</option>
                    <option value="Violeta">Violeta</option>
                  </select>
                </div>
              </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="select" class="col-lg-6 control-label">Color del cabello</label>
                  <div class="col-lg-6">
                    <select class="form-control" name="user_color_cabello">
                      <option value="Rapado">Rapado (skin)</option>
                      <option value="Calvo">Calvo</option>
                      <option value="Rubio">Rubio</option>
                      <option value="Rojizo">Rojizo</option>
                      <option value="Castaño">Castaño</option>
                      <option value="Negro">Negro</option>
                      <option value="Platinado">Platinado</option>
                      <option value="Blanco">Blanco</option>
                    </select>
                  </div>
                </div>
              <div class="form-group">
                <label for="select" class="col-lg-5 control-label">Eres velludo ?</label>
                <div class="col-lg-7">
                  <select class="form-control" name="user_velludo">
                    <option value="Velludo">Velludo</option>
                    <option value="Medio Velludo">Medio Velludo</option>
                    <option value="Sin Vello">Sin Vello</option>
                  </select>
                </div>
              </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="select" class="col-lg-6 control-label">Vellos en tu cara</label>
                  <div class="col-lg-6">
                    <select class="form-control" name="user_vellos_cara">
                      <option value="Barba">Barba</option>
                      <option value="Candado">Candado</option>
                      <option value="Vigotes">Vigotes</option>
                      <option value="Sin Barba">Sin Barba</option>
                    </select>
                  </div>
                </div>
              <div class="form-group">
                <label for="select" class="col-lg-8 control-label">Como es tu verga ?</label>
                <div class="col-lg-4">
                  <select class="form-control" name="user_verga">
                    <option value="Gruesa">Gruesa</option>
                    <option value="Normal">Normal</option>
                    <option value="Delgada">Delgada</option>
                  </select>
                </div>
              </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="select" class="col-lg-6 control-label">Largo de tu verga erecta (Cm)</label>
                  <div class="col-lg-6">
                    <select class="form-control" name="user_verga_erecta">
                      <option value="Menos de 10">Menos de 10</option>
                      <?php for ($i=10; $i < 29; $i++) { ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php } ?>
                      <option value="Más de 30">Más de 30</option>
                    </select>
                  </div>
                </div>
              <div class="form-group">
                <label for="select" class="col-lg-7 control-label">Inclinación Sexual</label>
                <div class="col-lg-5">
                  <select class="form-control" name="user_inclinacion_sexual">
                    <option value="Gay">Gay</option>
                    <option value="Bisexual">Bisexual</option>
                  </select>
                </div>
              </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="select" class="col-lg-7 control-label">Al culear o hacer sexo que posición adopta</label>
                  <div class="col-lg-5">
                    <select class="form-control" name="user_al_culear">
                      <option value="Activo">Activo</option>
                      <option value="Pasivo">Pasivo</option>
                      <option value="Versatil">Versatil 50/50</option>
                    </select>
                  </div>
                </div>
              <div class="form-group">
                <label for="select" class="col-lg-8 control-label">Tiene experiencia en Sadomasoquísmo y Sexo Duro ?</label>
                <div class="col-lg-4">
                  <select class="form-control" name="user_experiencia_sexo">
                    <option value="Mucha">Mucha</option>
                    <option value="Poca">Poca</option>
                    <option value="Alguna">Alguna</option>
                    <option value="Ninguna">Ninguna</option>
                  </select>
                </div>
              </div>
              </div>

              <div class="col-lg-12">
              <div class="form-group">
                <label for="select" class="col-lg-10 control-label">Como se considera en cuanto a sexo explícito, Nudísmo, Exhibicismo, Voyeurismo y Pornografía ?</label>
                <div class="col-lg-2">
                  <select class="form-control" name="user_considera">
                    <option value="Liberado">Liberado</option>
                    <option value="Tolerante">Tolerante</option>
                    <option value="Reservado">Reservado</option>
                    <option value="Timido">Timido</option>
                  </select>
                </div>
              </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="select" class="col-lg-7 control-label">Cuál es su rol o papel en sadomasoquísmo ?</label>
                  <div class="col-lg-5">
                    <select class="form-control" name="user_rol_sado">
                      <option value="Amo">Amo (Master)</option>
                      <option value="Esclavo">Esclavo (Slave)</option>
                      <option value="Ambos">Ambos</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="select" class="col-lg-8 control-label">Cuándo cule usa condones ?</label>
                  <div class="col-lg-4">
                    <select class="form-control" name="user_uso_de_condon">
                      <option value="Siempre">Siempre</option>
                      <option value="Casi siempre">Casi siempre</option>
                      <option value="Algunas veces">Algunas veces</option>
                      <option value="Nunca">Nunca</option>
                    </select>
                  </div>
                </div>
              </div>
          	<div class="col-lg-12">
              <hr>
              <div class="col-lg-10">
                <p id="reg_passmail">Recibirás confirmación del registro por correo electrónico.</p>
              </div>
            	<!-- <br class="clear"> -->
            	<div class="col-lg-2">
                <input type="hidden" name="redirect_to" value="<?php echo home_url() ?>/wp-login.php?registration=complete">
              	<p class="submit navbar-right"><input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary" value="Registrarse"></p>
            	</div>
          	</div>
          </form>
        <?php }else{
          echo "hay usuario";
        } ?>

      </div>
    </div>
    <div class="col-md-1" id="rw-der-2">
    </div>
  </div>
  <div id="eventos"></div>
</div>
<!-- UNETE END -->


<!-- EVENTOS / FIESTAS PRIVADAS INICIO -->
<div class="home-page" id="home-3">

  <nav class="navbar navbar-default" id="barra-nav-custom-ancla-eventos">
    <div class="container">
      <div class="col-md-1"></div>
      <div class="col-md-10 itm-menu" >
        <h3>EVENTOS / FIESTAS PRIVADAS</h3>
      </div>
      <div class="col-md-1"></div>
    </div>
  </nav>

  <div class="container" id="container-5">
    <div class="col-md-1" id="rw-izq-2">
    </div>
    <div class="col-md-10" id="row-home-3">
      <div class="contenido-page">
              <!-- <center><h2>Eventos / Fiestas</h2></center> -->
        <div class="contenido-page-parrafos-2">
            <ul id="list-fiestas-eventos">
              <?php $the_query = new WP_Query( 'cat=0&showposts=4' ); $c = 0; ?>
              <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
              <li id="li-fest-event-<?php echo $c++;?>">
                <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?></a>
                <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
                <div class="info-fiesta-evento">
                  <p><span class="span-fhcover">Fecha:</span> <?php the_field('fecha'); ?></p>
                  <p><span class="span-fhcover">Hora:</span> <?php the_field('hora'); ?></p>
                  <p><span class="span-fhcover">Cover:</span> <?php the_field('cover'); ?></p>
                </div>
              </li>
              <?php endwhile;?>

            </ul>

        </div>
      </div>

    </div>
    <div class="col-md-1" id="rw-der-2">
    </div>
  </div>
  <div id="videos"></div>
</div>
<!-- EVENTOS / FIESTAS PRIVADAS END -->

<!-- VIDEOS INICIO-->

<div class="home-page" id="home-6">

  <nav class="navbar navbar-default" id="barra-nav-custom-ancla-eventos">
    <div class="container">
      <div class="col-md-1"></div>
      <div class="col-md-10 itm-menu" >
        <h3>Videos</h3>
      </div>
      <div class="col-md-1"></div>
    </div>
  </nav>

  <div class="container" id="container-6">
    <div class="col-md-1" id="rw-izq-2">
    </div>
    <div class="col-md-10" id="row-home-3">
      <div style="padding: 145px;">

          <?php
          $post   = get_post(76);
          $titulo = $post->post_title;
          $output =  apply_filters( 'the_content', $post->post_content );
          echo $output;

          // check if the repeater field has rows of data
            if( have_rows('content_video') ):
              while ( have_rows('content_video') ) : the_row();?>
              <div class="video-ind">
                    <h3><?php echo the_sub_field('titulo'); ?></h3>

                    <?php echo the_sub_field('video'); ?>
                  </div>
      <?php endwhile;?>

        <?php else :

                // no rows found

            endif;

          ?>

      </div>
    </div>
    <div class="col-md-1" id="rw-der-2">
    </div>
  </div>
  <div id="contactenos"></div>
</div>
<!-- VIDEOS END-->
<!-- VIDEOS INICIO-->
<div class="home-page" id="home-6">

  <nav class="navbar navbar-default" id="barra-nav-custom-ancla-eventos">
    <div class="container">
      <div class="col-md-1"></div>
      <div class="col-md-10 itm-menu" >
        <h3>CONTACTENOS</h3>
      </div>
      <div class="col-md-1"></div>
    </div>
  </nav>

  <div class="container" id="container-7">
    <div class="col-md-1" id="rw-izq-2">
    </div>
    <div class="col-md-10" id="row-home-3">
    <div class="contenido-page">
      <div class="contenido-page-parrafos">
        <?php
        $page_contacto   = get_post(8);
        $titulo = $page_contacto->post_title;
        $output =  apply_filters( 'the_content', $page_contacto->post_content );
        echo $output;
        // echo do_shortcode( '[contact-form-7 id="49" title="Contact form 1"]' );
        ?>
      </div>
    </div>
    </div>
    <div class="col-md-1" id="rw-der-2">
    </div>
  </div>
  <div id="contactenos"></div>
</div>
<!-- VIDEOS END-->
<?php get_footer(); ?>
