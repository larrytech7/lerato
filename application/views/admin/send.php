<div class="theme-inner-banner m-bottom0">
				<div class="donation-page opacity">
				<div class="container container-sm">
									<div class="row ">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											<div class="card">
												<div class="card-title px-4 bg-primary">
													<p class="bg-danger"><?= $this->session->flashdata('error'); ?></p>
													<p class="bg-success"><?= $this->session->flashdata('success'); ?></p>
													<p class="bg-info"><?= $this->session->flashdata('info'); ?></p>
													<?= validation_errors(); ?>
												</div>
												<div class="card-body">
													<?= form_open('transaction/send', array('class'=>'col-lg-12 form-default', 'role'=>'form')); ?>
														<div class="row">
														<h3 class="heading heading-5 strong-500">
															Send LERATO
														</h3><hr style="border: 1px solid #000000"/>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Receiver Email</label>
																	<div class="input-group input-group--style-1">
																		<input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="<?= set_value('email');?>" required>
																		<span class="input-group-addon">
																			<i class="fa fa-user-circle-o text-primary fa-lg"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Receiver Phone</label>
																	<div class="input-group input-group--style-1">
																		<input type="number" name="phone" class="form-control form-control-lg" placeholder="Enter Receiver's phone number (international format)" title="Enter Receiver's phone number (international format)" value="<?= set_value('amount');?>" required>
																		<span class="input-group-addon">
																			<i class="fas fa-phone text-primary fa-lg"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Amount</label>
																	<div class="input-group input-group--style-1">
																		<input type="number" name="amount" class="form-control form-control-lg" placeholder="Enter amount of LRT to send" title="Enter amount of LRT to send" value="<?= set_value('amount');?>" required>
																		<span class="input-group-addon text-primary">
																			LRT
																		</span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Destination Country <span class="text-danger">*</span></label>
																	<div class="input-group input-group--style-1">
																		<select class="form-control form-control-lg" name="country" required>
																			<option value="South Africa">South Africa</option>
																			<option value="Cameroon">Cameroon</option>
																			<option value="Nigeria">Nigeria</option>
																		</select>
																		<span class="input-group-addon">
																			<i class="fa fa-flag fa-lg text-primary"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label>Reason</label>
																	<div class="input-group input-group--style-1">
																		<input type="text" name="reason" class="form-control form-control-lg" placeholder="Enter an optional note for the receipient">
																		<span class="input-group-addon">
																			<i class="fas fa-pen-square fa-lg text-primary"></i>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														
														<button type="submit" class="button-two ch-p-bg-color float-right">Send</button>

													</form>
												</div>
											</div>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
			
