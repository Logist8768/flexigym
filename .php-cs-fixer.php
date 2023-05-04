<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/app')
    ->in(__DIR__ . '/Modules')
    ->in(__DIR__ . '/config')
    ->in(__DIR__ . '/public')
    ->in(__DIR__ . '/lang')
    ->in(__DIR__ . '/resources/views')
    ->in(__DIR__ . '/routes')
    ->in(__DIR__ . '/.github');

$config = new \PhpCsFixer\Config();

return $config
    ->setRules([
        '@PSR2'                                  => true,
        '@PSR12'                                 => true,
        '@PhpCsFixer'                            => true,
        '@PHP80Migration'                        => true,
        'yoda_style'                             => false,
        'phpdoc_align'                           => ['align' => 'left'],
        'phpdoc_to_comment'                      => false,
        'php_unit_method_casing'                 => ['case' => 'snake_case'],
        'not_operator_with_space'                => true,
        'trailing_comma_in_multiline'            => true,
        'blank_line_after_namespace'             => true,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'binary_operator_spaces'                 => ['default' => 'align'],
        'concat_space'                           => ['spacing' => 'one'],
    ])
    ->setFinder($finder);
