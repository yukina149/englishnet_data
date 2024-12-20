# 高等資料庫期末作業

header是網頁的上面菜單，可以直接改header檔

## 新增資料庫的題目檔案

utf8mb4_0900_ai_ci是地端workbench匯出檔
但因為XAMPP的phpmyadmin比較舊版本不支援**utf8mb4_0900_ai_ci** unicode

```php=ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

//刪掉COLLATE=utf8mb4_0900_ai_ci

```

才能匯入到mariadb

12/20更新-XAMPP的端口可以更改phpadmin跟workbench共存
