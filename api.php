<?php
$main = "T678HSOK-MNBVFDEW-234RFDS-WFMJEIW";
$domain_url = 'https://www.very-s.us/'; 
$lengthofstring = 5;
function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));

    $key = '';
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

if(isset($_POST['apikey']))
{
    if($_POST['apikey'] == $main)
    {
        $filename = RandomString($lengthofstring);
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $filename.'.'.$fileType))
        {
            echo $domain_url.$filename;
        }
            else
        {
           echo 'The folder doesn\'t exist..';
        }
    }
    else
    {
        echo 'Invalid Api Key';
    }
}
else
{
    echo 'No image received';
}
?>
