<?php

$tasks = isset($tasks) && is_array($tasks) ? $tasks : [];
?>

<div class="todo-app">
    <h2 class="app-header">My To-Do List</h2>

    <div class="task-input-section">
        <input type="text" id="new-task-input" class="new-task-input" placeholder="Add a new task...">
        <button class="add-task-button">Add Task</button>
    </div>

    <ul class="task-list">
        <?php if (empty($tasks)): ?>
            <li class="task-item no-tasks">
                <span class="task-description">No tasks found. Time to add some!</span>
            </li>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <li class="task-item <?php echo $task['completed'] ? 'completed' : ''; ?>">
                    <span class="task-description"><?php echo htmlspecialchars($task['description']); ?></span>
                    
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
