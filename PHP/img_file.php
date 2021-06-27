<?php
include("Connect.php");
include("DungChung.php");
?>
<div class="container mt-5">
    <form method="POST" enctype="multipart/form-data">
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile" name="image">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <div class="mt-3">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<?php
     
    if(isset($_POST['submit']))
    {
      $image_check = getimagesize($_FILES['image']['tmp_name']);
     if($image_check==FALSE)
     {
        echo " error ";
     }
     else
     {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
        $image_name = addslashes($_FILES['image']['name']);
        $sql="INSERT INTO nhanvien (`AnhNV`, `TenAnhNV`) values ('$image','$image_name')";
        $result=mysqli_query($db,$sql);
        if($result)
        {
            echo '<div class="alert alert-success">
            <strong>Thành công!</strong> Ảnh của bạn đã được tải lên
          </div>';     
        }
        else
        {
            echo " Ảnh chưa được uploaded lên ";
        }   
     }
    }
?>

<script>
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>


</body>

</html>