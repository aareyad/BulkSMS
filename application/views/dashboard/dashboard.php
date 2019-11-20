<div class="row"> 
							<?php if($this->session->userdata('role')!=1): ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $usercredit ?>"><?= $usercredit ?></span>
                                        </div>
                                        <div class="desc">Total SMS Credit</div>
                                    </div>
                                </a>
                            </div>
							<?php endif; ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $total_send_sms['success']+$total_send_sms['error'] ?>"><?= $total_send_sms['success']+$total_send_sms['error'] ?></div>
                                        <div class="desc"> Total Send SMS </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $total_send_sms['success']; ?>"><?= $total_send_sms['success']; ?></span>
                                        </div>
                                        <div class="desc">Success SMS </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= $total_send_sms['error']; ?>"><?= $total_send_sms['error']; ?></span></div>
                                        <div class="desc"> Error SMS </div>
                                    </div>
                                </a>
                            </div>
                        </div>