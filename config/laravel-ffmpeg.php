<?php

return [
    'default_disk' => 'local',
    'ffmpeg' => [
        'binaries' => env('FFMPEG_BINARIES', 'C:\xampp\htdocs\transcribe_app\vendor\php-ffmpeg\php-ffmpeg\src\FFMpeg'),
        'threads'  => 12,
    ],

    'ffprobe' => [
        'binaries' => env('FFPROBE_BINARIES', 'C:\xampp\htdocs\transcribe_app\vendor\php-ffmpeg\php-ffmpeg\src\FFMpeg\ffprobe'),
    ],

    'timeout' => 3600,

    'enable_logging' => true,

    'set_command_and_error_output_on_exception' => false,

    'temporary_files_root' => env('FFMPEG_TEMPORARY_FILES_ROOT', sys_get_temp_dir()),
];
