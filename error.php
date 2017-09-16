
<?php include_once "template/header.php"; ?>

<div class="col-sm-8">
	<div id= "centernav">
	<?php 
        function dumpInFile($msg){
            if($msg == "Please Choose A Option First") return; 
            $fh = fopen('error.msg', 'a');
            fwrite($fh, $msg."\n");
            fclose($fh);
        }
        

        if(isset($_SESSION["error"])) { 
            echo "<h1> <font color='red'>". $_SESSION["error"] ."</font></h1>";
            dumpInFile($_SESSION["error"]);
            unset($_SESSION["error"]);
    	}
        else if(isset($_GET["error"])){
            echo "<h1> <font color='red'>". $_GET["error"] ."</font></h1>";
            dumpInFile($_GET["error"]);
        }
        else if($errorCode){
            
            echo "<h1> <font color='red'>". $errorCode ."</font></h1>";
            dumpInFile($errorCode);
        }
        else { 
            echo "<h1> <font color='green'> No Error Specified </font></h1>";
            dumpInFile("No Error Specified");
        } 
        echo "<br/>";

	    include_once "template/uploadTemplate.php";
     ?>
	</div>
</div>

<?php include_once "template/footer.php"; ?>
