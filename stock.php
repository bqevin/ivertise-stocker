<?php require_once 'templates/header.php'; ?>
</head>

<body>
  <div class="header">
    <div class="container">
      <div class="logo">
        <h1><a href="./index.php"><img src="assets/img/logo.png" alt=""></a></h1>
      </div>
      <div class="top_right" style="color:#177856!important;">
        <ul>
          <li><a href="users/register.php">Register</a></li>|
          <li class="login">
            <div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
              <div id="loginBox">
                <form id="loginForm">
                  <fieldset id="body">
                    <fieldset>
                      <label for="email">Email Address</label>
                      <input type="text" name="email" id="email">
                    </fieldset>
                    <fieldset>
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password">
                    </fieldset>
                    <input type="submit" id="login" value="Sign in">
                    <label for="checkbox">
                      <input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                  </fieldset>
                  <span><a href="#">Forgot your password?</a></span>
                </form>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="stock_box">
    <div class="col-md-2 stock_left">
      <div class="w_sidebar">
        <section class="sky-form">
          <h4>Collections</h4>
          <div class="col col-4">
            <label class="checkbox">
              <input type="checkbox" name="checkbox" checked=""><i></i>All ph/images</label>
          </div>
          <div class="col col-4">
            <label class="checkbox">
              <input type="checkbox" name="checkbox"><i></i>Standard</label>
            <label class="checkbox">
              <input type="checkbox" name="checkbox"><i></i>Following</label>
            <label class="checkbox">
              <input type="checkbox" name="checkbox"><i></i>Lorem Ipsum</label>
            <label class="checkbox">
              <input type="checkbox" name="checkbox"><i></i>Injected humour</label>
            <label class="checkbox">
              <input type="checkbox" name="checkbox"><i></i>Default model </label>
          </div>
        </section>
        <section class="sky-form">
          <h4>Freshness</h4>
          <div class="col col-4">
            <label class="checkbox">
              <input type="checkbox" name="checkbox" checked=""><i></i>Any time</label>
            <label class="checkbox">
              <input type="checkbox" name="checkbox"><i></i>Past 3 months</label>
            <label class="checkbox">
              <input type="checkbox" name="checkbox"><i></i>Past month</label>
          </div>
          <div class="col col-4">
            <label class="checkbox">
              <input type="checkbox" name="checkbox"><i></i>Past week</label>
            <label class="checkbox">
              <input type="checkbox" name="checkbox"><i></i>Past 3 days</label>
            <label class="checkbox">
              <input type="checkbox" name="checkbox"><i></i>Any time</label>
          </div>
        </section>
        <section class="sky-form">
          <h4>colour</h4>
          <ul class="w_nav2">
          </ul>
        </section>
        <section class="sky-form">
          <h4>discount</h4>
          <div class="col col-4">
            <label class="radio">
              <input type="radio" name="radio" checked=""><i></i>60 % and above</label>
            <label class="radio">
              <input type="radio" name="radio"><i></i>50 % and above</label>
            <label class="radio">
              <input type="radio" name="radio"><i></i>40 % and above</label>
          </div>
          <div class="col col-4">
            <label class="radio">
              <input type="radio" name="radio"><i></i>30 % and above</label>
            <label class="radio">
              <input type="radio" name="radio"><i></i>20 % and above</label>
            <label class="radio">
              <input type="radio" name="radio"><i></i>10 % and above</label>
          </div>
        </section>
      </div>
    </div>
    <?php
    //declaring variable
    $input = $_POST["search_text"];
    $q = $_POST['search_text'];

   echo "<h3><i class='fa fa-angle-right'><br><b>You searched for:</b>$input</h3>";
    //If they did not enter a search term we give them an error
    if ($input == "")
    {
    echo "<p><h3>You forgot to enter a search term!</h3>";
    exit;
  }?>
    <div class="col-md-10 sap_tabs">
      <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
        <ul class="resp-tabs-list">
          <li class="resp-tab-item" aria-controls="all_searches" role="tab"><span>All</span></li>
          <li class="resp-tab-item" aria-controls="photography" role="tab"><span>Photography</span></li>
          <li class="resp-tab-item" aria-controls="models" role="tab"><span>Models</span></li>
          <li class="resp-tab-item" aria-controls="mui" role="tab"><span>MUI</span></li>
          <div class="clearfix"></div>
        </ul>
        <div class="resp-tabs-container">
          <div class="tab-1 resp-tab-content" aria-labelledby="all_searches">
            <ul class="tab_img">

            <?php
              //open connection
              $conn = mysql_connect("localhost", "root", "password") or die(mysql_error());
              //select database
              mysql_select_db("ivertise_africa", $conn);
              //filtering input for xss and sql injection
              $input = strip_tags( $input );
              $input = mysql_real_escape_string( $input );
              $input = trim( $input );
              //the sql statement
              $sql = "SELECT * FROM images WHERE keywords LIKE '%$input%' or title LIKE '%$input%' ";
              //execute the statement
              $data = mysql_query($sql, $conn) or die(mysql_error());
              while ($result = mysql_fetch_assoc($data)) {
              //giving names to the fields
              $file_path = 'ph/images/thumbs/';
            $file_path_watermark = 'ph/images/thumbs/';

              $desc = $result ['url'];
              $desc_water = $result ['url_watermark'];
              // Set session variables

              $src_water=$file_path_watermark.$desc_water;
             $src=$file_path.$desc;
             ?>
            <li>
              <a href="single.php">
                 <?php echo $dex = "<img class='img-responsive' src=".$src.">";
                 $_SESSION["source"] = $dex;
                 ?>

                <div class="tab_desc">
                  <p>There are many variations</p>
                  <h4>#25478921</h4>
                </div>
              </a>
            </li>

            <?php

              }

              //This counts the number or results – and if there wasn’t any it gives a little message explaining that
              $anymatches=mysql_num_rows($data);
              if ($anymatches == 0)
              {
              echo "<h3>Results</h3>";
              echo "<p>Sorry, your search: &quot;" . $input . "&quot; returned zero results</p>";
              //Search on google
              // echo "<p><a href=\”http://www.google.com/search?q="
              // . $input . "\" target=\"_blank\" title=\"Look up
              // " . $input . " on Google\">Click here</a> to try the
              // search on google</p>";
              }
              //And we remind them what they searched for
               ?>
              <!-- <li class="last">
                <a href="single.html">
                  <img src="ph/images/pic29.jpg" class="img-responsive" alt="" />
                  <div class="tab_desc">
                    <p>There are many variations</p>
                    <h4>#25478921</h4>
                  </div>
                </a>
              </li> -->
              <div class="clearfix"></div>
            </ul>
          </div>

          <div class="tab-1 resp-tab-content" aria-labelledby="photography">
            <ul class="tab_img">
<!--               <li class="last">
                <a href="single.php">
                  <img src="ph/images/pic29.jpg" class="img-responsive" alt="" />
                  <div class="tab_desc">
                    <p>There are many variations</p>
                    <h4>#25478921</h4>
                  </div>
                </a>
              </li> -->
              <div class="clearfix"></div>
            </ul>
          </div>
          <div class="tab-1 resp-tab-content" aria-labelledby="models">
            <ul class="tab_img">
              <div class="clearfix"></div>
            </ul>
          </div>
          <div class="tab-1 resp-tab-content" aria-labelledby="mui">
            <ul class="tab_img">
<!--               <li class="last">
                <a href="single.php">
                  <img src="ph/images/pic29.jpg" class="img-responsive" alt="" />
                  <div class="tab_desc">
                    <p>There are many variations</p>
                    <h4>#25478921</h4>
                  </div>
                </a>
              </li> -->
              <div class="clearfix"></div>
            </ul>
          </div>
        </div>
      </div>
      <ul class="pagination">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">«</span>
          </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">»</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
<?php require_once 'templates/footer.php'; ?>
</body>

</html>
