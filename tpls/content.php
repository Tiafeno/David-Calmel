<?php
$url =  get_the_post_thumbnail_url($post->ID, '300x250');
if (empty($url) || $url === ''){
  $url = get_template_directory_uri().'/images/cover.jpg';
}
?>

<div class="uk-section">
  <div class="uk-container  uk-container-small">
    <div uk-grid>
      <div class="uk-width-1-2@m">
        <div class="uk-cover-container">
          <canvas width="300" height="250"></canvas>
          <img uk-cover src="<?= $url ?>" alt="">
        </div>
      </div>
      <div class="uk-width-1-2@m">
        <h1 class="uk-article-title uk-text-bold uk-text-primary uk-text-uppercase"><?= get_the_title() ?></h1>
        <p class="uk-article-meta"><?= get_the_excerpt() ?></p>
      </div>
    </div>
  </div>
</div>

<div class="uk-container  uk-container-small">
  <article class="uk-article">
    <p class="uk-text-lead">
     <?php the_content(); ?>
    </p>
  </article>
</div>
