<?php require_once 'templates/header.php'; ?>

<link rel="stylesheet" href="mike/table.css" type="text/css"/>
<script type="text/javascript" src="mike/js/jquery-1.4.min.js"></script>
<script type="text/javascript" language="javascript">
  jQuery.fn.center = function () {

    this.css("top","2%");
    this.css("left","5%");

           return this;        	}
   jQuery.fn.info = function () {

             this.css("top","20%");
             this.css("right","5%");

                    return this;        	}

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
<style>
img {
  border: none;
}
#thumbnail img {
  cursor: pointer;
  float: left;
  height: 17em;
  margin: 3px;
      }
#large {
  display: none;
  position: absolute;
  background: #FFFFFF;
  padding: 5px;
  z-index: 10;
  color: #336699;
}
#large1 {
  display: none;
  position: absolute;
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
        <h1><a href="./index.php"><img src="assets/img/logo.png" alt=""></a></h1>
      </div>
      <div class="top_right" style="color:#177856!important;">
        <ul>
          <li><a href="register.php">Register</a></li>|
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
              <input type="checkbox" name="checkbox" checked=""><i></i>All images</label>
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
    }
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
    $file_path = 'assets/images/original/';
$file_path_watermark = 'assets/images/watermark/';

    $desc = $result['url'];
    $desc_water = $result['url_watermark'];

    $src_water=$file_path_watermark.$desc_water;
    $src=$file_path.$desc;

?>

<div align="center">
<div id="thumbnail">
<a href="<?php echo $src_water; ?>"><img src="<?php echo $src; ?>" alt="hills" rel="<?php echo $src; ?>" /></a>
</div>
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

<?php          }

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
<!--main content end-->
<!--footer start-->

<?php require_once 'templates/footer.php'; ?>

</body>

</html>
