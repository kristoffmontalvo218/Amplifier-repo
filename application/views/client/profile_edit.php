<?php echo form_open_multipart('clients/profile_edit_info'); ?>
<div class="container py-3">
    <div class="row">
        <div class="col-md-3">
            <?php 
                // echo '<pre>';
                // print_r($this->session->userdata());
                // echo '</pre>';
            ?>
            <img src="<?php echo base_url(); echo $this->session->userdata('photo'); ?>" class="img-thumbnail" alt="">
            <div class="form-group mt-2">
                <label for="" class="d-flex justify-content-center">Edit Profile Photo</label>                  
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?php echo form_error('userfile') ? 'is-invalid' : ''; ?>" name="userfile" id="customFile">
                    <label  class="custom-file-label" for="customFile">Choose Photo</label>
                    <div class="invalid-feedback">
                        <?php echo form_error('userfile'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <p class="h3">Edit <?php echo $this->session->userdata('fname'); ?> <?php echo $this->session->userdata('lname'); ?></p>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="header">Edit User information</h5>
                        <div class="px-2">
                            <a href="profile_info" data-toggle="tooltip" data-placement="top" title="Cancel" class="btn btn-danger mr-2">X</a>
                            <button class="btn btn-primary" type="submit" data-toggle="tooltip" data-placement="top" title="Save Changes"><i class="fas fa-save fa-lg"></i></button>                      
                        </div>
                    </div>                        
                        
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Username</div>
                                <div class="col font-weight-bold"><input type="text" value="<?php echo isset($uname) ? $uname : $this->session->userdata('username'); ?>" class="form-control <?php echo form_error('uname') ? 'is-invalid' : '' ?>" name="uname">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('uname'); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">First Name</div>
                                <div class="col font-weight-bold"><input type="text" value="<?php echo isset($fname) ? $fname : $this->session->userdata('fname'); ?>" class="form-control <?php echo form_error('fname') ? 'is-invalid' : '' ?>" name="fname">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('fname'); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Last Name</div>
                                <div class="col font-weight-bold"><input type="text" value="<?php echo isset($lname) ? $lname : $this->session->userdata('lname'); ?>" class="form-control <?php echo form_error('lname') ? 'is-invalid' : '' ?>" name="lname">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('lname'); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Email Address</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('email'); ?></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Phone Number 1</div>
                                <div class="col font-weight-bold"><input type="text" value="<?php echo isset($number1) ? $number1 : $this->session->userdata('telephone_1'); ?>" class="form-control <?php echo form_error('number1') ? 'is-invalid' : '' ?>" name="number1">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('number1'); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Phone Number 2</div>
                                <div class="col font-weight-bold"><input type="text" value="<?php echo isset($number2) ? $number2 : $this->session->userdata('telephone_2'); ?>" class="form-control <?php echo form_error('number2') ? 'is-invalid' : '' ?>" name="number2">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('number2'); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Address</div>
                                <div class="col font-weight-bold"><textarea name="address" id="" value="" class="form-control <?php echo form_error('address') ? 'is-invalid' : '' ?>" rows="1"><?php echo isset($address)  ? $address   : $this->session->userdata('address'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('address'); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Offense</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('offense') ? $this->session->userdata('offense') : 'None' ; ?></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Report Count</div>
                                <div class="col font-weight-bold"><?php echo $this->session->userdata('report_count') ? $this->session->userdata('report_count') : 'None' ; ?></div>
                            </div>
                        </li>
                    </ul>
                    <div class="card-footer">
                        <small class="text-muted">Account Registered: <?php echo date('F d, Y', strtotime('date_registered')); ?> Time: <?php echo date('h:i:s A', strtotime($this->session->userdata('date_registered'))) ?></small><br>
                        <small class="text-muted">Account Updated: <?php echo date('F d, Y', strtotime('date_updated')); ?> Time: <?php echo date('h:i:s A', strtotime($this->session->userdata('date_updated'))) ?></small>
                    </div>  
            </div>
        </div>
    </div>
</div>
<?php form_close(); ?>