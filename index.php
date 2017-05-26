<html>
<head>
<title>Post it!</title>
<style type = "text/css" media ="all">
.fullwidth {
    width: 100%;
}
.left{
float: left;
    padding-left: 25px;
}
.right{
    float: right;
padding: 5px 25px 0px 0px;
}
.mid{
    margin:auto;
padding: 5px 25px 0px 0px;
}
.fullwidth a{
text-decoration: none;
color: #000;
}
table {
margin: auto;
}
th, td {
    border-bottom: 1px solid #ddd;
}
tr:hover {background-color: #f5f5f5}
</style>
<script src="/nicedit/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
						
</head>
<body style="background-color:#efefef; font-family:monospace;">
<div class="fullwidth"><a href="http://post.s2pd.com"><div class="left"><h1 style="text-align:center;">Post it!</h1></a></div><div class = "right"><a href="http://post.s2pd.com"><img src ="https://3.bp.blogspot.com/-wBRhn9yviUc/WO98f-ezvfI/AAAAAAAAdvg/xg7HtapABbUkTo0wo5qPQiLccACssYpAwCLcB/s1600/icon-refresh-128.png" width="50" alt="refresh"/></a></div></div>
<?php
 $db = mysqli_connect('localhost','userName','passWord','dataBaseName')
 or die('Error connecting to MySQL server.');
$query  = 'SELECT content, DATE_ADD(DATE_ADD(timestamp,INTERVAL 5 HOUR),INTERVAL 30 MINUTE) FROM post ORDER BY timestamp DESC LIMIT 100';
mysqli_query($db, $query) or die('Error querying database.');
?>

?>

<form name="postit" action="post.php" method="post" onsubmit="return ValidCaptcha();">
<input type="textarea" name="humans" id="humans" class="humans" />
<textarea name="content" placeholder="enter a text" style="width:100%; height:150px"></textarea>
<input align="center"type="submit" style="background-color: #4e4e4e;
    border: none; width: 100%;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    cursor: pointer;" value="Submit">
</form>
<?php
$result = mysqli_query($db, $query);
echo "<table>";
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "</tr>\n";
}
echo "</table>";
mysqli_close($db);
?>
</body>
</html>
