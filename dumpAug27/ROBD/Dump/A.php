<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>

	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<title>Untitled Page</title>
		<script type="text/javascript"><!--
var lastDiv = "";
function showDiv(divName) {
	// hide last div
	if (lastDiv) {
		document.getElementById(lastDiv).className = "hiddenDiv";
	}
	//if value of the box is not nothing and an object with that name exists, then change the class
	if (divName && document.getElementById(divName)) {
		document.getElementById(divName).className = "visibleDiv";
		lastDiv = divName;
	}
}
//-->
</script>
		<style type="text/css" media="screen"><!--
.hiddenDiv {
	display: none;
	}
.visibleDiv {
	display: block;
	border: 1px grey solid;
	}

--></style>
	</head>

	<body bgcolor="#ffffff">
		<form id="FormName" action="blah.php" method="get" name="FormName">
			<select name="selectName" size="1" onchange="showDiv(this.value);">
				<option value="">Choose One...</option>
				<option value="one">first</option>
				<option value="two">second</option>
				<option value="three">third</option>
			</select>
		</form>
		<p id="one" class="hiddenDiv">This is paragraph 1.</p>
		<p id="two" class="hiddenDiv">This is paragraph 2.</p>
		<p id="three" class="hiddenDiv">This is paragraph 3.</p>		
	</body>

</html>
