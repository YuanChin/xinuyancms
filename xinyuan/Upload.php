<?php

namespace Xinyuan;

use Exception;

class Upload
{
    protected $msg = [
        UPLOAD_ERR_INI_SIZE => '文件大小超過伺服器設置的限制！',
        UPLOAD_ERR_FORM_SIZE => '文件大小超過表單設置的限制！',
        UPLOAD_ERR_PARTIAL => '文件只有部分被上傳！',
        UPLOAD_ERR_NO_FILE => '沒有文件被上傳！',
        UPLOAD_ERR_NO_TMP_DIR => '上傳文件臨時目錄不存在！',
        UPLOAD_ERR_CANT_WRITE => '文件寫入失敗！'
    ];

    protected $file = ['name' => '', 'tmp_name' => '', 'type' => '', 'size' => 0, 'error' => 4];

    public function __construct(array $file = [])
    {
        if (!isset($file['error'])) {
            throw new Exception('文件不合法！');
        }
        $error = $file['error'];
        if ($error !== UPLOAD_ERR_OK) {
            $msg = isset($this->msg[$error]) ? $this->msg[$error] : '未知錯誤！';
            throw new Exception($msg);
        }
        $this->file = array_merge($this->file, $file);
    }

    public static function create(array $file = [])
    {
        return new static($file);
    }

    public function extension()
    {
        return pathinfo($this->file['name'], PATHINFO_EXTENSION);
    }

    public function move($path = '.', $name = '')
    {
        $path = rtrim($path, '/') . '/';
        if (!is_dir($path) && !mkdir($path, 0777, true)) {
            throw new Exception('無法創建保存目錄！');
        }
        if ($name === '') {
            $name = md5(microtime(true)) . '.' . $this->extension();
        }
        if (!move_uploaded_file($this->file['tmp_name'], $path . $name)) {
            throw new Exception('無法保存文件！');
        }
        return $name;
    }
}