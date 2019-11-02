<!-- <?php $event = $this->event_model->get_event($this->uri->segment(2)); ?> -->

<p>Event Name: <span class="font-weight-bold text-capitalize"><?php echo $event['event_name'] ?></span></p>
<p>Event will be held on: <span class="font-weight-bold"><?php echo date('l, F d, Y') ?></span> </p>
<p>From: <span class="font-weight-bold"><?php echo date('h:i a', strtotime($event['event_from'])) ?></span> To: <span class="font-weight-bold"><?php echo date('h:i a', strtotime($event['event_to'])) ?></span> </p>
<p>The event is located in: <span class="font-weight-bold text-capitalize"><?php echo $event['venue_name'] ?></span> </p>
<p>Client Downpayment: <span class="font-weight-bold">₱ <?php echo number_format($event['down_payment'], 2) ?></span></p>
<p>Payment Status: <span class="font-weight-bold"><?php $s = $event['payment_status']; echo $s == 'dp' ? 'Down Payment' : ''; echo $s == 'paid' ? 'Paid' : ''; echo $s == 'none' ? 'None' : '' ?></span></p>
<p>Performer Confirmation: <span class="font-weight-bold"><?php echo $event['status'] ?></span></p>
<p>Service Type: <span class="text-capitalize font-weight-bold"><?php echo $event['artist_type'] ?></span></p>
<p class="font-weight-bold">Client Note: <span class=""><?php echo $event['notes'] ?></span></p>
<p>Date Booked: <span class="font-weight-bold"><?php echo date('l, F d, Y', strtotime($event['date_booked'])) ?></span></p>