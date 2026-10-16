<?php

function rankora_get_global_data(string $file): array
{
    $path = get_template_directory() . '/data/global/' . $file . '.php';

    if (! file_exists($path)) {
        return [];
    }

    $data = require $path;

    return is_array($data) ? $data : [];
}
