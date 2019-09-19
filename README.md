<br>

<p align="center">
<img src="https://box.kancloud.cn/90f9b3c1d667aefa77b09ea1b7ffb054_120x120.png" alt="MixPHP">
</p>

<p align="center">高性能 • 轻量级 • 命令行</p>

<p align="center">
<img src="https://img.shields.io/badge/php-%3E%3D7.2-brightgreen">
<img src="https://img.shields.io/badge/swoole-%3E%3D4.4.1-brightgreen">
<img src="https://img.shields.io/badge/license-apache%202-blue">
</p>

## Mix 是什么

一个基于 Swoole 开发的高性能 PHP 框架，经过两年发展收获了很多中小型团队的支持，框架版本经历了：

- `V1.*`: 基于 Swoole 的常驻内存型 PHP 高性能框架
- `V2.0`: 基于 Swoole 的 FastCGI、常驻内存、协程三模 PHP 高性能框架
- `V2.1`: 基于 Swoole 4.4+ 单线程协程 PHP 框架 🆕

## 与传统 MVC 框架比较

传统框架大部分都是在 HTTP 领域开发，而 Mix 能开发 HTTP、WebSocket、TCP、UDP 几乎全部互联网领域。

在命令开发方面 Mix 也有更多的封装，填充代码即可开发一个功能完备的命令行程序。

在性能方面采用常驻内存+协程，拥有传统框架无法比拟的性能。 

## 与其他基于 Swoole 的框架比较

> 以下只针对最新版本 V2.1

服务器全部基于 Swoole\Coroutine\Server 开发，线程模型与 Node.js 一样为单进程单线程模型 (现有其他 Swoole 框架基本都是多进程模型)，组件封装风格参考 Golang，这样既拥有 Golang 的 CSP 并发模型，又无需像 Golang 一样处理数据的并发安全。

框架非常轻量灵活，现有组件全部基于 PSR 标准实现，均可独立使用，严格来讲 Mix 其实只封装了 `mix/console` 命令行开发组件，其他全部为选装。

框架集成了众多开箱即用的组件，方便快速开发，且全部与 Golang 使用风格非常类似。

我们的开发文档可能是所有框架中最详细的，源码自带 Demo，稍微修改一下即可使用。

全面采用 Swoole 原生协程与最新的 PHP Stream 一键协程化技术。

采用和 Golang 类似的高度灵活的开发方式，框架只提供底层库，而与具体功能相关的代码都在项目库中实现，用户能更加细粒度的修改每一处细节。

## 框架定位

在其他 Swoole 框架都定位于大中型团队、庞大的 PHP 应用集群的时候，Mix 决定推动这项技术的普及，我们定位于众多的中小型企业、创业型公司，我们将 Swoole 的复杂度封装起来，用简单的编码方式呈现给用户，让更多的中级程序员也可打造高并发系统，让 Swoole 不再只是高级程序员的专利。

## 框架配套工具

- [SwooleFor](https://github.com/mix-php/swoolefor)：自动重启工具，实现热更新功能
- [mix-phar](https://github.com/mix-php/mix-phar)：用于开发 Phar 命令行程序的分支
- [guzzle-hook](https://github.com/mix-php/guzzle-hook)：让 Guzzle 支持 Swoole 的 PHP Stream Hook 协程 (无需修改代码)

## 性能测试

[MixPHP 并发性能全面对比测试](http://www.jianshu.com/p/f769b6be1caf)

## 开发文档

MixPHP开发指南：

- http://doc.mixphp.cn
- https://www.kancloud.cn/onanying/mixphp2-1/content

## 环境要求

* Linux, OS X, WSL
* PHP >= 7.2
* Swoole >= 4.4.1

## 快速开始

推荐使用 [composer](https://www.phpcomposer.com/) 安装。

```
composer create-project mix/mix-skeleton=v2.1.0-beta --prefer-dist
```

启动服务器：

接下来启动 HTTP 服务器。

```
$> php /data/bin/mix.php http:start
```

如果一切顺利，运行到最后你将看到如下的输出：

```
                              ____
 ______ ___ _____ ___   _____  / /_ _____
  / __ `__ \/ /\ \/ /__ / __ \/ __ \/ __ \
 / / / / / / / /\ \/ _ / /_/ / / / / /_/ /
/_/ /_/ /_/_/ /_/\_\  / .___/_/ /_/ .___/
                     /_/         /_/

Server         Name:      mix-httpd
System         Name:      linux
PHP            Version:   7.2.12
Swoole         Version:   4.4.3
Framework      Version:   2.1.0-alpha
Listen         Addr:      0.0.0.0
Listen         Port:      9501
[info] 2019-08-30 12:07:20.597 <31677> server start
```

访问测试 (新开一个终端)：

```
$> curl http://127.0.0.1:9501/
Hello, World!
```

## 技术交流

作者微博：http://weibo.com/onanying ，关注最新进展     
官方QQ群：284806582(满) [825122875](http://shang.qq.com/wpa/qunwpa?idkey=d2908b0c7095fc7ec63a2391fa4b39a8c5cb16952f6cfc3f2ce4c9726edeaf20)，敲门暗号：phper

## License

Apache License Version 2.0, http://www.apache.org/licenses/
