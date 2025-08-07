<?php
// База данных (в памяти для примера)
$tasks = [];

function addTask($task) {
    global $tasks;
    $tasks[] = $task;
}

function deleteTask($index) {
    global $tasks;
    if (isset($tasks[$index])) {
        unset($tasks[$index]);
        $tasks = array_values($tasks); // Переиндексация массива
    }
}

function listTasks() {
    global $tasks;
    if (empty($tasks)) {
        echo "Задач нет.\n";
        return;
    }
    foreach ($tasks as $index => $task) {
        echo "$index: $task\n";
    }
}

// Интерфейс командной строки
while (true) {
    echo "\n1. Добавить задачу\n2. Удалить задачу\n3. Показать задачи\n4. Выход\n";
    $choice = readline("Выберите действие: ");

    switch ($choice) {
        case '1':
            $task = readline("Введите задачу: ");
            addTask($task);
            echo "Задача добавлена!\n";
            break;
        case '2':
            $index = readline("Введите номер задачи для удаления: ");
            deleteTask($index);
            echo "Задача удалена!\n";
            break;
        case '3':
            listTasks();
            break;
        case '4':
            echo "Выход...\n";
            exit;
        default:
            echo "Неверный выбор. Попробуйте снова.\n";
    }
}
?>
