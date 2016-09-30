thinkphp5 功能测试
thinkphp5 nginx简单配置
server {
        listen       80;
        server_name  tp5.dev;
        root   "D:/xampp/htdocs/thinkphp5.0.1/public";
		index  index.html index.htm index.php;
        location / {
            #try_files $uri $uri/ /index.php?_url=$uri&$args;
	    	#try_files $uri $uri/ /index.php?$query_string;
	    	rewrite ^(.*)$ /index.php?s=/$1 last;
            #autoindex  on;          
        }
        location ~ \.php(.*)$ {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  /index.php;
	    	fastcgi_split_path_info  ^(.+\.php)(/.+)$;
	    	#fastcgi_split_path_info  ^(.+\.php)(.*)$;
            fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
            fastcgi_param  PATH_INFO  $fastcgi_path_info;
            fastcgi_param  PATH_TRANSLATED  $document_root$fastcgi_path_info;
            include        fastcgi_params;
        }
}