<? defined( '_JEXEC' ) or die;

/* Получаем небоходимые параметры */

$doc = JFactory::getDocument();
$app = JFactory::getApplication();
$templateparams = $app->getTemplate( true )->params;
$config = JFactory::getConfig();

/* Подключаем стили */

$doc->addStyleSheet( 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', 'text/css', 'screen,projection', [
  'integrity' => 'sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7',
  'crossorigin' => 'anonymous'
] );
$doc->addStyleSheet( $this->baseurl . '/templates/system/css/system.css' );
$doc->addStyleSheet( $this->baseurl . '/templates/' . $this->template . '/css/styles.css', 'text/css', 'screen,projection' );

/* Подключаем скрипты */

$doc->addScript( $this->baseurl . '/templates/' . $this->template . '/js/app.js', 'text/javascript' );

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $this->language ?>" lang="<?= $this->language ?>" dir="<?= $this->direction ?>">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <jdoc:include type="head"/>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --><!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
  <div class="container">

    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
            <span class="icon-bar"></span> <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= $this->baseurl ?>"><?= htmlspecialchars( $config->get( 'sitename' ) ) ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <jdoc:include type="modules" name="main-menu"/>

        </div>
      </div>
    </nav>

  </div>
</div>

<jdoc:include type="modules" name="carousel"/>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

  <jdoc:include type="modules" name="new-posts"/>

  <!-- START THE FEATURETTES -->

  <jdoc:include type="message"/>
  <jdoc:include type="component"/>

  <!--<hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">First featurette heading.
        <span class="text-muted">It'll blow your mind.</span></h2>
      <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
        semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
        commodo.</p>
    </div>
    <div class="col-md-5">
      <img class="featurette-image img-responsive center-block" src="<?/*= $this->baseurl . '/templates/' . $this->template . '/images/img.png' */?>" alt="Generic placeholder image">
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 col-md-push-5">
      <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span>
      </h2>
      <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
        semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
        commodo.</p>
    </div>
    <div class="col-md-5 col-md-pull-7">
      <img class="featurette-image img-responsive center-block" src="<?/*= $this->baseurl . '/templates/' . $this->template . '/images/img.png' */?>" alt="Generic placeholder image">
    </div>
  </div>

  <hr class="featurette-divider">-->

  <!-- /END THE FEATURETTES -->

  <!-- FOOTER -->
  <footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>&copy; 2015 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>

</div><!-- /.container -->

</body>
</html>
