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