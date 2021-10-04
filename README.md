# xinuyancms

> 一個簡單的PHP MVC框架所建的CMS

> 本項目僅著重在框架的開發

## 專案內容

> 依賴注入的實現

> 路由的實現

> composer引入第三方套件，實現擴展性 (Eloquent, Http-Foundation, Smarty)

> 分頁功能

> 驗證碼功能

> 上傳圖片功能


## 內容演示

> 前台頁面

<img src=https://github.com/YuanChin/project_git/blob/master/xinyuancms/1.JPG width=48% />

> 後台頁面

<img src=https://github.com/YuanChin/project_git/blob/master/xinyuancms/2.JPG width=48% /> <img src=https://github.com/YuanChin/project_git/blob/master/xinyuancms/3.JPG width=48% />



## 基礎安裝

#### 環境設置

1). Apache配置
``` shell
<VirtualHost *:80>
    ServerAdmin example@gmail.com
    DocumentRoot "C:\xampp\htdocs\your_project_name\public"
    ServerName www.your_domain_name.test

    <Directory "C:\xampp\htdocs\your_project_name\public">
        #允許訪問
        Require all granted
        #默認首頁
        DirectoryIndex index.php
    </Directory>
</VirtualHost>
```
2).在 Windows 下開啟 Hosts 文件
    
    文件路徑：C:\Windows\System32\Drivers\etc\hosts

3).在此文件下最後一列新增：
    
    192.168.10.10   your_domain_name.test

#### 克隆原碼到本地：

```shell
git clone git@github.com:YuanChin/xinuyancms.git
```

##
