<div class="all-projects">
  <div class="section-title">
    <h2>Todos os Projetos</h2>
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
            <img src="<?php echo IMAGE_PATH.$project->img; ?>" alt="<?php echo $project->title ?>"/>
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
</div>