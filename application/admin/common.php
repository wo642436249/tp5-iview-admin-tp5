<?php
/**
 * 菜单子孙树
 * @param array $data
 * @return array $tree
 */
function subtree($data)
{
    // 整理数组
    $res = array();
    foreach ($data as $key => $vo) {
        $res[$vo['id']] = $vo;
        $res[$vo['id']]['expand'] = true;
        $res[$vo['id']]['children'] = [];
    }
    unset($data);
    // 查询子孙
    foreach ($res as $key => $vo) {
        if ($vo['pid'] != 0) {
            $res[$vo['pid']]['children'][] = &$res[$key];
        }
    }
    $tree = [];
    // 去除杂质
    foreach ($res as $key => $vo) {
        if ($vo['pid'] == 0) {
            $tree[] = $vo;
        }
    }
    unset($res);
    return $tree;
}

/**
 * 菜单子孙树
 * @param array $rule $role
 * @return array $tree
 */
function userSubtree($rule, $role)
{    // 整理数组
    $res = array();
    foreach ($rule as $key => $vo) {
        $res[$vo['id']] = $vo;
        $res[$vo['id']]['expand'] = true;
        $res[$vo['id']]['children'] = [];
        if ($vo['pid'] > 0) {
            if (in_array($vo['id'], $role)) {
                $res[$vo['id']]['checked'] = true;
            } else {
                $res[$vo['id']]['checked'] = false;
            }
        }
    }
    unset($data);
    // 查询子孙
    foreach ($res as $key => $vo) {
        if ($vo['pid'] != 0) {
            $res[$vo['pid']]['children'][] = &$res[$key];
        }
    }
    $tree = [];
    // 去除杂质
    foreach ($res as $key => $vo) {
        if ($vo['pid'] == 0) {
            $tree[] = $vo;
        }
    }
    unset($res);
    return $tree;
}
