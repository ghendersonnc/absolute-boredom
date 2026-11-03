<?php
/**
 * @var array $request
 */

$ffi = FFI::cdef('
    int addNumbers(int x, int b);
', __DIR__ . "/../../lib/hello.so");

?>

<div id="homepage">
    <h1>Hello World</h1>
    <p>
        <?= $ffi->addNumbers(1, 2) ?>
    </p>
    <p>
        <?php
        var_dump($request);
        ?>
    </p>
</div>