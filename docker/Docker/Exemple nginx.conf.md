
```conf
1. server { listen 80; server_name localhost; location / { root /usr/share/nginx/html; index index.html; } location /css/ { alias /usr/share/nginx/html/style.css; } location /js/ { alias /usr/share/nginx/html/script.js; } }
    
2. _[_11:44_]_
    
    docker build -t devise-nginx .
    
3. _[_11:45_]_
    
    docker run -d -p 8080:80 devise-nginx
    

Envoyer un message dans #docker
```