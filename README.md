# Own-Micro-Framework
Framework to study I make.
> @author: penn  
> @email: penn_z@aliyun.com
# 关于此Demo:
微型php小框架，视图引擎用的是Smarty，目前只有数据库类，待补充...

#### 示例:  
![前台新闻列表](https://github.com/penn-z/Own-Micro-Framework/raw/master/front_newlist.png)
![前台新闻详情](https://github.com/penn-z/Own-Micro-Framework/raw/master/front_newshow.png)
![后台登录](https://github.com/penn-z/Own-Micro-Framework/raw/master/back_login.png)
![后台新闻列表](https://github.com/penn-z/Own-Micro-Framework/raw/master/back_newlist.png)
![后台新闻添加](https://github.com/penn-z/Own-Micro-Framework/raw/master/back_newadd.png)

### 原理说明
基于M(Model)-V(View)-C(Controller)三层模型思路设计

### 下载安装
1.	$ git clone https://github.com/penn-z/Own-Micro-Framework
2.	把mvc.sql导入MySQL数据库
3.	配置项目根文件下的config.php(主要是数据库信息的配置,Smarty可根据实际需要变动)
4.	Linux给予data目录下的cache与template_c目录及子文件777权限，Windows给予读写权限即可

### 使用方法
直接在浏览器上打开项目根目录下的index.php即可浏览前台新闻
默认的后台管理员admin，密码admin

## License
遵守的协议
