# api<br>
简单的PHP api接口开发<br>

常用方向：<br>
	1.日常手机APP<br>
	2.手机WEB端<br>
	3.第三方提供数据<br>
	
本着方便开发，所以就试着写了这样一套，很简单功能会慢慢的完善，请大家关注更新日志。<br>

更新日志：<br><br>

v1.0 <br>
	使用时，请修改.htaccess RewriteBase /haoapi/ 对应的路径 如果是根目录，直接写 /<br><br>
	
v1.1<br>
	更新自动引入c层 m层 e层文件<br>
	c层Base基类添加获取用户真实IP方法<br>
	e层添加	CURL操作类、随机字符串操作类<br>
	
v1.2<br>
	更新BaseController 添加获取Aes加密串的值的方法<br>
	修改Aes加密方法<br>
	添加ImgStreamExt图片流上传<br>
	添加TestController 提供两个方法 <br>
	&nbsp;&nbsp;&nbsp;&nbsp;createAes 创建Aes加密url访问 <br>
	&nbsp;&nbsp;&nbsp;&nbsp;testAes 解析Aes加密串<br>
	Aes加密请求方式 http://xxx.com/配置的访问名称/要访问的具体方法/encryp/加密串<br>
	&nbsp;&nbsp;&nbsp;&nbsp;encryp 可修改 但必须保持生成与请求是一样的结构<br>
	&nbsp;&nbsp;&nbsp;&nbsp;加密串，见createAes方法<br>
	
<br><br>
Author：Mr.Hao <br>
Email: 409328820@qq.com<br>
