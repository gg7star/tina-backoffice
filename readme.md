Tina Back Office

Done:
1. http->https
2. Update UIs

Not Done:
Q/A part

How to run? (I am not familiar with linux or mac. so I will expain for xampp of windows version)
1. Make new folder("back office")
2. Copy/Past this source code to "back office" folder
3. Move the folder to C:/xampp/htdocs
4. Config httpd.conf of apache server like:
DocumentRoot "C:/xampp/htdocs" -> DocumentRoot "C:/xampp/htdocs/back office/public"
<Directory "C:/xampp/htdocs"> -> <Directory "C:/xampp/htdocs/back office/public">
5. Run apache
6. visit: https://localhost
