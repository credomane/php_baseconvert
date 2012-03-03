<?php

/* Follows the syntax of base_convert (http://www.php.net/base_convert)
 * Created by Michael Renner @ http://www.php.net/base_convert 17-May-2006 03:24
 * His comment is has since been deleted. The function will tell you why.
*/
function unfucked_base_convert($numstring, $frombase, $tobase)
{

    $chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    $tostring = substr($chars, 0, $tobase);

    $length = strlen($numstring);
    $result = '';
    for ($i = 0; $i < $length; $i++)
    {
        $number[$i] = strpos($chars, $numstring{$i});
    }
    do
    {
        $divide = 0;
        $newlen = 0;
        for ($i = 0; $i < $length; $i++)
        {
            $divide = $divide * $frombase + $number[$i];
            if ($divide >= $tobase)
            {
                $number[$newlen++] = (int)($divide / $tobase);
                $divide = $divide % $tobase;
            } elseif ($newlen > 0)
            {
                $number[$newlen++] = 0;
            }
        }
        $length = $newlen;
        $result = $tostring{$divide} . $result;
    } while ($newlen != 0);
    return $result;
}?>