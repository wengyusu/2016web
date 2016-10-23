<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.bootcss.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" rel="stylesheet">

<body>
<div class="container" style="margin-top:300px;width:600px;">
<form role="form" class="form-inline">
  <div class="form-group">
    <label for="exampleInputName2">key:</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-default">GO</button>
</form>
</div>
<script>
/**
 * Pseudo md5 hash function
 * @param {string} string
 * @param {string} method The function method, can be 'ENCRYPT' or 'DECRYPT'
 * @return {string}
 */
function w2ndalgorithm(string, method) {
  // Default method is encryption
  if (!('ENCRYPT' == method || 'DECRYPT' == method)) {
    method = 'ENCRYPT';
  }
  // Run algorithm with the right method
  if ('ENCRYPT' == method) {
    // Variable for output string
    var output = '';
    // Algorithm to encrypt
    for (var x = 0, y = string.length, charCode, hexCode; x < y; ++x) {
      charCode = string.charCodeAt(x);
      if (128 > charCode) {
        charCode += 128;
      } else if (127 < charCode) {
        charCode -= 128;
      }
      charCode = 255 - charCode;
      hexCode = charCode.toString(16);
      if (2 > hexCode.length) {
        hexCode = '0' + hexCode;
      }
      
      output += hexCode;
    }
    // Return output
    return output;
  } else if ('DECRYPT' == method) {
    output='';
    // DECODE MISS
    // Return ASCII value of character
    return string;
  }
}

document.getElementById('password').value = w2ndalgorithm('3c312c2c04194e0d0c0b200c0b4c0f204f1920150c02', 'DECRYPT');
</script>
</body> 
</html>