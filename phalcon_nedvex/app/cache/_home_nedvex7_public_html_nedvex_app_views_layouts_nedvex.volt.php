<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="keywords" content="<?php echo $keywords; ?>">
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/footer.css" />
        <link rel="stylesheet" href="css/fotorama.css" />
        <link rel="stylesheet" href="css/owl.theme.css" />
        <link rel="stylesheet" href="css/owl.carousel.css" />
        <link rel="stylesheet" href="css/main.css" /> 
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,400italic,500,500italic,700,700italic&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
    </head
    <body> 
        <?php echo $this->getContent(); ?>
    </body>
    
    <?php echo $this->tag->javascriptInclude('js/jquery.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/jquery.mask.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/validation.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/selectbox.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/fotorama.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/owl.carousel.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/main.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/bootstrap-select.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/bootstrap.js'); ?>
     
    
</html>   