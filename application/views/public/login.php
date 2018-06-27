<div class="theme-inner-banner m-bottom0">
				<div class="donation-page opacity">
				<div class="container container-sm">
									<div class="row ">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div class="card">
												<div class="card-title px-4">
													<h3 class="heading heading-5 strong-500">
														Login
													</h3>
													<p class="bg-danger"><?= $this->session->flashdata('error'); ?></p>
													<p class="bg-success"><?= $this->session->flashdata('success'); ?></p>
													<p class="bg-info"><?= $this->session->flashdata('info'); ?></p>
													<?= validation_errors(); ?>
												</div>
												<div class="card-body">
													<?= form_open('admin/login', array('class'=>'col-lg-12 form-default', 'role'=>'form')); ?>
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label>Email</label>
																	<div class="input-group input-group--style-1">
																		<input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="<?= set_value('email');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-user-circle-o"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label>Password</label>
																	<div class="input-group input-group--style-1">
																		<input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
																		<span class="input-group-addon">
																			<i class="fa fa-lock"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<button type="submit" class="button-two ch-p-bg-color float-right">Login</button>

													</form>
												</div>
											</div>
										</div>
										<div class="col-md-3"></div>
									</div>
								</div>
							</div>
						</div>
			
