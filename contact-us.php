<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php') ?>  
    
    <div class="jumbotron">
        
            <div class="details animated fadeInLeft">
                <h1 class="text-light">Contact <span class="text-primary">Us</span></h1>
                <p class="text-light">this is the thing i wnat you do</p>
            </div>
      
        <img src="images/service10.jpg">
    </div>
      
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="ml-0 col-md-8 ">
                   <div class="map">
                       <div class="row">
                           <div class="col-md-12">
<!--                               <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=API key 1'></script><div style='overflow:hidden;height:400px;width:100%;'><div id='gmap_canvas' style='height:400px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://embed-map.org/'>map generator</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=79b563a59b8e681f8d574d18d9554aa42378185b'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(30,70),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(30,70)});infowindow = new google.maps.InfoWindow({content:'<strong>shoaib</strong><br>2<br>98989 lahore<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>-->
                           </div>
                       </div>
                   </div><!--map-->
                   
                   <h2>Contact-Form:</h2>
                   <div class="container">
                       <div class="row mt-3 mr-4">
                           <div class="col-md-12">

                          
                               <form action="" method="post">
                                   <div class="form-group">
                                       <label>Full name:</label>
                                       <input type="text" name="name" class="form-control" placeholder="Enter your name">
                                   </div>
                                   <div class="form-group">
                                       <label>email</label>
                                       <input type="email" name="email" class="form-control" placeholder="Enter your mail">
                                   </div>
                                   <div class="form-group">
                                       <label>website:</label>
                                       <input type="text" name="website" class="form-control" placeholder="Enter your website">
                                   </div>
                                   <div class="form-group">
                                       <label>Enter you msg:</label>
                                       <textarea id="msg" name="msg" cols="30" rows="6" class="form-control"></textarea>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-3">
                                           <div class="form-group">
                                       <input type="submit" name="submit"  class="btn btn-primary form-control" value="Submit">
                                   </div>
                                       </div>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div><!--form-->
                    
                </div><!--slider and post-->
                
                
                
                <?php require_once('inc/sidebar.php') ?>  
            </div>
        </div>
       
    </section>
    
   
       <?php require_once('inc/footer.php') ?>  