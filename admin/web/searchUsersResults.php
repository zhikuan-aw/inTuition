<center>
<table border='2' width='40%%'>
<th>
<h3>
Manage Users
<i class='fas fa-hamburger' style='font-size:20px'></i>
</h3>
</th>
<tr><td>
<a href="welcome.php"><b><font color='green'> << BACK HOME <<</font> </b></a>
<br>
</td></tr>
</table>
</center>


<br><br><br>


<table border='1' align='center'>
  <tr>
    <th>index</th>
    <th>username</th>
    <th>name</th>	
    <th>email</th>
    <th>last seen @</th>
    <th>email</th>
	
    <th>avatar</th>
    <th>Registered ON</th>
    <th>acc status</th>
    <th>acc type</th>
    <th>Action</th>
	
  </tr>
  
  
  <?php 
  
  
  include('session.php');
  
  $search = $_POST['search'];
  
  $query = "SELECT * FROM account WHERE username ILIKE '%$search%' OR email ILIKE '%$search%';" ;
  
  if ($search=='*' || $search==null || $search==''){
	  $query = "SELECT *  FROM account;";
  }


$result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_row($result)) {
  echo"<tr>";
  $user = $row[0];
  
    echo"<td>";
  echo $user;
    echo"</td>";
	
    echo"<td>";
  echo "$row[1]";
    echo"</td>";

	
	
	echo"<td>";
  echo "$row[3]";
    echo"</td>";
		
	echo"<td>";
  echo "$row[4]";
    echo"</td>";
	
	echo"<td>";
  echo "$row[5]";
    echo"</td>";
	
	echo"<td>";
  echo "$row[6]";
    echo"</td>";
	
	echo"<td>";
  echo "<img src='../../profilepics/$row[7]' height='30px' width='30px'> <br/> $row[7]";
    echo"</td>";

	
	echo"<td>";
  echo "$row[9]";
    echo"</td>";
	
	echo"<td>";
  echo "$row[10]";
    echo"</td>";
	
	echo"<td>";
  echo "$row[11]";
    echo"</td>";
	
	
	
	echo"<td>";
  echo "<a href='modUser.php?user=$user'> EDIT USER</a>";
    echo"</td>";
	
	
  echo"</tr>";
}
  ?>
  
  
 
</table>