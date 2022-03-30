<?php
$un="root";
$pw="utsa2022!";
$db="data";
$hostname="localhost";
$dblink=new mysqli($hostname, $un, $pw, $db);
$sql="Select distinct(`type`) from `equipment`";
$result=$dblink->query($sql) or
    die("Something went wrong with $sql");
$devices=array();

#fetch row as associative array (column name as key)
while ($data = $result->fetch_array(MYSQLI_ASSOC)){
    $devices[] = $data['type'];
}

if(!isset($_POST['submit'])){
    echo "<form method='post' action=''>";
    echo "<p>Please select device type to query:</p>";
    echo "<select name='device'>";
    foreach ($devices as $key => $value) #index, device
    {
        echo "<option value='".$key."'>".$value."</option>"; #real value is index, but display name
    }
    echo "</select>";
    echo "<hr>"
    echo "<div><button type='submit' name='submit' value='submit'>Submit</button></div>";
    echo "</form>";
}

#process form data
if (isset($_POST['submit']) && $_POST['submit'] == "submit"){
    if(isset($_POST[device])){
        $device_indx = $_POST[device];
        echo "<p>Device found: ".$devices[$device_indx]."</p>";
    }
}
?>
