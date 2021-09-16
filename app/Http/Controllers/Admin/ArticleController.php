<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Xinyuan\Page;
use Exception;
use HTMLPurifier;

class ArticleController extends CommonController
{
    public function index(Article $article)
    {
        $page = $this->request->get('page', 1);
        $size = 2;
        $offset = ($page - 1) * $size;
        $data = $article->orderBy('id', 'DESC')
                        ->offset($offset)
                        ->limit(2)
                        ->get(['id', 'title', 'author', 'show', 'views', 'created_at']);
        $total = $article->count();
        $this->assign([
            'article' => $data,
            'page_html' => Page::html('?page=', $total, $page, $size)
        ]);
        return $this->fetch('admin/article_list');
    }

    public function edit(Article $article, Category $category)
    {
        $id = $this->request->get('id');
        if ($id) {
            $articleData = $article->where('id', $id)->first();
        } else {
            $articleData = ['cid' => 0, 'title' => '', 'author' => '', 'show' => 1,
            'content' => '', 'image' => ''];
        }
        $categoryData = $category->orderBy('sort', 'ASC')->get();
        $this->assign([
            'article'  => $articleData,
            'category' => $categoryData,
            'id'       => $id
        ]);
        return $this->fetch('admin/article_edit');
    }

    public function save(Article $article, HTMLPurifier $purifier)
    {
        $id = $this->request->post('id', 0);
        $data = [
            'cid' => $this->request->post('cid', 0),
            'title' => $this->request->post('title', ''),
            'author' => $this->request->post('author', ''),
            'show' => $this->request->post('show', '0'),
            'content' => $this->request->post('content', ''),
        ];
        $data['content'] = $purifier->purify($data['content']);
        if ($this->request->hasFile('image')) {
            $data['image'] = $this->uploadImage();
        }
        if ($id) {
            $article->where('id', $id)->update($data);
            $this->success('修改完成。');
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $article->insert($data);
            $this->success('添加完成。');
        }
    }

    protected function uploadImage()
    {
        try {
            $file = $this->request->file('image');
            $allow_ext = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
            $ext = $file->extension();
            if (!in_array(strtolower($ext), $allow_ext)) {
                $this->error('文件上傳失敗：只允許擴展名：' . implode(', ', $allow_ext));
            }
            $sub = date('Y-m/d');
            $name = $file->move('./uploads/images/' . $sub);
            return $sub . '/' . $name;
        } catch (Exception $e) {
            $this->error('文件上傳失敗：' . $e->getMessage());
        }
    }

    public function delete(Article $article)
    {
        $id = $this->request->get('id');
        $article->where('id', $id)->delete($id);
        $this->success('删除完成。');
    }


}
