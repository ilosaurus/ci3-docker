# ci3docker

## Prerequisites

- Kubernetes 1.20+
- Environment Variabel as Secret
- Helm  

## Create file .env.production

```bash
vim .env.production
```
____  

```bash
DB_CONNECTION_GC=Pdo_Mysql
DB_CONNECTION=mysqli
DB_HOST=[MYSQL_HOST]
DB_DATABASE=[MYSQL_DATABASE]
DB_USERNAME=[MYSQL_USER]
DB_PASSWORD=[MYSQL_PASSWORD]
```

## Create Secret for Environment Variable

```bash
kubectl create secret generic ci3docker-environment --from-file=.env.production
```

## Install the Chart

```bash
helm repo add --username [USERNAME] --password [PASSWORD] harbor https://training.btech.id/chartrepo/client
```
_____  
```bash
cd ~
mkdir -p deploy
cd deploy
helm pull harbor/ci3docker --untar
```
_____  
```bash
cd ci3docker
helm install ci3docker . --version "1.0.0" --set image.tag=latest -n default
```
_____  
```bash
helm list
kubect get deploy | grep ci3docker
kubectl get pod -o wide | grep ci3docker
kubectl get svc | grep ci3docker
```

