<?php

$route = isset($post) && $post->get('idarticle') ? 'editArticle&articleId='.$post->get('idarticle') : 'addArticle';
$submit = $route === 'addArticle' ? 'Envoyer' : 'Mettre à jour';
?>

<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>inscrivez-vous</h1>
          </div>
        </div>
      </div>
</div>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form action="../public/index.php?route=<?= $route; ?>" method="post">
        <div class="control-group">
        <div class="form-group floating-label-form-group controls">
        <label for="title">Titre</label><br>
          <input type="text" id="title" name="title"  class="form-control" placeholder="title"  required data-validation-required-message="Please enter your title."
          value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>"><br>
          <?= isset($errors['title']) ? $errors['title'] : ''; ?>
          <p class="help-block text-danger"></p>
        </div>
       </div>
       <div class="control-group">
        <div class="form-group floating-label-form-group controls">
       
          <label for="chapo">chapo</label><br>
          <input type="text" id="chapo" name="chapo" class="form-control" placeholder="Chapo"  required data-validation-required-message="Please enter your chapo."
          value="<?= isset($post) ? htmlspecialchars($post->get('chapo')): ''; ?>"><br>
          <?= isset($errors['chapo']) ? $errors['chapo'] : ''; ?>
          <p class="help-block text-danger"></p>
          </div>   
          </div>
          <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label for="content">content</label><br>
          <textarea id="content" name="content" rows="10" class="form-control" placeholder="Content" required data-validation-required-message="Please enter a message.">
          <?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
          <?= isset($errors['content']) ? $errors['content'] : ''; ?>
          </div>
          </div>
         <input type="submit" value="<?= $submit; ?>" id="submit" class="btn btn-primary" name="submit">
        </form>
       </div>  
    </div>
</div>
