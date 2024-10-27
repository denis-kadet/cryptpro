## Подключение к БД

```sql
Host = cryp.local
Port = 5478
Database = Laravel
Username = root
Password = root
```
## Прописать в hosts
```
/etc/hosts
C:\Windows\System32\drivers\etc\hosts
```
```
0.0.0.0     cryp.local
```

## Добавить в .env
```
NGINX_PORT=80
NETWORK_CRYP_SUBNET=172.50.0.0/16
RPGU_DOCS_HOST=cryp.local

DB_CONNECTION=pgsql
DB_HOST=db-cryp
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```

## КриптоПро для подписание второй подписью


- ```docker exec  -u root -it php-fpm-rpgu-docs bash``` - заходим в контейнер

- ```/opt/cprocsp/bin/amd64/cryptcp -creatcert -dn "CN=test" -cont '\\\\.\\HDIMAGE\\testcont'``` - устанавливаем сертификат в хранилище uMy (работа будет вестись с хранилищем пользователя, CURRENT_USER_STORE=2) пароль заносим в .env в CRYPTO_PRO_KEY_PIN

- ```/opt/cprocsp/bin/amd64/cryptcp -creatcer -dn "CN=test" -cont '\\.\HDIMAGE\testcont' -dm``` - устанавливаем сертификат в хранилище mMy (работа будет вестись с хранилищем компьютера, LOCAL_MACHINE_STORE=1)

- ```/opt/cprocsp/bin/amd64/certmgr -list -store mMy``` - проверяем сертификат

- ```/opt/cprocsp/bin/amd64/csptest -absorb -certs -autoprov``` - проверяем сертификат

**Внимание!** При обновления докера может слететь сертификат. Надо установить занова.

## Ошибки КриптоПро
- ```The card cannot be accessed because the wrong PIN was presented. (0x8010006B)``` - скинте кеш конфига или проверьте правильность установленного пароля.

## Тестовая проверка подписи
- ```php -f TestCryp.php``` - при успешном выполнении команды вернется OK