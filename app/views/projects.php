<div class="all-projects">
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



<!-- <?php foreach($projects as $project): ?>
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
      <?php endforeach; ?> -->