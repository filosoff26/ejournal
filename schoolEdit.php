<?php
include_once './mysql.php';
include_once './access.php';
if ($username && $group == 'admin'):
    $id=$_GET['school'];
    if ($id) {
        $query="SELECT * FROM ".$mysql_prefix."schools WHERE id=$id";
        $result = my_sql_query($query);
        $data = mysql_fetch_assoc($result);
    }

    if ($_POST['id']) {  
        $id= $_POST['id'];
        $title = $_POST['title'];
        $address = $_POST['address'];
        $contacts = $_POST['contacts'];
        $query = "UPDATE ".$mysql_prefix."schools SET title='$title', address='$address', contacts='$contacts' WHERE id='$id'";
        my_sql_query($query);
        header('Location: schoolView.php');
    }
    include_once './header.php';
    ?>

<form method="post">
 <?php if ($data['id'])
            echo '<input type=hidden name=id value='.$data['id'].'>';
?>
<div class="text-center">
<label>Title:   <input class="form-control" name='title' value="<?php echo $data['title']; ?>"></label><br>
<label>Address:  <input class="form-control" name='address' value="<?php echo $data['address']; ?>"></label><br>
Contacts: <textarea class="form-control" name='contacts' ><?php echo $data['contacts']; ?></textarea><br>
 
	  <input class="btn" type='submit' value="Submit">
</form>
</div>

<?php 
else: header("Location: login.php");
endif;

include 'footer.php';
?>