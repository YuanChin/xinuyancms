<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Xinyuan\Controller;
use Xinyuan\Page;

class IndexController extends Controller
{
    public function index(Category $category, Article $article)
    {
        $id = (int)$this->request->get('id', 0);
        $page = (int)$this->request->get('page', 1);
        $size = 2;
        $offset = ($page - 1) * $size;
        $where = [];
        if ($id) {
            // 篩選欄目
            $where['cid'] = $id;
            $category_name = $category->where('id', $id)->value('name');
            $this->assign(['category_name' => $category_name]);
        }
        $where['show'] = 1;
        // 查詢文章列表
        $data = $article->where($where)
                        ->orderBy('id', 'DESC')
                        ->offset($offset)
                        ->limit(2)
                        ->get(['id', 'title', 'author', 'image', 'created_at']);
        // 分頁
        $total = $article->where($where)->count();
        $url = "?id=$id&page=";
        $this->assign([
            'article'   => $data,
            'id'        => $id,
            'page_html' => Page::html($url, $total, $page, $size)
        ]);
        // 公共模塊
        $this->category($category);
        $this->sidebar($article);
        $this->title($id ? $category_name : '首頁');
        return $this->fetch('index');
    }

    public function show(Category $category, Article $article)
    {
        $id = $this->request->get('id');
        $data = $article->where('id', $id)->where('show', 1)->first();
        if ($data) {
            $category_name = $category->where('id', $data['cid'])->value('name');
            $this->assign(['category_name' => $category_name]);
            $article->where('id', $id)->where('show', 1)->increment('views');
            $data['views'] += 1;
        }
        $prev = $article->where('id', '<', $id)->where('show', 1)->orderBy('id', 'DESC')->first(['id', 'title']);
        $next = $article->where('id', '>', $id)->where('show', 1)->orderBy('id', 'ASC')->first(['id', 'title']);
        $this->assign([
            'article' => $data,
            'article_prev' => $prev,
            'article_next' => $next,
            'id' => isset($data['cid']) ? $data['cid'] : 0
        ]);
        // 公共模塊
        $this->category($category);
        $this->sidebar($article);
        $this->title($data ? $data['title'] : '');
        return $this->fetch('show');
    }

    protected function category(Category $category)
    {
        $data = $category->orderBy('id', 'ASC')->get();
        $this->assign(['category' => $data]);
    }

    protected function sidebar(Article $article)
    {
        // 最新文章
        $data = $article->where('show', 1)->orderBy('id', 'desc')->limit(5)->get(['id', 'title']);
        $this->assign(['article_new' => $data]);
        // 最热文章
        $data = $article->where('show', 1)->orderBy('views', 'DESC')->limit(4)->get(['id', 'title']);
        $this->assign(['article_hot' => $data]);
    }

    protected function title($title = '')
    {
        $this->assign(['title' => $title]);
    }
}
