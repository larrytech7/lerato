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
													<?= form_open('transaction/receive', array('class'=>'col-lg-12 form-default', 'role'=>'form')); ?>
														<h4>Confirm your Bank Account Information</h4>
														<hr style="border: 1px solid #000000"/>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Name of Bank <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<input type="text" name="bankname" class="form-control form-control-lg" placeholder="Name of bank" value="<?= $bank->bankname ?>">
																		<span class="input-group-addon">
																			<i class="fa fa-university text-primary"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Account Holder Name <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																	<input type="text" name="bankaccountname" class="form-control form-control-lg" placeholder="Account Holder Name (As on official documents)" value="<?= $bank->bankaccountname?>">
																		<span class="input-group-addon">
																			<i class="fa fa-user text-primary"></i>
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
																		<input type="text" name="bankpersonid" class="form-control form-control-lg" placeholder="Name of bank" value="<?= $bank->bankpersonid?>">
																		<span class="input-group-addon">
																			<i class="fa fa-hashtag text-primary"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Personal Address <span class="text-danger">(Only if different from personal info)</span></label>
																	<div class="input-group input-group--style-1">
																	<input type="text" name="bankpersonaddress" class="form-control form-control-lg" placeholder="Account Holder Address" value="<?= $bank->bankpersonaddress?>">
																		<span class="input-group-addon">
																			<i class="fa fa-home text-primary"></i>
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
																		<input type="phone" name="bankcontact" class="form-control form-control-lg" placeholder="Phone number" value="<?= $bank->bankcontact?>">
																		<span class="input-group-addon">
																			<i class="fa fa-phone text-primary"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Email <span class="text-danger">(Only if different from personal info)</span></label>
																	<div class="input-group input-group--style-1">
																	<input type="email" name="bankemail" class="form-control form-control-lg" placeholder="Email" value="<?= $bank->bankemail?>">
																		<span class="input-group-addon">
																			<i class="fa fa-at text-primary"></i>
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
																		<input type="text" name="bankaddress" class="form-control form-control-lg" placeholder="Bank address" value="<?= $bank->bankaddress?>">
																		<span class="input-group-addon">
																			<i class="fa fa-map-marker text-primary"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Branch Code</label>
																	<div class="input-group input-group--style-1">
																	<input type="text" name="bankbranchcode" class="form-control form-control-lg" placeholder="Bank branch code" value="<?= $bank->bankbranchcode?>">
																		<span class="input-group-addon">
																			<i class="fa fa-hashtag text-primary"></i>
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
																			<i class="fa fa-flag text-primary"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Branch Code <span class="text-danger">(Electronic payments)</span></label>
																	<div class="input-group input-group--style-1">
																	<input type="number" min="0" name="ebranchcode" class="form-control form-control-lg" placeholder="Branch code for electronic payments" value="<?= $bank->ebranchcode?>">
																		<span class="input-group-addon">
																			<i class="fa fa-hashtag text-primary"></i>
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
																	<input type="text" min="0" name="bankswift" class="form-control form-control-lg" placeholder="Bank swift code" value="<?= $bank->bankswift?>">
																		<span class="input-group-addon">
																			<i class="fa fa-qrcode text-primary"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Amount to Buy</label>
																	<div class="input-group input-group--style-1">
																		<input type="number" name="amount" class="form-control form-control-lg" placeholder="Enter amount of LRT to buy" title="Enter amount of LRT to buy" required>
																		<span class="input-group-addon text-primary">
																			LRT
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<button type="submit" class="button-two ch-p-bg-color float-right">Buy LERATO</button>

													</form>
												</div>
											</div>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
			
