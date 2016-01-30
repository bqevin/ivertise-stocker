<?php require_once 'templates/header.php'; ?>

  <style type="text/css">
  @media all and (min-width: 1200px) {
    .sap_tabs, .col-md-10{
      width: 90%; margin-left: 180px;
    }
  }
  </style>
</head>

<body>
  <div class="header">
    <div class="container">
      <div class="logo">
        <h1><a href="../index.html"><img src="assets/img/logo.png" alt=""></a></h1>
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
	<div class="banner">
		<div class="container">
			<div class="span_1_of_1">
			    <h2>Stock photography and model agency <br> for the African Market</h2>
			    <div class="search">
			      <ul class="nav1">
		            <li id="search">
						<form action="stock.php" method="post">
							<input type="text" name="search_text" id="search_text" placeholder="Search"/>
							<input type="button" name="search_button" id="search_button">
						</form>
					</li>
					<li id="options">
						<a href="#">All Images</a>
						<ul class="subnav">
							<li><a href="#">Photography</a></li>
							<li><a href="#">Models</a></li>
							<li><a href="#">MUA</a></li>
						</ul>
					</li>
	              </ul>
	            </div>
			</div>
		</div>
	</div>
	<div class="grid_1">
		<h3>African Commercial Photography through Stock Photography and Assignment Photography. We also provide Models and Makeup artist services for your advertising needs.</h3>
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
            <li>
               <a href="#">
                <img src="ph/images/thumbs/pic1.jpg" class="img-responsive" alt="" />
                <div class="tab_desc">
                  <p>There are many variations</p>
                  <h4>#25478921</h4>
                </div>
              </a>
            </li>
            <li>
               <a href="#">
                <img src="ph/images/thumbs/pic2.jpg" class="img-responsive" alt="" />
                <div class="tab_desc">
                  <p>There are many variations</p>
                  <h4>#25478921</h4>
                </div>
              </a>
            </li>
            <li>
               <a href="#">
                <img src="ph/images/thumbs/pic3.jpg" class="img-responsive" alt="" />
                <div class="tab_desc">
                  <p>There are many variations</p>
                  <h4>#25478921</h4>
                </div>
              </a>
            </li>
            <li>
               <a href="#">
                <img src="ph/images/thumbs/pic4.jpg" class="img-responsive" alt="" />
                <div class="tab_desc">
                  <p>There are many variations</p>
                  <h4>#25478921</h4>
                </div>
              </a>
            </li>
            <li>
               <a href="#">
                <img src="ph/images/thumbs/pic5.jpg" class="img-responsive" alt="" />
                <div class="tab_desc">
                  <p>There are many variations</p>
                  <h4>#25478921</h4>
                </div>
              </a>
            </li>
            <li>
               <a href="#">
                <img src="ph/images/thumbs/pic6.jpg" class="img-responsive" alt="" />
                <div class="tab_desc">
                  <p>There are many variations</p>
                  <h4>#25478921</h4>
                </div>
              </a>
            </li>
            <li>
               <a href="#">
                <img src="ph/images/thumbs/pic7.jpg" class="img-responsive" alt="" />
                <div class="tab_desc">
                  <p>There are many variations</p>
                  <h4>#25478921</h4>
                </div>
              </a>
            </li>
            <li>
               <a href="#">
                <img src="ph/images/thumbs/pic8.jpg" class="img-responsive" alt="" />
                <div class="tab_desc">
                  <p>There are many variations</p>
                  <h4>#25478921</h4>
                </div>
              </a>
            </li>
              <li class="last">
                <a href="#">
                  <img src="ph/images/thumbs/pic9.jpg" class="img-responsive" alt="" />
                  <!-- <div class="tab_desc">
                    <p>There are many variations</p>
                    <h4>#25478921</h4>
                  </div> -->
                </a>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>

          <div class="tab-1 resp-tab-content" aria-labelledby="photography">
            <ul class="tab_img">

              <li>
                <a href="single.php">
                  <img src="ph/images/thumbs/pic2.jpg" class="img-responsive" alt="" />
                  <div class="tab_desc">
                    <p>There are many variations</p>
                    <h4>#25478921</h4>
                  </div>
                </a>
              </li>
              <li class="last">
                <a href="single.php">
                  <img src="ph/images/thumbs/pic1.jpg" class="img-responsive" alt="" />
                  <div class="tab_desc">
                    <p>There are many variations</p>
                    <h4>#25478921</h4>
                  </div>
                </a>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>
          <div class="tab-1 resp-tab-content" aria-labelledby="models">
            <ul class="tab_img">
               <li class="last">
                <a href="single.php">
                  <img src="ph/images/thumbs/pic6.jpg" class="img-responsive" alt="" />
                  <div class="tab_desc">
                    <p>There are many variations</p>
                    <h4>#25478921</h4>
                  </div>
                </a>
              </li>
              <li class="last">
                <a href="single.php">
                  <img src="ph/images/thumbs/pic8.jpg" class="img-responsive" alt="" />
                  <div class="tab_desc">
                    <p>There are many variations</p>
                    <h4>#25478921</h4>
                  </div>
                </a>
              </li>
              <li class="last">
                <a href="single.php">
                  <img src="ph/images/thumbs/pic1.jpg" class="img-responsive" alt="" />
                  <div class="tab_desc">
                    <p>There are many variations</p>
                    <h4>#25478921</h4>
                  </div>
                </a>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>
          <div class="tab-1 resp-tab-content" aria-labelledby="mui">
            <ul class="tab_img">
              <li class="last">
                <a href="single.php">
                  <img src="ph/images/thumbs/pic5.jpg" class="img-responsive" alt="" />
                  <div class="tab_desc">
                    <p>There are many variations</p>
                    <h4>#25478921</h4>
                  </div>
                </a>
              </li>
              <div class="clearfix"></div>
            </ul>
          </div>
        </div>
      </div>
<!--       <ul class="pagination">
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
      </ul> -->
    </div>
    <div class="clearfix"> </div>
  </div>
  </div>
<?php require_once 'templates/footer.php'; ?>
</body>

</html>

