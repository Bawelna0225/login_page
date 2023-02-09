<?php require_once "userDataController.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM userdata WHERE email = '$email'";
    $run_Sql = mysqli_query($connection, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
    }
}else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Picture</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script> 
    <script>
    $(document).ready(function(){
        var $modal = $('#modal_crop');
        var crop_image = document.getElementById('sample_image');
        var cropper;
        $('#upload_image').change(function(event){
            var files = event.target.files;
            var done = function(url){
                crop_image.src = url;
                $modal.modal('show');
            };
            if(files && files.length > 0)
            {
                reader = new FileReader();
                reader.onload = function(event)
                {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(crop_image, {
                aspectRatio: 1,
                viewMode: 3,
                preview:'.preview'
            });
        }).on('hidden.bs.modal', function(){
            cropper.destroy();
            cropper = null;
        });
        $('#crop_and_upload').click(function(){
            canvas = cropper.getCroppedCanvas({
                width:400,
                height:400
            });
            canvas.toBlob(function(blob){
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function(){
                    var base64data = reader.result; 
                    $.ajax({
                        url:'changepicture.php',
                        method:'POST',
                        data:{crop_image:base64data},
                        success:function(data)
                        {
                            $modal.modal('hide');
                            location.reload() 
                        }
                    });
                };
            });
        });
    });
</script>
</head>
    <body>
        <main class='center'>
            <?php
            if(count($errors) > 0){
                ?>
                <div class="alert alert-danger text-center">
                    <?php
                    foreach($errors as $showerror){
                        echo $showerror;
                    }
                    ?>
                </div>
                <?php
            }
            ?>
            <div class="wrapper">
                <br />
                <img class="user-logo" src="upload/<?php echo $fetch_info['picture']?>">
                <h2>Change Your profile picture</h2>
                <br />
                <form method="post">
                    <input type="file" name="crop_image" class="crop_image" id="upload_image" />
                </form>
                <div class="modal" id="modal_crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Crop Image Before Upload</h3>
                            </div>
                            <div class="modal-body">
                                <div class="img-container">
                                    <div class="row">
                                        <div>
                                            <img src="" id="sample_image" />
                                        </div>
                                        <div>
                                            <div class="preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class='primary' id="crop_and_upload">Crop</button>
                                <button type="button" class='secondary' data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>    
                        <?php 
                if($fetch_info['picture'] != '') {
                    echo "<form method='post'><button name='delete-picture'>Delete Picture</button></form>";
                }
            ?>
            </div>
            <a style='text-align: center;' href="home.php">Go to Home</a>        
        </main>
    </body>
</html>
