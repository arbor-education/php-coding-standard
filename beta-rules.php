<?php

return [
    '@PSR2' => true,

    // PHPDOC
    'no_empty_phpdoc' => true,
    'no_superfluous_phpdoc_tags' => true,

    // CASTING
    // A single space should be between cast and variable.
    'cast_spaces' => ['space' => 'single'],
    // @PSR12, cast should be written in lower case.
    'lowercase_cast' => true,
    //Short cast bool using double exclamation mark should not be used.
    'no_short_bool_cast' => true,
    // Variables must be set null instead of using (unset) casting.
    'no_unset_cast' => true,
    // @PSR12, cast (boolean), (integer), (double), (real) and (binary) as (bool), (int), (float) and (string).
    'short_scalar_cast' => true,

    // ARRAYS
    // PHP arrays should be declared using the short syntax $arr = [].
    'array_syntax' => ['syntax' => 'short'],
    // Operator => should not be surrounded by multi-line whitespaces.
    'no_multiline_whitespace_around_double_arrow' => true,
    // In array declaration, there MUST NOT be a whitespace before each comma.
    'no_whitespace_before_comma_in_array' => true,
    // In array declaration, there MUST be exactly one whitespace after each comma.
    'whitespace_after_comma_in_array' => true,
    // Array index should always be written by using square braces.
    'normalize_index_brace' => true,
    // Arrays should be formatted like function/method arguments, without leading or trailing single line space.
    'trim_array_spaces' => true,

    // GENERAL FORMATTING
    'object_operator_without_whitespace' => true,
    'no_whitespace_in_blank_line' => true,
    'standardize_not_equals' => true,
    'no_extra_blank_lines' => ['tokens' => ['extra']],
];
