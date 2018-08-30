<div class="theme-inner-banner m-bottom0">
				<div class="donation-page opacity">
				<div class="container container-sm">
									<div class="row ">
										<div class="col-md-7">
											<div class="card">
												<div class="card-body">
												
													<?= form_open('admin/login', array('class'=>'col-lg-12 form-default', 'role'=>'form')); ?>
														<div class="row">
														<h3 class="heading heading-5 strong-500">
														My Profile
													</h3><hr style="border: 1px solid #000000"/>
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
										<div class="col-md-5">
											<div class="card">
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
														<table class="table condensed" >
														
														<tr><td>Account Holder</td> <td><?= $bank->bankaccountname ?></td></tr>
														<tr><td>Owner ID </td><td> <?= $bank->bankpersonid ?></td></tr>
														<tr><td>Owner Address</td><td> <?= $bank->bankpersonaddress ?></td></tr>
														<tr><td>Phone</td><td> <?= $bank->bankcontact ?></td></tr>
														<tr><td>Email </td><td><?= $bank->bankemail ?></td></tr>
														<tr><td>Bank Address </td> <td><?= $bank->bankaddress ?></td></tr>
														<tr><td>Bank Branch Code</td><td><?= $bank->bankbranchcode ?></td></tr>
														<tr><td>Bank Country</td> <td><?= $bank->bankcountry ?></td></tr>
														<tr><td>E-Code </td><td><?= $bank->ebranchcode ?></td></tr>
														<tr><td>Account opened on</td> <td><?= $bank->opened ?></td></tr>
														<tr><td>SWIFT </td><td> <?= $bank->bankswift ?></td></tr>
														</table>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
			
