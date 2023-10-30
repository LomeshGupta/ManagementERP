<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class ItemModel extends Model{
    protected $table = 'items';
    
    protected $allowedFields = [
        'item_no',
        'item_name',
        'unit_cost',
        'unit_price',
        'inv_posting_group	',
        'uom',
        'image',
        'type',
        'replenish_type',
        'costing_method',
        'reorder_qty'
    ];
}