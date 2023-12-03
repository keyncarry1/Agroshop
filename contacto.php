<?php include('header.php'); ?>

<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
  <div class="breadcrumbs-custom context-dark bg-overlay-39">
    <div class="container">
      <h2 class="breadcrumbs-custom-title">Contáctanos</h2>
      <ul class="breadcrumbs-custom-path">
        <li><a href="index.php">Inicio</a></li>
        <li class="active">Contáctanos</li>
      </ul>
    </div>
    <div class="box-position" style="background-image: url(Public/images/bg-breadcrumbs.jpg);"></div>
  </div>
</section>
<!-- Contact information-->
<section class="section section-md section-first bg-default">
  <div class="container">
    <div class="row row-30 justify-content-center">
      <div class="col-sm-8 col-md-6 col-lg-4">
        <article class="box-contacts">
          <div class="box-contacts-body">
            <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
            <div class="box-contacts-decor"></div>
            <span style="font-weight: bold;">Whatsapp</span>
            <p class="box-contacts-link"><a href="tel:#">+569 57462146</a></p>
          </div>
        </article>
      </div>
      <div class="col-sm-8 col-md-6 col-lg-4">
        <article class="box-contacts">
          <div class="box-contacts-body">
            <div class="box-contacts-icon fl-bigmug-line-up104"></div>
            <div class="box-contacts-decor"></div>
            <span style="font-weight: bold;">Dirección</span>
            <p class="box-contacts-link"><a href="#">4730 Maipo, Region metropolitana, Santiago 8450000</a></p>
          </div>
        </article>
      </div>
      <div class="col-sm-8 col-md-6 col-lg-4">
        <article class="box-contacts">
          <div class="box-contacts-body">
            <div class="box-contacts-icon fl-bigmug-line-chat55"></div>
            <div class="box-contacts-decor"></div>
            <span style="font-weight: bold;">Mail</span>
            <p class="box-contacts-link"><a href="mailto:#">Agroshop@gmail.com</a></p>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- Contact Form and Gmap-->
<section class="section section-md section-last bg-default text-md-left">
  <div class="container">
    <div class="row row-50">
      <div class="col-lg-6 section-map-small">
        <div class="google-map-container"
          data-center="Sta. Elena de Huechuraba 1660, 8600036 Huechuraba, Región Metropolitana" data-zoom="5"
          data-icon="Public/images/gmap_marker.png" data-icon-active="Public/images/gmap_marker_active.png"
          data-styles="[{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#444444&quot;}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.business&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:45}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b4d4e1&quot;},{&quot;visibility&quot;:&quot;on&quot;}]}]">
          <div class="google-map"></div>
          <ul class="google-map-markers">
            <li data-location="Sta. Elena de Huechuraba 1660, 8600036 Huechuraba, Región Metropolitana"
              data-description="Sta. Elena de Huechuraba 1660, 8600036 Huechuraba, Región Metropolitana"></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <h4 class="text-spacing-50">Formulario de Contacto</h4>
        <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post"
          action="bat/rd-mailform.php">
          <div class="row row-14 gutters-14">
            <div class="col-sm-6">
              <div class="form-wrap">
                <input class="form-input" id="contact-first-name" type="text" name="name" data-constraints="@Required">
                <label class="form-label" for="contact-first-name">Nombre</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-wrap">
                <input class="form-input" id="contact-last-name" type="text" name="name" data-constraints="@Required">
                <label class="form-label" for="contact-last-name">Apellido</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap">
                <input class="form-input" id="contact-email" type="email" name="email"
                  data-constraints="@Email @Required">
                <label class="form-label" for="contact-email">E-mail</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap">
                <label class="form-label" for="contact-message">Mensaje</label>
                <textarea class="form-input" id="contact-message" name="message"
                  data-constraints="@Required"></textarea>
              </div>
            </div>
          </div>
          <button class="button button-primary button-pipaluk" type="submit">Enviar mensaje</button>
        </form>
      </div>
    </div>
  </div>
</section>


<?php include('footer.php'); ?>
</html>
