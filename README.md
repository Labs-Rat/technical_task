Проект разворачивался с использованием Vagrant.
После установки vagrant и клонирования репозитория, запустить команду:

   ```vagrant up``` 

Дождаться выполнения первичной настройки виртуальной машины и скачивания необходимых плагинов.
Для доступа к виртуальной машине вводится команда

   ```vagrant ssh```

После того как мы окажемся в консоли виртуальной машины, вводим

   ```cd /app```

Для перехода в директорию проекта.
После перехода в директорию проекта необходимо запустить Docker контейнер.

```docker compose up -d```

После завершения поднятия контейнера необходимо ввести команду для применения миграций.

```docker compose exec php php yii migrate```

Миграции создадут необходимые таблицы в базе данных, а также предварительно заполнят таблицу parameters некоторым кол-вом записей.

После завершения выполнения миграций можно приступать к работе с приложением.



