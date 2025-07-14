<?php

$pageTitle = 'Neo\'s Calendar - My Tasks';

require_once APP_ROOT . '/staticData/todos.staticdata.php';

$tasks = $todosArray;

require_once APP_ROOT . '/components/templates/todo-list.component.php';
