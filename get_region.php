<?php
require_once("conn.php");
$country_id = $_REQUEST['country_id'];

$qry = $conn->query("select * from `kyc_list` where `country_id`='".$country_id."' ");
?>
<option value="">Select Region</option>
<?php
while($res = $qry->fetch_array())
{
	?>
    <option value="<?php echo $res['region_name'] ?>"><?php echo $res['region_name'] ?></option>
    <?php
}
?>