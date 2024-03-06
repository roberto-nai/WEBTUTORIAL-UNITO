<?php
  include "settings.php";
  include "session.php";
  
  $page_name = basename($_SERVER['PHP_SELF']); // filename
  $parts_1 = explode("-", $page_name);
  
  if (count($parts_1) == 2) // is a page-xx
  { 
    $parts_2 = explode(".", $parts_1[1]);
    $page_order = $parts_2[0];
    $page_level = intval($parts_2[0]); // for page level in session
    $next_level = $page_level + 1;
  }

  session_update($page_level, $language_default);

  page_level_check($page_level);

  $lang = $_SESSION['lang'];
?>
<!doctype html>
<html lang="en">
  
  <?php include_once("head.php"); ?>

  <script defer type="text/javascript" src="./view/eventsSave.js"></script>

  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
      <?php include_once("header_left.php"); ?>
      
      <?php include_once('menu.php'); ?>
      
      <?php include_once("header_right.php"); ?>

    </header>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-01'>
    <h2 class="text-primary">#3. Create Agents</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Procedures and buttons</h2>
          <p>Some parts of the code can be activated with a corresponding button in the Interface.</p>
          <p>Write 'setup' (in the Commands area), then create a button:.</p>
          <img src="./images-tutorial/setup.png" alt="setup" />
          <p>In the code part, write the setup procedure. Note: for each procedure the code should be entered between the keywords <code>to</code> and <code>end</code>:</p>
          <p><code>to setup</code></p>
          <p><code>&nbsp;&nbsp;ca</code></p>
          <p><code>&nbsp;&nbsp;create-people 1</code></p>
          <p><code>&nbsp;&nbsp;[</code></p>
          <p><code>&nbsp;&nbsp;&nbsp;set shape "person"</code></p>
          <p><code>&nbsp;&nbsp;]</code></p>
          <p><code>end</code></p>
          <br />
          <img src="./images-tutorial/setup-1-agent.png" alt="setup 1 agent" />
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Movements</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="./images-tutorial/go.png" alt="go" />
          <p>Let's create the <code>go</code> button and make it repeat infinitely:</p>
          <p><i>Right-click on the button, to select the 'forever' option</i></p>
          <img src="./images-tutorial/forever.png" alt="forever" />
          <br /><br />
          <p>Add in the code area the following procedure:</p>
          <p><code>to go</code></p>
          <p><code>&nbsp;&nbsp;move-agents</code></p>
          <p><code>end</code></p>
          <p>Similarly, we create a procedure to move agents (people):</p>
          <code>
                                to move-agents <br />
                                &nbsp;&nbsp;ask people <br />
                                &nbsp;&nbsp;[ <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;rt random 60 <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;lt random 60 <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;fd 0.1 <br />
                                &nbsp;&nbsp;]
                                <br />
                                end
          </code>
          <br /> <br />
          <p>NB: The movements are too fast: slows down the visualization!</p>
          <img src="./images-tutorial/slower-button.png" alt="Button to set the speed">
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Syntax</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          <code>ask &#123;A-breed&#125; [ &#123;instructions&#125; ]</code>: agents of type &#123;A-breed&#125; will perform the &#123;instructions&#125; <br />
          <code>ask &#123;A-breed&#125; [ &#123;instructions&#125; ]</code>: agents of type &#123;A-breed&#125; will perform the &#123;instructions&#125; <br />
          <code>rt e lt &#123;num&#125;</code>: rotate on the rigth or on the left of &#123;num&#125; degree <br />
          <code>random &#123;num&#125;</code>: a random number between 0 and &#123;num&#125; <br />
          <code>fd &#123;num&#125;</code>: move forward the agent of &#123;num&#125; units
        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-04'>
    <h2>Improving the code</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
                            Let's create a procedure called "setup-people":
                            <br /> <br />
                            <code>
                                to setup <br />
                                &nbsp;&nbsp;ca <br />
                                &nbsp;&nbsp;setup-people <br />
                                end <br />
                            </code>
                            <br />
                            <code>
                                to setup-people <br />
                                &nbsp;&nbsp;create-people 1 <br />
                                &nbsp;&nbsp;[ <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;set shape "person" <br />
                                &nbsp;&nbsp;] <br />
                                end <br />
                            </code>
                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container text-center">
      <?php include_once('page_footer.php'); ?>
  </div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>