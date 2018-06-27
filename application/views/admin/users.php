					<section class="slice-xl page-title border-bottom has-bg-cover bg-size-cover" style="background-image: url(<?= base_url('resources/') ?>assets/images/prv/shop/section-img-1.jpg);">
                        <div class="container mask-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <h3 class="heading heading-1 strong-600 text-capitalize mb-1">
                                            <span>Control Panel - Users</span>
                                        </h3>

                                        <ol class="breadcrumb breadcrumb--style-2">
                                            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Events</a></li>
                                            <li class="breadcrumb-item"><a href="<?= site_url('devotions') ?>">Devotions</a></li>
                                            <li class="breadcrumb-item"><a href="<?= site_url('videos') ?>">Videos</a></li>
                                            <li class="breadcrumb-item"><a href="<?= site_url('testimonies') ?>">Testimonies</a></li>
                                            <li class="breadcrumb-item active"><a href="<?= site_url('users') ?>">Users</a></li>
                                        </ol>
											
										<?= validation_errors() ?>
                                    </div>

                                    <!-- Fluid text paragraph -->
                                    <div class="pb-1 mt-2">
                                        <p class="lead">
											<?= $this->session->flashdata('info'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="slice sct-color-1">
                        <div class="container">
                            <div class="row justify-content-center mt--150">
								
                                <div class="col-lg-12">
                                    <form class="form-default" data-toggle="validator" role="form">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table-cart" id="users">
                                                    <thead>
                                                        <tr>
                                                            <th class="d-lg-table-cell"><ion-icon name="person" size="large"></ion-icon>User Name</th>
                                                            <th class="d-lg-table-cell"><ion-icon name="call" size="large"></ion-icon> Phone</th>
                                                            <th class="d-lg-table-cell"><ion-icon name="mail" size="large"></ion-icon> Email </th>
                                                            <th class="d-lg-table-cell"><ion-icon name="locate" size="large"></ion-icon> Address </th>
                                                            <th class="d-lg-table-cell"><ion-icon name="calendar" size="large"></ion-icon> Date Registered </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
														<?php foreach($users as $user): ?>
                                                        <tr class="cart-item">
                                                            <td class="product-image">
																<div class="dropdown dropdown--style-2">
																	<a class="dropdown-toggle has-badge" href="#" data-toggle="dropdown" aria-expanded="false">
																		<img class="dropdown-image rounded-circle" src="<?= base_url('resources/') ?>images/uploads/gravatar.jpg?">
																		<sup class="badge bg-blue">!</sup>
																		<span class="dropdown-text strong-600"><?= $user->name ?></span>
																	</a>
																	<div class="dropdown-menu">
																		<h6 class="dropdown-header">Action</h6>
																		<div class="dropdown-divider" role="presentation"></div><span class="clearfix"></span>
																		<a href="<?= site_url('/users/remove/'.$user->id)?>" onclick="javascript:return confirm('Do you want to delete this user? ');" class="float-right pl-0" alt="Delete" title="Delete">
																			<i class="ion-trash-a icon-lg text-danger"></i>  Delete
																		</a>
																	</div>
																</div>
                                                            </td>

                                                            <td class="product-name">
                                                                <a data-toggle="modal" data-target="#<?= $user->id ?>" class="" href="javascript:;">
																<?= $user->phone ?>
																</a>
                                                            </td>
															
															<td class="product-price d-none d-md-table-cell text-primary">
                                                                <?= $user->email ?>
                                                            </td>
                                                            
															<td class="product-date"><span ><?= $user->address ?></span></td>
															
															<td class="product-size product-size d-none d-lg-table-cell">
                                                                <span class="strong-600 d-inline-block text-truncate" style="max-width: 250px;" title="<?= $user->create_at ?>"><?= unix_to_human($user->create_at) ?></span>
                                                            </td>
                                                        </tr>
														<?php endforeach; ?>
													</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
