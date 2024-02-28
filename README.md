# 基本需求
    1. docker:  23.05
    2. docker-compose: 2.17.3

# 目录说明
    1. 工作目录为~/dockerspace, 
    2. docker 配置文件目录 ~/dockerspace/docker

# 准备工作
    1. 修改config目录下.env路径

# docker-compose 常用命令
    docker-compose up: 启动所有的服务。
    docker-compose up [service-name]: 启动指定的服务。
    docker-compose down: 停止所有的服务并删除相关容器、网络等资源。
    docker-compose down --volumes: 停止所有的服务并删除相关容器、网络、卷等资源。
    docker-compose ps: 列出所有服务及其相关容器的状态。
    docker-compose logs [service-name]: 显示指定服务的日志输出。
    docker-compose build: 构建所有服务的镜像。
    docker-compose build [service-name]: 构建指定服务的镜像。
    docker-compose config: 验证并显示 Compose 文件的配置。
    docker-compose pull: 拉取所有服务的最新镜像。
    docker-compose push: 推送所有服务的镜像到注册表。
    docker-compose exec [service-name] [command]: 在指定服务的容器中执行命令。

# docker 常用命令

    docker run [image-name]: 运行镜像。
    docker ps: 列出正在运行的容器。
    docker ps -a: 列出所有容器（包括已停止的容器）。
    docker images: 列出本地的镜像。
    docker build [path-to-dockerfile]: 根据 Dockerfile 构建镜像。
    docker stop [container-name]: 停止容器。
    docker rm [container-name]: 删除容器。
    docker rmi [image-name]: 删除镜像。
    docker exec -it [container-name] [command]: 在容器中运行命令。
    docker logs [container-name]: 查看容器的日志输出。

# 容器内APP访问宿主机mysql的问题
    1. ifconfig 查看网卡docker0的ip地址， 例： 172.17.0.1
    2. 设置APP连接的数据库地址为172.17.0.1
    3. 修改宿主机的mysql允许非本地直连

# 下载容器文件到本地
    sudo docker cp e5b8835ebdad:/etc/php81/php.ini

# 获取镜像IP地址
    sudo docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' 75000c343eb7

# 更换IP
    清理无用网路 并 重启网路
    