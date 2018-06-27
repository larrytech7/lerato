					<section class="slice-xl page-title border-bottom has-bg-cover bg-size-cover" style="background-image: url(<?= base_url('resources/') ?>assets/images/prv/shop/section-img-1.jpg);">
                        <div class="container mask-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <h3 class="heading heading-1 strong-600 text-capitalize mb-1">
                                            <span>Control Panel - Videos</span>
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
                                                            <th class="d-lg-table-cell"><ion-icon name="person" size="large"></ion-icon>Title</th>
                                                            <th class="d-lg-table-cell"><ion-icon name="link" size="large"></ion-icon></th>
                                                            <th class="d-lg-table-cell"><ion-icon name="calendar" size="large"></ion-icon> Date Updated </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
														<?php foreach($videos as $video): ?>
                                                        <tr class="cart-item">

                                                            <td class="product-name">
                                                                <a data-toggle="modal" data-target="#<?= $video->id ?>" class="" href="javascript:;">
																<?= $video->title ?>
																</a>
                                                            </td>
															
															<td class="product-price d-none d-md-table-cell text-primary">
                                                                <a data-fancybox href="<?=  $video->link ?>" ><?= $video->link ?></a>
                                                            </td>
                                                            
															
															<td class="product-size product-size d-none d-lg-table-cell">
                                                                <span class="strong-600 d-inline-block text-truncate" style="max-width: 250px;" title="<?= $video->updated_at ?>"><?= unix_to_human($video->updated_at) ?></span>
                                                            </td>
															
															<td class="product-action">
																<a href="<?= site_url('/video/remove/'.$video->id)?>" onclick="javascript:return confirm('Do you want to delete this video? ');" alt="Delete" title="Delete">
                                                                    <i class="ion-trash-a text-danger"></i>
                                                                </a>
																<span class="clearfix"></span>
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
