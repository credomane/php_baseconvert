baseconvert
===========

### Description
Converts any string of any base to any other base without PHP native method base_convert's double and float limitations.

### Instructions
Include the baseconvert.php in your script then call baseconvert() with the same parameters as PHP's base_convert.

### License
Do whatever you want with it. Credit Michael Renner and I if you want or don't.

### About
baseconvert returns false when
  $Value is invalid for the $FromBase
  62 < $FromBase < 2  That means $FromBase is less 2 or greater than 62 for math geniuses.
  62 <  $ToBase  < 2  That means  $ToBase  is less 2 or greater than 62 for math geniuses.

Michael Renner's unfucked_base_convert doesn't do any checking at all and will always convert.

PHP's base_convert removes digits from $Value that aren't in $FromBase then continues as if nothing is wrong.


base_convert is obviously the fastest because it is a native method.
unfucked_base_convert is much much slower but doesn't suffer from base_convert's double and float limitations.
baseconvert is a little slower than unfucked_base_convert because of the parameter validation but the difference in neligible when compared to the native method.



