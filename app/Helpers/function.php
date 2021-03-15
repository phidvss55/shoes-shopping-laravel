<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

if ( ! function_exists('get_data_user')) {
    function get_data_user($guest, $column = 'id')
    {
        return Auth::guard($guest)->user() ? Auth::guard()->user()->$column : null;
    }
}

if ( ! function_exists('pare_url_file')) {
    function pare_url_file($image, $folder = '')
    {
        if (!$image) {
            return '/img/no_image.jpg';
        }
        $explode = explode('__', $image);
        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            $path =  '/uploads' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
            return $path;
        }
    }
}

if ( ! function_exists('upload_image')) {
    function upload_image($file, $folder = '', array $extend = [])
    {
        $code     = 1;
        $baseFile = public_path() . '/uploads/' . $_FILES[$file]['name'];
        $info     = new SplFileInfo($baseFile);
        $ext      = strtolower($info->getExtension());
        if ( ! $extend) {
            $extend = ['jpg', 'png', 'jpeg', 'webp'];
        }
        if ( ! in_array($ext, $extend)) {
            return $data['code'] = 0;
        }
        $nameFile = trim(str_replace('.' . $ext, '', strtolower($info->getFilename())));
        $filename = date('Y-m-d__') . Str::slug($nameFile) . '.' . $ext;

        $path = public_path() . '/uploads/' . date('Y/m/d/');
        if ($folder) {
            $path = public_path() . '/uploads/' . $folder . '/' . date('Y/m/d/');
        }
        if ( ! \File::exists($path)) {
            mkdir($path, 0777, true);
        }

        move_uploaded_file($_FILES[$file]['tmp_name'], $path . $filename);
        $data = [
            'name'     => $filename,
            'code'     => $code,
            'path'     => $path,
            'path_img' => 'uploads/' . $filename,
        ];

        return $data;
    }
}

/**
 * @param $requestDatas
 * @param $field_name
 * @return mixed
 */
if (!function_exists('call_upload_image')) {
    function call_upload_image($requestDatas, $field_name) {
        if (isset($requestDatas[$field_name])) {
            $image = upload_image($field_name);
            if (isset($image['code']))
            {
                $requestDatas[$field_name] = $image['name'];
            }
        }
        return $requestDatas;
    }
}
