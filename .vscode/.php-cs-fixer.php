<?php

return (new PhpCsFixer\Config())
    ->setRules([
        'binary_operator_spaces' => [
            'operators' => [
                // '=>' => 'align',
                '=' => 'align'
                
            ]
        ],
    ])
    // ->setIndent("\t")
    ->setLineEnding("\n")
;
?>