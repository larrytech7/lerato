<div class="theme-inner-banner m-bottom0">
				<div class="donation-page opacity">
				<div class="container container-sm">
									<div class="row ">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div class="card">
												<div class="card-title px-4">
													<h3 class="heading heading-5 strong-500 bg-primary">
														My Profile
													</h3>
												</div>
												<div class="card-body">
													<?= form_open('admin/login', array('class'=>'col-lg-12 form-default', 'role'=>'form')); ?>
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label><i class="fas fa-user"></i> <?= $user->first_name.' '.$user->last_name ?></label>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label><i class="fas fa-at"></i> <?= $user->email ?></label>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label><i class="fas fa-map-marker-alt"></i> <?= $user->city.' - '.$user->country ?></label>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label><i class="fas fa-map-marked-alt"></i> <?= $user->address ?></label>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label><i class="fas fa-user-tie"></i> Business Tax Number:  <span><?= $user->btax == '' ? 'NONE' : $user->btax ?></span></label>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label><i class="fas fa-user-tag"></i> Income Tax: <span class="text-danger"><?= $user->itax == '' ? 'NONE' : $user->itax ?></span></label>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label>ZIP CODE:  <?= $user->zip ?></label>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<h4 class="text-danger">CURRENT BALANCE:  LRT <?= $user->lerato ?></h4>
																</div>
															</div>
														</div>

													</form>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="card">
												<div class="card-title px-4">
													<h4 class="heading heading-5 strong-500 bg-primary">
														<i class="fas fa-building"></i> Bank Account
													</h4>
												</div>
												<div class="card-body">
													<?= form_open('admin/login', array('class'=>'col-lg-12 form-default', 'role'=>'form')); ?>
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<h5><?= $bank->bankname ?></h5>
																</div>
															</div>
														</div>
														<hr style="border: 1px solid #000000"/>
														<p style="font-type:bold">Account Holder: <?= $bank->bankaccountname ?></p>
														<p>Owner ID: <?= $bank->bankpersonid ?></p>
														<p>Owner Address: <?= $bank->bankpersonaddress ?></p>
														<p>Phone: <?= $bank->bankcontact ?></p>
														<p>Email: <?= $bank->bankemail ?></p>
														<p>Bank Address: <?= $bank->bankaddress ?></p>
														<p>Bank Branch Code<?= $bank->bankbranchcode ?></p>
														<p>Bank Country: <?= $bank->bankcountry ?></p>
														<p>E-Code: <?= $bank->ebranchcode ?></p>
														<p>Account opened on: <?= $bank->opened ?></p>
														<p>SWIFT: <?= $bank->bankswift ?></p>

													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
			
