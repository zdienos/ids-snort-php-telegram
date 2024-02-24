### simple sys_exec source, to create lib mysqludf

compile with
```
gcc -Wall -I include -I /usr/include/mariadb -shared -fPIC -o sys_exec.so sys_exec.c
```
