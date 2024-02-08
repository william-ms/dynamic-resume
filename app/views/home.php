<div class="home">
  <main>
    <div class="perfil">
      <div class="perfil-image">
        <img src="/assets/images/bg-perfil.jpg" />
      </div>
        
      <div class="perfil-title">
        <h1>William Macedo Sartini</h1>
        <h2> Desenvolvedor Web - Backend - PHP</h2>
      </div>

      <div class="perfil-skills">
        <img src="/assets/icons/php-icon.png" />
        <img src="/assets/icons/mysql-icon.png" />
        <img src="/assets/icons/html-icon.png" />
        <img src="/assets/icons/css-icon.png" />
        <img src="/assets/icons/js-icon.png" />
      </div>
    </div>
  </main>

  <section id="about">
    <div class="about-title">
      <h2>Sobre</h2>
    </div>

    <div class="about-text">
      <p>Estudante de Ciência da Computação e Desenvolvedor de Software apaixonado por tecnologia.</p>
      <p>Minha parte favorita em trabalhar com programação é poder transformar minhas ideias em linhas de código e vê-las surgir na tela. Na maioria das vezes não é fácil, mas saber que existe um caminho me faz continuar buscando conhecimento até conseguir.</p>
      <p>Possuo experiência nas tecnologias <b>PHP7^, Laravel Framework, MySQL, Typescript, HTML, CSS, GIT, GITHUB</b> entre outros</p>
    </div>
  </section>

  <section id="projects">
    <div class="projects-title">
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
              <img src="<?php echo IMAGE_PATH.$project->img; ?>" />
            <?php endif; ?>

            <h3><?php echo $project->title ?></h3>
          </div>

          <div class="project-modal">
            <div class="project-content">
              <div class="project-content-close">
                <button id="btn-close">x</button>
              </div>

              <a href="<?php echo $project->href ?>">
                <div class="project-content-thumb">
                  <?php if(isset($project->video) and $project->video !== ''): ?>
                    <video
                      muted
                      src="<?php echo VIDEO_PATH.$project->video; ?>"
                      poster="<?php echo IMAGE_PATH.$project->img; ?>"
                      onmouseover="this.play()" onmouseout="this.pause()"
                    >Your browser does not support the video tag.</video>
                  <?php else: ?>
                    <img src="<?php echo IMAGE_PATH.$project->img; ?>" />
                  <?php endif; ?>
                </div>
              </a>

              <div class="project-content-title">
                <h2><?php echo $project->title; ?></h2>
              </div>

              <div class="project-content-subtitle">
                <ul>
                  <?php foreach(explode('|', $project->subtitle) as $subtitle): ?>
                    <li><?php echo $subtitle; ?></li>
                  <?php endforeach; ?>
            
                  <li></li>
                </ul>
              </div>

              <div class="project-content-description">
                <p><?php echo $project->description; ?></p>
              </div>

              <div class="project-content-buttons">
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
</div>