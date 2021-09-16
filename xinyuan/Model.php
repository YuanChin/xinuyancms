<?php
namespace Xinyuan;

use Xinyuan\DB;
use Exception;

class Model
{
    protected $db;
    protected $table = '';
    protected $options;

    public function __construct()
    {
        $this->db = DB::getInstance();
        $this->initTable();
        $this->resetOption();
    }
    protected function initTable()
    {
        if ($this->table === '') {
            $this->table = strtolower(basename(get_class($this)));
            $this->table = $this->db->getConfig('prefix') . $this->table;
        }
    }

    protected function resetOption()
    {
        $this->options = [
            'where' => '',      // WHERE子句
            'order' => '',      // ORDER BY子句
            'limit' => '',      // LIMIT子句
            'data' => []        // WHERE中的数据部分
        ];
    }

    protected function buildSelect(array $field = [])
    {
        $field = empty($field) ? '*' : ('`' . implode('`,`', $field) . '`');
        $table = $this->table;
        $where = $this->options['where'];
        $order = $this->options['order'];
        $limit = $this->options['limit'];
        return "SELECT $field FROM `$table` $where $order $limit";
    }

    public function get(array $field = [])
    {
        $sql = $this->buildSelect($field);
        $data = $this->db->fetchAll($sql, $this->options['data']);
        $this->resetOption();
        return $data;
    }

    public function first(array $field = [])
    {
        if (!$this->options['limit']) {
            $this->limit(1);
        }
        $sql = $this->buildSelect($field);
        $data = $this->db->fetchRow($sql, $this->options['data']);
        $this->resetOption();
        return $data;
    }

    public function value($field)
    {
        $res = $this->first([$field]);
        return $res ? $res[$field] : null;
    }

    public function where($field, $op = '=', $value = null)
    {
        $this->buildWhere($field, $op, $value, 'AND');
        return $this;
    }

    public function orWhere($field, $op = '=', $value = null)
    {
        $this->buildWhere($field, $op, $value, 'OR');
        return $this;
    }

    protected function buildWhere($field, $op, $value, $join = 'AND')
    {
        if (is_array($field)) {
            foreach ($field as $k => $v) {
                $this->buildWhere($k, $op, $v, $join);
            }
            return;
        } elseif (is_null($value)) {
            $value = $op;
            $op = '=';
        }
        if (empty($this->options['where'])) {
            $join = 'WHERE';
        }
        $this->options['where'] .= "$join `$field` $op ?";
        $this->options['data'][] = $value;
    }

    public function orderBy($field, $sort = 'ASC')
    {
        $this->options['order'] = "ORDER BY `$field` $sort";
        return $this;
    }

    public function limit($offset, $limit = '')
    {
        if ($limit) {
            $limit = ", $limit";
        }
        $this->options['limit'] = 'LIMIT ' . $offset . $limit;
        return $this;
    }

    protected function buildInsert(array $field = [], $count = 1)
    {
        $value = array_fill(0, count($field), '?');
        $value = '(' . implode(',', $value) . ')';
        $value = implode(',', array_fill(0, $count, $value));
        $field = '`' . implode('`,`', $field) . '`';
        $table = $this->table;
        return "INSERT INTO `$table` ($field) VALUES $value";
    }

    public function insert(array $data = [])
    {
        if (isset($data[0]) && is_array($data[0])) {
            $sql = $this->buildInsert(array_keys($data[0]), count($data));
            $data = array_reduce($data, function ($carry, $item) {
                return array_merge($carry, array_values($item));
            }, []);
        } else {
            $sql = $this->buildInsert(array_keys($data));
            $data = array_values($data);
        }
        $res = $this->db->execute($sql, $data);
        $this->resetOption();
        return $res;
    }

    public function insertGetId(array $data = [])
    {
        $this->insert($data);
        return $this->db->lastInsertId();
    }

    protected function buildUpdate(array $fields = [])
    {
        $field = implode(',', array_map(function ($v) {
            return "`$v`=?";
        }, $fields));
        $table = $this->table;
        $where = $this->options['where'];
        $order = $this->options['order'];
        $limit = $this->options['limit'];
        return "UPDATE `$table` SET $field $where $order $limit";
    }
    
    public function update(array $data = [])
    {
        if (empty($this->options['where'])) {
            throw new Exception('update()缺少WHERE条件。');
        }
        $sql = $this->buildUpdate(array_keys($data));
        $data = array_merge(array_values($data), $this->options['data']);
        $res = $this->db->execute($sql, $data);
        $this->resetOption();
        return $res;
    }

    protected function buildDelete()
    {
        $table = $this->table;
        $where = $this->options['where'];
        $order = $this->options['order'];
        $limit = $this->options['limit'];
        return "DELETE FROM `$table` $where $order $limit";
    }

    public function delete()
    {
        if (empty($this->options['where'])) {
            throw new Exception('delete()缺少WHERE条件。');
        }
        $sql = $this->buildDelete();
        $res = $this->db->execute($sql, $this->options['data']);
        $this->resetOption();
        return $res;
    }

    public function count()
    {
        $table = $this->table;
        $where = $this->options['where'];
        $sql = "SELECT COUNT(*) AS c FROM $table $where";
        $res = $this->db->fetchRow($sql, $this->options['data']);
        $this->resetOption();
        return $res ? $res['c'] : null;
    }

    public function increment($field, $add = 1)
    {
        $table = $this->table;
        $where = $this->options['where'];
        $order = $this->options['order'];
        $limit = $this->options['limit'];
        $sql = "UPDATE `$table` SET `$field`=`$field`+$add $where $order $limit";
        $res = $this->db->execute($sql, $this->options['data']);
        $this->resetOption();
        return $res;
    }
}