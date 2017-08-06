<?php
$url =  get_the_post_thumbnail_url($post->ID, 'full');
if (empty($url) || $url === ''){
  $url = get_template_directory_uri().'/images/cover.jpg';
}
?>

<div class="uk-section">
  <div class="uk-container  uk-container-small">
    <div uk-grid>
      <div class="uk-width-1-2@m">
        <div class="uk-cover-container uk-height-medium" uk-lightbox>
          <img src="<?= $url ?>" alt="<?= get_the_title() ?>"  uk-cover>
          <a class="uk-position-absolute uk-transform-center" title="<?= get_the_title() ?>" href="<?= $url ?>" alt="<?= get_the_title() ?>" style="left: 50%; top:50%" uk-marker></a>
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
