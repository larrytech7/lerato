<div class="theme-inner-banner m-bottom0">
				<div class="donation-page opacity">
				<div class="container container-sm">
									<div class="row ">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div class="card">
												<div class="card-body">
													<?= form_open('admin/login', array('class'=>'col-lg-12 form-default', 'role'=>'form')); ?>
														<h3 class="heading heading-5 strong-500">
														Transactions
													</h3><hr style="border: 1px solid #000000"/>
														<?php foreach($transactions as $transaction): ?>
														<div class="row">
															<div class="col-md-12">
																<h5 title="receipient"><i class="fas fa-user"></i> <?= $transaction->receipient ?></h5>
																<span title="destination country"><i class="fas fa-flag-checkered"></i> <?= $transaction->country ?></span>
																<h4 title="amount transferred" class="text-danger"><i class="fas fa-money-bill"></i> LRT <?= $transaction->amount ?></h4>
																<p title="time of the transaction"><i class="fas fa-clock"></i> <?= unix_to_human($transaction->updated_at) ?></p>
																<p title="transaction status"><i class="fab fa-staylinked"></i>
																<?php if($transaction->status > 0):?>
																	<span class="text-success">SENT</span></p>
																<?php else: ?>
																	<span class="text-danger">PENDING</span></p>
																<?php endif; ?>
															</div>
														</div>
														<hr style="border: 1px solid #0000ff"/>
														<?php endforeach; ?>
													</form>
												</div>
											</div>
										</div>
										<div class="col-md-3"></div>
									</div>
								</div>
							</div>
						</div>
			
