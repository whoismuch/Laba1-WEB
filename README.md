# Задание:

Разработать PHP-скрипт, определяющий попадание точки на координатной плоскости в заданную область, и создать HTML-страницу, которая формирует данные для отправки их на обработку этому скрипту.

Параметр R и координаты точки должны передаваться скрипту посредством HTTP-запроса. Скрипт должен выполнять валидацию данных и возвращать HTML-страницу с таблицей, содержащей полученные параметры и результат вычислений - факт попадания или непопадания точки в область. Предыдущие результаты должны сохраняться между запросами и отображаться в таблице.

Кроме того, ответ должен содержать данные о текущем времени и времени работы скрипта.

Разработанная HTML-страница должна удовлетворять следующим требованиям:
- Для расположения текстовых и графических элементов необходимо использовать блочную верстку.
- Данные формы должны передаваться на обработку посредством GET-запроса.
- Таблицы стилей должны располагаться в отдельных файлах.
- При работе с CSS должно быть продемонстрировано использование селекторов атрибутов, селекторов псевдоклассов, селекторов классов, селекторов дочерних элементов а также такие свойства стилей CSS, как наследование и каскадирование.
- HTML-страница должна иметь "шапку", содержащую ФИО студента, номер группы и новер варианта. При оформлении шапки необходимо явным образом задать шрифт (fantasy), его цвет и размер в каскадной таблице стилей.
- Отступы элементов ввода должны задаваться в пикселях.
- Страница должна содержать сценарий на языке JavaScript, осуществляющий валидацию значений, вводимых пользователем в поля формы. Любые некорректные значения (например, буквы в координатах точки или отрицательный радиус) должны блокироваться.

# Контрольные вопросы:

## 1. Протокол HTTP. Структура запросов и ответов, методы запросов, коды ответов сервера, заголовки запросов и ответов.

HTTP — это протокол, позволяющий получать различные ресурсы, например HTML-документы. Протокол HTTP  лежит в основе обмена данными в Интернете. HTTP является протоколом клиент-серверного взаимодействия, что означает инициирование запросов к серверу самим получателем, обычно веб-браузером (web-browser).

Браузер (клиент) отправляет серверу HTTP запросы, а сервер отправляет клиенту HTTP ответы. Эти запросы и ответы оформляются по определенным правилам. Есть, что-то вроде синтаксиса, как и в какой последовательности, должно быть написано. Должна быть строго определенная структура.

HTTP запрос состоит из трех основных частей, которые идут в нем именно в том порядке, который указан ниже. Между заголовками и телом сообщения находится пустая строка (в качестве разделителя), она представляет собой символ перевода строки.

1. строка запроса (Request Line) - указывает метод передачи, URL-адрес, к которому нужно обратиться и версию протокола HTTP.
2. заголовки (Message Headers) - описывают тело сообщений, передают различные параметры и др. сведения и информацию.

Пустая строка (разделитель)

3. тело сообщения (Entity Body) – сами данные, которые передаются в запросе.
*необязательный параметр*

Когда мы получаем ответный запрос от сервера, тело сообщения, чаще всего представляет собой содержимое веб-страницы. Но, при запросах к серверу, оно тоже может иногда присутствовать, например, когда мы передаем данные, которые заполнили в форме обратной связи на сервер.

#### Методы запросов:

- Метода GET в HTTP используется для получения информации от сервера по заданному URI (URI в HTTP). Запросы клиентов, использующие метод GET должны получать только данные и не должны никак влиять на эти данные.
Сервер кэширует ответы

- HTTP метод HEAD работает точно так же, как GET, но в ответ сервер посылает только заголовки и статусную строку без тела HTTP сообщения. (используется для получения метаинформации об объекте без пересылки тела HTTP сообщения)
(Метод HEAD часто используется для тестирования HTTP соединений и достижимости узлов и ресурсов, так как нет необходимости гонять по сети содержимое, тестирование HTTP методом HEAD производится гораздо быстрее.)
Сервер может кэшировать ответы

- HTTP метод POST используется для отправки данных на сервер, например, из HTML форм, которые заполняет посетитель сайта.
Сервер НЕ кэширует ответы

- HTTP метод PUT используется для загрузки содержимого запроса на указанный в этом же запросе URI. (метод POST и метод PUT выполняют совершенно разные операции. Метод POST обращается к ресурсу (странице или коду), которая содержит механизмы обработки сообщения метода POST, а вот метод PUT создает какой-то объект по URI, указанному в сообщение с HTTP методом PUT.)

- HTTP метод DELETE удаляет указанный в URI ресурс.

- HTTP метод CONNECT преобразует существующее соединение в тоннель. (HTTP метод CONNECT используется для преобразования HTTP соединения в прозрачный TCP/IP туннель.  Пожалуй, это всё, что можно сказать про HTTP метод CONNECT в контексте рассматриваемого протокола, разве что стоит добавить, что данный метод используется в основном для шифрования соединения (не путайте с кодировкой сообщений).)

- HTTP метод OPTIONS используется для получения параметров текущего HTTP соединения.

- HTTP метод TRACE создает петлю, благодаря которой клиент может увидеть, что происходит с сообщением на всех узлах передачи. (HTTP метод TRACE применяется для диагностики, он позволяет видеть клиенту, что происходит в каждом звене цепочки между компьютером клиента и конечным получателем)

#### Коды ответов сервера:

- Код ответа (состояния) HTTP показывает, был ли успешно выполнен определённый HTTP запрос. Коды сгруппированы в 5 классов:

Информационные 100 - 199

Успешные 200 - 299

Перенаправления 300 - 399

Клиентские ошибки 400 - 499

Серверные ошибки 500 - 599

#### Заголовки запросов и ответов:

##### Поля общего(general-header) заголовка (он общий как для запросов так и для ответов):

Date:

Указывает дату запроса,например:
Date: Sun, 20 Nov 1994 08:12:31 GMT

MIME-version:

Указывает версию MIME (по умолчанию 1.0)
MIME-version: 1.0

Pragma:

Содержит указания для таких промежуточных агентов как прокси и шлюзы,
Pragma: no-cache

##### Поля относящиеся к запросу(Request-Header):

Authorization:

Содержит информацию аутентификации
Authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==

From:

Браузер может посылать адрес пользователя серверу
From: quake@doom.ru

If-Modified-Since:

используется при методе GET ресурс возвращается ,если он был изменен с указаного момента, может использоваться при кешировании.
If-Modified-Since:Mon 15 Jul 1997 00:15:24 GMT

Referer:

Содержит URL предшествующего ресурса.
Referer: http://www.uic.nnov.ru/~paaa/index.html

User-Agent:

Програмное обеспечение клиента.
User-Agent: Mozilla/3.0

##### Заголовок информации сообщения (Entity-Header) применяется как в запросах так и в ответах (при этом некоторые поля только в ответах):

Allow: (в ответе сервера)

Список методов,поддерживаемых ресурсом.
Allow: GET, HEAD

Content-Encoding:

идентифицирует метод кодировки,которым был закодирован ресурс
Content-Encoding: x-gzip

Content-Length:

Длина тела сообщения
Content-Length: 102

Content-Type:
Содержит тип ресурса(MIME),для текстовых еще и кодировку символов(необязательно)

Content-Type: text/html; charset=windows-1251

Expires: (в ответе сервера)

Дата окончания действия ресурса,применяется в кешировании для запрета кеширования устаревших ресурсов (в ответе)
Expires: Tue, 24 Sep 1998 23:00:15 GMT

Last-Modified: (в ответе сервера)

Время последнего обновления ресурса
Last-Modified: Tue, 23 sep 1998 13:48:40 GMT

##### Другие поля:

Поля Accept: указывают серверу выдавать только указаные форматы данных,которые клиент может распознать.

Accept: text/html
Accept: text/plain
Accept: image/gif

Поле Host: служит для того , чтобы указать, к какому хосту идет обращение. Данное поле не входит в число обязательных. Однако оно является необходимым в тех случаях, когда одному физическому серверу соответствует несколько виртуальных хостов. В этом поле тогда указывается какой из виртуальных хостов имеется в виду.

Host: www.nnov.city.ru

##### Заголовок ответа состоит из полей:

Location:

Содержит URI ресурса,может быть использован для переключения клиента в другое место, если например ресурс был перемещен в другое место или на другой сервер.
Location: http://www.uic.nnov.ru/newlocation/index.html

Server:

Информация о програмном обеспечении сервера
Server: Apache/1.1

WWW-Autenticate:

Параметры аутентификации.
WWW-Autenticate: Basic realm="doomsday"

## 2. Язык разметки HTML. Особенности, основные теги и атрибуты тегов.

HTML (HyperText Markup Language) - язык разметки гипертекста - предназначен для создания Web-страниц.
Под гипертекстом в этом случае понимается текст, связанный с другими текстами указателями-ссылками.

HTML представляет собой достаточно простой набор кодов, которые описывают структуру документа. HTML позволяет выделить в тексте отдельные логические части (заголовки, абзацы, списки и т.д.), поместить на Web-страницу подготовленную фотографию или картинку, организовать на странице ссылки для связи с другими документами.

#### Каковы особенности языка HTML?
HTML расшифровывается как язык маркировки гипертекста. С его помощью создаются страницы в интернете. Но он не относится к программированию, а является лишь элементом, необходимым для форматирования документов.

Составными частями языка HTML называют теги. От них зависит то, как текст будет выглядеть на странице. Тег задает команду браузеру, с помощью которого происходит просмотр сайтов, он анализирует полученную информацию, преобразует ее и выдает готовый результат в виде форматированных подзаголовков, списков. Теги позволяют также вставлять ссылки, картинки, создавать таблицы на странице. 

#### Основные теги и атрибуты тегов.
- Тег (tag). Тег HTML это компонент, который командует Web- броузеру выполнить определенную задачу типа создания абзаца или вставки изображения.
- Атрибут (или аргумент). Атрибут HTML изменяет тег. Например, можно выровнять абзац или изображение внутри тега.
- Значение. Значения присваиваются атрибутам и определяют вносимые изменения. Например, если для тега используется атрибут выравнивания, то можно указать значение этого атрибута. Значения могут быть текстовыми, типа left или right, а также числовыми, как например ширина и высота изображения, где значения определяют размер изображения в пикселях.

##### Основные атрибуты HTML*
Существует четыре основных атрибута в HTML, которые могут использоваться для большинства html-элементов (хотя и не для всех):

-- id

Атрибут id html-тега может быть использован для однозначной идентификации любого элемента внутри html-страницы. Существуют две основные причины, по которым Вы можете использовать атрибут id для элемента:

 - Если элемент содержит атрибут id как уникальный идентификатор, то можно идентифицировать только этот элемент и его содержимое.
 - Если на веб-странице (или в таблице стилей) есть два элемента с одним и тем же именем, Вы можете использовать атрибут id для различения элементов, имеющих одно и то же имя.

-- title

Атрибут title — дает название элемента для элемента. Синтаксис для атрибута title аналогичен атрибуту id.

Поведение этого атрибута будет зависеть от элемента, который его несет, хотя он часто отображается как подсказка, когда курсор наводится на элемент или когда элемент загружается.

-- class

Атрибут class — используется для связывания элемента со списком стилей и задает класс элементу.

-- style

Атрибут style — позволяет указывать правила каскадной таблицы стилей (CSS) внутри элемента.

![GitHub Logo](/attributes.png)

