<div class="home">
  <main>
    <div class="main-bg-image">
      <div class="main-layer"></div>
    </div>

    <div class="container">
      <div class="perfil">
        <div class="perfil-image">
          <img src="<?php echo IMAGE_PATH ?>bg-perfil.jpg" />
        </div>
        
        <div class="perfil-title">
          <h1>William M. Sartini</h1>
          <h2> Desenvolvedor Web - Backend - PHP</h2>
        </div>

        <div class="perfil-skills">
          <img src="<?php echo ICON_PATH ?>php-icon.png" />
          <img src="<?php echo ICON_PATH ?>mysql-icon.png" />
          <img src="<?php echo ICON_PATH ?>html-icon.png" />
          <img src="<?php echo ICON_PATH ?>css-icon.png" />
          <img src="<?php echo ICON_PATH ?>js-icon.png" />
        </div>
      </div>

      <section id="about">
        <div class="section-title">
          <h2>Sobre</h2>
        </div>

        <div class="about-text">
          <p>Estudante de Ciência da Computação e Desenvolvedor de Software apaixonado por tecnologia.</p>
          <p>Minha parte favorita em trabalhar com programação é poder transformar minhas ideias em linhas de código e vê-las surgir na tela. Na maioria das vezes não é fácil, mas saber que existe um caminho me faz continuar buscando conhecimento até conseguir.</p>
          <p>Possuo experiência nas tecnologias <b>PHP7^, Laravel Framework, MySQL, Typescript, HTML, CSS, GIT, GITHUB</b> entre outros</p>
        </div>
      </section>
    </div>
  </main>

  <section id="projects">
    <div class="section-title">
      <h2>Projetos</h2>
    </div>

    <div class="projects-showcase">
      <?php foreach($projects as $project): ?>
        <div class="project">
          <div class="project-thumb">
            <?php if(isset($project->video) and $project->video !== ''): ?>
              <video
                muted
                src="<?php echo VIDEO_PATH.$project->video; ?>"
                poster="<?php echo IMAGE_PATH.$project->img; ?>"
                onmouseover="this.play()" onmouseout="this.pause()"
              >Your browser does not support the video tag.</video>
            <?php else: ?>
              <img src="<?php echo IMAGE_PATH.$project->img; ?>" alt="<?php echo $project->title ?>" />
            <?php endif; ?>

            <h3><?php echo $project->title ?></h3>
          </div>

          <div class="project-modal">
            <div class="project-modal-content">
              <div class="project-modal-close">
                <button id="btn-close">x</button>
              </div>

              <a href="<?php echo $project->href ?>">
                <div class="project-modal-thumb">
                  <?php if(isset($project->video) and $project->video !== ''): ?>
                    <video
                      muted
                      src="<?php echo VIDEO_PATH.$project->video; ?>"
                      poster="<?php echo IMAGE_PATH.$project->img; ?>"
                      onmouseover="this.play()" onmouseout="this.pause()"
                    >Your browser does not support the video tag.</video>
                  <?php else: ?>
                    <img src="<?php echo IMAGE_PATH.$project->img; ?>" alt="<?php echo $project->title ?>"/>
                  <?php endif; ?>
                </div>
              </a>

              <div class="project-modal-title">
                <h3><?php echo $project->title; ?></h3>

                <div class="project-modal-subtitle">
                  <?php foreach(explode('|', $project->subtitle) as $subtitle): ?>
                    <img 
                      src="<?php echo ICON_PATH.strtolower($subtitle).'-icon.png' ?>"
                      title="<?php echo $subtitle ?>" alt="<?php echo $subtitle ?>"
                    />
                  <?php endforeach; ?>
                </div>
              </div>

              <div class="project-modal-description">
                <p><?php echo $project->description; ?></p>
              </div>

              <div class="project-modal-buttons">
                <a class="btn-github" href="<?php echo $project->github; ?>"><i class="fa-brands fa-github"></i> ver no github </a>
                <a class="btn-site" href="<?php echo $project->href; ?>"><i class="fa-solid fa-globe"></i> ir para o site</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="projects-show-more">
      <a href="/home/show">ver todos os projetos</a>
    </div>
  </section>

  <section id="contact">
    <div class="section-title">
      <h2>Contato</h2>
    </div>

    <div class="contact-image">
      <img src="<?php echo IMAGE_PATH ?>bg-contact.png" />
    </div>

    <div class="contact-social">
      <span class="link-ct"><i class="fa-solid fa-phone"></i>(32)98816-1383</span>
      <span class="link-ct"><i class="fa-solid fa-envelope"></i>williamsartini@hotmail.com</span>
      <a class="link-ct" href="https://www.instagram.com/william_msartini"><i class="fa-brands fa-instagram"></i>william_msartini</a>
      <a class="link-ct" href="https://www.linkedin.com/in/william-sartini"><i class="fa-brands fa-linkedin"></i>william-sartini</a>
      <a class="link-ct" href="https://github.com/william-ms"><i class="fa-brands fa-github"></i>William-MS</a>
    </div>
  </section>
</div>