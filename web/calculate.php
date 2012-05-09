<?php

    class Test {

        var $score = 0;
        var $test;
        var $answers = array(
            'Q1' => 'C',
            'Q2' => 'D',
            'Q3' => 'A',
            'Q4' => 'A',
            'Q5' => 'D',
        );

        function __construct($test) {
            unset($test['submit']);
            $this->test = $test;
            $this->markTest($this->test);
        }

        function markTest($test) {
            foreach ($test as $question => $answer) {
                if ($this->answers[$question] === $answer) {
                    $this->score++;
                }
            }
            return $this->score;
        }

    }
    if(isset($_POST)) {
        $score = new Test($_POST);
        echo "Score: ".$score->score;       
    }
?>

<html>
<head>
	<title>Toets</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
	<p>PHP stand for ?</p>

	A <input type="radio" name="Q1" value="A">Programming Higher Projects</input><br>
	B <input type="radio" name="Q1" value="B">Hypertext Preprocessor</input><br>
	C <input type="radio" name="Q1" value="C">Program Hyper Processor</input><br>
	D <input type="radio" name="Q1" value="D">Non of the above</input><br>

	<p>Which Server does PHP run on ?</p>

	A <input type="radio" name="Q2" value="A">Proxy</input><br>
	B <input type="radio" name="Q2" value="B">FTP SERVER</input><br>
	C <input type="radio" name="Q2" value="C">WINDOWS 2003 SERVER</input><br>
	D <input type="radio" name="Q2" value="D">APACHE</input><br>

	<input type=submit name='submit' value='submit'/>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>


     $('input[type="radio"]').live('click',function() {  
            $.ajax({
                url: '/calculate.php',
                type: 'POST',
                data: 'answer='+$(this).val(),
                success: function(){
                    alert($(this).val());
                }
            });
     });

</script>

</body>
</html>