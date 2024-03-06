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
    <h2 class="text-primary">#5. Behavior</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Move agents</h2>
          <p>
                            Create the procedure to move agents.
                            <br />
                            Code:
                            <br />
                            <code>
                                to move-agents
                                <br />
                                &nbsp;&nbsp;ask people[
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;rt random 60
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;lt random 60
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;if not any? walls-on patch-ahead 1
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;[
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ifelse [name] of patch-here != "puddle"
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ fd 0.5] [ fd 0.1]
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;]
                                <br />
                                &nbsp;&nbsp;]
                                <br />
                                end
                            </code>
                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Sintax</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
                                    <code> &lt;breed&gt;-on x</code>: create an agent (breed) in position &#123;x&#125;<br />
                                    <code>patch-ahead &#123;num&#125;</code>: check patch ahead of &#123; num &#125; steps<br />
                                    <code>ifelse x [ y ] [ z ]</code>: if x execute code in y, otherwise code in z<br />
                                    <code>[ x ] of A</code>: check variable x of agent A<br />
                                </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Create for each agent the list of contacts</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>We create a variable called 'contact-with' for agents of type 'people'. This should be inserted in the initial part of the code!</p>
        <p>We add in the code area,in the initial part, the following instructions:</p>
                            Code:
                            <br />
                            <code>
                                people-own
                                <br />
                                [
                                <br />
                                &nbsp;&nbsp;contact-with
                                <br />
                                ]
                                </code>
                                <br /><br />
                                <p>Add a slider in Interface to define the number of agents to create #people:</p>
                                <img src="./images-tutorial/button-people.png" alt = "button-people" />
                                <br /><br />
                                <p>Insert within the setup-people procedure the following code, replacing the previous one:</p>
                                <code>
                                create-people #people
                                <br />
                                [
                                <br />
                                &nbsp;&nbsp;setxy random-xcor random-ycor
                                <br />
                                &nbsp;&nbsp;set shape "person"
                                <br />
                                &nbsp;&nbsp;set contact-with [ ]
                                <br />
                                ]
                                </code>
                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-04'>
    <h2>Sintax</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
                                    <code> &lt;breed&gt;-on &#123;num&#125;</code>: breed in position &#123;num&#125;<br>
                                    <code>random-xcor</code>: random value for &#123;num&#125; coordinate<br>
                                    <code>setxy &#123;num&#125;</code>: forward &#123;num&#125; units<br>
                                </p>
        </div>
    </div>
  </div>


  <div class="b-divider"></div>

  <div class="container" id='paragrafo-05'>
    <h2>Check behavior</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>Insert 'check-behaviour' procedure in the main cycle <code>go</code>.</p>
        <p>
                            <code>
                                to go<br>
                                &nbsp;&nbsp;move-agents
                                <br>
                                &nbsp;&nbsp;check-behaviour<br>
                                end
                            </code>
                            <br><br>
                            <br>
                            Add the following code:
                            <br>
                            <code>
                                to check-behaviour
                                <br>
                                &nbsp;&nbsp;ask people
                                <br>
                                &nbsp;&nbsp;[
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;if any? other people-on patch-ahead 1
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;[
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;let contacts other people-on patch-ahead 1
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ask contacts
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if not member? myself contact-with
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ask myself
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set contact-with lput myself contact-with
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set contact-with lput myself contact-with
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;create-link-with myself
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;]
                                <br>
                                &nbsp;&nbsp;]
                                <br>
                                end
                            </code>
                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>


  <div class="container" id='paragrafo-06'>
    <h2>Sintax</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
                                    <code>other &#123;num&#125; </code>: a number of &#123;num&#125; agents (other than self))<br>
                                    <code>let &#123;x&#125; &#123;v&#125; </code>: create local variable &#123;x&#125; with value &#123;v&#125;<br>
                                    <code>member? &#123;x&#125; &#123;l&#125; </code>: verify if &#123;x&#125; is included in &#123;l&#125;<br>
                                    <code>myself </code>: the agent calling myself<br>
                                    <code>lput &#123;x&#125; &#123;l&#125; </code>: adding &#123;x&#125; to the list &#123;l&#125;<br>
                                    <code>create-link-with &#123;y&#125; </code>: create a link from agent to the agent &#123;y&#125;<br>
                                </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-07'>
    <h2>Improvements</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>Insert the following code to see two agents making contact: stop (with the wait command) the display, and zoom in on the two agents for 2 seconds.</p>
          <p>Here is the new procedure:</p>
        <p>
                            <code>
                                to check-behaviour
                                <br>
                                &nbsp;&nbsp;ask people [
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;if any? other people-on patch-ahead 1
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;[
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ask patch-here [ set pcolor gray ]
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;let contacts other people-on patch-ahead 1
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ask contacts
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if not member? myself contact-with
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set size 2
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ask myself [ set size 2 ]
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;wait 2
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set size 1
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ask myself
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set size 1
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set contact-with lput myself contact-with
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set contact-with lput myself contact-with
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;create-link-with myself
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;]
                                <br>
                                &nbsp;&nbsp;]
                                <br>
                                end
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