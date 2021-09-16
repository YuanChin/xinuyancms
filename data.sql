# 使用者表
CREATE TABLE `cms_users`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `username` VARCHAR(32) DEFAULT '' NOT NULL UNIQUE COMMENT '使用者名稱',
  `password` CHAR(32) DEFAULT '' NOT NULL COMMENT '密碼',
  `salt` CHAR(32) DEFAULT '' NOT NULL COMMENT '密碼salt'
) DEFAULT CHARSET=utf8mb4;

# 添加管理員紀錄
INSERT INTO `cms_users` VALUES
(1, 'admin', MD5(CONCAT(MD5('123456'), 'salt')), 'salt');

# 欄目表
CREATE TABLE `cms_categories`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(15) NOT NULL COMMENT '名稱',
  `sort` INT NOT NULL DEFAULT 0 COMMENT '排序'
) DEFAULT CHARSET=utf8mb4;

# 添加欄目資料
INSERT INTO `cms_categories` VALUES
(1, '生活', 0),
(2, '資訊', 1),
(3, '編程', 2),
(4, '互聯網', 3),
(5, '科技', 4);

# 文章表
CREATE TABLE `cms_articles`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `cid` INT UNSIGNED DEFAULT 0 NOT NULL COMMENT '欄目ID',
  `title` VARCHAR(80) DEFAULT '' NOT NULL COMMENT '標題',
  `author` VARCHAR(15) DEFAULT '' NOT NULL COMMENT '作者',
  `image` VARCHAR(255) DEFAULT '' NOT NULL COMMENT '封面圖',
  `show` TINYINT DEFAULT 0 NOT NULL COMMENT '是否發布',
  `views` INT UNSIGNED DEFAULT 0 NOT NULL COMMENT '閱讀量',
  `content` TEXT NOT NULL COMMENT '內容',
  `created_at` TIMESTAMP NULL DEFAULT NULL COMMENT '創建時間',
  `updated_at` TIMESTAMP NULL DEFAULT NULL COMMENT '更新時間'
) DEFAULT CHARSET=utf8mb4;

# 添加默認文章
INSERT INTO `cms_articles` VALUES
(1, 1, '這是第一篇文章', 'admin', '', 1, 0, '<p>測試測試1</p>', now()),
(2, 1, '這是第二篇文章', 'admin', '', 1, 0, '<p>測試測試2</p>', now()),
(3, 1, '這是第三篇文章', 'admin', '', 1, 0, '<p>測試測試3</p>', now()),
(4, 1, '這是第四篇文章', 'admin', '', 1, 0, '<p>測試測試4</p>', now()),
(5, 1, '這是第五篇文章', 'admin', '', 1, 0, '<p>測試測試5</p>', now()),
(6, 1, '這是第六篇文章', 'admin', '', 1, 0, '<p>測試測試6</p>', now());
