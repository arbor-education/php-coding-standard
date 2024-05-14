<?php

return [
    '@PSR2' => true,

    // ARRAYS
    // PHP arrays should be declared using the short syntax $arr = [].
    'array_syntax' => ['syntax' => 'short'],
    // Operator => should not be surrounded by multi-line whitespaces.
    'no_multiline_whitespace_around_double_arrow' => true,

    // GENERAL FORMATTING
    'object_operator_without_whitespace' => true,
    'no_whitespace_in_blank_line' => true,
    'standardize_not_equals' => true,
    'no_extra_blank_lines' => ['tokens' => ['extra']],
];
