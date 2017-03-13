<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
          <h3>Jawahar Navodaya Vidyalaya, Mana Camp, Raipur (CG)</h3>
        </div>
		<div class="mdl-layout--large-screen-only mdl-layout__header-row">
          <h3>जवाहर नवोदय विद्यालय, माना कैंप, रायपुर (छ. ग.)</h3>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
            <h6>
                <marquee>
                    Jawahar Navodaya Vidyalaya Raipur is Affiliated to Central Board of Secondary Education (CBSE) Affiliation No-03340002 | JNV Mana Camp, Raipur, Pin-492015, Phone-0771-2418139 | E-mail : jnvmanacampraipur@gmail.com
                </marquee>
            </h6>
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
            <a href="<?php echo base_url(); ?>" class="mdl-layout__tab">Home</a>
            <a href="<?php echo base_url(); ?>academics" class="mdl-layout__tab">Academics</a>
            <a href="<?php echo base_url(); ?>gallery" class="mdl-layout__tab is-active">Gallery</a>
            <a href="<?php echo base_url(); ?>events" class="mdl-layout__tab">Events</a>
            <a href="<?php echo base_url(); ?>blog" class="mdl-layout__tab">Blog</a>
            <a href="<?php echo base_url(); ?>faq" class="mdl-layout__tab">FAQ</a>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add">
            <i class="material-icons" role="presentation">&#xE851;</i>
            <span class="visuallyhidden">Login</span>
          </button>
        </div>
      </header>
      <main class="mdl-layout__content">
        <div class="mdl-layout__tab-panel is-active" id="overview">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--4-col-desktop mdl-cell--3-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white" style="max-height: 300px;">
                <img src="http://www.jnvraipur.com/web/Staff/PHOTOS/NEELAM%20PANI.jpg" style="max-height: 300px;">
            </header>
            <div class="mdl-card mdl-cell mdl-cell--8-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__supporting-text">
                <h4>Coming Soon</h4>
                About to launch this module
              </div>
              <div class="mdl-card__actions">
                <a href="#" class="mdl-button"><i class="material-icons">&#xE55A;</i> Mrs. Neelam Pani - Principal JNV Raipur</a>
              </div>
            </div>
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="btn1">
              <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="btn1">
              <li class="mdl-menu__item">Share</li>
              <li class="mdl-menu__item">Dolor</li>
            </ul>
          </section>
          <section class="section--footer mdl-color--white mdl-grid" style="padding-top: 8px; padding-botton: 8px;">
            <div class="mdl-cell mdl-cell--1-col-desktop"></div>
            <div class="section__text mdl-cell mdl-cell--5-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
              <h4>Notice</h4>
              <marquee direction="up">
                  <ul>
                    <li>To promote National Integration among students through a policy of migration.</li>
                    <li>To encourage and promote talent from Socio-economically back-ward sections of rural areas.</li>
                    <li>To provide quality modern education for all round development of talented children.</li>
                    <li>To establish as pace setter institutions to be models in the districts and to be resource centers for promotions of excellence.</li>
                    </ul>
                </marquee>
                <a class="mdl-button">Read More</a>
            </div>
            <div class="section__text mdl-cell mdl-cell--5-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
              <h4>News and Events</h4>
              <marquee direction="up">
                  <ul>
                    <li>To promote National Integration among students through a policy of migration.</li>
                    <li>To encourage and promote talent from Socio-economically back-ward sections of rural areas.</li>
                    <li>To provide quality modern education for all round development of talented children.</li>
                    <li>To establish as pace setter institutions to be models in the districts and to be resource centers for promotions of excellence.</li>
                    </ul>
                </marquee>
                <a class="mdl-button">Read More</a>
            </div>
            <div class="mdl-cell mdl-cell--1-col-desktop"></div>
          </section>
        </div>