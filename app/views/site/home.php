<?=$this->extends('site.main') ?>

<?=$this->section_start('style') ?>
  	<link rel="stylesheet" href="<?php asset('css/site/main.css') ?>"/>
  	<link rel="stylesheet" href="<?php asset('css/site/about.css') ?>"/>
  	<link rel="stylesheet" href="<?php asset('css/site/contact.css') ?>"/>
  	<link rel="stylesheet" href="<?php asset('css/site/projects.css') ?>"/>
<?=$this->section_end() ?>

<?=$this->section_start('scripts') ?>
  	
<?=$this->section_end() ?>

<div class="home">
  	<main>
		<div class="main-bg-image">
			<div class="main-layer"></div>
		</div><!-- main-bg-image -->

		<div class="container">
			<div class="perfil">
				<div class="perfil-image">
					<img src="<?php echo PATH['ASSET'] ?>images/bg-perfil.jpg" />
				</div><!-- perfil-image -->
			
				<div class="perfil-title">
					<h1>William M. Sartini</h1>
					<h2> Desenvolvedor Web - Backend - PHP</h2>
				</div><!-- perfil-title -->

				<div class="perfil-skills">
					<img src="<?php asset('icons/php-icon.png') ?>" />
					<img src="<?php asset('icons/mysql-icon.png') ?>" />
					<img src="<?php asset('icons/html-icon.png') ?>" />
					<img src="<?php asset('icons/css-icon.png') ?>" />
					<img src="<?php asset('icons/js-icon.png') ?>" />
				</div><!-- perfil-skills -->
			</div><!-- perfil -->

			<section id="about">
				<div class="section-title">
					<h2>Sobre</h2>
				</div><!-- section-title -->

				<div class="about-text">
					<p>Estudante de Ciência da Computação e Desenvolvedor de Software apaixonado por tecnologia.</p>
					<p>Minha parte favorita em trabalhar com programação é poder transformar minhas ideias em linhas de código e vê-las surgir na tela. Na maioria das vezes não é fácil, mas saber que existe um caminho me faz continuar buscando conhecimento até conseguir.</p>
					<p>Possuo experiência nas tecnologias <b>PHP7^, Laravel Framework, MySQL, Typescript, HTML, CSS, GIT, GITHUB</b> entre outros</p>
				</div><!-- about-text -->
			</section>
    	</div><!-- container -->
  	</main>

	<section id="projects">
		<div class="section-title">
			<h2>Projetos</h2>
		</div><!-- section-title -->

		<div class="projects-showcase">
			<?php foreach($projects as $project): ?>
				<div class="project">
					<div class="project-thumb">
						<?php if(isset($project->video) and $project->video !== ''): ?>
							<video
								muted
								src="<?php asset('videos/' . $project->video) ?>"
								poster="<?php asset('images/' . $project->img) ?>"
								onmouseover="this.play()" onmouseout="this.pause()"
							>Your browser does not support the video tag.</video>
						<?php else: ?>
							<img src="<?php asset('images/' . $project->img) ?>" alt="<?php echo $project->title ?>" />
						<?php endif; ?>

						<h3><?php echo $project->title ?></h3>
					</div><!-- project-thumb -->

					<div class="project-modal">
						<div class="project-modal-content">
							<div class="project-modal-close">
								<button id="btn-close">x</button>
							</div><!-- project-modal-close -->

							<a href="<?php echo $project->href ?>" target="_blank">
								<div class="project-modal-thumb">
									<?php if(isset($project->video) and $project->video !== ''): ?>
										<video
											muted
											src="<?php asset('videos/' . $project->video) ?>"
											poster="<?php asset('images/' . $project->img) ?>"
											onmouseover="this.play()" onmouseout="this.pause()"
										>Your browser does not support the video tag.</video>
									<?php else: ?>
										<img src="<?php asset('images/' . $project->img) ?>" alt="<?php echo $project->title ?>"/>
									<?php endif; ?>
								</div><!-- project-modal-thumb -->
							</a>

							<div class="project-modal-title">
								<h3><?php echo $project->title; ?></h3>

								<div class="project-modal-subtitle">
									<?php foreach(explode('|', $project->subtitle) as $subtitle): ?>
										<img 
											src="<?php asset('icons/' . strtolower($subtitle).'-icon.png') ?>"
											title="<?php echo $subtitle ?>" alt="<?php echo $subtitle ?>"
										/>
									<?php endforeach; ?>
								</div><!-- project-modal-subtitle -->
							</div><!-- project-modal-title -->

							<div class="project-modal-description">
								<p><?php echo $project->description; ?></p>
							</div><!-- project-modal-description -->

							<div class="project-modal-buttons">
								<a class="btn-github" href="<?php echo $project->github; ?>" target="_blank"><i class="fa-brands fa-github"></i> ver no github </a>
								<a class="btn-site" href="<?php echo $project->href; ?>" target="_blank"><i class="fa-solid fa-globe"></i> ir para o site</a>
							</div><!-- project-modal-buttons -->
						</div><!-- project-modal-content -->
					</div><!-- project-modal -->
				</div><!-- project -->
			<?php endforeach; ?>
		</div><!-- projects-showcase -->

		<div class="projects-show-more">
			<a href="/project">ver todos os projetos</a>
		</div><!-- projects-show-more -->
	</section>

  	<section id="contact">
    	<div class="section-title">
      		<h2>Contato</h2>
    	</div><!-- section-title -->

    	<div class="contact-image">
      		<img src="<?php asset('images/bg-contact.png') ?>" />
    	</div><!-- contact-image -->

    	<div class="contact-social">
      		<span class="link-ct"><i class="fa-solid fa-phone"></i>(32)98816-1383</span>
      		<span class="link-ct"><i class="fa-solid fa-envelope"></i>williamsartini@hotmail.com</span>
      		<a class="link-ct" href="https://www.instagram.com/william_msartini"><i class="fa-brands fa-instagram"></i>william_msartini</a>
      		<a class="link-ct" href="https://www.linkedin.com/in/william-sartini"><i class="fa-brands fa-linkedin"></i>william-sartini</a>
      		<a class="link-ct" href="https://github.com/william-ms"><i class="fa-brands fa-github"></i>William-MS</a>
    	</div><!-- contact-social -->
  	</section>
</div>