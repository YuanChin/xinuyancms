<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;

class CategoryController extends CommonController
{
    public function index(Category $category)
    {
        $data = $category->orderBy('sort', 'ASC')->get();
        $this->assign(['category' => $data]);
        return $this->fetch('admin/category_list');
    }

    public function edit(Category $category)
    {
        $id = $this->request->get('id');
        if ($id) {
            $data = $category->where('id', $id)->first();
            if (!$data) {
                return '檔目不存在!';
            }
        } else {
            $data = ['name' => '', 'sort' => '0'];
        }
        $this->assign([
            'id'   => $id,
            'data' => $data
        ]);
        return $this->fetch('admin/category_edit');
    }

    public function save(Category $category)
    {
        $id = $this->request->post('id');
        $data = [
            'name' => $this->request->post('name', ''),
            'sort' => $this->request->post('sort', '0')
        ];
        if ($id) {
            $category->where('id', $id)->update($data);
            $this->success('修改完成。');
        } else {
            $category->insert($data);
            $this->success('添加完成。');
        }
    }

    public function delete(Category $category)
    {
        $id = $this->request->get('id');
        if ($category->where('id', $id)->delete()) {
            $this->success('刪除完成');
        }
        $this->error('刪除失敗');
    }
}