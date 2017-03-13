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
            <a href="<?php echo base_url(); ?>gallery" class="mdl-layout__tab">Gallery</a>
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
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                <div class="mdl-tabs__tab-bar">
                    <a href="#login" class="mdl-tabs__tab is-active">Login</a>
                    <a href="#Sign-up" class="mdl-tabs__tab">Sign Up</a>
                </div>
                
                <div class="mdl-tabs__panel is-active" id="login">
                    <?php echo validation_errors(); ?>
                    <center>
                        <?php if(isset($msg)){ echo $msg;} ?>
                        <?php echo form_open('login/login'); ?>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="Username" name="username" required>
                                <label class="mdl-textfield__label" for="Username">Username</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" id="Password" name="password" required>
                                <label class="mdl-textfield__label" for="Password">Password</label>
                            </div>
                            <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" value="Submit">
                        </form>
                    </center>
                </div>
                <div class="mdl-tabs__panel" id="Sign-up">
                    <?php echo validation_errors(); ?>
                    <center>
                        <?php echo form_open('login/create'); ?>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="Username" name="username" required>
                                <label class="mdl-textfield__label" for="Username">Username</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" id="Password" name="password" required>
                                <label class="mdl-textfield__label" for="Password">Password</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="First Name" name="firstName" required>
                                <label class="mdl-textfield__label" for="First Name">First Name</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="Last Name" name="lastName" required>
                                <label class="mdl-textfield__label" for="Last Name">Last Name</label>
                            </div>
                            <br>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="date" id="DOB" name="DOB" required>
                                <label class="mdl-textfield__label" for="DOB">DOB</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="usertype" list="usertype" required>
                                <label class="mdl-textfield__label" for="usertype">I am a..</label>
                                  <datalist id="usertype">
                                    <option value="Student">
                                    <option value="Teacher">
                                    <option value="Staff">
                                    <option value="Alumini">                                    
                                  </datalist>
                            </div>
                            <br>
                            <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" value="Submit">
                        </form>
                    </center>
                </div>
            </div>
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