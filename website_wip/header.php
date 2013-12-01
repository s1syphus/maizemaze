
<header>
<!-- for reference
<p
<?php
$pageName = basename($_SERVER['REQUEST_URI'], '.php');
if ($pageName == "page3")
   echo "class=\"current\"";
?>

></p>
-->

<?php
$pageName = basename($_SERVER['REQUEST_URI'], '.php');
//if ($pageName != "index"){
   echo "<a href=\"index.php\"> <img src=\"images/maizeMazeLogoB.jpg\" /></a>";
   echo "<nav>";
   echo "<a href=\"/website_wip/index.php\">Home</a>";
   echo "<a href=\"/website_wip/enterQuestions.php\">Add Questions</a>";
   echo "<a href=\"/website_wip/examineQuestions.php\">Examine Questions</a>";
   echo "<a href=\"/website_wip/editDB.php\">Edit Question</a>";
   echo "<a href=\"/website_wip/prettyAnalytics.php\">Analytics</a>";
   echo "</nav>";
//}

?>

</header>
