<div class="udex-main" id="main">
    <ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item active">Client</li>
	</ul>
    <h1 class="clearfix">Add Client
        <div class="float-right"></div>
    </h1>
    <form method="POST" action="modules/addclient.php">
        <div class="row">
            <div class="col-lg-4">
                <label>Clients/Sender's Name</label>
                <input type="text" class="form-control" id="sender_name" name="sender_name" required>
                <input type="hidden" name="csfr" value="<?php echo rand(10000000000000,90000000009)?>" >
            </div>
            <div class="form-group col-lg-4">
                <label>Clients/Sender's Address</label>
                <input type="text" class="form-control" id="sender_address" name="sender_address" required>
            </div>
             <div class="form-group col-lg-4">
                <label>Clients/Sender's Country</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="form-group col-lg-4">
                <label>Receiver's Name</label>
                <input type="text" class="form-control" id="receiver_name" name="receiver_name" required>
            </div>
            <div class="form-group col-lg-4">
                <label>Receiver's Address</label>
                <input type="text" class="form-control" id="receiver_address" name="receiver_address" required>
            </div>
            <div class="form-group col-lg-4">
                <label>Package Content</label>
                <input type="text" class="form-control" id="package_content" name="package_content" required>
            </div>
            <div class="form-group col-lg-4">
                <label>Dispatch Form</label>
                <input type="text" class="form-control" id="dispatch_form" name="dispatch_form" required>
            </div>
             <div class="form-group col-lg-4">
                <label>Delivery Country</label>
                <input type="text" class="form-control" id="delivery_country" name="delivery_country"required>
            </div>
            <div class="form-group col-lg-4">
                <label>Delivery Type</label>
                <input type="text" class="form-control" id="delivery_type" name="delivery_type"required>
            </div>
            <div class="form-group col-lg-4">
                <label>Dispatch Date</label>
                <input type="text" class="form-control" id="dispatch_date" name="dispatch_date"required>
            </div>
            <div class="form-group col-lg-4">
                <label>Arrival Date</label>
                <input type="text" class="form-control" id="arrival_date" name="arrival_date"required>
            </div>
            <div class="form-group col-lg-6">
                <label>Tracking Number</label>
                <input type="text" class="form-control" id="track" name="track" readonly>
            </div>
        </div>
        <button id="check" name="client" class="btn btn-primary btn-sm">CONTINUE</button>
    </form>
   
    <div class="dash_footer mt-4 small">
        <p>
            Copyright © Admin.
            <br/>
        </p>
	</div>	
</div>
<script>
	cons = document.querySelector('#check');
    let div = document.getElementById('track')

    window.onload = function(){
        let r = Math.floor(Math.random() * (000, 990 + 100))

        let ran = Math.floor(Math.random() * (10000000000, 999999999999 + 100));
        div.value = r+"-"+ran
    }
</script>
<style>
    label{
        font-size:14px;
        color:grey;
    }
</style>



