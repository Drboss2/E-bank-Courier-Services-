<div class="udex-main" id="main">
    <ul class="breadcrumb">
		<li class="breadcrumb-item"><a >Home</a></li>
		<li class="breadcrumb-item active">Edit Info</li>
	</ul>
    <h1 class="clearfix">Edit Tracking Info<div class="float-right"></div></h1>
	<div class="bg-white mt-3">
        <?php $d = $user->singleClient('tracking',$_GET['single']); ?>
        <div class='col-lg-12 mt-4'>
            <div class="table-responsive mt-3">
                <a data-toggle="collapse" data-target="#demo" class="ml-auto btn btn-warning" style="margin-top:10px;" href="#">Add shipping history</a>
                <h3 class="p-4 d-flex">Details <a href="home?view=<?php echo $d->id?>" class="ml-auto btn btn-warning">Back</a></h3>
                <br>
                <div id="success">
                </div>
                <table id="demo" class="table table-bordered table-hover table-striped bg-white collapse mytable">
                     <tr class="bg-dark text-light">
                        <td colspan="2">SHIPPING HISTORY</td>
                    </tr>
                    <form id="d">
                        <td>Location</td>
                            <td><input class="form-control" name="location" id="location" type="text"></td>
                           
                        </tr>
                        <td>Details</td>
                            <td><strong><textarea rows="5" name="sadd" id="sadd" class="form-control" required></textarea></td>
                            <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $d->id?>">
                            <input type="hidden" class="form-control" name="track" id="track" value="<?php echo $d->tracking_number?>">
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><strong><input type="date" class="form-control" name="sdate" id="sdate" value="<?php echo $d->sender?>" required></strong></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button id='submit' class="btn btn-primary btn-sm" type="submit">Add</button>
                               <button style='display:none' id='disabled' disabled class="btn btn-danger btn-sm" type="submit">Loading</button>
                            </td>
                        </tr>
                    </form>
                </table>
                <table class="table table-bordered table-hover table-striped bg-white mytable">
                    <tr class="bg-dark text-light">
                        <td colspan="2">SHIPPING STATUS</td>
                    </tr>
                    <form method="post" action="modules/editclient.php">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $d->id?>">
                        <tr>
                            <td>Tracking Number</td>
                            <td><strong><input type="text" class="form-control" value="<?php echo $d->tracking_number?>" readonly></strong></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><strong><input type="text" class="form-control" name="name" value="<?php echo $d->sender?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><strong><input type="text" class="form-control" name="sender" value="<?php echo $d->sender_address?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><strong><input type="text" class="form-control" name="country" value="<?php echo $d->sender_country?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Receiver Name</td>
                            <td><strong><input type="text" class="form-control" name="receiver_name" value="<?php echo $d->receiver_name?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Receiver Address</td>
                            <td><strong><input type="text" class="form-control" name="receiver_address" value="<?php echo $d->receiver_address?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Package Content</td>
                            <td><strong><input type="text" class="form-control" name="package_content" value="<?php echo $d->package_content?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Dispatch From</td>
                            <td><strong><input type="text" class="form-control" name="dispatch_form" value="<?php echo $d->dispatch_form?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Delivery Country</td>
                            <td><strong><input type="text" class="form-control" name="delivery_country" value="<?php echo $d->delivery_country?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Delivery Type</td>
                            <td><strong><input type="text" class="form-control" name="delivery_type" value="<?php echo $d->delivery_type?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Dispatch Date</td>
                            <td><strong><input type="text" class="form-control" name="dispatch_date" value="<?php echo $d->dispatch_date?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Arrival Type</td>
                            <td><strong><input type="text" class="form-control" name="arrival_date" value="<?php echo $d->arrival_date?>"></strong></td>
                        </tr>
                          <tr>
                            <td>Progress Bar</td>
                            <td><strong><input type="text" class="form-control" name="progress" value="<?php echo $d->progress?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Date Created</td>
                            <td><strong><?php echo $d->date?></strong></td>
                        </tr>
                        <tr class="d-flex">
                        <td colspan="2"><button name="client" class="btn btn-primary btn-sm" type="submit">Update</button></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
     <div class="dash_footer mt-4 small">
	<p>
		Copyright © admin.
		<br />
	</p>
	</div>
</div>

<script>
 $(document).ready(function(){
    $("#d").on("submit",function(e){

        e.preventDefault();

        let sadd = $("#sadd").val();
        let date = $("#sdate").val();
        let id   = $("#id").val();
        let track  = $("#track").val();
        let location  = $("#location").val();



        $.ajax({
            url:"modules/jsphp.php",
            method:"post",
            cache:false,
            async: true,
            data:{
                set:1,
                sadd: sadd,
                date: date,
                track:track,
                location:location,
                id:id
            },
            beforeSend:function(){
                $('#submit').hide();
                $('#disabled').show();
            },
            success:function(data){
                $('#submit').show();
                $('#disabled').hide();
                console.log(data);
                if(data == 'inserted'){
                    $("#success").html('<p class="alert alert-success">Shipping details added</p>');
                      $("#sadd").val("");
                     $("#sdate").val("");
                }
            },
            error:function(err){
                console.log(err);
            }
        })
    })
 });

</script>