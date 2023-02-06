<script> var images = [];</script>
<?php
include 'scripts/db.php';
$sql = mysqli_query($db, "SELECT * FROM advert ORDER BY id DESC");
$image_count = 1;
$total = mysqli_num_rows($sql);
while($rows = mysqli_fetch_assoc($sql)){
echo '
<script type="text/JavaScript">
images.push("'.$rows['cimage'].'");
</script>
';
$image_count += 1;
}
?>