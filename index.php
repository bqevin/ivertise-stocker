<?php require_once 'templates/header.php'; ?>
<link rel="stylesheet" href="mike/table.css" type="text/css"/>
  <style type="text/css">
  @media all and (min-width: 1200px) {
    .sap_tabs, .col-md-10{
      width: 90%; margin-left: 180px;
    }
  }
  .img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
    max-width:none;
    height: 17em;
    overflow: hidden;
}
img {
  border: none;
}
#thumbnail img {
  cursor: pointer;
  overflow: hidden;
      }
#large {
  display: none;
  position: fixed;
  background: #FFFFFF;
  padding: 5px;
  z-index: 10;
  color: #336699;
}
#large1 {
  display: none;
  position: fixed;
  width: 30%;
  height: 40%;
  padding: 5px;
  z-index: 10;
}


#background{
  display: none;
  position: fixed;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  background: #000000;
  z-index: 1;
}
  </style>
</head>

<body>
  <div class="header">
    <div class="container">
      <div class="logo">
        <h1><a href="#"><img src="assets/img/logo.png" alt=""></a></h1>
      </div>
      <div class="top_right" style="color:#177856!important;">
        <ul>
          <li><a href="register.php">Register</a></li>|
          <li class="login">
            <div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
              <div id="loginBox">
                <form id="loginForm" method="post">
                  <fieldset id="body">
                    <fieldset>
                      <label for="usernmae">Email Address</label>
                      <input type="text" name="username" id="email">
                    </fieldset>
                    <fieldset>
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password">
                    </fieldset>

                    <label for="checkbox">
                      <input type="checkbox" name="remember" id="checkbox"> <i>Remember me</i></label>
                    <input type="submit" id="login" value="Sign in">
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
            <!-- <li>
               <a href="#">
                <img src="ph/images/thumbs/pic1.jpg" class="img-responsive" alt="" />
                <div class="tab_desc">
                  <p>There are many variations</p>
                  <h4>#25478921</h4>
                </div>
              </a>
            </li> -->
            <?php
                /* Attempt MySQL server connection. Assuming you are running MySQL
                server with default setting (user 'root' with no password) */
                $link = mysqli_connect("localhost", "root", "password", "ivertise_africa");

                // Check connection
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                // Attempt select query execution
                $sql = "SELECT * FROM images";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){

                          $file_path = 'assets/images/original/';
                          $file_path_watermark = 'assets/images/watermark/';

                          $start =  $row['url'];


                          $src_water=$file_path_watermark.$start;

                         $src = $file_path.$start;
                      ?>

                      <div align="center">
                      <li  id="thumbnail">
                       <a href="#">
                       <a href="<?php echo $src_water ?>"><img style="width:100%;" src="<?php echo $src ?>" alt="Stock Photo" rel="Stock Photo" />
                        <!-- <div class="tab_desc">
                          <p>There are many variations</p>
                          <h4>#25478921</h4>
                        </div> -->
                      </a>
                    </li>

                      <div id="large">

                      </div>
                      <div id="large1">
                      <div class="CSS_Table_Example" style="width:400px;height:200px;">
                               <table >
                                   <tr>
                                       <td>
                                         <a href="#">  Download</a>
                                       </td>
                                       <td >
                                           properties
                                       </td>
                                   </tr>
                                   <tr>
                                       <td >
                                           image format
                                       </td>
                                       <td>
                                           Jpeg
                                       </td>
                                   </tr>
                                   <tr>
                                       <td >
                                           Author
                                       </td>
                                       <td>
                                         John Paul
                                       </td>
                                   </tr>
                                   <tr>
                                       <td >
                                         image size
                                       </td>
                                       <td>
                                           2mb
                                       </td>
                                   </tr>
                                   <tr>
                                       <td >
                                         image size
                                       </td>
                                       <td>
                                           2mb
                                       </td>
                                   </tr>
                               </table>
                      </div>

                      </div>
                      <div id="background"></div>
                      </div>


                      <?php


                        }
                        // Close result set
                        mysqli_free_result($result);
                    } else{
                    }
                } else{
                }

                // Close connection
                mysqli_close($link);
                ?>



              </a>

              <div class="clearfix"></div>
            </ul>
          </div>

          <div class="tab-1 resp-tab-content" aria-labelledby="photography">
            <ul class="tab_img">
              <div class="clearfix"></div>
            </ul>
          </div>
          <div class="tab-1 resp-tab-content" aria-labelledby="models">
            <ul class="tab_img">
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
<script type="text/javascript" language="javascript">
  jQuery.fn.center = function () {

    this.css("top","2%");
    this.css("left","5%");

           return this;         }
   jQuery.fn.info = function () {

             this.css("top","20%");
             this.css("right","5%");

                    return this;            }

  $(document).ready(function() {
    $("#thumbnail img").click(function(e){

      $("#background").css({"opacity" : "0.7"})
              .fadeIn("slow");

      $("#large").html("<img src='"+$(this).parent().attr("href")+"' alt='"+$(this).attr("alt")+"' /><br/>"+$(this).attr("rel")+"")
             .center()
             .fadeIn("slow");

       $("#large1").info().fadeIn("slow");
      return false;
    });

    $(document).keypress(function(e){
      if(e.keyCode==27){
        $("#background").fadeOut("slow");
        $("#large").fadeOut("slow");
        $("#large1").fadeOut("slow");
      }
    });

    $("#background").click(function(){
      $("#background").fadeOut("slow");
      $("#large").fadeOut("slow");
      $("#large1").fadeOut("slow");
    });

    $("#large").click(function(){
      $("#background").fadeOut("slow");
      $("#large").fadeOut("slow");
      $("#large1").fadeOut("slow");
    });

  });
</script>
</body>

</html>

