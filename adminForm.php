<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Add/Edit child</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
		<h1>Add/Edit Child</h1>

<form action="formprocessing.php" method="POST">
    
    <label>First Name</label>
    <input type="text" name="firstName" />
	<label>Last Name</label>
    <input type="text" name="lastName" /><br />
	
    <label>Address</label> <br />
    <label>Street</label>
    <input type="text" name="street" /><br />
	<label>City</label>
    <input type="text" name="city" />
	<label>State</label>
    <input type="text" name="state" />
	<label>Zipcode</label>
    <input type="text" name="zipcode" />
	<br />
    
	<label> Gender </label>
    <select name="gender">
        <option>Female</option>
        <option>Male</option>
    </select><br />
    
    <label>Age </label> <br />
    <input type="radio" name="age" value="0-2" /> 0 - 2 year  <br />
    <input type="radio" name="age" value="3-4" /> 3 year - 4 year<br />
	<input type="radio" name="age" value="5-6" /> 5 year - 6 year<br />
	<input type="radio" name="age" value="7 " /> 7+ <br />
    
    <label>Primary Contacts</label> <br />
    <input type="text" name="pcontacts[]" />
	<label>Phone</label>
    <input type="text" name="phone" />
	<label>Email</label>
    <input type="text" name="email" /><br />
    <br />
    
    <input type="submit" value="Add" />  <input type="submit" value="Edit" />

</form>
</div>
</body>
</html>