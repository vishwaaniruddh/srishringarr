<?


   include("header.php"); 
   include("$absolutepath/$dbfile");
   include("functions.php");

?>

<?
    // FILE DOCUMENTATION
    // Filename    : searchemployee.php
    // Description : This file asks user to put in a keyword for employee name
    //               and it searches employee table for all employees matching
    //               that keyword
    //   
    // License : GPL
    // Date    : 11/04/2001
    // Related Files : resultssearch.php
    
?>


<h3>Student Power Search</h3>

<form name="form1" method="post" action="resultsearchstu.php">

  <p>Please put the name or email or ssn or part of either of the student you want to search for in the textbox below and the program will  search the database
   for all entries matching your entry.</p>
  <p>Student Name (Keyword) : 
    <input type="text" name="keyword">
  </p>
  <p>
 
    <input type="submit" name="Submit" value="Search Student Database">
  </p>
</form>


<? include("footer.php"); ?>