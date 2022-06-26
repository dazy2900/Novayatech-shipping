<?PHP
	include'query.php';
	$name = sort_xss($_POST['name']);
	$depature_city = sort_xss($_POST['departure_city']);
	$destination_city = sort_xss($_POST['destination_city']);
	$category = sort_xss($_POST['category']);
	$category2 = sort_xss($_POST['category2']);
	$weight = sort_xss($_POST['weight']);
	$dimension = sort_xss($_POST['dimension']);
	$email = sort_xss($_POST['email']);
	$phonenumber = sort_xss($_POST['phonenumber']);
	$message = sort_xss($_POST['message']);
	
$sql = "INSERT INTO quotes(name,depature_city,destination_city,fixed_category,total_weight,dimension,email,phone,category,message) VALUES('$name','$depature_city','$destination_city','$category','$weight','$dimension','$email','$phonenumber','$category2','$message')";
if($conn-> query($sql) === TRUE){
	echo"<span style='color:green;'> Success: quote submitted. </span>";
	$msg = "Hello $name, We have gotten your quote and we are acting on it currently \n We will get back in touch in less than 24hrs.  \n Visit novaytechinternational.com for further information \n for any issue mail our support team on novaytechinternational@gmail.com or call any of the following numbers +7 911 998 18 94, +234 8062864511, +234 8091845623, +234 7050758955";
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
// send email
mail($email,"Novatech",$msg);


// mail to admin 
$msg = "Hello Admin, You have a quote request from $name  \n Below are the quote details  \n 
Item's Depature : $depature_city\n 
Item's Destination : $destination_city\n 
Weight: $weight\n 
Dimension: $dimension\n 
Phone number: $phonenumber\n 
Response email: $email\n 
Client's message: $msg\n 
Transportation Category:$category\n 
Category 2:$category2
";
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
// send email
mail($email,"Novatech Quote Request ",$msg);


}else{
	echo"<span style='color:red;'> Failure: Something went wrong </span>";
}


function sort_xss($var){
	return $var;
}

?>