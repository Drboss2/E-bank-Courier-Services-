<div class="udex-main" id="main">
    <ul class="breadcrumb">
		<li class="breadcrumb-item"><a >Home</a></li>
		<li class="breadcrumb-item active">Tracking Info</li>
	</ul><h1 class="clearfix">Tracking Info<div class="float-right"></div></h1>

	<div class="bg-white mt-3">
        <?php $d = $user->singleClient('tracking',$_GET['view']); ?>  
        <h3 class="p-4 d-flex">Details <a href="home?single=<?php echo $d->id?>" class="ml-auto btn btn-warning">Edit</a></h3>
        <div class="table-responsive">
           <table class="table table-condensed table-bordered table-striped mytable">
                <p class="p-4 d-flex"> SHIPPING HISTORY</p>
                <tr style="color:white" class="bg-dark">
                    <th>SN</th>
                    <th>Location</th>
                    <th>Details</th>
                    <th>Action</th>
                    <th>Date</th>
                </tr>
                <tbody>
                <?php
                    $data = $user->getRecodesWithPagination('shipping_history','where','client_id','=',$d->id);
                    if($data !=="nill"):
                       foreach($data as $key =>$val):
                 ?>
                        <tr style="padding:2px !important;">
                            <td><?php echo ++$key?></td>
                            <td><?php echo $val->location?></td>
                            <td><?php echo $val->details?></td>
                            <td>
                                <a class="edit" href="javascipt:void(0)" edid="<?php echo $val->id?>"  data-toggle="modal" data-target="#myModal"><i class="far fa-eye"></i></a> ||
                                <a id="pat" class="delete" href="javascipt:void(0)" did="<?php echo $val->id?>" style="color:red"><i class="fas fa-trash"></i></a>
                            </td>
                            <td><?php echo $val->date ?></td>
                        </tr>
                   <?php endforeach;?>
                <?php endif;?>
                </tbody>
            </table>
            <?php echo $user->paginationfOR('shipping_history',$_GET['view']);?>
            <table class="table table-condensed  table-bordered table-striped mytable">
                <tr class="bg-dark text-light">
                    <td colspan="2">SHIPPING STATUS</td>
                </tr>
                <tr>
                    <td>Tracking Number</td>
                    <td><strong><?php echo $d->tracking_number?></strong></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><strong><?php echo $d->sender?></strong></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><strong><?php echo $d->sender_address?></strong></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><strong><?php echo $d->sender_country?></strong></td>
                </tr>
                <tr>
                    <td>Receiver Name</td>
                    <td><strong><?php echo $d->receiver_name?></strong></td>
                </tr>
                <tr>
                    <td>Receiver Address</td>
                    <td><strong><?php echo $d->receiver_address?></strong></td>
                </tr>
                <tr>
                    <td>Package Content</td>
                    <td><strong><?php echo $d->package_content?></strong></td>
                </tr>
                <tr>
                    <td>Dispatch From</td>
                    <td><strong><?php echo $d->dispatch_form?></strong></td>
                </tr>
                <tr>
                    <td>Delivery Country</td>
                    <td><strong><?php echo $d->delivery_country?></strong></td>
                </tr>
                <tr>
                    <td>Delivery Type</td>
                    <td><strong><?php echo $d->delivery_type?></strong></td>
                </tr>
                 <tr>
                    <td>Progress Bar</td>
                    <td><strong><?php echo $d->progress?></strong></td>
                </tr>
                <tr>
                    <td>Dispatch Date</td>
                    <td><strong><?php echo $d->dispatch_date?></strong></td>
                </tr>
                <tr>
                    <td>Arrival Type</td>
                    <td><strong><?php echo $d->arrival_date?></strong></td>
                </tr>
                
            </table>
        </div>
	</div>
    <div class="dash_footer mt-4 small">
	<p>
		Copyright © admin.
		<br />
	</p>
	</div>	
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       <!-- Modal body -->
       <div class="modal-body">
            <form id="editForm">
                <div class="form-group">
                <p id="error"></p>
                    <label for="email">Details:</label>
                    <input type="text" class="form-control" name="details" id="details">
                    <input type="hidden" class="form-control" name="id" id="id">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="#" data-dismiss="modal">Close</a>
      </div>

    </div>
  </div>
</div>
<script>
 $(document).ready(function(){
    $("body").delegate('.delete','click',function(e){
        e.preventDefault();
       
        let id   = $(this).attr('did');

        $.ajax({
            url:"modules/jsphp.php",
            method:"post",
            cache:false,
            async: true,
            data:{
                del:1,
                id:id
            },
            success:function(data){
                if(data){
                    location.reload()
                }
            },
            error:function(err){
                console.log(err);
            }
        })
    })

    $("body").delegate('.edit','click',function(e){ /// get single shipping history
        e.preventDefault();
       
        let id   = $(this).attr('edid');
        var row;

        $.ajax({
            url:"modules/jsphp.php",
            method:"post",
            cache:false,
            async: true,
            data:{
                edit:1,
                id:id
            },
            success:function(data){
                if(data){
                   row = JSON.parse(data);
                   $("#details").val(row.details);
                   $("#id").val(row.id);
                }
            },
            error:function(err){
                console.log(err);
            }
        })
    })
     $("#editForm").on('submit',function(e){ /// edit single shipping history
        e.preventDefault();
       
        let id   = $("#id").val();
        let details = $("#details").val();

        var row;

        $.ajax({
            url:"modules/jsphp.php",
            method:"post",
            cache:false,
            async: true,
            data:{
                editForms:1,
                real:details,
                id:id
            },
            success:function(data){
                if(data){
                   $("#error").html("<p class='alert alert-success'>Edit successfully</p>");
                   $("#details").val("");
                }
            },
            error:function(err){
                console.log(err);
            }
        })
    })
 });
 </script>
<script>
if ($(window).width() > 992) {
	boxPosition = $(".udex-sidebar").offset().top;
	$(window).scroll(function(){
	   var isFixed = $(".udex-sidebar").css("position") === "fixed";
	   if($(window).scrollTop() > boxPosition && !isFixed){
				$(".udex-sidebar").css({position:"fixed", top: "0px"});
	   }else if($(window).scrollTop() < boxPosition){
			$(".udex-sidebar").css({position:"absolute", top: "auto"});
	   }
	});
}
</script>

<script>
$("#menu_btn").click( function(){
	$("#mySidebar").toggle();
	$("#main, .udex_footer").toggleClass("cubic-left");
	$("body").toggleClass("udex_overflow");
});
$("#account_menu").click( function(){
	$("#myAccount").toggle();
	$("#main, .udex_footer").toggleClass("cubic-right");
	$("body").toggleClass("udex_overflow");
});
</script>

<style>
  .skiptranslate {
    display: none !important;?>
  }
  body {
    top: 0 !important;
  }
</style>


</body>
</html>