<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<link href="form.css"rel="stylesheet">
	</head>
	<body>
		<img src="Logo.jpg" alt="Your Logo">
		<h1>Questionnare</h1>
	</body>
	<form>
        <section>
                <h3>Review the following documents</h3>
                        <p>Please view or download <b>Test File 1</b></p>
                                <input type="button" onclick="window.open('./Test Files/TestFile1.pdf','_blank')"; value="View in Browser" style="height:25px; width:125px; border-left: 1px; padding: 0 0 0 5px;" /></input>
                                <button><a href="./Test Files/TestFile1.pdf" download>Download File</a></button>
                        <p>Please view or download <b>Test File 2</b></p>
                                <input type="button" onclick="window.open('./Test Files/TestFile2.pdf','_blank')"; value="View in Browser" style="height:25px; width:125px; boder-center: 1px; padding: 0 0 0 5px;" /></input>
				<button><a href="./Test Files/TestFile2.pdf" download>Download File</a></button>
        </section>
        </form> 
	<form method="post">
		<section>
			<h2>Please enter your Pin Code here.</h2>
				<p>
					<label for="PinID">
						<span>Pin code </span>
					</label>
					<input type="Text" name="id">
				</p>
		</section>
		</Section>
			<h2>Vote on the Following.</h2>
			<p>
				<label for="Option1">
					<span>1) Option 1</span>
				</label>
				<select id="Option1" name="opt1">
					<option value="yes">Yes</option>
					<option value="no">No</option>
				</select>
			</p>
			<p>
				<label for="Option2">
					<span>2) Option 2</span>
				</label>
				<select id="Option2" name="opt2">
					<option value="yes">Yes</option>
					<option value="no">No</option>
				</select>
			</p>
			<p>
				<label for="Option3">
					<span>3) Option 3</span>
				</label>
				<select id="Option3" name="opt3">
					<option value="yes">Yes</option>
					<option value="no">No</option>
				</select>
			</p>
			<p>
				<label for="Option4">
					<span>4) Option 4</span>
				</label>
				<select id="Option4" name="opt4">
					<option value="yes">Yes</option>
					<option value="no">No</option>
				</select>
			</p>
		</section>
		<section>
			<p>
				<label for="q1">
					<span>Question 1</span>
				</label>
				<select id="q1" name="question1">
					<option value="yes">Yes</option>
					<option value="no">No</option>
					<option value="abstain">Abstain</option>
				</select>
			</p>
			<p>
				<label for="q2">
					<span>Question 2</span>
				</label>
				<select id="q2" name="question2">
					<option value="yes">Yes</option>
					<option value="no">No</option>
					<option value="abstain">Abstain</option>
				</select>
			</p>
			</section>
			<section>
				<p>
					<button type="submit" onclick="redirect()">Click to submit</button>
				</p>
			</section>

</form>

<?php

$path = 'Results.txt';
//Set a pin code range
$acList = range(1000, 8999);
$ac = $_POST['id'];
$check = 1;


switch ($check){

case (($check == 1) && (!isset($ac))):
	echo " ";
	break;

case (!in_array($ac,$acList) && ($check == 1)):
	echo "<script>";
	echo "confirm('Not a valid Pin code, please re-enter.')";
	echo "</script>";
	break;

	//case (in_array($ac,$acList)) && ($check == 1):
default:
	if (isset($_POST['id']) && isset($_POST['opt1']) && isset($_POST['opt2']) && isset($_POST['opt3']) && isset($_POST['opt4']) && isset($_POST['question1']) && isset($_POST['question2']))
        {
        	$fh=fopen($path,"a+");
	        $string ="Pin code: " . $_POST['id'] . "\n\nOptions:\n1) Option 1: " . $_POST['opt1'] . "\n2) Option 2: " . $_POST['opt2'] . "\n3) Option 3: " . $_POST['opt3'] . "\n4) Option 4: " . $_POST['opt4'] . "\n\nQuestions\n1) Question 1: " . $_POST['question1'] . "\n2) Question 2: " . $_POST['question2'] . "\n------------------------------------------------------\n";
                fwrite($fh,$string);
		fclose($fh);
		echo "<script>";
		echo "setTimeout(function(){";
		echo "alert('Submitted! Redirecting to Website ..'),";
		echo "window.location.replace('https://www.YourDomain.com');";
		echo "}, 500);";
		echo "</script>";
	}
}
?>

</html>
