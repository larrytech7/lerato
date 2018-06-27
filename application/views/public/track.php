<!-- MAIN WRAPPER -->
<div class="body-wrap">
    <div id="st-container" class="st-container">
		<div class="st-pusher">
            <div class="st-content">
            <div class="st-content-inner">

                <!-- PAGE TITLE -->
                <section class="slice-xl slice--offset-top has-bg-cover bg-size-cover" style="background-image: url('<?= base_url('resources/'); ?>assets/images/backgrounds/slider/img-41.jpg'); background-position: bottom bottom;">
                    <span class="mask bg-base-1 alpha-7"></span>
                    <div class="text-center">
                        <div class="container">
                            <div class="py-5">
                                <div class="fluid-paragraph text-center">
                                    <h3 class="heading heading-xl strong-400 text-normal c-white">
                                        Track your orders!
                                    </h3>
                                    <p class="lead line-height-1_8 strong-400 c-white mt-3">
                                        Follow every order you place seamlessly with just a tracking code. Reach out to us at any time for inquiry on your orders.                                 </p>
									<div class="feature feature--boxed-border feature--bg-1">
										
										<form role="form" class="form-default" action="" method="post">
											<div class="row cols-md-space cols-sm-space cols-xs-space">
												<div class="col-lg-9">
													<div class="form-group mb-0">
														<input class="form-control form-control-lg " type="text" placeholder="Tracking Code" name="trackcode" id="trackcode" required>
													</div>
												</div>
												<div class="col-lg-3">
													<button data-fancybox data-type="ajax" data-src="<?= site_url('/track') ?>" data-filter="#trackcontent" type="button" class="btn btn-styled btn-block btn-base-1 btn-track">
														Track
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="slice-lg sct-color-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 mr-10 ml-10" id="trackdata">
                                <div class="section-title section-title--style-1 text-center mb-2">
                                    <h3 class="section-title-inner heading-2 strong-500 text-capitalize">
                                        Tracking information will be shown here
                                    </h3>
                                    <span class="section-title-delimiter clearfix d-none"></span>
                                </div>

                                <span class="clearfix"></span>

                                <div class="d-none fluid-paragraph fluid-paragraph-sm text-center" >
                                    <p class="text-lg c-gray-light">Quickly get the best prescriptions online from our fleet of available pharmacies.</p>
                                </div>
                            </div>
                        </div>
                      </div>
                </section>

							