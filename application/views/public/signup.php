<div class="theme-inner-banner m-bottom0">
				<div class="donation-page opacity">
				<div class="container container-sm">
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											<div class="card">
												<div class="card-title px-4">
													<p class="bg-danger"><?= $this->session->flashdata('error'); ?></p>
													<p class="bg-success"><?= $this->session->flashdata('success'); ?></p>
													<p class="bg-info"><?= $this->session->flashdata('info'); ?></p>
													<?= validation_errors(); ?>
												</div>
												<div class="card-body">
													<?= form_open('admin/signup', array('class'=>'col-lg-12 form-default', 'role'=>'form')); ?>
														<div class="row">
															<h3>Create Account</h3>
															<h4>Personal information</h4>
															<div class="col-md-6">
																<div class="form-group">
																	<label>First Name <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="text" name="fname" class="form-control form-control-lg" placeholder="First name" value="<?= set_value('fname');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-user-circle-o"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Last Name</label>
																	<div class="input-group input-group--style-1">
																		<input type="text" name="lname" class="form-control form-control-lg" placeholder="Last name" value="<?= set_value('lname');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-user-circle-o"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Email <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="<?= set_value('email');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-at"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Phone <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="phone" name="phone" class="form-control form-control-lg" placeholder="Phone (international format)" value="<?= set_value('phone');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-phone"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Password <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="password" name="password" class="form-control form-control-lg" placeholder="Password" value="<?= set_value('password');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-lock"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Re-Password <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="password" name="re-password" class="form-control form-control-lg" placeholder="Confirm your password" value="<?= set_value('password');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-lock"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>ID/Passport number <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="text" name="identification" class="form-control form-control-lg" placeholder="ID/Passport" value="<?= set_value('identification');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-hashtag"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Address <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="text" name="home_address" class="form-control form-control-lg" placeholder="Home address" value="<?= set_value('home_address');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-home"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Income Tax Number</label>
																	<div class="input-group input-group--style-1">
																		<input type="text" name="itax" class="form-control form-control-lg" placeholder="Your income Tax number" value="<?= set_value('itax');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-hashtag"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Business Tax Number</label>
																	<div class="input-group input-group--style-1">
																		<input type="text" name="btax" class="form-control form-control-lg" placeholder="Business Tax Number" value="<?= set_value('btax');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-hashtag"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Country <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<select class="form-control form-control-lg" name="country">
																			<option value="South Africa">South Africa</option>
																			<option value="Cameroon">Cameroon</option>
																			<option value="Nigeria">Nigeria</option>
																		</select>
																		<span class="input-group-addon">
																			<i class="fa fa-globe"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>City <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<select class="form-control form-control-lg" name="city">
																			<option value="South Africa">South Africa</option>
																			<option value="Cameroon">Cameroon</option>
																			<option value="Nigeria">Nigeria</option>
																		</select>
																		<span class="input-group-addon">
																			<i class="fa fa-building"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>State/Province <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<select class="form-control form-control-lg" name="state">
																			<option value="South Africa">South Africa</option>
																			<option value="Cameroon">Cameroon</option>
																			<option value="Nigeria">Nigeria</option>
																		</select>
																		<span class="input-group-addon">
																			<i class="fa fa-building"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Zip/Postal Code <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																	<input type="number" min="0" name="zip" class="form-control" placeholder="Zip/Postal Code" value="<?= set_value('zip');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-building"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<h4>Bank (Personal or Business) Account Information</h4>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Name of Bank <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="text" min="0" name="bankname" class="form-control form-control-lg" placeholder="Name of bank" value="<?= set_value('bankname');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-university"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Account Holder Name <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																	<input type="text" name="bankaccountname" class="form-control form-control-lg" placeholder="Account Holder Name (As on official documents)" value="<?= set_value('bankaccountname');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-user"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>ID/Passport Number <span class="text-danger">(Only if different from personal info)</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="text" name="bankpersonid" class="form-control form-control-lg" placeholder="Name of bank" value="<?= set_value('bankpersonid');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-hashtag"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Personal Address <span class="text-danger">(Only if different from personal info)</span></label>
																	<div class="input-group input-group--style-1">
																	<input type="text" name="bankpersonaddress" class="form-control form-control-lg" placeholder="Account Holder Address" value="<?= set_value('bankpersonaddress');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-home"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Contact Number <span class="text-danger">(Only if different from personal info)</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="phone" name="bankcontact" class="form-control form-control-lg" placeholder="Phone number" value="<?= set_value('bankcontact');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-phone"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Email <span class="text-danger">(Only if different from personal info)</span></label>
																	<div class="input-group input-group--style-1">
																	<input type="email" name="bankemail" class="form-control form-control-lg" placeholder="Email" value="<?= set_value('bankemail');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-at"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Bank Address<span class="text-danger"></span></label>
																	<div class="input-group input-group--style-1">
																		<input type="text" name="bankaddress" class="form-control form-control-lg" placeholder="Bank address" value="<?= set_value('bankaddress');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-map-marker"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Branch Code</label>
																	<div class="input-group input-group--style-1">
																	<input type="text" name="bankbranchcode" class="form-control form-control-lg" placeholder="Bank branch code" value="<?= set_value('bankbranchcode');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-hashtag"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Bank Country <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<select class="form-control form-control-lg" name="bankcountry">
																			<option value="South Africa">South Africa</option>
																			<option value="Cameroon">Cameroon</option>
																			<option value="Nigeria">Nigeria</option>
																		</select>
																		<span class="input-group-addon">
																			<i class="fa fa-flag"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Branch Code <span class="text-danger">(Electronic payments)</span></label>
																	<div class="input-group input-group--style-1">
																	<input type="number" min="0" name="ebranchcode" class="form-control form-control-lg" placeholder="Branch code for electronic payments" value="<?= set_value('ebranchcode');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-hashtag"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<label>Account opened<span class="text-danger">*</span></label>
															<div class="col-md-3">
																<div class="form-group">
																	<div class="">
																		<select class="form-control form-control-lg" name="moaccountdateopened">
																			<option>01</option>
																			<option>02</option>
																			<option>03</option>
																			<option>04</option>
																			<option>05</option>
																			<option>06</option>
																			<option>07</option>
																			<option>08</option>
																			<option>09</option>
																			<option>10</option>
																			<option>11</option>
																			<option>12</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<select class="form-control form-control-lg" name="yraccountdateopened">
																			<option>2010</option>
																			<option>2011</option>
																			<option>2012</option>
																			<option>2014</option>
																			<option>2015</option>
																			<option>2016</option>
																			<option>2017</option>
																			<option>2018</option>
																		</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>SWIFT Code</label>
																	<div class="input-group input-group--style-1">
																	<input type="text" min="0" name="bankswift" class="form-control form-control-lg" placeholder="Bank swift code" value="<?= set_value('bankswift');?>">
																		<span class="input-group-addon">
																			<i class="fa fa-qrcode"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<button type="submit" class="button-two ch-p-bg-color float-right">Create account</button>

													</form>
												</div>
											</div>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
			
