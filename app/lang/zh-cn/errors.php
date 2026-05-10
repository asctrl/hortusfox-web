<?php

return array_merge(
    require __DIR__ . '/../en/errors.php',
    [
        'csrf_token_invalid' => 'CSRF 令牌缺失或无效',
        'item_required' => '字段 {key} 为必填项。',
        'item_email' => '字段 {key} 必须是有效的电子邮箱地址',
        'item_too_short' => '字段 {key} 的长度必须大于 {min}',
        'item_too_large' => '字段 {key} 的长度必须小于 {max}',
        'item_datetime' => '字段 {key} 不是有效的日期时间值',
        'item_number' => '字段 {key} 不是有效的数字',
        'item_regex' => '字段 {key} 不符合规则 {pattern}',
    ]
);
