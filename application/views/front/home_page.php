<!-- hero --><style type="text/css">.bg-custom-home {    background: url("<?php echo(base_url('upload/img/front/home_page/slider_back.jpg')); ?>") no-repeat center center fixed;    -webkit-background-size: cover;    -moz-background-size: cover;    background-size: cover;}taxiResFormRow{margin-bottom: 30px;}.thumbnail-meta p{line-height: 25px;margin-bottom: 0;}</style>    <section class="wrapper-lg bg-custom-home">        <div class="container">            <div class="row">                <div class="col-sm-12">                    <div class="widget padding-lg bg-dark">                        <h1 class="heading-lg text-center text-light">Where do u want to go:?</h1>                        <br class="spacer-lg">                        <form action="" class="form-inline" id="quickbooking_form">                            <div class="row">                                <div class="col-md-2">                                    <label for="">Title:</label>                                    <!-- form-control selectpicker show-tick -->                                    <select id='title' name='title'class=" form-control " title='Choose One' >                                        <optgroup label="Title:">                                            <option value="Mr">Mr</option>                                            <option value="Mrs">Mrs</option>                                            <option value="Mis">Mis</option>                                            <option value="Mss">Mss</option>                                        </optgroup>                                    </select>                                </div><!-- /.col -->                                <div class="col-md-2">                                    <label for="">First name:</label>                                    <input type="text" id='first_name' required name='first_name' class="form-control selectpicker show-tick" title='Choose One' >                                </div><!-- /.col -->                                <div class="col-md-2">                                    <label for="">Last Name:</label>                                    <input type="text" id='last_name' name='last_name' class="form-control selectpicker show-tick" title='Choose One' data-live-search="true" >                                </div><!-- /.col -->                                <div class="col-md-2">                                    <label for="">Tel:</label>                                    <input type="text" id='m_tel' required name='m_tel' class="form-control selectpicker show-tick" title='Choose One' data-live-search="true" >                                </div><!-- /.col -->                                <div class="col-md-4">                                    <label for="">Tell more:</label>                                    <textarea name="note" id="note" cols="10" rows="1" class="form-control selectpicker show-tick" title='Choose One' data-live-search="true" ></textarea>                                    <!-- <input type="text" id='m_tel' required name='m_tel' class="form-control selectpicker show-tick" title='Choose One' data-live-search="true" > -->                                </div><!-- /.col -->                                                            </div>                            <div class="row">                                <div class="col-md-2">                                    <label for="">From:</label>                                    <input type="text" id='address_1' required name='address_1' class="form-control selectpicker show-tick" title='Choose One' data-live-search="true" >                                </div><!-- /.col -->                                <div class="col-md-2">                                    <label for="">Pick town:</label>                                    <!-- form-control selectpicker show-tick -->                                    <select id='town_id' name='town_id' class="form-control" title='Choose One' >                                        <optgroup label="Town name:">                                            <?php if(isset($town_list)): ?>                                                <?php  foreach ($town_list as $key => $town): ?>                                                     <option value='<?php echo($town['town_id']) ?>'><?php echo $town['name'] ?> </option>                                                <?php endforeach; ?>                                            <?php endif; ?>                                        </optgroup>                                    </select>                                </div><!-- /.col -->                                <div class="col-md-2">                                    <label for="">To:</label>                                    <input type="text" id='address_2' name='address_2' class="form-control selectpicker show-tick" title='Choose One' data-live-search="true" >                                </div><!-- /.col -->                                <div class="col-md-2">                                    <label for="">Date:</label>                                    <input type="text" id='request_date' required name='request_date' class="form-control selectpicker show-tick" title='Choose One' data-live-search="true" >                                </div><!-- /.col -->                                <div class="col-md-2">                                    <label for="">Time:</label>                                    <input type="text" id='request_time'required  name='request_time' class="form-control selectpicker show-tick" title='Choose One' data-live-search="true" >                                </div><!-- /.col -->                                <div class="col-md-2">                                    <label for=""><!-- Ready? --></label>                                    <button class="btn btn-primary btn-block">Reserve</button>                                </div>                            </div>                            <div class="row">                                                            </div> <!-- /.row -->                            <div class="row">                                <label id="display_msg"></label>                            </div>                        </form>                    </div><!-- /.widget -->                </div><!-- /.col -->            </div><!-- /.row -->        </div><!-- /.container -->    </section>    <!-- /hero -->     <section class="wrapper-md">        <div class="container">            <div class="row">                <div class="col-sm-12 text-center">                    <h2><i class="fa fa-trophy text-primary"></i> We are offering <span class="text-muted">The best hassle-free transportation</span> Service</h2>                    <p class="lead">We pride ourselves by giving the best  hassle-free transportation to our customers. Buy Using our service you will be getting the best affordable transportation mode to your unique transportation need</p>                                    </div><!-- /.col -->            </div><!-- /.row -->        </div><!-- /.container -->     </section>    <section class="wrapper-md bg-highlight">        <div class="container">            <div class="row">                <div class="col-sm-6 col-md-3">                    <div class="thumbnail">                        <div class="overlay-container">                            <img src="<?php echo base_url('upload/img/front/home_page/wedding_offer.jpg'); ?>">                            <div class="overlay-content">                                <h3 class="h4 headline">Wedding</h3>                                <p>Memorable and Hassle-Free.</p>                            </div><!-- /.overlay-content -->                        </div><!-- /.overlay-container -->                        <div class="thumbnail-meta">                            <p>Wedding Cars</p>                        </div>                        <div class="thumbnail-meta">                            <p><i class="fa fa-fw fa-info-circle"></i> Old,New Cars</p>                            <p><i class="fa fa-fw fa-info-circle"></i> With Driver</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Dual A/C</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Decoration as request</p>                        </div>                                           </div><!-- /.thumbnail -->                </div><!-- /.col -->                <div class="col-sm-6 col-md-3">                    <div class="thumbnail">                        <div class="overlay-container">                            <img src="<?php echo base_url('upload/img/front/home_page/nano.jpg'); ?>">                            <div class="overlay-content">                                <h3 class="h4 headline">Time in need</h3>                                <p>when ever you need</p>                            </div><!-- /.overlay-content -->                        </div><!-- /.overlay-container -->                        <div class="thumbnail-meta">                            <p>Budget Taxi</p>                        </div>                        <div class="thumbnail-meta">                            <p><i class="fa fa-fw fa-info-circle"></i> With,Without Driver</p>                            <p><i class="fa fa-fw fa-info-circle"></i> nano Cars</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Dual A/C , non A/C</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Price per Km</p>                        </div>                    </div><!-- /.thumbnail -->                </div><!-- /.col -->                                <div class="col-sm-6 col-md-3">                    <div class="thumbnail">                        <div class="overlay-container">                            <img src="<?php echo base_url('upload/img/front/home_page/tour.jpg'); ?>">                            <div class="overlay-content">                                <h3 class="h4 headline">Fun time</h3>                                <p>when buddies get to gather</p>                            </div><!-- /.overlay-content -->                        </div><!-- /.overlay-container -->                        <div class="thumbnail-meta">                            <p>For a trip</p>                        </div>                        <div class="thumbnail-meta">                            <p><i class="fa fa-fw fa-info-circle"></i> With,Without Driver</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Van 16, 18 seats</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Dual A/C , non A/C</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Special Price</p>                        </div>                    </div><!-- /.thumbnail -->                </div><!-- /.col -->                <div class="col-sm-6 col-md-3">                    <div class="thumbnail">                        <div class="overlay-container">                            <img src="<?php echo base_url('upload/img/front/home_page/vanwithluggage.jpg'); ?>">                            <div class="overlay-content">                                <h3 class="h4 headline">more luggage</h3>                                <p>to make a easy moving</p>                            </div><!-- /.overlay-content -->                        </div><!-- /.overlay-container -->                        <div class="thumbnail-meta">                            <p>Have more luggage</p>                        </div>                        <div class="thumbnail-meta">                            <p><i class="fa fa-fw fa-info-circle"></i> Van With Driver</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Removable seats</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Luggage up to 1000Kg</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Reliable transport</p>                        </div>                    </div><!-- /.thumbnail -->                </div><!-- /.col -->                <div class="col-sm-6 col-md-3">                    <div class="thumbnail">                        <div class="overlay-container">                            <img src="<?php echo base_url('upload/img/front/home_page/van.jpg'); ?>">                            <div class="overlay-content">                                <h3 class="h4 headline">be professional</h3>                                <p>Make your business easy</p>                            </div><!-- /.overlay-content -->                        </div><!-- /.overlay-container -->                        <div class="thumbnail-meta">                            <p>Office Business</p>                        </div>                        <div class="thumbnail-meta">                            <p><i class="fa fa-fw fa-info-circle"></i> Luxury van</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Van 16, 18 seats</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Dual A/C</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Flat rate on price</p>                        </div>                    </div><!-- /.thumbnail -->                </div><!-- /.col -->                <div class="col-sm-6 col-md-3">                    <div class="thumbnail">                        <div class="overlay-container">                            <img src="<?php echo base_url('upload/img/front/home_page/self_dirve.jpg'); ?>">                            <div class="overlay-content">                                <h3 class="h4 headline">Drive with pride</h3>                                <p>to a safe journey</p>                            </div><!-- /.overlay-content -->                        </div><!-- /.overlay-container -->                        <div class="thumbnail-meta">                            <p>Self Drive Rental</p>                        </div>                        <div class="thumbnail-meta">                            <p><i class="fa fa-fw fa-info-circle"></i> Car, Van</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Dual A/C , non A/C</p>                            <p><i class="fa fa-fw fa-info-circle"></i> With fuel</p>                            <p><i class="fa fa-fw fa-info-circle"></i> Price per Day</p>                        </div>                    </div><!-- /.thumbnail -->                </div><!-- /.col -->                                <div class="col-md-6">                    <!-- Carousel -->                    <div id="my-carousel" class="carousel slide no-margin-bottom">                        <!-- indicators -->                        <ol class="carousel-indicators">                            <li data-target="#my-carousel" data-slide-to="0" class=""></li>                            <li data-target="#my-carousel" data-slide-to="1" class=""></li>                        </ol>                        <!-- carousel -->                        <div class="carousel-inner">                            <div class="item active left">                                <img class="img-responsive" src="<?php echo base_url('upload/img/front/home_page/wallpaper1.jpg'); ?>" alt="1200x500">                                <div class="carousel-caption visible-lg">                                    <h1>Bootstrap Framework Overhauled<br> Meet the new sexy</h1>                                    <p class="lead">Beautifull Bootstrap skin with overhauled components.</p><br>                                </div>                            </div><!-- /.item -->                            <div class="item next left">                                <img class="img-responsive" src="<?php echo base_url('upload/img/front/home_page/wallpaper2.jpg'); ?>" alt="1200x500">                                <div class="carousel-caption visible-lg">                                    <h1>We help you being awesome at what you really do</h1>                                    <p class="lead">Providing the best service so you can concentrate on your thing</p>                                </div>                            </div><!-- /.item -->                        </div><!-- /.carousel-inner -->                        <!-- Controls -->                        <a class="left carousel-control" href="http://192.185.2.21/~senadhee/v1/index.php/#my-carousel" data-slide="prev">                            <span class="glyphicon glyphicon-chevron-left"></span>                        </a>                        <a class="right carousel-control" href="http://192.185.2.21/~senadhee/v1/index.php/#my-carousel" data-slide="next">                            <span class="glyphicon glyphicon-chevron-right"></span>                        </a>                    </div><!-- /.carousel -->                </div><!-- /.col -->            </div><!-- /.row -->        </div><!-- /.container -->    </section>          <!-- news list -->    <section class="wrapper-md">        <div class="container">            <h2 class="text-center">Latest News</h2>            <p class="text-center lead">Our news your opertunities</p>            <br class="spacer-lg">            <div class="row">                <div class="col-md-12 centered">                    <div id="nt-example1-container">                        <i class="fa fa-arrow-up" id="nt-example1-prev"></i>                        <ul id="nt-example1">                            <?php foreach ($website_news_title as $key => $news): ?>                                <li><?php echo $news['title'] ?><a href="<?php echo(site_url('front/website_news/view/'.$news['website_news_id'])); ?>"> Read more...</a></li>                             <?php endforeach ?>                        </ul>                        <i class="fa fa-arrow-down" id="nt-example1-next"></i>                    </div>                </div>            </div><!-- /.row -->        </div><!-- /.container -->    </section>    <script src="<?php echo(base_url('asset/template/js/jquery-1.8.3.min.js')); ?>"></script>    <script type="text/javascript">        jQuery(document).ready(function($) {            $('#quickbooking_form').submit(function(event) {                event.preventDefault();                $.ajax({                    url: '<?php echo site_url("front/website_booking/ajax_add")?>',                    type: 'POST',                    dataType: 'json',                    data: {title:$('#title').val(),first_name:$('#first_name').val(),last_name:$('#last_name').val(),m_tel:$('#m_tel').val(),address_1:$('#address_1').val(),town_id:$('#town_id').val(),address_2:$('#address_2').val(),request_date:$('#request_date').val(),request_time:$('#request_time').val(),note:$('#note').val()},                })                .done(function(response) {                    if (response.status=='success') {                        $('#display_msg').html("Request success").delay(10000, function(){ })                        console.log("success");                        $('#title').val('');                        $('#first_name').val('');                        $('#last_name').val('');                        $('#m_tel').val('');                        $('#address_1').val('');                        $('#town_id').val('');                        $('#address_2').val('');                        $('#request_date').val('');                        $('#request_time').val('');                        $('#note').val('');                                            }                    else                    {                        alert(response.msg)                    }                })                .fail(function() {                    console.log("error");                    $('#display_msg').html("Request success please contact us on Mobile").delay(10000, function(){alert('remove')})                })                .always(function() {                    console.log("complete");                });                            });                    });    </script>    <link href="<?php echo base_url('asset/css/jquery.datetimepicker.css') ?>" rel="stylesheet">     <link href="<?php echo base_url('asset/css/main.css') ?>" rel="stylesheet"> <!--     <link href="<?php echo base_url('asset/css/prism.css') ?>" rel="stylesheet">    <link href="<?php echo base_url('asset/css/jquery.mCustomScrollbar.css') ?>" rel="stylesheet">  -->        <script src="<?php echo(base_url('asset/js/chart.js')); ?>"></script>    <script src="<?php echo(base_url('asset/js/bootstrap.js')); ?>"></script>    <!--  -->    <script src="<?php echo(base_url('asset/js/prism.js')); ?>"></script>    <script src="<?php echo(base_url('asset/js/jquery.mCustomScrollbar.min.js')); ?>"></script>    <script src="<?php echo base_url('asset/js/jquery.datetimepicker.js') ?>"></script>    <script>        jQuery(document).ready(function($) {             $('#request_date').datetimepicker({timepicker:false,format:'Y-m-d'});            $('#request_time').datetimepicker({datepicker:false,format:'H:i'});                 });    </script>    <script src='<?php echo(base_url('asset/js/jquery.newsTicker.min.js')); ?>'> </script>    <script>         var nt_example1 = $('#nt-example1').newsTicker({                row_height: 80,                max_rows: 3,                duration: 4000,                prevButton: $('#nt-example1-prev'),                nextButton: $('#nt-example1-next')            });    </script>