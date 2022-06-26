<?PHP
$conn = new mysqli("127.0.0.1","root","", "novatech");
if($conn->connect_error){
die("connection failed: ". $conn->connect_error);	
}
?>