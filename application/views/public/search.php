        <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">
                 
                  <div class="item"><img src="<?php echo base_url('resources/');?>img/keyvisual.jpg" alt="Reservation"/></div>
                  <div class="item"><img src="<?php echo base_url('resources/');?>img/booking.jpg" alt="Payment" /></div>
                  <div class="item"><img src="<?php echo base_url('resources/');?>img/road.jpg" alt="Confirmation"/></div>
                 
                </div>
            </div>
            <div class="container slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <h2 style="color:#ccc">PLANNING YOUR TRIP</h2>
                        <p style="color:#ccc">Make your reservation here.</p>
                        <div class="search-form wow pulse" data-wow-delay="0.8s">
                            <form action="<?php echo site_url('home/search#trips'); ?>" class="form-inline" method="POST">
                                <div class="form-group">
                                    <input type="date" class="form-control" placeholder="Date of your trip" name="date" required/>
                                </div>
                                <div class="form-group">
									<label for="departure"></label>
                                    <select name="departure" id="departure" class="form-control" required>
                                        <option disabled>Departure</option>
                                        <?php foreach($towns as $town):?>
                                        <option selected><?php echo $town->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
									<label for="destination"></label>
                                    <select name="destination" id="destination" class="form-control" required>
                                        <option disabled="disabled">Destination</option>
                                        <?php foreach($towns as $town):?>
                                        <option selected><?php echo $town->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <input type="submit" class="btn" value="Search" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-area">
            <div class="container" id="trips">
                <div class="row page-title text-center wow bounce"  data-wow-delay="0.7s">
                    <h5>Available Trips</h5>
                    <h2><span><?php echo $count; ?></span> Trip(s) found</h2>
                   
                </div>
                <div class="row jobs">
                    <div class="col-md-9">
                        <div class="job-posts table-responsive">
                            <table class="table">
                                <?php 
                                        $i = 0;
                                        foreach($results as $result):
                                        $i++;
                                        if($i > 4):
                                ?>
                                <tr class="<?php echo $result->tid % 2 == 0?'even':'odd';?> hide-jobs wow fadeInUp" data-wow-delay="1s">
                                    <td class="tbl-logo"><img src="<?php echo base_url('resources/uploads/'.$result->logo);?>" alt="Agency Logo" width="100" height="100" class="img img-circle"/></td>
                                    <td class="tbl-title">
                                        <h4><?php echo $result->name; ?> <br />
                                            <span class="job-type"><?php echo $result->category; ?> <br /></span><br />
                                            <strong><?php echo $result->departure_date.' '.$result->departure_time; ?></strong>
                                        </h4>
                                    </td>
                                    <td><p><?php echo $result->departure; ?></p></td>
                                    <td><p><i class="icon-location"></i><?php echo $result->destination; ?></p></td>
                                    <td><h4>FCFA <?php echo $result->price; ?> / Seat</h4> <p>Available: <?php echo $result->available_seats; ?></p><span class="btn-info">Total: <?php echo $result->total_seats; ?></span></td>
								    <td class="tbl-apply"><a href="<?php echo site_url('home/reservation/'.$result->tid.'#reservation')?>" >Reserve</a></td>
                                </tr>
                                <?php endif; ?>
                                <tr class="<?php echo $result->tid % 2 == 0?'even':'odd';?> wow fadeInUp" data-wow-delay="1s">
                                    <td class="tbl-logo"><img src="<?php echo base_url('resources/uploads/'.$result->logo);?>" alt="Agency Logo" width="100" height="100" class="img img-circle"/></td>
                                    <td class="tbl-title">
                                        <h4><?php echo $result->name; ?> <br />
                                            <span class="job-type"><?php echo $result->category; ?></span>
                                            <br />
                                            <strong><?php echo $result->departure_date.' '.$result->departure_time; ?></strong>
                                        </h4>
                                    </td>
                                    <td><p><?php echo $result->departure; ?></p></td>
                                    <td><p><i class="icon-location"></i><?php echo $result->destination; ?></p></td>
                                    <td><h4>FCFA <?php echo $result->price; ?> / Seat</h4> <p>Available: <?php echo $result->available_seats; ?></p><span class="btn-info">Total: <?php echo $result->total_seats; ?></span></td>
								    <td class="tbl-apply"><a href="<?php echo site_url('home/reservation/'.$result->tid.'#reservation')?>" >Reserve</a></td>
                                </tr>
                                <?php endforeach; ?>
            
                            </table>
                        </div>
                        <div class="more-jobs">
                            <a href=""> <i class="fa fa-refresh"></i>View more trips</a>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="job-add wow fadeInRight" data-wow-delay="1.5s" style="background-image: url(<?php  echo base_url('resources/img/job-add.png'); ?>)">
                            <h2>Seeking to make a trip</h2>
                            <a href="#">Find one now!</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

        </div>