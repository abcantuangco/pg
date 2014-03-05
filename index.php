<?php
// Form Processor
if ( isset($_POST['submit'] )) 
{
    if ( isset($_POST['intval']) )
    {
        $intval = trim($_POST['intval']);
        if ( $intval > 0 ) {

        } else {
            $mssg = '<p class="error">The value allowed is a positive integer</p>';
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
    <table>
        <tr>
            <td width="50%">Enter a positive integer:</td>
            <td width="50%"><input type="text" name="intval"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Submit"/></td>
        </tr>
    </table>
</form>
</body>
</html>