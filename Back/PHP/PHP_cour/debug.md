# 0.5 - Install xampp 
Etape optionnel, on peut debug via la console ou un serveur dédié)
# 1 - Download and install Xdebug using the wizard 
https://xdebug.org/wizard
Suivre les instructions

# 2 - Install  'PHP' extension in VSCode
https://www.devsense.com/en/download?downloadLatest=1&ver=vscode#vscode

# 3 - Enter the PHP.exe path in the settings.json of visual studio

```json
{
	"php.executablePath": "C:\\xampp\\php\\php.exe",
    "php.validate.executablePath": "C:\\xampp\\php\\php.exe"
}
```
# 4 - Enter setting in php.ini
```ini
[PHP]

;zend_extension=xdebug

; Xdebug3
zend_extension = "C:\php\ext\php_xdebug.dll"
xdebug.mode = debug
xdebug.client_host = 127.0.0.1
xdebug.client_port = 9003
xdebug.start_with_request = yes

```

# Usage
Dans VSCode appuyer sur F5, utiliser **Listen for XDebug** et lancer son application php avec le terminal.

# Links
- https://docs.devsense.com/en/vscode/debug