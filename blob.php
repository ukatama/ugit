<?php
require(__dir__ . '/git.php');
ini_set('display_errors', 1);
$repo = new Git($_REQUEST['r']);

$oid = $_REQUEST['o'];

$repo->validateObjectID($oid);

$path = htmlspecialchars($_REQUEST['p'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $path ?> - UGit</title>
</head>
<body>
<h1><a href="./">UGit</a></h1>
<h2><a href="tree.php?r=<?php echo $repo->name ?>"><?php echo $repo->name ?></a><?php echo $path ?></h2>
<pre>
<code><?php echo str_replace("\t", '    ', str_replace('<', '&lt;', str_replace('>', '&gt;', $repo->catFile($oid)))) ?></code>
</pre>
</body>
</html>
