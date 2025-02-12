<?=$this->extends('site.main') ?>

<?=$this->section_start('style') ?>
    <link rel="stylesheet" href="<?php asset('css/site/all-projects.css') ?>"/>
    <link rel="stylesheet" href="<?php asset('css/site/projects.css') ?>"/>
  	<link rel="stylesheet" href="<?php asset('css/site/slider.css') ?>"/>
<?=$this->section_end() ?>

<?=$this->section_start('scripts') ?>
    <script src="<?php asset('js/site/changeLayoutImages.js') ?>"></script>
    <script src="<?php asset('js/site/slider.js') ?>"></script>

    <script>
		let mobileImages = [];
		let desktopImages = [];

		<?php foreach($projects as $project): ?>
			mobileImages = [];
			desktopImages = [];

			<?php foreach($project->images as $image): ?>
				<?php if($image->type == 'mobile'): ?>
					mobileImages.push('<?php asset('images/' . $image->path) ?>')
				<?php elseif($image->type == 'desktop'): ?>
					desktopImages.push('<?php asset('images/' . $image->path) ?>')
				<?php endif ?>
			<?php endforeach ?>

			const mobileSlider<?php echo $project->id ?> = new Slider(
				'mobileSlider<?php echo $project->id ?>', mobileImages, {
					previous: {
						text: '<i class="fa-solid fa-chevron-left"></i>',
					},
					next: {
						text: '<i class="fa-solid fa-chevron-right"></i>',
					},
				}
			);

			const desktopSlider<?php echo $project->id ?> = new Slider(
				'desktopSlider<?php echo $project->id ?>', desktopImages, {
					previous: {
						text: '<i class="fa-solid fa-chevron-left"></i>',
					},
					next: {
						text: '<i class="fa-solid fa-chevron-right"></i>',
					},
				}
			);
		<?php endforeach ?>
	</script>
<?=$this->section_end() ?>

<div class="all-projects">
    <div class="section-title">
        <h2>Todos os Projetos</h2>
    </div><!-- section-title -->

    <div class="projects-showcase">
        <?php foreach($projects as $project): ?>
            <div class="project">
                <div class="project-thumb">
                    <img src="<?php asset('images/' . $project->thumb->path) ?>" alt="<?php echo $project->title ?>"/>
                    <h3><?php echo $project->title ?></h3>
                </div><!-- project-thumb -->

                <div class="project-modal">
                    <div class="project-modal-content">
                        <div class="project-modal-close">
                            <button id="btn-close"><i class="fa-solid fa-xmark"></i></button>
                        </div><!-- project-modal-close -->

                        <div class="project-modal-slider">
							<div class="hidden" id="mobileSlider<?php echo $project->id ?>" data-type="mobile"></div>
							<div id="desktopSlider<?php echo $project->id ?>" data-type="desktop"></div>

							<button class="btn-change-layout" onclick="changeLayoutImages(this, <?php echo $project->id ?>)" data-type="desktop"><i class="fa-solid fa-mobile-screen"></i> Mobile</button>
						</div><!-- project-modal-slider -->

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
</div><!-- all-projects -->