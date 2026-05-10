<?php

return array_merge(
    require __DIR__ . '/../en/tb.php',
    [
        'added_new_plant' => '我添加了一株新植物：<a href="{url}">{name}</a>',
        'moved_plant_to_history' => '我已将 <a href="{url}">{name}</a> 移动到 {history}',
        'restored_plant_from_history' => '我已将 <a href="{url}">{name}</a> 从 {history} 中恢复',
        'deleted_plant' => '我删除了 <strong>{name}</strong>',
        'created_task' => '我创建了一个新任务：<a href="{url}">{name}</a>',
        'completed_task' => '我完成了一个任务：<a href="{url}">{name}</a>',
        'reactivated_task' => '我重新激活了一个任务：<a href="{url}">{name}</a>',
        'created_inventory_item' => '我创建了一个新的库存项：<a href="{url}">{name}</a>',
        'removed_inventory_item' => '我从库存中删除了物品 <strong>{name}</strong>',
        'added_calendar_item' => '我在日历中添加了一条新记录：<a href="{url}">{name}</a>',
        'edited_calendar_item' => '我编辑了一条日历记录：<a href="{url}">{name}</a>',
    ]
);
