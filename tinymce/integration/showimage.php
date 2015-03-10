<?php

// ${license.statement}

require_once 'pluginbuilder.php';
$PARAMS = array_merge($_GET, $_POST);
$digest = isset($PARAMS['formula'])?$PARAMS['formula']:null;
$mml = isset($PARAMS['mml'])?$PARAMS['mml']:null;
$render = $pluginBuilder->newRender();
// Backwards compatibility
// showimage.php?formula.png --> showimage.php?formula
// because formula is md5 string, remove all extensions.
$extpos = strrpos($digest, "ini");
if ($extpos) {
	$digest=substr($digest, 0, $extpos-1);
}

$r = $render->showImage($digest, $mml, $PARAMS);
header('Content-Type: image/png');
echo $r;