<!doctype html>
<html>
    <head>

        <title>Video Chat Application</title>

        <!-- Stylesheet Ressources -->
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- JavaScript Ressources -->
        <script src="js/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/global.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/adapt.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/webrtc.js" type="text/javascript" charset="utf-8"></script>


    </head>

    <body>

        <!-- Modal Connection -->
        <div class="modal hide fade" id="ModalConnection">

            <div class="modal-header">
              <h3>Video Chat Connection</h3>
            </div>

            <div class="modal-body">
              <div class="control-group">
                <label>Nickname :</label>
                <input id="nickname" type="text" class="span2">
                <span class="help-inline hide">Not empty !</span>
              </div>
            </div>

            <div class="modal-footer">
            <button id="loginSub" class="btn btn-primary">Login</button>
            </div>

        </div>
        <!-- End of the Modal Connection -->


        <!-- Navbar -->
        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container-fluid">
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <a id="username" class="brand" href="/index.php">username</a>
             
            </div>
          </div>
        </div>
        <!-- End of the Navbar -->

        <!-- Content -->
        <div class="container-fluid">
			
            <div class="row-fluid">

                <div class="span6">
                  <!-- Local Video -->
                  <div class="row-fluid">
                    <div style="position: relative;" class="span12">
                      <h2 align="left">Local</h2>
                      <span id="locallive" class="live hide">LIVE</span>
                      <video width="100%" height="100%" id="localVideo" autoplay="autoplay"
                      style="opacity: 0;
                      -webkit-transition-property: opacity;
                      -webkit-transition-duration: 2s;">
                      </video>
                    </div>
                  </div>
                  <!-- End of Local Video -->
                </div>
                <div class="span6">
                  <!-- Remote Video -->
                  <div class="row-fluid">
                    <div style="position: relative;" class="span12">
                      <h2 align="left">Remote</h2>
                      <span id="remotelive" class="live hide">LIVE</span>
                      <video width="100%" height="100%" id="remoteVideo" autoplay="autoplay"
                      style="opacity: 0;
                      -webkit-transition-property: opacity;
                      -webkit-transition-duration: 2s;">
                      </video>
                    </div>
                  </div>
                  <!-- End of Remote Video -->
                </div>

            </div>

            <!-- Statut of the visio call -->
            <div id="footer"></div>

            <hr>

            <!-- Footer -->
            <footer><p>&copy; Video Chat Application</p></footer>

        </div>
        <!-- End of the Content -->

    </body>
</html>
