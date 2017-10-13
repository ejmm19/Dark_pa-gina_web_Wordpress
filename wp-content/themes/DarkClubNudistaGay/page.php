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
              <li class="dropdown">
              <a href="#eventos" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">EVENTOS <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">PROGRAMACIÓN</a></li>
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
    <!-- NAVEGACIÓN PRICIPAL -->
    <nav class="navbar navbar-fixed-top" id="barra-nav-custom-fixed-top">
      <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <ul class="nav navbar-nav">
              <li><a href="#home">EL CLUB </a></li>
              <li><a href="#unete">ÚNETE</a></li>
              <li class="dropdown">
              <a href="#eventos" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">EVENTOS <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">PROGRAMACIÓN</a></li>
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
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
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
      <div class="contenido-page-parrafos">
        <?php
        $post   = get_post(14);
        $titulo = $post->post_title;
        $output =  apply_filters( 'the_content', $post->post_content );
        echo $output;
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
