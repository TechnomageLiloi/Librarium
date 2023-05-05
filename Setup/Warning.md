In this folder files should be protected.

```
AuthType basic
AuthName "liloi"
AuthUserFile [full path to .htpasswd]
Require valid-user
<Files .htpasswd>
   deny from all
</Files>
```