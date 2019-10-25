<!-- <?php// echo '<pre>'; print_r($event); echo '</pre>'; ?> -->
<div class="container my-3">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header"><p class="h4 text-center"><?php echo $event['event_name'] ?></p></div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> 
                    <div class="row">
                        <div class="col-md-6">
                            <p class="font-weight-bold">Event Is On</p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php echo date('F d, Y', strtotime($event['event_date'])); ?>
                                </div>
                                <div class="col-md-6">
                                    <p><span class="font-weight-bold">From: </span> <?php echo date('h:i a', strtotime($event['event_from'])); ?> <span class="font-weight-bold"> - </span> <?php echo date('h:i a', strtotime($event['event_to'])); ?></p>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </li>
                <li class="list-group-item"> 
                    <div class="row">
                        <div class="col-md-6">
                            <p class="font-weight-bold">Location</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-capitalize"><?php echo $event['venue_name'] ?></p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item"> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="font-weight-bold">Down Payment</p>
                                </div>
                                <div class="col-md-6">
                                    ₱ <?php echo $event['down_payment'] ?>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <p class="font-weight-bold">Remaining Balance</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-capitalize"><?php ?></p>
                                </div> -->
                                <div class="col-md-6">
                                    <p class="font-weight-bold">Payment Status</p>
                                </div>
                                <div class="col-md-6">
                                    <p><?php $s = $event['payment_status']; echo $s == 'dp' ? 'Down Payment' : ''; echo $s == 'paid' ? 'Paid' : ''; echo $s == 'none' ? 'None' : '' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">                
                    <div class="row">     
                        <div class="col-md-6">                                       
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="font-weight-bold">Performer Confirmation</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-capitalize"><?php echo $event['status'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="font-weight-bold">Service Type</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-capitalize"><?php echo $event['artist_type'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="font-weight-bold">Client Notes</p>
                        </div>
                        <div class="col-md-6">
                            <p class=""><?php echo $event['notes'] ?></p>
                        </div>
                    </div>
                </li>
            </ul> 
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <small class="font-weight-bold">Date Booked</small>
                    </div>
                    <div class="col-md-6">
                        <small><?php echo date('l, F d, Y', strtotime($event['date_booked'])) ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class=" d-flex justify-content-end mt-2">
            <a href="<?php echo base_url(); ?>events"  class="btn btn-secondary col-md-1" data-toggle="tooltip" data-placement="top" title="Return"><i class="fas fa-arrow-left"></i></a>
        </div>         
    </div>
</div>