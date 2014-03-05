<?php
// Function to check the multiple
function checkMultiple($int) 
{
    $ismultipleof3 = $ismultipleof5 = false;
    $result = '';
    if ( $int % 3 === 0 ) {
        $result .= 'Fizz';
        $ismultipleof3 = true;
    } elseif ( $int % 5 === 0 ) {
        $result .= 'Buzz';
        $ismultipleof5 = true;
    } elseif  ($ismultipleof3 && $ismultipleof5) {
        $result .= 'FizzBuzz';
        $ismultipleof3 = $ismultipleof5 = false;
    } else {
        $result .= " ".$int." ";
    }
    return $result;
}

// Form Processor
if ( isset($_POST['submit'] )) 
{
    $intval1 = trim($_POST['intval1']);
    $intval2 = trim($_POST['intval2']);

    if ( $intval1 && $intval2 )
    {
        if ( ($intval1 > 0 ) && ( $intval2 > 0 ) ) {
            if ( $intval2 > $intval1 ) {
                $html = '';
                $ismultipleof3 = $ismultipleof5 = false;
                $pass = 0;
                $c = 1;
                for( $n = $intval1; $n <= $intval2; $n++ ) {
                    if ( $n % 3 === 0 ) {
                        $ismultipleof3 = true;
                    }
                    if ( $n % 5 === 0 ) {
                        $ismultipleof5 = true;
                    }
                    if  ($ismultipleof3 && $ismultipleof5) {
                        $html .= ' FizzBuzz ';
                        $pass++;
                    } elseif ($ismultipleof3 && !$ismultipleof5) {
                        $html.= ' Fizz ';
                        $pass++;
                    } elseif (!$ismultipleof3 && $ismultipleof5) { 
                        $html .= ' Buzz ';
                        $pass++;
                    } else {
                        if ($pass >= 2) {
                            $html .= ' Bazz ';
                        } else {
                            $html .= " ".$pass."-".$n." ";
                        }
                    }
                    $c++;
                    $ismultipleof3 = $ismultipleof5 = false;
                    if ( $c % 2 === 0 ) {
                        $pass = 0;
                    }
                }
                // show result
                echo "<p><strong>Result for the range[".$intval1."...".$intval2."]</strong>:</p>";
                echo "<p>".$html."</p>";
            } else {
                $mssg = '<p class="error">The last integer in the range should be higher than the first value.</p>';
            }
        } else {
            $mssg = '<p class="error">The value allowed are only a positive integer.</p>';
        }
    } else {
        $mssg = '<p class="error">Please enter a positive integer range.</p>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Answer 1.1</title>
    <link rel="stylesheet" href="">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php 
    echo $mssg;
?>
<form action="<?php echo $PHP_SELF;?>" method="POST">
    <table width="100%">
        <tr>
            <td width="20%">Enter a positive integer range:</td>
            <td width="90%">From <input type="text" name="intval1" value="<?php echo $_POST['intval1'] ?>"/> To <input type="text" name="intval2" value="<?php echo $_POST['intval2'] ?>"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Submit"/></td>
        </tr>
    </table>
</form>
</body>
</html>