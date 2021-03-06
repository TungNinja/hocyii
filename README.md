Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
Chu y: Tao model truoc khi tao CRUB Model

1. Tạo migrate
+ yii migrate/cretae ten_bang
+ yii migrate -> thu thi commit vào bảng 

2. Tạo authen
+ Cấu hình trong common/config/main.php
    "authManager" => [
        'class'=> 'yii\rbac\DbManager'
    ]
De cho yii hieu rang chung ta dang su dung chuc nang phan quyen
+ Thuc thi lenh
        yii migrate --migrationpath=@yii/rbac/mrgiration
+ Chung t cthe phan quyen dung.
+ Sau khi xong thuc thi lenh
        yii rbac/init

===================> Yii2 Scan controller and action <========================

public function actionIndex()
    {
        $controllers = [];

        foreach ($this->getAllControllers() as $controller) {
            $className = 'www\controllers\\' . basename($controller, '.php');

            $controllers[$controller] = [];
            $methods = (new \ReflectionClass($className))->getMethods(\ReflectionMethod::IS_PUBLIC);
            //Phalcon
            foreach ($methods as $method) {
                if ($this->startsWith($method->name, 'action')) {
                    $controllers[$controller][] = $method->name;
                }
            }

        }

        var_dump( $controllers[$controller][]);die();
        //return $this->render('index');
    }

    function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);

        return $length === 0 ||
            (substr($haystack, -$length) === $needle);
    }
    public function getAllControllers()
    {
        $files = scandir('../controllers');
        $controllers = array();
        foreach ($files as $file) {
            if ($controller = $this->extractController($file)) {
                $controllers[] = $controller;
            }
        }
        return $controllers;
    }

    protected function extractController($name)
    {
        $filename = explode('.php', $name);
        if (count(explode('Controller.php', $name)) > 1) {
            # code...
            if (count($filename) > 1) {
                return $filename[0];
            }
        }

        return false;
    }
