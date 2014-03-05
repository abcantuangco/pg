<?php
// Form Processor
if ( isset($_POST['submit'] )) 
{
    $intval1 = trim($_POST['intval1']);
    $intval2 = trim($_POST['intval2']);

    if ( $intval1 && $intval2 )
    {
        
        if ( $intval > 0 ) {

        } else {
            $mssg = '<p class="error">The value allowed is a positive integer.</p>';
        }
    } else {
        $mssg = '<p class="error">Please enter a positive integer</p>';
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