<?=$this->extends('site.main') ?>

<?=$this->section_start('style') ?>
    <link rel="stylesheet" href="<?php asset('css/site/all-projects.css') ?>"/>
    <link rel="stylesheet" href="<?php asset('css/site/projects.css') ?>"/>
<?=$this->section_end() ?>

<?=$this->section_start('scripts') ?>
  	
<?=$this->section_end() ?>

<div class="all-projects">
    <div class="section-title">
        <h2>Todos os Projetos</h2>
    </div><!-- section-title -->

    <div class="projects-showcase">
        <?php foreach($projects as $project): ?>
            <div class="project">
                <div class="project-thumb">
                    <?php if(isset($project->video) and $project->video !== ''): ?>
                        <video
                            muted
                            src="<?php echo asset('videos/' . $project->video) ?>"
                            poster="<?php echo asset('images/' . $project->img) ?>"
                            onmouseover="this.play()" onmouseout="this.pause()"
                        >Your browser does not support the video tag.</video>
                    <?php else: ?>
                        <img src="<?php echo asset('images/' . $project->img) ?>" alt="<?php echo $project->title ?>"/>
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
</div><!-- all-projects -->