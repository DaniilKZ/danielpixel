
# DanielPixel
**DanielPixel** - это инструмент аналитики, с помощью которого можно измерять 
эффективность рекламы и изучать действия людей на вашем сайте.

## Установка

Для установки виджета необходимо разместить скрипт в **footer** или **head** сайта под плагином **Jquery**

##### CDN

    <script type="text/javascript" src="https://www.danielhaus.kz/pixel/pixel.js"></script> 

##### File script

    <script type="text/javascript" src="/pixel.js"></script> 


## Использование
В данной версии  виджет нет никаких настроек и параметров для использование, нужно просто разместить виджет на сайте и ждать. 

Было бы не плохо реализовать UI - панель с личным кабинетом для каждого пользователя и отслежеванием всех небходимых параметров, посещаемости, откликов, взаимодействий, построения графиков и прочие, но в этом нет никакой необходимости так как существует **FaceBook Pixel** да и вооще это не проект а просто задание для разработчика.

## Пример данных

![enter image description here](https://www.danielhaus.kz/test.jpg)

## Пример SQL запроса 

Пример запроса для вывода статистики "подсчет общего числа посещений страниц" пользователеми. 

```sql
SELECT COUNT(site) as visits, userip, site FROM `uniqs` GROUP BY site, userip order by visits DESC
```

## Примечание

*Данный виджет использует плагин  [Jquery-Cookie](https://github.com/carhartl/jquery-cookie "Jquery-Cookie")*

## Автор
©[Daniiel](https://www.instagram.com/daniil.shabatko/ "Daniiel")
