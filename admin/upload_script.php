<?php


    	//deleteing images
		if(isset($_REQUEST['img']) and $_REQUEST['img']!=""){
            @unlink($GLOBALS['directory'].$_REQUEST['img']);
            
            $name_delete = $_REQUEST["img"];

            mysqli_query($connection, "DELETE FROM images_products WHERE name = '".$name_delete."'");

            $sql_delete = "DELETE FROM images_products WHERE name = '.$name_delete.'";

            if ($connection->query($sql_delete) === TRUE) {
                $message_delete = "Categorie deleted successfully";
             } else {
                 $message_delete = "Error deleting categorie: " . $connection->error;
            }
            

            $msg	=	'<div class="alert alert-success">Image delete successfully. Refresh your page.</div>';
            
            
        }
	?>
<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-upload"></i> Upload Multiple Files</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="dropzone dz-clickable" id="myDrop">
                    <div class="dz-default dz-message" data-dz-message="">
                        <span>Drop files here to upload</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" id="add_file" class="btn btn-primary" name="submit"><i class="fa fa-upload"></i>
                    Upload File(s)</button>
            </div>
        </div>
    </div>
</div>
<!--Only these JS files are necessary-->
<script src="dropzone/dropzone.js"></script>
<script>
//Dropzone script
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div#myDrop", {
    paramName: "files", // The name that will be used to transfer the file
    addRemoveLinks: true,
    uploadMultiple: true,
    autoProcessQueue: false,
    parallelUploads: 50,
    maxFilesize: 8, // MB
    acceptedFiles: ".png, .jpeg, .jpg, .gif",
    url: "ajax/actions.ajax.php",
});


/* Add Files Script*/
myDropzone.on("success", function(file, message) {
    $("#msg").html(message);
    //setTimeout(function(){window.location.href="index.php"},800);
});

myDropzone.on("error", function(data) {
    $("#msg").html('<div class="alert alert-danger">There is something wrong, Please try again!</div>');
});

myDropzone.on("complete", function(file) {
    myDropzone.removeFile(file);
});

$("#add_file").on("click", function() {
    myDropzone.processQueue();
});
</script>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-photo"></i> View Uploaded Files</div>
        <div class="panel-body" style="overflow-y: scroll">
            <?php
                $id_products =0;

                

                
				$scanned_directory = array_diff(scandir($GLOBALS['directory']), array('..', '.'));
				foreach($scanned_directory as $img){
                    if((strpos($img, '.jpg') !== FALSE) || (strpos($img, '.jpeg') !== FALSE) || (strpos($img, '.png') !== FALSE) || (strpos($img, '.gif') !== FALSE)){

                    
				?>
            <div class="col-xs-6 col-md-3">
                <div class="thumbnail">
                    <img src="<?php echo $GLOBALS['directory'].$img; ?>" alt="<?php echo $img; ?>">
                    <a href="upload_photo.php?img=<?php echo $img; ?>" class="btn btn-block2 btn-danger"><i
                            class="fa fa-trash"></i></a>
                </div>
            </div>
            <?php }
                
                
                $search_products2 = "SELECT * FROM products WHERE name = '$img_name'";
                $id_products_for_photo2 = mysqli_query($connection, $search_products2);
            
                while($id_found2 = mysqli_fetch_array($id_products_for_photo2)) {
            
                
                    $id_products_update = $id_found2["id"];
                                
                
              }
                 
                   
                mysqli_query($connection, "UPDATE images_products set id_products = '".$id_products_update."' WHERE name = '".$img."'");
                mysqli_query($connection, "UPDATE images_products set path = '".$GLOBALS['path']."' WHERE name = '".$img."'");
                
                $sql_update_id = "UPDATE images_products set id_products = '.$id_products_update.' WHERE name = '.$img.'";
                
                if ($connection->query($sql_update_id) === TRUE) {
                    $message_update = "Id update successfully";
                 } else {
                     $message_update = "Error update id: " . $connection->error;
                }
                
               
               
                    
                 
                
            
            } 
                
                
                
                ?>

        </div>
    </div>
</div>